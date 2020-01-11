<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::All();
        return view ('admin/entrimeja/index', compact('order'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/entrimeja/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ords = new \App\Order;
        $ords->no_meja = $request->no_meja;
        $ords->tanggal = $request->tanggal;
        $ords->id_user = 1;
        $ords->keterangan = $request->keterangan;
        $ords->status_order = $request->status_order;
        $ords->save();

        return redirect('/admin');

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
    public function edit($id_order)
    {
        $order = Order::find($id_order);
        return view('admin/entrimeja/edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        Order::where('id_order', $order->id_order)
        ->update([
            'no_meja' => $request->no_meja,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'status_order' => $request->status_order
        ]);
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        Order::destroy($order->id_order);
        return redirect('/admin');
    }
}
