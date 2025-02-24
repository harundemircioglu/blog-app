<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($blogs as $blog)
        <a href="{{ route('blog.edit', ['id' => $blog->id]) }}">
            <h1>{{ $blog->title }}</h1>
        </a>

        <form action="{{ route('blog.destroy', ['id' => $blog->id]) }}" method="POST">
            @csrf
            <button>Delete</button>
        </form>
    @endforeach
</body>

</html>
