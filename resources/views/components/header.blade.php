<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Це в мене підключений бутстрап -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- $site_title - це змінна яка прийшла до нас з файлу AppServeiceProvider --}}
    {{-- $title - приходить до нас з відповідного контролера, з файлу app/http/Home.php --}}
    <title>{{ $site_title }} :: {{ $title }}</title>
</head>

<body>

    <div class="container">
        <header class="d-flex justify-content-between mb-3">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" alt="logo">
            @include('components.nav')

            {{--Це приклад альтернативного способу, вивести меню, з файлу AppServiceProvider--}}
            {{--Також синтаксис, який ми бачимо, він допомагає прибрати екранування HTML символів--}}
            <!-- {!! $menu !!} -->
        </header>

        <!-- А тут дані у змінну $data, приходять нам з файлу AppServiceProvider, у вигляді масиву -->
        @foreach($data as $item)

            <p>{{ $item }}</p>

        @endforeach



