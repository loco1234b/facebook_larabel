<?php
namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class SolicitudAmistadController extends Controller
{
    public function mostrarSolicitudes()
{
    $idUsuario = session('id'); // Usa el ID del usuario
   // Solicitudes de amistad pendientes
   $solicitudes = DB::table('SolicitudAmistad')
   ->join('Usuario', 'Usuario.id', '=', 'SolicitudAmistad.idUsuarioEmisor')
   ->where('SolicitudAmistad.idUsuarioReceptor', $idUsuario)
   ->where('SolicitudAmistad.estado', 'pendiente')
   ->select('SolicitudAmistad.id', 'Usuario.Nombres', 'Usuario.Apellidos', 'Usuario.Correo')
   ->get();

    // Usuarios no amigos ni solicitados
    $sugerencias = DB::table('Usuario')
    ->whereNotIn('Usuario.id', function ($query) use ($idUsuario) {
        $query->select('idUsuarioEmisor')
                ->from('SolicitudAmistad')
                ->where('idUsuarioReceptor', $idUsuario)
                ->whereIn('estado', ['pendiente', 'aceptada']);
    })
   ->whereNotIn('Usuario.id', function ($query) use ($idUsuario) {
       $query->select('idUsuarioReceptor')
             ->from('SolicitudAmistad')
             ->where('idUsuarioEmisor', $idUsuario)
             ->whereIn('estado', ['pendiente', 'aceptada']);
   })
   ->where('Usuario.id', '!=', $idUsuario) // Excluir al usuario actual
   ->select('Usuario.id', 'Usuario.Nombres', 'Usuario.Apellidos', 'Usuario.Correo')
   ->get();

    return view('solicitud', compact('solicitudes', 'sugerencias'));
}
public function enviarSolicitud(Request $request)
{
    $idEmisor = session('id');
    $idReceptor = $request->idReceptor;

    DB::table('SolicitudAmistad')->insert([
        'idUsuarioEmisor' => $idEmisor,
        'idUsuarioReceptor' => $idReceptor,
        'estado' => 'pendiente',
        'fecha_solicitud' => now()
    ]);

    return redirect()->back()->with('status', 'Solicitud de amistad enviada.');
}
public function mostrarAmigos()
{
    $idUsuario = session('id'); 

    $amigos = DB::table('SolicitudAmistad')
        ->join('Usuario as Emisor', 'SolicitudAmistad.idUsuarioEmisor', '=', 'Emisor.id')
        ->join('Usuario as Receptor', 'SolicitudAmistad.idUsuarioReceptor', '=', 'Receptor.id')
        ->where(function ($query) use ($idUsuario) {
            $query->where('SolicitudAmistad.idUsuarioReceptor', $idUsuario)
                  ->orWhere('SolicitudAmistad.idUsuarioEmisor', $idUsuario);
        })
        ->where('SolicitudAmistad.estado', 'aceptada')
        ->selectRaw("
            CASE 
                WHEN SolicitudAmistad.idUsuarioEmisor = $idUsuario THEN Receptor.Nombres
                ELSE Emisor.Nombres
            END as Nombre,
            CASE 
                WHEN SolicitudAmistad.idUsuarioEmisor = $idUsuario THEN Receptor.Apellidos
                ELSE Emisor.Apellidos
            END as Apellidos,
            CASE 
                WHEN SolicitudAmistad.idUsuarioEmisor = $idUsuario THEN Receptor.Correo
                ELSE Emisor.Correo
            END as Correo
        ")
        ->get();

    return view('Amigos', compact('amigos'));
}

    
    // Enviar solicitud de amistad
    /*public function enviarSolicitud($idReceptor)
    {
        $idEmisor = Auth::id(); 
        
        DB::statement('CALL EnviarSolicitudAmistad(?, ?)', [$idEmisor, $idReceptor]);

        return redirect()->back()->with('status', 'Solicitud de amistad enviada.');
    }*/

    // Aceptar solicitud de amistad
    public function aceptarSolicitud(Request $request)
    {
        DB::statement('CALL AceptarSolicitudAmistad(?)', [$request->idSolicitud]);
    
        return redirect()->route('mostrarSolicitudes')->with('success', 'Solicitud aceptada.');
    }
    
    public function rechazarSolicitud(Request $request)
    {
        DB::statement('CALL RechazarSolicitudAmistad(?)', [$request->idSolicitud]);
    
        return redirect()->route('mostrarSolicitudes')->with('success', 'Solicitud rechazada.');
    }
}