<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <div class="text-center">
        <a href="{{ route('categories') }}" class="btn btn-lg btn-danger btn-outline-dark">Categories</a>
        <a href="{{ route('posts') }}" class="btn btn-lg btn-primary btn-outline-warning text-dark">Posts</a>
    </div>
        <h1 class="text-center text-danger mb-3">Welcome to Atia news</h1>
</body>
</html>
