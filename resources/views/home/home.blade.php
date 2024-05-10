@include('components.header')

<h1>{{ $title }}</h1>

{{--Як це працює, слід подивитись у файлі "AppServiceProvider"--}}
<p>Приклад для роботи composer: <strong>{{ $test1 }}</strong></p>
<p>Приклад для роботи composer: <strong>{{ $test2 }}</strong></p>

@include('components.footer')
