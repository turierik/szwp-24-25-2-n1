<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NINYT Zrt.</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>
<body>
    <div class="container mx-auto">
        <div class="grid grid-cols-3">
            <div class="col-span-3">
                <h1>Nemzeti Ingatlannyilvántartó Zrt.<h1>
            </div>
            <div class="col-span-2">
                @yield('content')
            </div>
            <div class="col-span-1 pl-4">
                @auth
                    <span style="text-xl">Szia, {{ Auth::user() -> name }}!</span><br>

                    <form class="inline" method="POST" action="{{ route("logout")}}">
                        @csrf

                        <a class="bg-red-500 hover:bg-red-600 text-white px-2 py-1"
                        href="#" onclick="this.closest('form').submit()"><i class="fa fa-trash"></i> Kijelentkezés</a>
                    </form>

                @endauth

                @guest
                    <a href="{{ route("login") }}" class="text-sky-500 hover:underline">Bejelentkezés</a><br>
                    <a href="{{ route("register") }}" class="text-sky-500 hover:underline">Regisztráció</a>
                @endguest
            </div>
        </div>
    </div>
</body>
</html>
