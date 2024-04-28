<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class FirstController {

    public function index(): View {
        return view('hello', ["hello" => "Hello world!!!"]);
    }
}
