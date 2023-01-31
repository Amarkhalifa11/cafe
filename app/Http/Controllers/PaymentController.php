<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{

    public function index()
    {
        $categorys = Category::all();
        return view('frontend.payment' , compact('categorys'));
    }

    public function verify_payment(Request $request , $transaction_id){

        $request->session()->put('transaction_id' , $transaction_id);
        return redirect()->route('complete');
        
    }

    public function complete(Request $request){

        if($request->session()->has('transaction_id') && $request->session()->has('order_id')){

            $transaction_id  = $request->session()->get('transaction_id');
            $order_id  = $request->session()->get('order_id');
            $date      = date('Y-m-d h:i:s');
            $status    = 'paid';

            $affect = DB::table('orders_tables')
                               ->where('id' , $order_id)       
                               ->update(['status'  => $status]);

            DB::table('payments')->insert([
                'trasaction_id' =>$transaction_id,
                'order_id'      =>$order_id,
                'date'          =>$date,
            ]);

            $request->session()->flush();
            return redirect()->route('thank_you')->with('order_id' , $order_id);


        }else{
            return redirect()->route('home');
        }
    }

    public function thank_you(){
        $categorys = Category::all();
        return view('frontend.thank_you' , compact('categorys'));
    }


    public function all_payment()
    {
        $payments = Payment::all();
        return view('backend.payment.all_payment' , compact('payments'));
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
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payments = Payment::find($id);
        $payments->delete();

        return redirect()->route('all_payment');
        
    }
}
