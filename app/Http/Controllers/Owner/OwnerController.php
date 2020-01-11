<?php

namespace App\Http\Controllers\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Masakan;
use App\Transaksi;
use App\Order;
use Illuminate\Support\Facades\DB;
use DataTables; 
use App\Exports\TransaksiExport;
use App\Exports\TransaksiExportView;
use Maatwebsite\Excel\Facades\Excel;
class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonOwner() {
        $transaksi = DB::table('transaksis')
        ->join('detail_orders', 'transaksis.id_detail_order', '=', 'detail_orders.id_detail_order')
        ->join('orders', 'detail_orders.id_order', '=', 'orders.id_order')
        ->join('masakans', 'detail_orders.id_masakan', '=', 'masakans.id_masakan')
        ->select('transaksis.*', 'detail_orders.*', 'orders.no_meja', 'masakans.nama_masakan', 'masakans.harga')
        ->get();
        return Datatables::of($transaksi)
        ->make(true);
    }
    public function index()
    {
        // $transaksi = DB::table('transaksis')
        // ->join('detail_orders', 'transaksis.id_detail_order', '=', 'detail_orders.id_detail_order')
        // ->join('orders', 'detail_orders.id_order', '=', 'orders.id_order')
        // ->join('masakans', 'detail_orders.id_masakan', '=', 'masakans.id_masakan')
        // ->select('transaksis.*', 'detail_orders.*', 'orders.no_meja', 'masakans.nama_masakan', 'masakans.harga')
        // ->get();
        return view ('owner/index', compact('transaksi'));
    }
    public function export_excel()
	{
		return Excel::download(new TransaksiExport, 'laporan transaksi.xlsx');
	}
    public function export_excelview()
	{
		return Excel::download(new TransaksiExportView, 'laporan transaksiview.xlsx');
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
