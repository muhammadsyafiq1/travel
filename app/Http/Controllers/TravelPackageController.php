<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate as FacadesGate;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travels = TravelPackage::all();
        return view('pages.admin.travels.index', compact('travels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTravelRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $data['slug'] = Str::slug($request->title);
        $data['created_by'] = Auth::user()->id;
        TravelPackage::create($data);

        return redirect(route('travels.index'))->with('info','Travel has been Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $travel = TravelPackage::findOrFail($id);
        return view('pages.admin.travels.show', compact('travel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $travel = TravelPackage::findOrFail($id);
        return view('pages.admin.travels.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTravelRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $item = TravelPackage::findOrFail($id);
        $item->update($data);

        return redirect(route('travels.index'))->with('info',' Travel has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(FacadesGate::allows('isAdmin')){
            $travel = TravelPackage::findOrFail($id);
            $travel->delete();
            return redirect(route('travels.index'))->with('info',' Travel has been Deleted');
        }else {
            return abort(403);
        }
    }
}
