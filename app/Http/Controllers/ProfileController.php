<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Transaction;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.user.profile',compact('user'));
    }

    public function showchangePasword ($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.change-password',compact('user'));
    } 

    public function changePasword (Request $request , $id)
    {
        $request->validate([
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back();
    }

    public function accountSetting (Request $request)
    {
        $data = $request->all();
        $item = Auth::user();
        $item->update($data);

        return redirect()->back();
    }

    public function history()
    {
        $user = Auth::user();
        $history = Transaction::with(['user','travelpackage'])->where('user_id','=', $user->id)->get();
        return view('pages.user.history', compact('history'));
    }

}
