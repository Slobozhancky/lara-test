<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */

    /**
     * Якщо по простому, то в цьому мідлварі, ми встановимо виключення на певні сторінки
     * Це потрібно для того, якщо ми будемо відправляти дані, методом POST, та щоб не отримувати помилку 419 - яка
     * говорить про те, що дані відправляються не захищеним способом
     *
     * Тому в масиві $except - ми просто вкажемо шляхи, які будуть в якості виключення
     *
     */
    protected $except = [
        'posts'
    ];
}
