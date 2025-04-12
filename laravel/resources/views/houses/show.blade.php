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
        <li>{{ $room -> name }} - {{ $room -> pivot -> size }} m<sup>2</sup> <a class="bg-red-500 hover:bg-red-600 text-white px-2 py-1"
            href="#" onclick="removeRoomForm({{$house->id }}, {{ $room->id}})"><i class="fa fa-trash"></i></a> </li>
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

<form id="rrf" class="hidden" method="POST" action="{{ route("houses.removeroom", [ "house" => "xxx", "room" => "yyy"]) }}">
    @csrf
    @method("DELETE")
</form>

<script>
    const form = document.querySelector("#rrf");
    const defaultState = document.querySelector("#rrf").action;
    function removeRoomForm(houseId, roomId){
        form.action = defaultState.replace("xxx", houseId).replace("yyy", roomId);
        form.submit();
    }
</script>

@endsection
