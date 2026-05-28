@extends('layouts.moviesLayout')
@section('movies')
    <div class="top">
        <div class="search-bar-container">
            <i style="color: black;" class="fa-solid fa-magnifying-glass"></i>
            <input class="search-bar" placeholder="Type in something"> 
        </div>
    </div>

    <div class="mid">
        <img class="action-picture" src="/images/logo.jpg">
        <p class="action-name" style="-webkit-text-stroke: 4px black;">ACTION</p>
    </div>
    <div class="title-action">Action Movies</div>
    <div class="action-films">
        @foreach($movies->where('genre', 'action') as $movie)
        <div class="action-film-container" data-name="{{$movie->title}}" data-id="{{$movie['id']}}">
            <i class="fa-regular fa-heart"></i>
            <img class="action-film" src="/{{$movie['image_url']}}"><p class="action-info">{{$movie->title}}</p></a>
        </div>
       @endforeach
    </div>

    <div class="mid">
        <img class="action-picture" src="/images/logo.jpg">
        <p class="action-name" style="-webkit-text-stroke: 4px black;">FANTASY</p>
    </div>
    <div class="title-action">Fantasy Movies</div>
    <div class="action-films">
         @foreach($movies->where('genre', 'fantasy') as $movie)
        <div class="action-film-container" data-name="{{$movie->title}}" data-id="{{$movie['id']}}">
            <i class="fa-regular fa-heart"></i>
            <img class="action-film" src="/{{$movie['image_url']}}"><p class="action-info">{{$movie->title}}</p></a>
        </div>
       @endforeach
    </div>

    <div class="mid">
        <img class="action-picture" src="/images/logo.jpg">
        <p class="action-name" style="-webkit-text-stroke: 4px black;">HORROR</p>
    </div>
    <div class="title-action">Horror Movies</div>
    <div class="action-films">
        @foreach($movies->where('genre', 'horror') as $movie)
        <div class="action-film-container" data-name="{{$movie->title}}" data-id="{{$movie['id']}}">
            <i class="fa-regular fa-heart"></i>
            <img class="action-film" src="/{{$movie['image_url']}}"><p class="action-info">{{$movie->title}}</p></a>
        </div>
       @endforeach
    </div>

    <div class="mid">
        <img class="action-picture" src="/images/logo.jpg">
        <p class="action-name" style="-webkit-text-stroke: 4px black;">COMEDY</p>
    </div>
    <div class="title-action">Comedy Movies</div>
    <div class="action-films">
         @foreach($movies->where('genre', 'comedy') as $movie)
        <div class="action-film-container" data-name="{{$movie->title}}" data-id="{{$movie['id']}}">
            <i class="fa-regular fa-heart"></i>
            <img class="action-film" src="/{{$movie['image_url']}}"><p class="action-info">{{$movie->title}}</p></a>
        </div>
       @endforeach
    </div>
@endsection