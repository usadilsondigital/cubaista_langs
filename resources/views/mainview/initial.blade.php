<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="font-sans antialiased">

    <div class="p-3 bg-primary text-white text-center" style="background-color: cornflowerblue">
        <h3> {{ __('messages.you_love_cuba') }} {{ __('messages.or') }} 
            {{ __('messages.think_you_might') }} {{ __('messages.so_you_are_a_cubaista') }} </h3>
        <h4>{{ __('messages.and') }} {{ __('messages.we_are_your_dmc') }} <b style="color:navy">({{ __('messages.destination_management_company') }})</b></h4>
    </div>

    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            @can('admin')
            <a class="navbar-brand" href="#">Admin</a>
            @endcan
            @can('admin')
            <a class="navbar-brand" href="{{route('language.index')}}">Language</a>
            @endcan
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ app()->getLocale() }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($codes as $locale)
                                <li>
                                    <a class="dropdown-item" href="{{ url(getCurrentUrlWithLocale($locale)) }}">
                                        @if (app()->isLocale($locale))
                                            <span></span>
                                        @endif
                                        <span> {{ $locale }}</span>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</body>

</html>
