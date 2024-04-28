<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 * Тут просто тестова інфа, для того, щоб зрозуміти принцип роботи команди:
 * php artisan make:controller Admin/AdminControllerTest --resource
 *
 * Ця команда, допоможе нам створити всі CRUD методи в контролері, для подальшої роботи з відповіднимконтролером
 *
 * А в загалі, якщо потрібно побачити ОПЦІЇ для наших команд з artisan варто використовувати команду php artisan -help
 */

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
