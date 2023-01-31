<?php

namespace App\Http\Controllers;

use App\Models\Orders_table;
use Illuminate\Http\Request;

class OrdersTableController extends Controller
{

    public function index()
    {
        $orders = Orders_table::all();
        return view('backend.orders.all_orders' , compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Orders_table $orders_table)
    {
        //
    }

    public function edit(Orders_table $orders_table)
    {
        //
    }


    public function update(Request $request, Orders_table $orders_table)
    {
        //
    }


    public function destroy($id)
    {
        $orders = Orders_table::find($id);
        $orders->delete();

        return redirect()->route('all_orders');
        
    }
}
