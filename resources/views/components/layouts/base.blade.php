<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.scss'])

    {{ $head ?? '' }}
</head>
<body>
{{ $slot }}

@vite('resources/js/app.js')

{{ $body ?? '' }}
</body>
</html>
