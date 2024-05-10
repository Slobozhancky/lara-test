<?php

namespace App\Views\Composers;


use Illuminate\View\View;

/** View Composers в Laravel - це спосіб передачі даних до представлень (views) у вашому додатку.
 * Це дозволяє вам передавати деякі дані до представлень безпосередньо з контролерів.
 */

// Приклад

/**
 * Створіть View Composer: Ви можете створити новий клас View Composer, який буде відповідати за передачу даних
 * до конкретного представлення. Наприклад, якщо ви хочете передати дані до шаблону sidebar.blade.php,
 * ви можете створити відповідний View Composer.
 */

/**
 * Зареєструйте View Composer: Після створення View Composer вам потрібно зареєструвати його у провайдері
 * видів (views provider). Це зазвичай робиться у методі boot провайдера видів, наприклад, AppServiceProvider.
 */

class TestComposer {

    public function compose(View $view){
        $view->with('count', 100);
    }
}
