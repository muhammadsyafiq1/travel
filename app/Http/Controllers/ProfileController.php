<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

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

    public function accountSetting (UpdateUserRequest $request)
    {
        $user = $request->all();
        // dd($user); die;
        if($request->hasFile('avatar')){
            if($request->avatar && file_exists(storage_path('app/public/',$request->avatar))){
                Storage::delete('public/',$request->avatar);
            }
            $file = $request->file('avatar')->store('avatars','public');
            $user['avatar'] = $file;
        }
        $item = Auth::user();
        $item->update($user);

        return redirect()->back()->with('info','profile berhasil diupdate');
    }

    public function history()
    {
        $user = Auth::user();
        $history = Transaction::with(['user','travelpackage'])->where('user_id','=', $user->id)->get();
        return view('pages.user.history', compact('history'));
    }

}
