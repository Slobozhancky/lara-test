<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Home;
use App\Http\Controllers\TestController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', [Home::class, 'index']);

Route::get('/test', TestController::class);

Route::prefix('admin')->group(function (){
    Route::get('/', [AdminController::class, 'index']);

    /**
     *
     * Цей запис означає, що ви визначаєте маршрут GET для шляху "/products", який буде обробляти клас контролера
     * ProductController з методом index.
     *
     * Але особливість в тому, що ви також присвоюєте ім'я цьому маршруту за допомогою методу name. У цьому випадку
     * маршрут отримує ім'я "admin.products.index". Це дозволяє вам легко посилатися на цей маршрут в інших частинах
     * вашого додатку за допомогою допоміжних функцій, таких як route() або redirect()->route().
     *
     * Наприклад, якщо вам потрібно створити посилання на цей маршрут у вашому шаблоні, ви можете використати такий код:
     *
     * <a href="{{ route('admin.products.index') }}">Список продуктів</a>
     */

    Route::get("/products", [ProductController::class, 'index'])->name('admin.products.index');

    Route::get("/products/create", [ProductController::class, 'create'])->name('admin.products.create');

    /**
     * За цим посиланням - https://laravel.com/docs/10.x/controllers#actions-handled-by-resource-controllers, можна
     * перейти на сторінку, де буде вказано як слід за конвенцією, прописувати методи, для відповідних роутів
     */

    Route::post("/products", [ProductController::class, 'store'])->name('admin.products.store')
        ->withoutMiddleware(VerifyCsrfToken::class);

    Route::get("/products/{product}", [ProductController::class, 'show'])->name("admin.products.show");

    Route::get("/products/{product}/edit", [ProductController::class, 'edit'])->name("admin.products.edit");

    /**
     * Тут потрібно бути уважним, бо на сторінці: https://laravel.com/docs/10.x/controllers#actions-handled-by-resource-controllers
     * Ми маємо інформацію, що оновлення сутностей відбувається методом put/patch, але слід звернути увагу, що метод
     * put/patch слід вказувати лише для Route, а вже сам метод який повинен спрацювати, це метод update, який ми
     * пропишемо в відповідному контролері
     *
     */

    Route::put("/products/{product}", [ProductController::class, 'update'])->name("admin.products.update")
        ->withoutMiddleware(VerifyCsrfToken::class);

    Route::delete("/products/{product}", [ProductController::class, 'destroy'])->name("admin.products.destroy")
        ->withoutMiddleware(VerifyCsrfToken::class);

    /**
     * Метод Route::resource у Laravel дозволяє вам швидко та зручно визначити сукупність стандартних маршрутів для
     * ресурсу (наприклад, моделі Eloquent) в вашому додатку. Це дозволяє вам легко робити CRUD
     * (створення, читання, оновлення, видалення) операції з даними, а також додавати інші додаткові маршрути, які вам потрібні.
     *
     * Ось кілька переваг використання методу Route::resource:
     *
     * Зменшення коду: Замість того, щоб визначати кожен маршрут окремо, ви можете використати лише один метод для
     * визначення всіх стандартних маршрутів для ресурсу. Це значно скорочує кількість коду, який вам потрібно писати.
     * Конвенція над конфігурацією: Laravel використовує конвенції для визначення URL-шляхів та методів контролерів,
     * що спрощує розробку. Наприклад, для відображення форми редагування запису, Laravel використовує маршрут з методом
     * GET на URL-шляху /{resource}/{id}/edit, що робить код більш прогнозованим.
     * Підтримка RESTful API: Використання методу Route::resource дозволяє легко визначати RESTful API для вашого додатку.
     * Laravel надає стандартні шаблони маршрутів, які відповідають стандартам REST.
     * Можливість налаштування: Хоча метод Route::resource визначає стандартні маршрути для ресурсу, ви все ще можете
     * налаштувати ці маршрути або додавати до них додаткові маршрути, які вам потрібні.
     *
     * ПС: Якщо нам потрібно побачити всі маршрути, слід скористоуватись командою php artisan route:list
     */
    Route::resource('post', PostController::class);

    /**
     * Також ми можемо використати такі методи як only, та except
     * Ці два методи, кажуть нам про те, що only - вкаже наті які марштури потрібно використовувати
     * А except - виключення, тобто всі окрім тих які вкажемо в except
     */

    Route::resource('post', PostController::class)->only(['index', 'show']);

    Route::resource('post', PostController::class)->except(['update']);


});

