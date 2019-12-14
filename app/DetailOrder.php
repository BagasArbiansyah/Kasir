<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'detail_orders';

    //         $detail_order = DB::table('detail_orders')
    // ->join('orders', 'orders.id_order', 'orders.id_order')
    // ->join('masakans', 'masakans.id_masakan', 'masakans.id_masakan')
    // ->select('orders.*','detail_orders.*','masakans.*')
    // ->get();       
}
