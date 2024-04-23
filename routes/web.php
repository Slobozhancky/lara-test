<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
* Route::view: Цей метод використовується для визначення маршруту, який просто відображає певний представлення (шаблон) без необхідності в контролері.
 * Він використовується тоді, коли сторінка має статичний вміст та не потребує обробки в контролері
 */
Route::get('/test', function (){
   return view('new-test', ["title" => 'new-test page']);
});

/**
* Route::get - Цей метод використовується для визначення маршруту, який працює зі звичайними HTTP запитами типу GET.
 * Він зазвичай використовується для визначення маршрутів, які потребують обробки відповіді через контролер
 */
Route::view('/hello', 'hello', ['hello' => 'Hello world!!!']);

/**
 * приклад нижче, вкаже нам на те, що ми можемо динамічно отримувати пости, з їх ID
*/

//Route::get('posts/{id}', function ($id){
//    return "Post page: {$id}";
//});

/**
 * Також можна використовувати опціональні URL марштрути
 * {id?}: Параметр, який може бути опціональним (параметр за замовчуванням - 2).
 * {comments_id}: Обов'язковий параметр, що вказує на ідентифікатор коментаря.
 */

//Route::get('posts/{id?}/comments/{comments_id}', function ($id = 2, $comments_id){
//    return "Posts page: {$id}, Comments: {$comments_id}";
//});

/**
 * Також є доречним, використовувати перевірку, на випадок, якщо ми маємо оцікувати значення, певного дипуданих
 * Тобто,Ю якщо нам потрібно, щоб ID поста був строго числовий (а не те що ми можемо передавати строку), то нам слід
 * використати відповідну перевірку, що як ми отримаємо НЕ число, то нас відправило на 404 сторінку
 *
 * Також, якщо ми маємо опціональні записи, ми можемо вказувати параметрів в регулярному виразі, скільки нам потрібно
 *
 * Нижче приклад, якщо ми маємо отримувати Пости, тільки у випадку якщо параметри число
 */

Route::get('posts/{id}', function ($id){
    return "Post page: {$id}";
})->where(['id' => '[\d]+']);

/**
 * А тут, якщо і posts число, та comments також число
 */

Route::get('posts/{id?}/comments/{comments_id}', function ($id, $comments_id){
    return "Posts page: {$id}, Comments: {$comments_id}";
})->where(['id' => '[\d]+', 'comments_id' => '[\d]+']);


/**
 * Тут нижче, ми також вкажемо виключення, для обробки даних, які будуть відправлені методом POST
 * В попередньому прикладі, ми виклчюення встановлювали через файл app/Http/Middleware/VerifyCsrfToken
 */
//Route::post('/posts', function (){
//    return 'Post data';
//})->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

/**
 * Уявимо ситуацію, що наша сторінка, може як отримувати дані (GET), так їх і відправляти (POST)
 * Тому тут ми можемо використати статичний метод Route::match - куди передати методи, якими будемо обробляти сторінку
 */

Route::match(['get', 'post'], '/posts', function (){
    return "Send POST data";
})->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

/**
 * А якщо нам потрібно, щоб сторінка були всі методи, то можемо використати статичний метод Route::any
 */

Route::any( '/posts', function (){
    return "Send POST data";
})->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

/**
 * На випадоку, якщо нам потрібно зробити редірект на іншу сторінку, для цього також є статичний метод
 *
 */

Route::redirect('/here', '/posts', 301);
