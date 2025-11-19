<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>
</head>
<body>
    <header>
        <h1><a href="{{ route('perpustakaan.index') }}">Perpustakaan</a></h1>
    </header>

    <main>
        @if(session('success'))
            <div style="color:green">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Ry</p>
    </footer>
</body>
</html>
