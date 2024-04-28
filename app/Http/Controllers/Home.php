<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

class Home extends Controller {

    /**
     * Синтаксис:
     * Перший виклик return view('home.home', ['home' => 'Home page']); використовує допоміжну функцію view(),
     * яка є глобальною функцією в Laravel. Вона дозволяє вам швидко створювати екземпляр об'єкта виду і передавати дані до нього.
     *
     * Другий виклик return View::make('home.home',['home' => 'Home page']); використовує статичний метод make() класу
     * View. Цей метод також створює екземпляр об'єкта виду, але ви викликаєте його напряму з класу View.
     *
     * Спосіб виклику:
     *
     * Глобальна функція view() - це простий спосіб виклику, який не потребує імпортування або включення будь-яких класів.
     * Використання View::make() потребує, щоб ви імпортували клас View на початку файлу або використали повне ім'я
     * класу при кожному виклику.
     */

    public function index() : \Illuminate\Contracts\View\View
    {
//        return view('home.home', ['home' => 'Home page']);

        return View::make('home.home',['title' => 'Home page'] );
    }

    public function contacts(){
        return View::make('home.contacts', ['title' => 'Contacts page']);
    }
}
