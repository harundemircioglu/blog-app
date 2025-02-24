<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="title" value="{{ old('title') }}">

        <textarea name="description" placeholder="description">{{ old('description') }}</textarea>

        @foreach ($blogCategories as $category)
            <input name="category[]" type="checkbox" value="{{ $category->id }}">{{ $category->title }}
        @endforeach

        <button>Store</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>

</html>
