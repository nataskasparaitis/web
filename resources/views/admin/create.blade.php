@extends('layouts.adminLayout')
@section('admin')
<h2 class="admintext">Add New Car</h2>

@foreach($errors->all() as $error)
    <p class="error">{{ $error }}</p>
@endforeach

<form action="/admin/store" method="POST">
    @csrf
    <div class="titlediv">
        <label class="titleadmin">Title (e.g., 2022 Tesla Model 3)</label>
        <input type="text" name="title" class="titleinput" value="{{ old('title') }}">
    </div>
    <div class="titlediv">
        <label class="titleadmin">Price ($)</label>
        <input type="number" step="0.01" name="price" class="titleinput" value="{{ old('price') }}">
    </div>
    <div class="titlediv">
        <label class="titleadmin">Year</label>
        <input type="number" name="year" class="titleinput" value="{{ old('year') }}">
    </div>
    <div class="titlediv">
        <label class="titleadmin">Make</label>
        <input type="text" name="make" class="titleinput" value="{{ old('make') }}">
    </div>
    <div class="titlediv">
        <label class="titleadmin">Model</label>
        <input type="text" name="model" class="titleinput" value="{{ old('model') }}">
    </div>
    <div class="titlediv">
        <label class="titleadmin">Image URL</label>
        <input type="text" name="image_url" class="titleinput" value="{{ old('image_url') }}">
    </div>
    <button type="submit" class="adminbutton">Add Car</button>
    <a href="/admin" class="link">Cancel</a>
</form>
@endsection