<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, iniital-scale=1" />
        <title>Idea</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-background text-foreground">
        <header>
            <x-layout.nav></x-layout.nav>
        </header>


        <main class="max-w-7xl mx-auto px-6">
            {{ $slot }}
        </main>
    </body>
</html>