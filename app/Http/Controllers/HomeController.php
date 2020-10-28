<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\TravelPackage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customer = User::where('roles', 'customer')->count();
        $travels = TravelPackage::with('gallery')->has('gallery')
            ->orderBy('point','DESC')
            ->limit(4)
            ->get();
        $country = DB::table('travel_packages')
            ->distinct('country')
            ->count();
        $testimonials = Testimonial::with(['user','travelpackage'])->where('content','!=', NULL)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return view('pages.user.index', compact('travels','customer','country','testimonials'));
    }
}
