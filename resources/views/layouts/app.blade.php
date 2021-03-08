<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset(mix('/css/app.css')) }}" rel="stylesheet" />
    <title>App name @yield('title')</title>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset(mix('/js/app.js')) }}"></script>
</body>
</html>