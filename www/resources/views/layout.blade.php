<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title> 
    <link href="{{ mix('assets/css/main.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<body>
    <x-header></x-header>
    @yield('content') 
   
    <script src="{{ mix('assets/js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
