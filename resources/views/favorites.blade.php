@extends('layouts.favoritesLayout')
@section('favorites')
<div class="top">
    <div class="search-bar-container">
        <i style="color: black;" class="fa-solid fa-magnifying-glass"></i>
        <input class="search-bar" placeholder="Search favorites...">
    </div>
</div>

<div class="cars-grid">
    @foreach($favorites as $favorite)
    <div class="car-card" data-id="{{ $favorite->car->id }}">
        <i class="fa-solid fa-heart"></i>
        <img class="car-image" src="/{{ $favorite->car->image_url }}" alt="{{ $favorite->car->title }}">
        <div class="car-info">
            <div class="car-title">{{ $favorite->car->title }}</div>
            <div class="car-price">${{ number_format($favorite->car->price, 2) }}</div>
            <div class="car-details">{{ $favorite->car->year }} {{ $favorite->car->make }} {{ $favorite->car->model }}</div>
        </div>
    </div>
    @endforeach
</div>
@endsection