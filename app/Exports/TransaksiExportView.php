<?php

namespace App\Exports;

use App\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
use DataTables;
class TransaksiExportView implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $transaksi = DB::table('transaksis')
        ->join('detail_orders', 'transaksis.id_detail_order', '=', 'detail_orders.id_detail_order')
        ->join('orders', 'detail_orders.id_order', '=', 'orders.id_order')
        ->join('masakans', 'detail_orders.id_masakan', '=', 'masakans.id_masakan')
        ->select('transaksis.*', 'detail_orders.*', 'orders.no_meja', 'masakans.nama_masakan', 'masakans.harga')
        ->get();
        Datatables::of($transaksi);
        return view('owner/table', compact('transaksi'));
    }
}
