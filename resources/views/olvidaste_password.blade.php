<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../img/faceboook.ico" rel="shortcut icon" sizes="196x196">
    <title>¿Has olvidado la contraseña? | No puedo entrar | Facebook</title>
    <link rel="stylesheet" href="../css/olvidaste_password.css">
</head>
<body>
    <div class="container">
        <img src="../img/facebook-6.png" alt="Logo de Facebook" class="logo">
        <h2>Recupera tu cuenta</h2>
        <p>Ingresa tu correo electrónico o número de móvil para buscar tu cuenta</p>
        <form action="{{route('recuperar')}}" method="POST">
            @csrf
            <input type="text" name="usuario" placeholder="Correo electrónico o número de móvil" required>
            <input type="submit" value="Buscar">
            <a href="{{route('login')}}" class="link">Cancelar</a>
        </form>
        @if ($errors->has('usuario'))
    <div class="alert alert-danger">{{ $errors->first('usuario') }}</div>
@endif
    </div>
</body>
</html>