@extends('layout')

@section('content')
    @can('create', \App\Models\House::class)
        <a href="{{ route('houses.create') }}"
        class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 inline-block mb-4">
        <i class="fa fa-plus"></i> Új ház létrehozása</a>
    @endcan

    @if (Session::has('house-created'))
        <div class="w-full font-medium bg-green-100 text-center mb-4">
            Ház létrehozva!
        </div>
    @endif

    <div class="grid grid-cols-3 gap-2">
        @forelse($houses as $house)
            <div class="border rounded-xl p-2">
                @if ($house -> image)
                    <img src="{{ Storage::url($house -> image) }}">
                @else
                    <img src="https://placehold.co/600x400?text=Nincs+k%C3%A9p">
                @endif
                <b>{{ $house -> address }}</b><br>
                {{ $house -> owner -> name }}
                <br>

                @can('update', $house)
                    <a class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1"
                    href="{{ route('houses.edit', ["house" => $house]) }}"><i class="fa fa-edit"></i></a>
                @endcan

                @can('delete', $house)
                    <form class="inline" method="POST" action="{{ route("houses.delete", ["house" => $house] )}}">
                        @csrf
                        @method("DELETE")
                        <a class="bg-red-500 hover:bg-red-600 text-white px-2 py-1"
                        href="#" onclick="this.closest('form').submit()"><i class="fa fa-trash"></i></a>
                    </form>
                @endcan

                <a class="bg-sky-500 hover:bg-sky-600 text-white px-2 py-1" href="{{ route('houses.show', ['house' => $house]) }}"><i class="fa fa-eye"></i></a>
            </div>
        @empty
            Nincsenek házak.
        @endforelse
    </div>
@endsection
