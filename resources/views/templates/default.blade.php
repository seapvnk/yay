<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    
    <title>yay!</title>
</head>
<body>

    @include('templates.components.navigation')

    @include('templates.components.alert')
    @yield('content')
    
</body>
</html>