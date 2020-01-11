<?php

namespace App\Http\Controllers\Waiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Masakan;
use App\Order;
use DB;
use App\DetailOrder;
class WaiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $masakan = Masakan::All();
        $detail_order = DB::table('detail_orders')
        ->join('orders', 'detail_orders.id_order', 'orders.id_order')
        ->join('masakans', 'detail_orders.id_masakan', 'masakans.id_masakan')
        ->select('orders.no_meja','masakans.harga','detail_orders.*','masakans.nama_masakan')
        ->get(); 
        return view ('waiter/index', compact('detail_order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Order::pluck('no_meja', 'id_order');
        $masakan = Masakan::pluck('nama_masakan', 'id_masakan');
        return view('waiter/create', compact('order', 'masakan'));
        // return view('waiter/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DetailOrder::create($request->all());
     
        return redirect('waiter');
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
        
        $order = Order::pluck('no_meja', 'id_order');
        $masakan = Masakan::pluck('nama_masakan', 'id_masakan');
        // $detail = DetailOrder::all();
        $detail_order = DetailOrder::find($id);
        return view('waiter/edit', compact('detail_order', 'order', 'masakan', 'detail'));
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
        $data = DetailOrder::find($id);
        $update = $data->update($request->all());
        return redirect('waiter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailOrder::destroy($id);
        return redirect('waiter');
    }
}
