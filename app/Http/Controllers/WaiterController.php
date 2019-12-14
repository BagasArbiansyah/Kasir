<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masakan;
class WaiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masakan = Masakan::All();
        return view ('waiter/index', compact('masakan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('waiter/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mskn = new \App\Masakan;
        $mskn->nama_masakan = $request->nama_masakan;
        $mskn->harga = $request->harga;
        $mskn->status_masakan = $request->status_masakan;
        $mskn->save();

        return redirect('waiter');
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
    public function edit($id_masakan)
    {
        $masakan = Masakan::find($id_masakan);
        return view('waiter/edit', compact('masakan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masakan $masakan)
    {
        Masakan::where('id_masakan', $masakan->id_masakan)
        ->update([
            'nama_masakan' => $request->nama_masakan,
            'harga' => $request->harga,
            'status_masakan' => $request->status_masakan
        ]);
        return redirect('waiter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masakan $masakan)
    {
        Masakan::destroy($masakan->id_masakan);
        return redirect('waiter');
    }
}
