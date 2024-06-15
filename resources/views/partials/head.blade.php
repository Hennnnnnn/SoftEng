<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js', 'resources/saas/app.scss', 'resources/saas/colours.scss'])
    <link rel="stylesheet" href="{{ asset('css/global.css') }}?t={{ env('VERSION_TIME') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <title>Recraftify</title>
</head>
