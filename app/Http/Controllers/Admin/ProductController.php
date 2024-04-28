<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {

        /**
         *
         * Цей запис route('admin.products.index') використовується для отримання URL-адреси (шляху) для маршруту з
         * ім'ям "admin.products.index" у вашому додатку Laravel.
         *
         * Коли ви викликаєте цю функцію, Laravel автоматично знаходить маршрут з іменем "admin.products.index" у
         * вашому файлі маршрутів і генерує URL-адресу для нього. Це дозволяє вам уникнути жорсткого прив'язування
         * URL-адреси у вашому коді, що полегшує роботу з маршрутами та зберігає код чистим та організованим.
         *
         * Наприклад, якщо маршрут "/products" визначений як маршрут з ім'ям "admin.products.index" в вашому файлі
         * маршрутів, то виклик route('admin.products.index') згенерує URL-адресу для цього маршруту.
         *
         * А маршрут вказується цей у файлі routes/web
         */

        dump(route('admin.products.index'));
        return "Admin products list";
    }

    public function create() {
        dump(route('admin.products.create'));
        return "Admin products create";
    }

    public function store() {
        dump(route('admin.products.store'));
        return "Admin products store";
    }

    public function show($product) {
//        dump(route("admin.products.show.{$product}"));
        return "Admin product show: {$product}";
    }
    public function edit($product) {
//        dump(route("admin.products.show.{$product}"));
        return "Admin product edit: {$product}";
    }
    public function update($product) {
//        dump(route("admin.products.show.{$product}"));
        return "Admin product update: {$product}";
    }
    public function destroy($product) {
//        dump(route("admin.products.show.{$product}"));
        return "Admin product destroy: {$product}";
    }
}
