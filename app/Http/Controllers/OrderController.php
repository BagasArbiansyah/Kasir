<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Masakan;
use App\DetailOrder;
use App\Transaksi;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_order = DB::table('detail_orders')
        ->join('orders', 'orders.id_order', 'orders.id_order')
        ->join('masakans', 'masakans.id_masakan', 'masakans.id_masakan')
        ->select('orders.*','detail_orders.*','masakans.*')
        ->get();       
        // return response()->json($detail_order);
        return view('waiter/order/index', compact('detail_order'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $order = Order::All();
        // $masakan = Masakan::All();
        // $detail_order = DetailOrder::All();
    //    , compact('order', 'masakan', 'detail_order')
        return view('waiter/order/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mskn = new \App\Masakan;
        $mskn->nama_masakan = $request->nama_masakan;
        $mskn->harga = $request->harga;
        $mskn->status_masakan = $request->status_masakan;
        $mskn->save();

        return redirect('/waiter/order');
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
        //
    }
}
