<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Transaksi extends Model
{   
    protected $fillable = ['id_user', 'id_order', 'tanggal', 'total bayar'];
    protected $primaryKey = 'id_transaksi';

}
