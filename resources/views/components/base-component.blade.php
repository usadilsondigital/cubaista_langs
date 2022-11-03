<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('languageview.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
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
                                <strong>Success! </strong>{{ $message }}
                            </div>
                        @endif
            
            
                        @if ($message = Session::get('error'))
                            <div id="dangerId" class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert"
                                    onclick="document.getElementById('dangerId').style.display = 'none';">×</button>
                                <strong>Attention! </strong>{{ $message }}
                            </div>
                        @endif
            
            
                        @if ($message = Session::get('warning'))
                            <div id="warningId" class="alert alert-warning alert-block">
                                <button type="button" class="close" data-dismiss="alert"
                                    onclick="document.getElementById('warningId').style.display = 'none';">×</button>
                                <strong>Warning! </strong>{{ $message }}
                            </div>
                        @endif
            
            
                        @if ($message = Session::get('info'))
                            <div id="infoId" class="alert alert-info alert-block">
                                <button type="button" class="close" data-dismiss="alert"
                                    onclick="document.getElementById('infoId').style.display = 'none';">×</button>
                                <strong>Info! </strong>{{ $message }}
                            </div>
                        @endif
            
                    </div>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
