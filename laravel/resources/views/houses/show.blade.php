@extends('layout')

@section('content')

<b>Cím: </b>{{$house -> address}}<br>
<b>Tulajdonos: </b>{{$house -> owner -> name}} <br>
<b>Bérlő: </b>{{$house -> tenant ?-> name}}<br>
<b>Ár: {{$house -> rent}}</b> Zed<br>
<b>Méret: </b>{{$house -> size}} m<sup>2</sup>

@endsection
