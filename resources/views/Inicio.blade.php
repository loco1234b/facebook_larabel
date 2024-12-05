<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Facebook-inicio</title>
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
                <i class="fa-solid fa-house"></i>
                <a href=""><i class="fa-solid fa-tv"></i></a>
                <a href="#"><i class="fa-solid fa-store"></i></a>
                <a href="{{ route('mostrarSolicitudes') }}"><i class="fa-solid fa-user"></i></a>
                <a href=""><i class="fa-solid fa-gamepad"></i></a>
            </div>
            <div class="nav-right">
                <i class="fa-solid fa-bars"></i>
                <i class="fa-brands fa-facebook-messenger"></i>
                <i class="fa-solid fa-bell"></i>

                <img src="../img/logo_facebook.jfif" alt="profile" class="profile" onclick="opencard()">
                
                <div class="card-profile" id="cardwrap">
                    <div class="menu">
                        <div class="profile-menu">
                        <img src="../img/logo_facebook.jfif" alt="profile">
                        <p>{{ $usuario ?? 'web coding' }}</p>
                    </div>
                    </div>
                    <a href="#" class="card-menu">
                        <img src="../img/logo_facebook.jfif" alt="meta">
                        <p>meta businness suite</p>
                        <span>></span>
                    </a>
                    <a href="#" class="card-menu">
                        <img src="../img/logo_facebook.jfif" alt="meta">
                        <p>setting y privacy</p>
                        <span>></span>
                    </a>
                    <a href="#" class="card-menu">
                        <img src="../img/logo_facebook.jfif" alt="meta">
                        <p>help y suporrt</p>
                        <span>></span>
                    </a>
                    <a href="#" class="card-menu">
                        <img src="../img/logo_facebook.jfif" alt="meta">
                        <p>display and accesibility</p>
                        <span>></span>
                    </a>
                    <a href="#" class="card-menu">
                        <img src="../img/logo_facebook.jfif" alt="meta">
                        <p>give feedback</p>
                       
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="card-menu" style="cursor: pointer;">
                        @csrf
                        <button type="submit" style="display: flex; align-items: center; gap: 10px; background: none; border: none; padding: 0; cursor: pointer;">
                            <img src="../img/logo_facebook.jfif" alt="meta" style="width: 40px;">
                            <p style="margin: 0; font-size: 15px; color: #000000;">Logout</p>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="main">
            <div class="left">
                <div class="img">
                    <img src="../img/logo_facebook.jfif" alt="">
                    <p>{{ $usuario ?? 'web coding' }}</p>
                </div>
                <div class="img">
                    <img src="../img/amigos.jfif" alt="">
                    <a href="{{ route('mostrar.amigos') }}" style="text-decoration: none; color:black; font-size: 14px;f ont-weight: 600; padding: 14px 0;margin-left: 10px" class="show-friends-btn">Amigos</a>
                </div>
                <div class="img">
                    <img src="../img/nuevo.jfif" alt="">
                    <p>news</p>
                </div>
                <div class="img">
                    <img src="../img/grupos.jfif" alt="">
                    <p>groups</p>
                </div>
                <div class="img">
                    <img src="../img/markeplace.png" alt="">
                    <p>marketplace</p>
                </div>
                <div class="img">
                    <img src="../img/ver.png" alt="">
                    <p>watch</p>
                </div>
                <div class="img">
                    <img src="../img/see more.png" alt="">
                    <p>see more</p>
                </div>
                <hr>

                <div class="shortcuts">
                    <p>your shortcuts</p>
                    <a href="#">Edit</a>
                </div>

                <div class="img">
                    <img src="../img/logo_facebook.jfif" alt="">
                    <p>bubble game</p>
                </div>
                <div class="img">
                    <img src="../img/logo_facebook.jfif" alt="">
                    <p>candy crush saga</p>
                </div>
                <div class="img">
                    <img src="../img/logo_facebook.jfif" alt="">
                    <p>bubble shooter</p>
                </div>
               <div class="img">
                    <img src="../img/logo_facebook.jfif" alt="">
                    <p>web codding</p>
                </div>
                <div class="img">
                    <img src="../img/logo_facebook.jfif" alt="">
                    <p>bubble shooter</p>
                </div>
               <div class="img">
                    <img src="../img/logo_facebook.jfif" alt="">
                    <p>web codding</p>
                </div>
                <div class="img">
                    <img src="../img/logo_facebook.jfif" alt="">
                    <p>bubble shooter</p>
                </div>
            </div>


            <div class="main-center">
                <!-- Publicar una historia -->
                <div class="top-box">
                    <div class="my-story">
                        <form action="{{ route('publicarHistoria') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="contenido" placeholder="Escribe tu historia...">
                            <input type="file" name="archivo">
                            <button type="submit">Publicar Historia</button>
                        </form>
                    </div>
                </div>
            
                <!-- Publicar una publicación -->
                <div class="create-post">
                    <form action="{{ route('publicarPublicacion') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="ptop">
                            <img src="../img/logo_facebook.jfif" alt="">
                            <input type="text" name="contenido" placeholder="¿Qué estás pensando?">
                        </div>
                        <input type="file" name="archivo">
                        <button type="submit">Publicar</button>
                    </form>
                </div>
            
                <hr>
            
                <!-- Mostrar historias 
                <div class="historias">
                    <h3>Historias</h3>
                    foreach($historias as $historia)
                        <div class="historia">
                            <p><strong>{ $historia->Nombres }} { $historia->Apellidos }}</strong></p>
                            <p>{ $historia->contenido }}</p>
                            if($historia->archivo_url)
                                <img src="{ asset('storage/' . $historia->archivo_url) }}" alt="Historia">
                            endif
                            <small>Publicado el { $historia->fecha_publicacion }}</small>
                        </div>
                    endforeach
                </div> 
            
                <hr>-->
            
                <!-- Mostrar publicaciones -->
                <div class="publicaciones">
                    <h3>Publicaciones</h3>
                    @foreach($publicaciones as $publicacion)
                        <div class="publicacion">
                            <p><strong>{{ $publicacion->Nombres }} {{ $publicacion->Apellidos }}</strong></p>
                            <p>Contenido:</p>
                            <p>{{ $publicacion->contenido }}</p>
                            @if($publicacion->foto)
                                <img src="{{ asset($publicacion->foto) }}" alt="Publicación">
                            @endif
                            <small>Publicado el {{ $publicacion->fecha_publicacion }}</small>
                        </div>
                    @endforeach
                    <style>.publicaciones {
                        margin: 20px auto;
                        max-width: 600px;
                        font-family: Arial, sans-serif;
                    }
                    
                    .publicaciones h3 {
                        font-size: 20px;
                        color: #333;
                        margin-bottom: 10px;
                    }
                    
                    .publicacion {
                        background-color: #fff;
                        border: 1px solid #e0e0e0;
                        border-radius: 10px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        padding: 15px;
                        margin-bottom: 15px;
                    }
                    
                    .publicacion p {
                        margin: 5px 0;
                        color: #333;
                        line-height: 1.5;
                    }
                    
                    .publicacion strong {
                        font-size: 14px;
                        color: #3b5998; /* Azul estilo Facebook */
                    }
                    
                    .publicacion img {
                        max-width: 100%;
                        border-radius: 10px;
                        margin-top: 10px;
                    }
                    
                    .publicacion small {
                        display: block;
                        color: #888;
                        font-size: 12px;
                        margin-top: 10px;
                    }
                    
                    .ptop img {
                        width: 40px;
                        height: 40px;
                        border-radius: 50%;
                        margin-right: 10px;
                    }
                    
                    .ptop input {
                        border: none;
                        width: 100%;
                        font-size: 14px;
                        padding: 10px;
                        border-radius: 20px;
                        background-color: #f0f2f5;
                    }
                    
                    .ptop input:focus {
                        outline: none;
                    }
                    
                    button {
                        background-color: #4267B2; /* Azul estilo Facebook */
                        color: #fff;
                        border: none;
                        padding: 10px 15px;
                        border-radius: 20px;
                        cursor: pointer;
                        font-size: 14px;
                        transition: background-color 0.3s;
                    }
                    
                    button:hover {
                        background-color: #365899;
                    }</style>
                </div>
            </div>

            <div class="main-right">
                <div class="sponsored-section">
                    <h2>sponsored</h2>
                    <div class="sponsored-link">
                        <img src="../img/logo_facebook.jfif" alt="">
                        <p>online advertisement services <br><a href=""></a>onlineservices.com</p>

                    </div>
                </div>
                    <hr>
                    <div class="page-section">
                        <h4>your pages and profile</h4>
                        <div class="page-link">
                            <img src="../img/logo_facebook.jfif" alt="">
                            <p>{{ $usuario ?? 'web coding' }}</p>
                        </div>
                        <div class="page-links-item">
                            <img src="../img/logo_facebook.jfif" alt="">
                            <p>switch to page</p>
                        </div>
                        <div class="page-links-item">
                            <img src="../img/logo_facebook.jfif" alt="">
                            <p>create promotion</p>
                        </div>
                        
                    </div>
                    <hr>

                    <div class="friend-section">
                        <h4>friend request</h4>
                        <div class="page-link">
                            <img src="../img/logo_facebook.jfif" alt="">
                            <p>winnie hensen</p>
                        </div>
                        <div class="buttons">
                            <button type="submit" class="confirm">confirm</button>
                            <button type="submit" class="delete">delete</button>
                        </div>

                    </div>
                    <hr>
                    <div class="contact-section">
                       
                    </div>

        </div>
    </div>


    <script src="../js/cardmenu.js"></script>
</body>
</html>

<!--<div class="search"> 
    <h4>contactos</h4> 
    <img src="../img/logo_facebook.jfif" alt=""> 
    forelse($amigos as $amigo) 
    <div class="page-link"> 
        <div class="online"> 
            <img src="../img/logo_facebook.jfif" alt=""> 
        </div> 
        <p>{$amigo->Nombre } { $amigo->Apellidos }}</p> 
    </div> 
    empty
    <p>No tienes amigos todavía.</p> 
    endforelse 
</div>


<!-- <div class="main-center">
                <div class="top-box">
                    <div class="my-story">
                        <form method="POST" action="{ route('publicar.historia') }}">
                            csrf
                            <textarea name="contenido" placeholder="¿Qué estás pensando?" maxlength="255"></textarea>
                            <button type="submit">Publicar</button>
                        </form>
                    </div>
            
                    foreach ($historias as $historia)
                    <div class="friends-story">
                        <div class="friend-profile">
                            <img src="../img/user_default.png" alt="Foto de { $historia->Nombres }}">
                        </div>
                        <div class="friend-name">
                            <p>{ $historia->Nombres }} { $historia->Apellidos }}</p>
                            <small>{$historia->fecha_publicacion }}</small>
                            <p>{ $historia->contenido }}</p>
                        </div>
                    </div>
                    endforeach
                    <div class="friends-story">
                        <img src="../img/logo_facebook.jfif" alt="">

                        <div class="friend-profile">
                            <img src="../img/logo_facebook.jfif" alt="">
                        </div>
                        <div class="friend-name">
                            <p>benjamin rodri</p>
                        </div>
                    </div>
                    <div class="friends-story">
                        <img src="../img/logo_facebook.jfif" alt="">

                        <div class="friend-profile">
                            <img src="../img/logo_facebook.jfif" alt="">
                        </div>
                        <div class="friend-name">
                            <p>benjamin rodri</p>
                        </div>
                    </div>
                </div>
            </div>