<?php

namespace App\Http\Controllers;
use App\Masakan;
use App\Transaksi;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masakan = Masakan::pluck('nama_masakan', 'harga');
        // dd($masakan);
        $transaksi = Transaksi::All();
        // $transaksi = DB::table('transaksis')
        // ->join('orders', 'transaksis.id_transaksi', '=', 'orders.id_order')
        // ->select('transaksis.*', 'orders.no_meja')
        // ->get();
        return view('kasir/index', ['transaksi' => $transaksi]);
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
