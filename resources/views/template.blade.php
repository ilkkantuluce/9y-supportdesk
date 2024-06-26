<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="/favicon.png">
    <link rel="stylesheet" href="/css/app.css" />
    @yield('scripts')
</head>
<body>

    @include('layouts.sidebar')

    <main>
        @include('layouts.navigation')
        @yield('content')

    </main>

    <!--
    <footer>
        <p>&copy; <?php echo date('Y'); ?> 9YARDS</p>
    </footer>
    -->
</body>
</html>