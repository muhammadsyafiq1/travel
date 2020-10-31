<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMemberRequest;
use App\Models\Testimonial;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use App\Models\TravelPackage;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionSuccess;
use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $transaction = Transaction::with(['user','travelpackage','transaction_detail'])
            ->findOrFail($id);
        return view('pages.user.checkout', compact('transaction'));
    }

    public function proccess($idTravel)
    {
       try {
            $user = Auth::user();
            $travel = TravelPackage::findOrFail($idTravel);

            $transaction = Transaction::create([
                'travel_packages_id' => $travel->id,
                'user_id' => $user->id,
                'additional_visa' => $user->is_visa,
                'transaction_status' => 'incart',
                'transaction_total' => $travel->price,
            ]);

            if($transaction->additional_visa == 1){
                $transaction->transaction_total += 500000;
            }

            $transaction->save();

            Transaction_detail::create([
                'transaction_id' => $transaction->id,
                'nationality' => $user->nationality,
                'username' => $user->username,
                'is_visa' => $user->is_visa,
                'doe_passport' => Carbon::now()->addYear(5)
            ]);
       } catch (\Throwable $th) {
            return redirect(route('travel.detail',$travel->slug))->with('info','Harap lengkapi data diri anda terlebih dahulu');
       }

        return redirect(route('checkout', $transaction->id));
    }

    public function create(CreateMemberRequest $request, $idTransaction)
    {
        $data = $request->all();
        $data['transaction_id'] = $idTransaction;
        Transaction_detail::create($data);

        $transaction = Transaction::with('travelpackage')->findOrFail($idTransaction);
        if($request->is_visa == 1){
            $transaction->transaction_total += 500000;
        }
        $transaction->transaction_total += $transaction->travelpackage->price;
        $transaction->save();

        return redirect(route('checkout',$idTransaction));
    }

    public function delete($id)
    {
        $detail = Transaction_detail::findOrFail($id);
        $transaction = Transaction::with('travelpackage')->findOrFail($detail->transaction_id);

        if($detail->is_visa == 1){
            $transaction->transaction_total -= 500000;
        }

        $transaction->transaction_total  -= $transaction->travelpackage->price;
        $transaction->save();
        $detail->delete();
        return redirect(route('checkout', $detail->transaction->id));
    }

    public function success(Request $request ,$id)
    {
        $transaction = Transaction::with(['transaction_detail','travelpackage.gallery','user'])
        ->findOrFail($id);
        $transaction->transaction_status = "pending";
        $transaction->save();

        // simpan ke table testimonial
        Testimonial::create([
            'user_id' => Auth::user()->id,
            'travel_packages_id' => $transaction->travelpackage->id,
        ]);

        //KONFIGURASI MIDTRANS
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

         //KONFIGURASI MIDTRANS
         $midtrans = [
            'transaction_details' => [
                'order_id' => 'MIDTRANS-' . $transaction->id,
                'gross_amount' => (int) $transaction->transaction_total,
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ],
            'enabled_payments' => [
                'gopay', 'permata_va', 'bank_transfer'
            ],
            'vtweb' => []
        ];

        try {
            //get snap payment page url
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            // redirect to snap payment page
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        // kirim eticket ke user
        // Mail::to($transaction->user)->send(
        //     new TransactionSuccess($transaction)
        // );
    }
}
