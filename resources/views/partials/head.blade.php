<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js', 'resources/saas/app.scss', 'resources/saas/colours.scss'])
    <link rel="stylesheet" href="{{ asset('css/global.css') }}?t={{ env('VERSION_TIME') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('node_modules/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/icon/logo.svg') }}" type="image/svg+xml">

    <title>Recraftify</title>
</head>
