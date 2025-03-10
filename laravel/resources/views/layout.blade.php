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
            <div class="col-span-1">
                Sidebar
            </div>
        </div>
    </div>
</body>
</html>