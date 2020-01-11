<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    // protected $table = 'detail_orders';
    protected $primaryKey = 'id_detail_order';
    protected $fillable = [
        'id_detail_order', 'id_order', 'id_masakan', 'keterangan', 'status_detail_order', 'stok'
    ];
}
