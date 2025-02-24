<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button>Logout</button>
                </form>

                <a href="{{ route('blog.create') }}">Create Blog</a>

                <a href="{{ route('blog.index') }}">My Blogs</a>
            @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif

    @foreach ($blogs as $blog)
        <div>
            <p>Author: {{ $blog->user->name }}</p>
            <a href="{{ route('blog.detail', ['blog' => $blog->id]) }}" class="title">{{ $blog->title }}</a>
        </div>
    @endforeach
</body>

</html>
