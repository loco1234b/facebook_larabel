@foreach($mensajes as $mensaje)
    <div class="mensaje">
        <p>{{ $mensaje->contenido }}</p>
        <p><small>{{ $mensaje->fecha_envio }}</small></p>
    </div>
@endforeach

<form action="{{ route('mensajes.enviar', $receptor->id) }}" method="POST">
    @csrf
    <textarea name="contenido" placeholder="Escribe un mensaje"></textarea>
    <button type="submit">Enviar</button>
</form>