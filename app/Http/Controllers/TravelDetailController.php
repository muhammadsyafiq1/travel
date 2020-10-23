<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class TravelDetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $travel = TravelPackage::with('gallery')->has('gallery')
        ->where('slug', $slug)
        ->firstOrFail();
        // dd($travel);
        return view('pages.user.detail', compact('travel'));
    }
}
