<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="/css/main.css">
        <title>BBN Movies</title>
        
    </head>
        <body>
            <div class="page-wrapper">

                <nav class="sidebar">
                <hr class="line">
                    <div class="title">BBN Filmai</div>

                    <hr class="line">

                    <div class="sidebar-buttons">
                        <!--------------------->
                            <div class="nav">
                                <a class="link" href="/home">
                                <i class="fa-solid fa-house-chimney"></i> 
                                Home</a>
                            </div>
                            <!--------------------->
                            <div class="nav">
                                <a class="link" href="/movies">
                                <i class="fa-solid fa-film"></i>
                                Movies </a>
                                </div>
                            <!--------------------->
                            <div class="nav">
                                <a class="link" href="/series">
                                <i class="fa-solid fa-clapperboard"></i>
                                Series</a>
                            </div>
                            <!--------------------->
                            <div class="nav">
                                <a class="link" href="/favorites">
                            <i class="fa-solid fa-face-smile"></i>
                                Favorites</a>
                            </div>
                            @if(Auth::user()->role === 'admin')
                            <div class="nav">
                                <a class="link" href="/admin">
                                    <i class="fa-solid fa-gear"></i> Admin Panel
                                </a>
                            </div>
                        @endif
                        </div>

                        <hr class="line">
                    
                    <div class="account">
                        <img class="profile" src="/images/Icon.png">

                    <div class="profile-name" movie="profile-name">{{ Auth::user()->username }}</div>
                    </div>
                    
                        <hr class="line">
                        <div class="log-out"><a class="link" href="/logout"><i class="fa-solid fa-door-open"></i> Log Out</a></div>
                        <hr class="line">
                        </nav>
                <div class="main">
                    @yield('movies')
                </div>

        <div class="footer">
           <div class="block1">BBN Filmai - 2026</div>

            <div class="block2"><i class="fa-solid fa-handshake"></i> Socials:
                
                <a class="linkfoot" href="https://github.com/MantasVI">
                    <i class="fa-brands fa-github"> Mantas </i>
                </a>
                <a class="linkfoot" href="https://github.com/nataskasparaitis">
                     <i class="fa-brands fa-github"> Natas </i>
                </a>
                <a class="linkfoot" href="https://github.com/Kepsnys7">
                    <i class="fa-brands fa-github"> Arnas </i>
                </a>
            </div>
        </div>
    </div>
    <script>
    const userFavorites = {!! json_encode($userFavorites ?? []) !!};
</script>
<script src="/js/main.js"></script>
    </body>
  </html>