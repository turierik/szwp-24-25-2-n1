@extends('layout')

@section('content')

<form method="POST" action="{{ route('houses.store') }}" enctype="multipart/form-data">
    @csrf

    Cím:
    <input type="text" name="address" value="{{ old('address') }}">
    @error('address')
       <span class="text-red-500 font-medium">{{ $message }}</span>
    @enderror
    <br>

    Tulajdonos:
    <select name="owner_id">
        @foreach($users as $user)
            <option value="{{ $user -> id}}" {{ old('owner_id') == $user -> id ? 'selected' : '' }}>{{ $user -> name }}</option>
        @endforeach
    </select>
    @error('owner_id')
       <span class="text-red-500 font-medium">{{ $message }}</span>
    @enderror<br>

    Ár:
    <input type="text" name="rent" value="{{ old('rent') }}">
    @error('rent')
       <span class="text-red-500 font-medium">{{ $message }}</span>
    @enderror<br>

    Méret:
    <input type="text" name="size" value="{{ old('size') }}">
    @error('size')
       <span class="text-red-500 font-medium">{{ $message }}</span>
    @enderror<br>

    Kép:
    <input type="file" name="image">
    @error('image')
       <span class="text-red-500 font-medium">{{ $message }}</span>
    @enderror<br>

    <button>Mentés</button>
</form>

@endsection
