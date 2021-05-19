<!DOCTYPE html>
<html lang="en-EN">
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="description" content="@yield('description')"/>
    <title>@yield('title', env('APP_NAME'))</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>

    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">{{ env('APP_NAME') }}</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <!-- TODO hide options that the current user can't use (for example because nobody is logged in) -->
        <a class="p-2 text-info" href="#">Check Curations</a>
        <a class="p-2 text-success" href="#">Submit New Curation</a>
        <a class="p-2 text-success" href="#">Submit New Pendie</a>
        <a class="p-2 text-dark" href="#">See Submitted Curations</a>
        <a class="p-2 text-dark" href="#">See Submitted Pendies</a>
        <a class="p-2 text-danger" href="#">Logout</a>
    </nav>
</div>

<div class="container">

    @yield('content')

    <footer class="pt-4 my-md-5 border-top">
        <p>
            Flashpoint submission site created by
            <a href="https://www.github.com/HonzaSTECH" target="_blank">Shady</a>
        </p>
    </footer>
</div>

@stack('scripts')
</body>
</html>
