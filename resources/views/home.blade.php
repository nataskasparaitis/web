@extends('layouts.homeLayout')
@section('home')
<div class="top">
    <div class="search-bar-container">
        <i style="color: black;" class="fa-solid fa-magnifying-glass"></i>
        <input class="search-bar" placeholder="Search cars by name...">
    </div>
</div>

<div class="cars-grid">
    @foreach($cars as $car)
    <div class="car-card" data-id="{{ $car->id }}">
        <i class="fa-regular fa-heart"></i>
        <img class="car-image" src="/{{ $car->image_url }}" alt="{{ $car->title }}">
        <div class="car-info">
            <div class="car-title">{{ $car->title }}</div>
            <div class="car-price">${{ number_format($car->price, 2) }}</div>
            <div class="car-details">{{ $car->year }} {{ $car->make }} {{ $car->model }}</div>
        </div>
    </div>
    @endforeach
</div>

<!-- Pagination links -->
<div class="pagination">
    {{ $cars->links() }}
</div>
@endsection