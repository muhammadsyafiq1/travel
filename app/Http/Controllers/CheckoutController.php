<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($id)
    {
        return view('layouts.frontend.checkouts.index');
    }
}
