<?php

namespace App\Http\Controllers;

use App\Masakan;
use Illuminate\Http\Request;

class ApiMasakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $masakan = Masakan::all(); 
        $data= ['masakan'=>$masakan];
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $mskn = new \App\Masakan;
        $mskn->nama_masakan = $request->nama_masakan;
        $mskn->harga = $request->harga;
        $mskn->status_masakan = $request->status_masakan;
        $mskn->save();

        return 'Data Berhasil Masuk';
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
     * @param  \App\ApiMasakan  $apiMasakan
     * @return \Illuminate\Http\Response
     */
    public function show(ApiMasakan $apiMasakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ApiMasakan  $apiMasakan
     * @return \Illuminate\Http\Response
     */
    public function edit(ApiMasakan $apiMasakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApiMasakan  $apiMasakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mskn = Masakan::find($id);
        $mskn->nama_masakan = $request->nama_masakan;
        $mskn->harga = $request->harga;
        $mskn->status_masakan = $request->status_masakan;
        $mskn->save();

        return 'Data Berhasil Di Update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApiMasakan  $apiMasakan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $mskn = Masakan::find($id);
         $mskn->delete();

         return 'Data Berhasil Di hapus';
    }
}
