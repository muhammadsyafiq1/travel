<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGalleryRequest;
use App\Models\Gallery;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
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
           $query = Gallery::with(['travelpackage']);
           return DataTables::of($query)

           ->addColumn('action', function($item){
               return '
               <form action="'.route('galleries.destroy',$item->id).'" method="POST">
               '.method_field('delete'). csrf_field().'
                    <button class="btn btn-sm btn-danger d-inline" type="submit" onClick="return confirm("Are you Sure?")">
                        <i class="fa fa-trash"></i>
                   </button>
               </form>
               ';
           })
           ->editColumn('image', function($item){
                return $item->image ? '<img src="'.Storage::url($item->image).'" style="width: 80px;"/>' : '';
            })
            ->rawColumns(['action','image'])
            ->make();
        }
        return view('pages.admin.galleries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travels = TravelPackage::all();
        return view('pages.admin.galleries.create', compact('travels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGalleryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('galleries','public');
        Gallery::create($data);
        return redirect(route('galleries.index'))->with('info','Gallery has been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return redirect(route('galleries.index'))->with('info','Gallery has been Deleted');
    }
}
