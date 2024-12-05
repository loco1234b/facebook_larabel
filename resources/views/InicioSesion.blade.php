
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    <link href="../img/faceboook.ico" rel="shortcut icon" sizes="196x196">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
</head>
<body>
    <div class="contenedor">
        <div class="col1">
            <img src="../img/facebook.svg" alt="" class="logo">
            <p>Facebook te ayuda a comunicarte y compartir con las personas que forman parte de tu vida.</p>
        </div>
        <div class="col2">
            <form action="{{route('InicioSesion')}}" method="POST">
                @csrf
                <input type="email" name="usuario"  placeholder="Correo electrónico o número de teléfono">
                <input type="password" name="password"  placeholder="Contraseña">
                <button type="submit" class="iniciar">Iniciar Sesión</button>
                <a href="{{route('olvidaste')}}" class="olvidaste">¿Has olvidado la Contraseña?</a>
                <hr>
                <a href="{{ route('registro')}}" class="nueva">Crear cuenta nueva</a>
            </form>
            <div class="login-error">
                @error('login-error')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <p><strong>Crear una página</strong> para un famoso, una marca o una empresa</p>
            <div class="social" style="align-items: center;">
                <p style="font-size: 25px;">Iniciar Sesion con: </p>
                <a href="#" id="googleLogin" class="social-btn google" style="text-decoration: none;margin-left:25px; "><i class="bx bxl-google" style="color:black; background:wheat;font-size:30px;"></i></a>
             </div>
        </div>
    </div>
    <!-- Add Firebase products that you want to use -->
    <script src="/__/firebase/8.10.1/firebase-auth.js"></script>
    <script src="/__/firebase/8.10.1/firebase-app.js"></script>
  
    <script type="module" src="../js/sesionFacebook.js"></script>
</body>
</html>
