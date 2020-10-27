<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">

    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    
    <title>yay!</title>
</head>
<body>
    @include('templates.components.navigation')

    <div class="container">
        @yield('content')
    </div>    
</body>
</html>