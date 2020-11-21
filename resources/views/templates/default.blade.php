<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>yay!</title>
</head>
<body style="padding: 0; margin: 0">

    @include('templates.components.navigation')

    @include('templates.components.alert')
    @yield('content')
    
</body>
</html>