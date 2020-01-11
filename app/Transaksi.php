<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Transaksi extends Model
{   
    protected $fillable = ['id_detail_order', 'qty', 'total_bayar', 'tanggal', 'kembalian'];
    protected $primaryKey = 'id_transaksi';

}
