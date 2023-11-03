<div class="bg-warning {{$attributes->get('class')}}" >
    {{ $attributes }}
    <br>
    {{ $callFunction() }}
    <br>
    LISTA DE USERS <br>
    {{ $slot }}
</div>