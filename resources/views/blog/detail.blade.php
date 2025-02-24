<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Author: {{ $blog->user->name }}</h2>

    <h1>{{ $blog->title }}</h1>

    <h3>{{ $blog->description }}</h3>

    <h5>Categories</h5>

    @foreach ($blog->categories as $blogCategory)
        <p>{{ $blogCategory->category->title }}</p>
    @endforeach
</body>

</html>
