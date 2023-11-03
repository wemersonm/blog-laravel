@extends('master')

@section('content')
<h1>GG</h1>

    <x-user.list-user type="list" class="text-danger"> 
        qem ta perdendo a porra do jogo e quen no tempo ta dando uma paradA
    </x-user.list-user>

    <br><br>
    <ul class="list-group">
        @foreach ($users as $user )
           <li class="list-group-item">
            {{$user->Username}}
           </li>
        @endforeach

    </ul>
    {{
        $users->links();
    }}

   

@endsection 