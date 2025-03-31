@extends('layout')

@section('content')

<b>Cím: </b>{{$house -> address}}<br>
<b>Tulajdonos: </b>{{$house -> owner -> name}} <br>
<b>Bérlő: </b>{{$house -> tenant ?-> name}}<br>
<b>Ár: {{$house -> rent}}</b> Zed<br>
<b>Méret: </b>{{$house -> size}} m<sup>2</sup>
<br>
<br>
<b>Szobák:</b>
<ul>
    @foreach($house -> rooms as $room)
        <li>{{ $room -> name }} - {{ $room -> pivot -> size }} m<sup>2</sup> </li>
    @endforeach
</ul>
<br>
<b>Új szoba felvétele</b>
<form method="POST" action="{{ route("houses.addroom", ["house" => $house])}}">
    @csrf

    Szoba neve:
    <select name="room_id">
        @foreach($rooms as $room)
            @if (!$house -> rooms -> pluck('id') -> contains($room -> id))
                <option value="{{ $room -> id }}">{{ $room -> name }}</option>
            @endif
        @endforeach
    </select>
    <br>

    Szoba mérete:
    <input type="number" name="size" min="0" max="99" value="5">
    <br>

    <button>Mentés</button>
</form>

@endsection
