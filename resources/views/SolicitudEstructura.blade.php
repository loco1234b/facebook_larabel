<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilosSoilicitud.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Facebook-solicitudes</title>
</head>
<body>
    <div class="container">
        <nav>
            <div class="nav-left">
                <div class="logo-fb">
                    <img src="../img/logo_facebook.jfif" alt="facebook">

                    <div class="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" placeholder="Buscar amigos">
                    </div>
                </div>

            </div>
            <div class="nav-center">
                <a href="{{route('Inicio')}}"><i class="fa-solid fa-house"></i>
                <a href="#"><i class="fa-solid fa-user"></i></a>
                <a href="#"><i class="fa-solid fa-store"></i></a>
                <a href=""><i class="fa-solid fa-gamepad"></i></a>
            </div>
        </nav>
    </div>

    <main>
        @yield('content')
    </main>

 
</body>
</html>