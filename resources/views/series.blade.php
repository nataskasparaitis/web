@extends('layouts.seriesLayout')
@section('series')
    <div class="top">
        <div class="search-bar-container">
            <i style="color: black;" class="fa-solid fa-magnifying-glass"></i>
            <input class="search-bar" placeholder="Type in something"> 
        </div>
    </div>

    <div class="mid">
        <img class="action-picture" src="/images/logo.jpg">
        <p class="action-name" style="-webkit-text-stroke: 4px black;">ANIMATION</p>
    </div>
    <div class="title-action">Animated Series</div>
    <div class="action-films">
        @foreach($series->where('genre', 'animation') as $serie)
        <div class="action-film-container" data-name="{{$serie->title}}" data-id="{{$serie['id']}}">
            <i class="fa-regular fa-heart"></i>
            <img class="action-film" src="/{{$serie['image_url']}}"><p class="action-info">{{$serie->title}}</p></a>
        </div>
        @endforeach
        
    </div>

    <div class="mid">
        <img class="action-picture" src="/images/logo.jpg">
        <p class="action-name" style="-webkit-text-stroke: 4px black;">DRAMA</p>
    </div>
    <div class="title-action">Drama Series</div>
        <div class="action-films">
        @foreach($series->where('genre', 'drama') as $serie)
        <div class="action-film-container" data-name="{{$serie->title}}" data-id="{{$serie['id']}}">
            <i class="fa-regular fa-heart"></i>
            <img class="action-film" src="/{{$serie['image_url']}}"><p class="action-info">{{$serie->title}}</p></a>
        </div>
        @endforeach
    </div>

    <div class="mid">
        <img class="action-picture" src="/images/logo.jpg">
        <p class="action-name" style="-webkit-text-stroke: 4px black;">FANTASY</p>
    </div>
    <div class="title-action">Fantasy Series</div>
    <div class="action-films">
        @foreach($series->where('genre', 'fantasy') as $serie)
        <div class="action-film-container" data-name="{{$serie->title}}" data-id="{{$serie['id']}}">
            <i class="fa-regular fa-heart"></i>
            <img class="action-film" src="/{{$serie['image_url']}}"><p class="action-info">{{$serie->title}}</p></a>
        </div>
        @endforeach
    </div>

    <div class="mid">
        <img class="action-picture" src="/images/logo.jpg">
        <p class="action-name" style="-webkit-text-stroke: 4px black;">ANIME</p>
    </div>
    <div class="title-action">Anime Series</div>
    <div class="action-films">
        @foreach($series->where('genre', 'anime') as $serie)
        <div class="action-film-container" data-name="{{$serie->title}}" data-id="{{$serie['id']}}">
            <i class="fa-regular fa-heart"></i>
            <img class="action-film" src="/{{$serie['image_url']}}"><p class="action-info">{{$serie->title}}</p></a>
        </div>
        @endforeach
    </div>
@endsection