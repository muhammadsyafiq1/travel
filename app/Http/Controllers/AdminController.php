<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TravelPackage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $transaction_success = Transaction::where('transaction_status', 'success')->count();
        $transaction_total = Transaction::sum('transaction_total');
        $transaction_pending = Transaction::where('transaction_status', 'pending')->count();
        $total_user = User::count();
        $total_travel = TravelPackage::count();
        return view('pages.admin.index', compact([
            'transaction_success','transaction_total',
            'transaction_pending','total_user','total_travel'
        ]));
    }
}
