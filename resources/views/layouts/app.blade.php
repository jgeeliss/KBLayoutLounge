<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ isset($title) ? $title . ' - ' : '' }}{{ config('app.name', '') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('layouts._partials.header')

    <main>
        @yield('content')
    </main>
    
    @include('layouts._partials.footer')

</body>

</html>
