<?php

namespace App\Providers;

use App\Views\Composers\TestComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }


    public function boot(): void
    {


        /** View::share - це метод Laravel, який дозволяє вам передавати дані до всіх представлень (views) у вашому додатку.
         * Ви можете використовувати View::share для передачі глобальних даних, які повинні бути доступні у всіх представленнях
         * без необхідності передачі їх у кожен контролер.*/

        View::share('site_title', 'LARA_TEST');

        /**
         * Далі в параметрі views, методу composer ми можемо передати дані, таким чином, щоб вказати для якого саме
         * виду, ми бумо шерити дані, тобто, це можу бути один вид у файлі resources/views, або можемо передати дані
         * масивом, якщо таких видів буде декілька
         */

        /**
         * І далі, якщо повернутись у файл TestComposer, ми там створили змінну $cout=100 і ця змінна, тепер буде
         * доступна для таких views як sidebar, та footer
         */
        View::composer(['components.sidebar', 'components.footer'], TestComposer::class);

        /**
         * Нижче представлені два приклади, як просто прокинути дані до певного виду, у нашому випадку, прокинемо
         * дані до однієї сторінки Home
         */
        view()->composer('home.home', function (\Illuminate\View\View $view) {
            $view->with('test1', "TEST 1");
        });

        view()->composer('home.home', function (\Illuminate\View\View $view) {
            $view->with('test2', "TEST 2");
        });

        /**
         * Якщо нам потрібно розшарити, дані для певної групи сторінок
         * То ми це можемо зробити наступним чином - components.*
         */

        view()->composer('components.*', function (\Illuminate\View\View $view) {
            $view->with('data', ['test1', 'test2', 'test3']);
        });

        // Змінна $menu буде доступна в шаблоні Blade header, а у нашому випадку, виведеимо її в зтегові nav
        view()->composer('components.header', function (\Illuminate\View\View $view) {

            $menu = '<ul>';
            $menu .= '<li><a href="' . route('home.home') . '">Home</a></li>';
            $menu .= '<li><a href="' . route('home.test') . '">Test</</li>';
            $menu .= '<li><a href="' . route('home.contacts') . '">Contacts</a></li>';
            $menu .= '</ul>';

            $view->with('menu', $menu);

        });
    }
}
