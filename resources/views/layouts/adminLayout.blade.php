<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/main.css">
    <title>Admin Panel - Cars</title>
</head>
<body>
    <nav class="sidebar">
        <hr class="line">
        <div class="title">Admin Panel</div>
        <hr class="line">
        <div class="sidebar-buttons">
            <div class="nav"><a class="link" href="/admin">Car List</a></div>
            <div class="nav"><a class="link" href="/admin/create">Add New Car</a></div>
            <div class="nav"><a class="link" href="/admin/redirect">Back to Home</a></div>
        </div>
        <hr class="line">
        <div class="log-out"><a class="link" href="/logout">Log Out</a></div>
        <hr class="line">
    </nav>
    <div class="main">
        @yield('admin')
    </div>
</body>
</html>