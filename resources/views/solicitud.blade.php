@extends('SolicitudEstructura')

@section('content')
<div class="amistad-contenedor">
    <div class="solicitudes">
        <h2>Solicitudes de Amistad</h2>
        @if($solicitudes->isEmpty())
            <p>No tienes solicitudes pendientes.</p>
        @else
            <ul>
                @foreach($solicitudes as $solicitud)
                    <li>
                        <p>{{ $solicitud->Nombres }} {{ $solicitud->Apellidos }} ({{ $solicitud->Correo }})</p>
                        <form action="{{ route('aceptarSolicitud') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="idSolicitud" value="{{ $solicitud->id }}">
                            <button type="submit">Aceptar</button>
                        </form>
                        <form action="{{ route('rechazarSolicitud') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="idSolicitud" value="{{ $solicitud->id }}">
                            <button type="submit">Rechazar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="sugerencias">
        <h2>Sugerencias de Amistad</h2>
        @if($sugerencias->isEmpty())
            <p>No hay sugerencias disponibles.</p>
        @else
            <ul>
                @foreach($sugerencias as $sugerencia)
                    <li>
                        <p>{{ $sugerencia->Nombres }} {{ $sugerencia->Apellidos }} ({{ $sugerencia->Correo }})</p>
                        <form action="{{ route('enviarSolicitud') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="idReceptor" value="{{ $sugerencia->id }}">
                            <button type="submit">Enviar solicitud</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
<style>/* Configuración global */
    
    /* Contenedor general */
    .amistad-contenedor {
        display: flex;
        justify-content: space-between;
        width: 100%;
        max-width: 1200px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    
    /* Tarjetas */
    .solicitudes, .sugerencias {
        width: 50%; /* Mitad de la pantalla */
        padding: 20px;
        margin-top: 100px;
        border-right: 1px solid #ddd; /* Separador entre secciones */
    }
    
    .sugerencias {
        border-right: none; /* Eliminar el borde del lado derecho */
    }
    
    /* Títulos */
    .solicitudes h2, .sugerencias h2 {
        font-size: 20px;
        margin-bottom: 15px;
        color: #1877f2; /* Azul de Facebook */
    }
    
    /* Listado */
    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    li {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }
    
    li:last-child {
        border-bottom: none;
    }
    
    li p {
        font-size: 16px;
        color: #333;
        margin: 0;
    }
    
    /* Botones */
    button {
        background-color: #1877f2; /* Azul de Facebook */
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 5px 15px;
        cursor: pointer;
        font-size: 14px;
        margin-left: 10px;
        transition: background-color 0.3s ease;
    }
    
    button:hover {
        background-color: #145dbf;
    }
    
    button.secondary {
        background-color: #e4e6eb; /* Gris claro */
        color: #333;
    }
    
    button.secondary:hover {
        background-color: #d8dadd;
    }</style>
@endsection
