<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MensajeController extends Controller
{
    public function index(): View
    {
        return view('mensajes', [
            //
        ]);
    }
}
