<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../img/facebook.ico" rel="shortcut icon" sizes="196x196">
    <title>¿Has olvidado la contraseña? | No puedo entrar | Facebook</title>
    <link rel="stylesheet" href="../css/cuenta_identificada.css">
</head>
<body>

    <div class="container">
        <img src="../img/facebook-6.png" alt="Logo de Facebook" class="logo">
        <h2>Cuenta Encontrada</h2>
        <p>Hemos encontrado tu cuenta asociada a:</p>
        <p><strong>{{ session('email') }}</strong></p>
        <p>Para restablecer tu contraseña, revisa tu correo electrónico y sigue las instrucciones.</p>
        <a href="{{ route('password.request', ['usuario' => session('email')]) }}" class="enviar">Enviar correo de recuperación</a>
        <a href="{{route('login')}}" class="link">Regresar a Facebook</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

</body>

</html>
