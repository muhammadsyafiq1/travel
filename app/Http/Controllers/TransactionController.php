<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TravelPackage;
use App\Models\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
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
            $query = Transaction::with(['travelpackage','user','transaction_detail']);
            return DataTables::of($query)

            ->addColumn('action', function($item){
                return '
                <form action="'.route('transactions.destroy',$item->id).'" method="POST">
                '.method_field('DELETE'). csrf_field().'
                    <a href="'.route('transactions.show',$item->id).'" class="btn btn-sm btn-secondary">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="'.route('transactions.edit',$item->id).'" class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-danger d-inline" type="submit" onClick="return confirm("Are you Sure?")">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
                ';
            })
            ->rawColumns(['action','image'])
            ->make();
        }
        return view('pages.admin.transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::with(['user','travelpackage'])->findOrFail($id);
        return view('pages.admin.transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $travels = TravelPackage::all();
        $users = User::all();
        return view('pages.admin.transactions.edit', compact(['transaction','travels','users']));
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
        if(FacadesGate::allows('isAdmin')){
            $data = $request->all();
            $item = Transaction::findOrFail($id);
            $item->update($data);
            return redirect(route('transactions.index'))->with('info',' Transaction has been Updated');
        }else {
            return abort(403);
        }
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
            $transaction = Transaction::findOrFail($id);
            $transaction->delete();
            return redirect(route('transactions.index'))->with('info','Transaction has been Deleted');
        }else {
            return abort(403);
        }
    }
}
