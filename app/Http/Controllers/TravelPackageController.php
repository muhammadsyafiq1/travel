<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Yajra\DataTables\Facades\DataTables;

class TravelPackageController extends Controller
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
           $query = TravelPackage::query();

           return DataTables::of($query)
           ->addColumn('action', function($item){
               return '
                <form action="'. route('travels.destroy',$item->id) .'" method="POST" class="d-inline">
                    '. method_field('DELETE') . csrf_field() .'
                    <a href="'. route('travels.show',$item->id) .'" class="btn btn-secondary btn-sm">
                        <i class="fa fa-eye"></i>
                    <a/>
                    <a href="'. route('travels.edit',$item->id) .'" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    <a/>
                    <button type="submit" class="btn btn-sm btn-danger" onClick="return confirm("Are you Sure?")">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
               ';
           })
           ->rawColumns(['action','index'])
           ->make();
       }
       return view('pages.admin.travels.index');
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

    public function expired()
    {  
        if(request()->ajax())
        {
            $query = TravelPackage::onlyTrashed();

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                    <div class="form-group d-inline">
                        <a href="'. route('travel.restore',$item->id) .'" class="btn btn-success btn-sm">
                            Active
                        <a/>
                        <a href="'. route('travel.permanent',$item->id) .'" class="btn btn-danger btn-sm">
                            Delete
                        <a/>
                    </div>
                ';
            })
            ->rawColumns(['action','index'])
            ->make();
        }
       return view('pages.admin.travels.expired');
    }

    public function restore($id)
    {
        $travel = TravelPackage::onlyTrashed()->where('id', $id);
        $travel->restore();
        return redirect()->back()->with('info', 'Travel Berhasil Direstore');
    }

    public function restoreall(Request $request)
    {
        $travel = TravelPackage::onlyTrashed();
        $travel->restore();
        return redirect()->back()->with('info','Restore semua data berhasil');
    }

    public function permanent($id)
    {
        $travel = TravelPackage::onlyTrashed()->where('id', $id);
        $travel->forceDelete();
        return redirect()->back()->with('info','Travel berhasil dihapus permanen');
    }

    public function permanentall()
    {
        $travel = TravelPackage::onlyTrashed();
        $travel->forceDelete();
        return redirect()->back()->with('info','Travel berhasil dihapus permanen');
    }

    public function lengkap(Request $request)
    {
        $filterKeyword = $request->keyword;

        if($filterKeyword){
           $travels = TravelPackage::with('gallery')->has('gallery')
           ->where('country', 'LIKE', "%$filterKeyword%")
           ->get();
        } else {
            $travels = TravelPackage::with('gallery')->has('gallery')->get();
        }
        
        return view('pages.user.lengkap', compact('travels'));
    }

}
