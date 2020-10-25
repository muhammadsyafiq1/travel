@extends('layouts.backend.index')

@section('title')
    Transaction show
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="alert alert-light shadow">
                <strong>NOMOR TRANSAKSI DENGAN ID </strong>" {{ $transaction->id }} "
            </div>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table id="crudtable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>Travel package</th>
                    <td>{{ $transaction->travelpackage->title }}</td>
                </tr>
                <tr>
                     <th>Username</th>
                     <td>{{ $transaction->user->username }}</td>
                 </tr>
                 <tr>
                     <th>Additional Visa</th>
                     <td> {{ $transaction->additional_visa == 1 ? 'YES' : 'NO' }} </td>
                 </tr>
                 <tr>
                     <th>Transaction status</th>
                     <td>{{ $transaction->transaction_status }}</td>
                 </tr>
                 <tr>
                     <th>Total</th>
                     <td>{{ $transaction->transaction_total }}</td>
                 </tr>
                 <th>MEMBERS <i class="fa fa-user"></i></th>
                <td>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Nationality</th>
                                <th>Visa</th>
                                <th>Doe Passport</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction->transaction_detail as $detail)
                                <tr>
                                    <td>{{ $detail->username }}</td>
                                    <td>{{ $detail->nationality }}</td>
                                    <td>{{ $detail->is_visa == 1 ? '30 DAYS' : 'N/A' }}</td>
                                    <td>{{ date('D-M-Y',strtotime($detail->doe_paspport)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection