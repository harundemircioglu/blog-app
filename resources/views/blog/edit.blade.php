<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="POST">
        @csrf
        <input type="text" name="title" value="{{ $blog->title }}">

        <textarea name="description">{{ $blog->description }}</textarea>

        @foreach ($blogCategories as $blogCategory)
            <input type="checkbox" name="category[]" value="{{ $blogCategory->id }}"
                {{ $blog->categories->where('blog_category_id', $blogCategory->id)->isNotEmpty() ? 'checked' : '' }}>
            {{ $blogCategory->title }}
        @endforeach

        <button>Update</button>
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
