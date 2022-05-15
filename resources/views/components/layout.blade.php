<html>

<head>
    <title>{{ $title ?? 'Scribble' }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Prata&amp;family=Readex+Pro:wght@300;400;500;600;700&amp;display=swap">
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <link rel="icon" href={{ asset('wrexa-assets/logos/logo-wrexa.svg') }}>
</head>

<body>
    {{ $slot }}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src={{ asset('js/main.js') }}></script>
    @stack('body-scripts')
</body>

</html>
