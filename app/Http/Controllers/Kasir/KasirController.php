<?php

namespace App\Http\Controllers\Kasir;
use App\Http\Controllers\Controller;
use App\Masakan;
use App\Transaksi;
use App\Order;
use App\DetailOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Session;
class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonKasir() {
        $transaksi = DB::table('transaksis')
        ->join('detail_orders', 'transaksis.id_detail_order', '=', 'detail_orders.id_detail_order')
        ->join('orders', 'detail_orders.id_order', '=', 'orders.id_order')
        ->join('masakans', 'detail_orders.id_masakan', '=', 'masakans.id_masakan')
        ->select('transaksis.*', 'detail_orders.*', 'orders.no_meja', 'masakans.nama_masakan', 'masakans.harga')
        ->get();
        return Datatables::of($transaksi)
        ->addColumn('action', function($transaksi){
            // return '<a onclick="editForm('. $transaksi->id_transaksi .')" class="btn btn-warning btn-sm"><i class="far fa-edit"> Edit</i></a> ' .
            // '<a href="/kasir/('. $transaksi->id_transaksi .')" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"> Delete</i></a>';
           return '<form method="POST" action="'.('/kasir'.'/'.$transaksi->id_transaksi).'"> <input type="hidden" name="_token" id="csrf-token" value="'. Session::token().'" /> 
                <input type="hidden" name="_method" value="DELETE">
                <a onclick="editForm('. $transaksi->id_transaksi .')" class="btn btn-primary btn-sm text-light"><i class="fas fa-money-bill-alt"> BAYAR</i></a> 
                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"> HAPUS</i></button></form>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function getDetails($id){
        $data = DB::table('detail_orders')->where('id_detail_order',$id)
        ->join('orders', 'detail_orders.id_order', 'orders.id_order')
        ->join('masakans', 'detail_orders.id_masakan', 'masakans.id_masakan')
        ->select('orders.no_meja', 'orders.tanggal','masakans.harga','detail_orders.*','masakans.nama_masakan')
        ->first();
        echo json_encode($data);
        exit;
    }
    
    public function index()
    {
        
        $transaksi = DB::table('transaksis')
        ->join('detail_orders', 'transaksis.id_detail_order', '=', 'detail_orders.id_detail_order')
        ->join('orders', 'detail_orders.id_order', '=', 'orders.id_order')
        ->join('masakans', 'detail_orders.id_masakan', '=', 'masakans.id_masakan')
        ->select('transaksis.*', 'detail_orders.*', 'orders.no_meja', 'masakans.nama_masakan', 'masakans.harga')
        ->get();
        // dd($transaksi);
        return view('kasir/index', compact('transaksi'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detail = DB::table('detail_orders')
        ->join('orders', 'detail_orders.id_order', '=', 'orders.id_order')
        ->select('detail_orders.id_detail_order', 'orders.no_meja')
        ->get();
        $stok = DetailOrder::pluck('stok', 'id_detail_order');

        return view('/kasir/create', compact('detail', 'stok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trans = new \App\Transaksi;
        $trans->id_detail_order = $request->id_detail_order;
        $trans->tanggal = $request->tanggal;
        $trans->qty = $request->qty;
        $trans->total_bayar = $request->total_bayar;
        $trans->save();
        // dd($trans);
        return redirect('/kasir');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $transaksi = Transaksi::find($id);
        return $transaksi;
    }
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        if ($request->total_bayar <= $request->kembalian) {
            $transaksi->kembalian = $request->kembalian - $request->total_bayar;
            $transaksi->update();    
    
            return response()->json([
                'success'=> true
            ]);
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_transaksi)
    {
        Transaksi::destroy($id_transaksi);
        return redirect('/kasir');
    }
}
