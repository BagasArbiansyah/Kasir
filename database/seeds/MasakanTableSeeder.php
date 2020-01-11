<?php

use Illuminate\Database\Seeder;
use App\Masakan;
class MasakanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        [
            'nama_masakan' => 'Bakso',
            'harga' => 10000,
            'status_masakan' => 'Enak',
            'stok' => 100,
        ],
        [
            'nama_masakan' => 'Mie Ayam',
            'harga' => 12000,
            'status_masakan' => 'Enak',
            'stok' => 100,
        ],
        [
            'nama_masakan' => 'Nasi Goreng',
            'harga' => 15000,
            'status_masakan' => 'Enak',
            'stok' => 100,
        ],
        [
            'nama_masakan' => 'Soto Ayam',
            'harga' => 14000,
            'status_masakan' => 'Enak',
            'stok' => 100,
        ],
        [
            'nama_masakan' => 'Nasi Uduk',
            'harga' => 60000,
            'status_masakan' => 'Enak',
            'stok' => 100,
        ],  
    ];
    Masakan::insert($data);
    }
}
