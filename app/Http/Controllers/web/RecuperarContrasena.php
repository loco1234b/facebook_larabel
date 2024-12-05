<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RecuperarContrasena extends Controller
{
    public function showRequestForm()
    {
        return view('olvidaste_password');
    }

    // Manejar la solicitud de recuperación de contraseña
    public function recuperar(Request $request)
    {
        $request->validate(['usuario' => 'required|email']);

        $usuario = $request->usuario;

        // Verificar si el usuario existe
        $existe = DB::select('CALL sp_Usuario_RecuperarPassword(?)', [$usuario]);

        if (!$existe) {
            return back()->withErrors(['usuario' => 'El correo o número no existe en nuestros registros']);
        }

        session(['email' => $usuario]); 
        return redirect()->route('cuenta.identificada');
    }

    // Función para enviar el correo de recuperación
    public function enviarCorreoRecuperacion($usuario)
    {
        $mail = new PHPMailer(true);

        try {
            //Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true;
            $mail->Username = 'aaronlurita123@gmail.com';  
            $mail->Password = 'hkcbrljxanchiywd'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Remitente y destinatario
            $mail->setFrom('aaronlurita123@gmail.com', 'soporte');
            $mail->addAddress($usuario);  

            $resetLink = route('password.reset', ['email' => $usuario]);

            $mail->isHTML(true);
            $mail->Subject = 'Recupera tu password';
            $mail->Body = 'Para restablecer tu password, haz clic en el siguiente enlace: <a href="' . $resetLink . '">Restablecer Contraseña</a>';

            // Enviar el correo
            $mail->send();
            return redirect()->route('cuenta.identificada')->with('success', 'El enlace para restablecer la contraseña se ha enviado a tu correo.');
        } catch (Exception $e) {
            return back()->withErrors(['usuario' => 'Hubo un problema al enviar el correo: ' . $mail->ErrorInfo]);
        }
    }

    // Mostrar el formulario de restablecimiento de contraseña
    public function showResetForm(Request $request)
{
    $email = $request->query('email');
    return view('restablecer', ['email' => $email]);
}

    // Actualizar la contraseña
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5',
        ]);

        $usuario = DB::table('Usuario')->where('Correo', $request->email)->first();

        if ($usuario) {
            DB::table('Usuario')
                ->where('Correo', $request->email)
                ->update(['Passwordd' => $request->password]);

            return redirect()->route('login')->with('status', 'Contraseña actualizada exitosamente.');
        }

        return back()->withErrors(['email' => 'Correo no encontrado.']);
    }
}