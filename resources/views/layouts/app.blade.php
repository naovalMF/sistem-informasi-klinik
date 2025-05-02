<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Klinik</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: #1f2937;
            padding: 1rem;
            color: #fff;
        }
        .navbar a {
            color: #fff;
            margin-left: 1rem;
            text-decoration: none;
        }
        .container {
            padding: 2rem;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <span>Sistem Informasi Klinik</span>
        @auth
            <span style="margin-left: 2rem;">Login sebagai: {{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </div>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
