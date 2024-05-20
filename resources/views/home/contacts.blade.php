@include('components.header')

<h1>{{ $title }}</h1>

<!-- Сюди в най йдуть дані, з файлу Controllers\Home, в цьому контролері, сторена змінна $data, яка передає дані у форматі JSON

А ми його, в шаблонізаторі BLade, маємо коректно опрацювати
-->
{!! json_encode($data) !!}


<script>

    <!-- А тут приклад того, якщо нам потрібно передати JSON з в JavaScript -->

    let data = {!! json_encode($data) !!};
    console.log(data);

    {{-- Також є ще один спосіб, з використанням фукціоналу самого Laravel --}}

    let data_2 = {{ \Illuminate\Support\Js::from($data) }};
    console.log(data_2.name);
</script>

@include('components.footer')
