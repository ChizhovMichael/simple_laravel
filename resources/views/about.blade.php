<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - </title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    @include('includes.head')

</head>

<body class="bg-dark">


@include('includes.footer')
</body>

</html>