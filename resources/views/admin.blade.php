@extends('layouts.adminLayout')
@section('admin')
<h2 class="titleadmin">All Cars</h2>
<table class="admintable">
    <thead>
        <tr>
            <th class='tid'>ID</th>
            <th class='titleid'>Title</th>
            <th class='ttype'>Price</th>
            <th class='turl'>Image URL</th>
            <th class='tgenre'>Year/Make/Model</th>
            <th class='tactions'>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr>
            <td class='tid'>{{ $car->id }}</td>
            <td class='titleid'>{{ $car->title }}</td>
            <td class='ttype'>${{ number_format($car->price, 2) }}</td>
            <td class='turl'>{{ $car->image_url }}</td>
            <td class='tgenre'>{{ $car->year }} {{ $car->make }} {{ $car->model }}</td>
            <td class='tactions'>
                <a href="/admin/edit/{{ $car->id }}" class="adminbutton">Edit</a>
                <form action="/admin/delete/{{ $car->id }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="adminbutton1">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection