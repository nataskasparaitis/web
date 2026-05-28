<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>My Favorites</title>
</head>
<body>
    <nav class="sidebar">
        <hr class="line">
        <div class="title">AutoTrader</div>
        <hr class="line">
        <div class="sidebar-buttons">
            <div class="nav"><a class="link" href="/home"><i class="fa-solid fa-house-chimney"></i> Home</a></div>
            <div class="nav"><a class="link" href="/favorites"><i class="fa-solid fa-face-smile"></i> Favorites</a></div>
            @if(Auth::user()->role === 'admin')
            <div class="nav"><a class="link" href="/admin"><i class="fa-solid fa-gear"></i> Admin Panel</a></div>
            @endif
        </div>
        <hr class="line">
        <div class="account">
            <img class="profile" src="/images/Icon.png">
            <div class="profile-name">{{ Auth::user()->username }}</div>
        </div>
        <hr class="line">
        <div class="log-out"><a class="link" href="/logout"><i class="fa-solid fa-door-open"></i> Log Out</a></div>
        <hr class="line">
    </nav>
    <div class="main">
        @yield('favorites')
    </div>
    <div class="footer">
        <div class="block1">AutoTrader - 2026</div>
        <div class="block2"><i class="fa-solid fa-handshake"></i> Socials:
            <a class="linkfoot" href="#"><i class="fa-brands fa-github"> GitHub</i></a>
        </div>
    </div>
    <script> const userFavorites = {!! json_encode($userFavorites ?? []) !!}; </script>
    <script src="/js/main.js"></script>
</body>
</html>