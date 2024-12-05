<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MensajesController extends Controller
{
    public function enviarMensaje(Request $request, $idReceptor)
    {
        $request->validate([
            'contenido' => 'required',
        ]);

        $usuarioEmisor = auth();

        DB::select('CALL EnviarMensaje(?, ?, ?)', [
            $usuarioEmisor->id, $idReceptor, $request->contenido
        ]);

        return back()->with('success', 'Mensaje enviado.');
    }
}