<?php
namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RegistroController extends Controller
{
    public function register(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombres' => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'diaNacimiento' => 'required|string|max:10',
            'mesNacimiento' => 'required|string|max:10',
            'anoNacimiento' => 'required|string|max:10',
            'genero' => 'required|string|max:20',
            'telefono' => 'required|string|max:10',
            'correo' => 'required|email|max:30|unique:Usuario,Correo',
            'password' => 'required|string|min:6|max:20',
        ]);

        // Datos del formulario
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $dianacimiento = $request->input('diaNacimiento');
        $mesnacimiento = $request->input('mesNacimiento');
        $anonacimiento = $request->input('anoNacimiento');
        $genero = $request->input('genero'); 
        $telefono = $request->input('telefono');
        $correo = $request->input('correo');
        $password = $request->input('password'); 

        DB::statement('call sp_Usuario_Insert(?, ?, ?, ?, ?, ?, ?, ?, ?)', [$nombres, $apellidos, $dianacimiento, $mesnacimiento, $anonacimiento, $genero, $telefono , $correo, $password]);

        return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }
}