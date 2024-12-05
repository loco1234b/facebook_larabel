<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilosAmigos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Facebook-Amigos</title>
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
    <div class="contact-section">
        <h4>Contacts</h4>
        <div class="search">
            <img src="../img/logo_facebook.jfif" alt="Search">
            <img src="../img/logo_facebook.jfif" alt="Search">
        </div>
    
        @forelse($amigos as $amigo)
            <div class="page-link" onclick="openChat('{{ $amigo->Nombre }} {{ $amigo->Apellidos }}')">
                <div class="online">
                    <img src="../img/logo_facebook.jfif" alt="{{ $amigo->Nombre }}">
                </div>
                <p>{{ $amigo->Nombre }} {{ $amigo->Apellidos }}</p>
            </div>
        @empty
            <p class="no-friends">No tienes amigos todavía.</p>
        @endforelse
    </div>
    
    <div id="chat-container" class="chat-hidden">
        <div class="chat-header">
            <h4 style="color: white" id="chat-user-name">Chat</h4>
            <button onclick="closeChat()">×</button>
        </div>
        <div class="chat-messages" id="chat-messages">
        </div>
        <div class="chat-input">
            <input type="text" id="message-input" placeholder="Escribe un mensaje...">
            <button onclick="sendMessage()">enviar</button>
        </div>
    </div>

  <script src="../js/chat.js"></script>
</body>
</html>
    