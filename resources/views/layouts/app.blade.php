<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('communities.index') }}">
                                    {{ __('My Community') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 mb-4">

                        @yield('content')

                    </div>
                    <div class="col-md-4">
                        <div class="row mb-4">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">{{ __('New post') }}</div>

                                    <div class="card-body">
                                        @forelse ($newestPost as $post)
                                        <a href="{{ route('communities.post.show', $post->id) }}" class="link-dark">{{
                                            $post->title }}</a>
                                        <p class="text-sm">
                                            <small>
                                                <span class="text-muted">Posted</span> <span class="text-black">{{
                                                    $post->created_at->diffForHumans() }}</span> <span
                                                    class="text-muted">ago
                                                    by</span> <span class="text-black">{{ $post->user->username
                                                    }}</span>
                                            </small>
                                        </p>
                                        <hr>
                                        @empty
                                        <p>Post not found!</p>
                                        @endforelse


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">{{ __('New community') }}</div>

                                    <div class="card-body">

                                        @forelse ($newestCommunity as $community)
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('communities.show', $community) }}" class="link-dark">{{
                                                $community->name }}</a>
                                            <div><span class="badge bg-light text-dark">{{
                                                    $community->posts_count }} posts&nbsp;</span></div>
                                        </div>
                                        <p class="text-sm">
                                            <small>
                                                <span class="text-muted">Posted</span> <span class="text-black">{{
                                                    $community->created_at->diffForHumans() }}</span> <span
                                                    class="text-muted">ago
                                                    by</span> <span class="text-black">{{
                                                    $community->user->username}}</span>
                                            </small>
                                        </p>
                                        <hr>
                                        @empty
                                        <p>No community found!</p>
                                        @endforelse


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

</html>