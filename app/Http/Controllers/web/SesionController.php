<?php
namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SesionController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $correo = $request->input('usuario');
        $password = $request->input('password');

        // Llama al procedimiento almacenado
        $usuario = DB::select('CALL sp_Usuario_Login(?, ?)', [$correo, $password]);

        if (count($usuario) > 0) {
            session([
                'id' => $usuario[0]->id,
                'Nombres' => $usuario[0]->Nombres, 
                'Apellidos' =>$usuario[0]->Apellidos,
                'Correo' => $usuario[0]->Correo,
            ]);
            
    
            return redirect()->intended('Inicio');
    
        } else {
            return back()->withErrors([
                'login-error' => 'Las credenciales no coinciden con nuestros registros.',
            ]);
        }
    }
    public function inicio()
    {
        $idUsuario = session('id');
    
        // Obtener historias
        $historias = DB::table('Historias')
            ->join('Usuario', 'Historias.idUsuario', '=', 'Usuario.id')
            ->whereIn('Historias.idUsuario', function ($query) use ($idUsuario) {
                $query->select('idUsuarioReceptor')
                      ->from('SolicitudAmistad')
                      ->where('idUsuarioEmisor', $idUsuario)
                      ->where('estado', 'aceptada')
                      ->union(
                          DB::table('SolicitudAmistad')
                              ->select('idUsuarioEmisor')
                              ->where('idUsuarioReceptor', $idUsuario)
                              ->where('estado', 'aceptada')
                      );
            })
            ->orWhere('Historias.idUsuario', $idUsuario)
            ->select('Historias.*', 'Usuario.Nombres', 'Usuario.Apellidos')
            ->orderBy('fecha_publicacion', 'desc')
            ->get();
    
        // Obtener publicaciones
        $publicaciones = DB::table('Publicacion')
            ->join('Usuario', 'Publicacion.idUsuario', '=', 'Usuario.id')
            ->whereIn('Publicacion.idUsuario', function ($query) use ($idUsuario) {
                $query->select('idUsuarioReceptor')
                      ->from('SolicitudAmistad')
                      ->where('idUsuarioEmisor', $idUsuario)
                      ->where('estado', 'aceptada')
                      ->union(
                          DB::table('SolicitudAmistad')
                              ->select('idUsuarioEmisor')
                              ->where('idUsuarioReceptor', $idUsuario)
                              ->where('estado', 'aceptada')
                      );
            })
            ->orWhere('Publicacion.idUsuario', $idUsuario)
            ->select('Publicacion.*', 'Usuario.Nombres', 'Usuario.Apellidos')
            ->orderBy('fecha_publicacion', 'desc')
            ->get();
    
        return view('Inicio', [
            'historias' => $historias,
            'publicaciones' => $publicaciones,
            'usuario' => session('Nombres')
        ]);
    }

public function publicarPublicacion(Request $request)
{
    $request->validate([
        'contenido' => 'nullable|string|max:255',
        'archivo' => 'nullable|file|max:2048',
    ]);

    $idUsuario = session('id');

    $archivoUrl = null;
    if ($request->hasFile('archivo')) {
        $archivo = $request->file('archivo');
        $archivo->move(public_path('img'), $archivo->getClientOriginalName());
        $archivoUrl = 'img/' . $archivo->getClientOriginalName();
    }

    DB::table('Publicacion')->insert([
        'idUsuario' => $idUsuario,
        'contenido' => $request->input('contenido'),
        'foto' => $archivoUrl,
        'fecha_publicacion' => now(),
    ]);

    return redirect()->back()->with('success', 'Publicación realizada con éxito.');
}

 }