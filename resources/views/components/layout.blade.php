<html>
    <head>
        <title>{{ $title ?? 'Scribble' }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prata&amp;family=Readex+Pro:wght@300;400;500;600;700&amp;display=swap">
        <link rel="stylesheet" href={{ asset('css/app.css') }}>
        <link rel="icon" href="favicon.ico">
    </head>
    <body>
        {{ $slot }}
    </body>
    <script src={{ asset("js/main.js") }}></script>
</html>