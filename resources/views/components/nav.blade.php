<nav aria-label="breadcrumb" class="d-flex align-items-center">

    <!-- Варіант виводу менюшки, за допомогою шаблонів Blade -->
    <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home.home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home.test') }}">Test</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home.contacts') }}">Contacts</a></li>
    </ol> -->

    <!-- А тут приклад виведення меню, за допомогою файлу AppServeiceProvider -->
    {!! $menu !!}
</nav>