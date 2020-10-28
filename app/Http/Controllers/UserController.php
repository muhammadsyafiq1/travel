<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequestUser;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = User::query();

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                    <form action="'. route('users.destroy',$item->id) .'"method="POST">
                        '. method_field('delete') . csrf_field() .'
                        <a class="btn btn-sm btn-secondary" href="'. route('users.show',$item->id) .'">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-warning" href="'. route('users.edit',$item->id) .'">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm("Are you Sure?")">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                ';
            })
            ->editColumn('avatar', function($item){
                return $item->avatar ? '<img src="'.Storage::url($item->avatar).'" style="max-height: 40px;"/>' : '';
            })
            ->rawColumns(['action','index'])
            ->make();
        }
        return view('pages.admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequestUser $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->roles = $request->roles;
        $user->password = Hash::make($request->password);
        if($request->file('avatar')){
            $file = $request->file('avatar')->store(
                'avatars','public'
            );
        }
        $user->avatar = $file;
        $user->save();

        return redirect(route('users.index'))->with('info','User Has Been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->roles = $request->roles;

        if($request->hasFile('avatar')){
            if($user->avatar && file_exists(storage_path('app/public/'.$user->avatar))){
                Storage::delete('public/'.$user->avatar);
            }
            $file = $request->file('avatar')->store(
                'avatars','public'
            );
            $user->avatar = $file;
        }
        $user->save();
        return redirect(route('users.index'))->with('info','User successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(FacadesGate::allows('isAdmin')) {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect(route('users.index'))->with('info', 'User successfully Deleted');
        } else {
            return abort(403);
        }
    }
}
