@extends('layout')

@section('content')
    <div class="grid grid-cols-3 gap-2">
        @foreach($houses as $house)
            <div class="border rounded-xl p-2">
                <b>{{ $house -> address }}</b><br>
                {{ $house -> owner -> name }}
                <br>
                <a class="bg-sky-500 hover:bg-sky-600 text-white px-2 py-1" href="{{ route('houses.show', ['house' => $house]) }}">Megnézem</a>
            </div>
        @endforeach
    </div>
@endsection
