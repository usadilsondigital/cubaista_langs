<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts --->
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
</head>

<body class="font-sans antialiased">

    <div class="p-3 bg-primary text-white text-center" style="background-color: cornflowerblue">
        <h3> {{ __('messages.you_love_cuba') }} {{ __('messages.or') }}
            {{ __('messages.think_you_might') }} {{ __('messages.so_you_are_a_cubaista') }} </h3>
        <h4>{{ __('messages.and') }} {{ __('messages.we_are_your_dmc') }} <b
                style="color:navy">({{ __('messages.destination_management_company') }})</b></h4>
    </div>


    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            @can('admin')
                <a class="navbar-brand" href="#">Admin</a>
            @endcan
            @can('admin')
                <a class="navbar-brand" href="{{ route('language.list') }}">Languages</a>
            @endcan
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="initial">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="initial">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="initial">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="initial">Products </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="initial">Contact Us</a>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li>
                                    <a class="dropdown-item" href="route('logout')"
                                        onclick="event.preventDefault();this.closest('form').submit();">
                                        {{ __('messages.logout') }}
                                    </a>
                                </li>
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="initial">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Languages</li>
                </ol>
            </nav>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            @if ($errors->any())
                <div id="errorId" class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert"
                        onclick="document.getElementById('errorId').style.display = 'none';">×</button>
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
            @endif

            @if ($message = Session::get('success'))
                <div id="successId" class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert"
                        onclick="document.getElementById('successId').style.display = 'none';">×</button>
                    <strong>{{__('messages.success')}}</strong>{{ $message }}
                </div>
            @endif


            @if ($message = Session::get('error'))
                <div id="dangerId" class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert"
                        onclick="document.getElementById('dangerId').style.display = 'none';">×</button>
                    <strong>{{__('messages.attention')}} </strong>{{ $message }}
                </div>
            @endif


            @if ($message = Session::get('warning'))
                <div id="warningId" class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert"
                        onclick="document.getElementById('warningId').style.display = 'none';">×</button>
                    <strong>{{__('messages.warning')}} </strong>{{ $message }}
                </div>
            @endif


            @if ($message = Session::get('info'))
                <div id="infoId" class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert"
                        onclick="document.getElementById('infoId').style.display = 'none';">×</button>
                    <strong>{{__('messages.info')}} </strong>{{ $message }}
                </div>
            @endif

        </div>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title"> {{ __('messages.languages') }}</h5>
               @can('admin') <a href="language" class="btn btn-primary"> {{ __('messages.create') }}
                    {{ __('messages.language') }}</a>
                @endcan
            </div>
        </div>

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th> {{ __('messages.code') }}</th>
                        <th> {{ __('messages.english_name') }}</th>
                        @can('admin')
                            <th> {{ __('messages.options') }}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($languages as $lang)
                        <tr>
                            <td>{{ $lang->code }}</td>
                            <td>{{ $lang->english_name }}</td>
                            @can('admin')
                                <td>
                                    <a type="button" class="btn btn-warning"
                                        href="language/{{ $lang->id }}/edit">{{ __('messages.edit') }}</a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>
</body>

</html>
