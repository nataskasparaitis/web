@extends('layouts.adminLayout')
@section('edit')
<h2 class="admintext">Edit Car</h2>

@foreach($errors->all() as $error)
    <p class="error">{{ $error }}</p>
@endforeach

<form action="/admin/update/{{ $car->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="titlediv">
        <label class="titleadmin">Title</label>
        <input type="text" name="title" class="titleinput" value="{{ old('title', $car->title) }}">
    </div>
    <div class="titlediv">
        <label class="titleadmin">Price ($)</label>
        <input type="number" step="0.01" name="price" class="titleinput" value="{{ old('price', $car->price) }}">
    </div>
    <div class="titlediv">
        <label class="titleadmin">Year</label>
        <input type="number" name="year" class="titleinput" value="{{ old('year', $car->year) }}">
    </div>
    <div class="titlediv">
        <label class="titleadmin">Make</label>
        <input type="text" name="make" class="titleinput" value="{{ old('make', $car->make) }}">
    </div>
    <div class="titlediv">
        <label class="titleadmin">Model</label>
        <input type="text" name="model" class="titleinput" value="{{ old('model', $car->model) }}">
    </div>
    <div class="titlediv">
        <label class="titleadmin">Image URL</label>
        <input type="text" name="image_url" class="titleinput" value="{{ old('image_url', $car->image_url) }}">
    </div>
    <button type="submit" class="adminbutton">Update Car</button>
    <a href="/admin" class="link">Cancel</a>
</form>
@endsection