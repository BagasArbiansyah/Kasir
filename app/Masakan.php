<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masakan extends Model
{
    protected $fillable = ['id_masakan','nama_masakan', 'harga', 'status_masakan', 'stok'];
    protected $primaryKey = 'id_masakan';
}
