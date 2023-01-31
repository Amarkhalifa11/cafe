<?php

namespace App\Http\Controllers;

use App\Models\Orderss_items;
use Illuminate\Http\Request;

class OrderssItemsController extends Controller
{

    public function index()
    {
        $Orderss_items = Orderss_items::all();
        return view('backend.orders_items.all_orders_items' , compact('Orderss_items'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Orderss_items $orderss_items)
    {
        //
    }

    public function edit(Orderss_items $orderss_items)
    {
        //
    }


    public function update(Request $request, Orderss_items $orderss_items)
    {
        //
    }

    public function destroy($id)
    {
        $Orderss_items = Orderss_items::find($id);
        $Orderss_items->delete();

        return redirect()->route('all_orders_items');
    }
}
