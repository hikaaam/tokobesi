<?php

namespace App\Http\Controllers;

use App\kartustok;
use App\product;
use Illuminate\Http\Request;

class KartustokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = product::all();
        return view('tokobesi/kartustok/kartustok',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\kartustok  $kartustok
     * @return \Illuminate\Http\Response
     */
    public function show(kartustok $kartustok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kartustok  $kartustok
     * @return \Illuminate\Http\Response
     */
    public function edit(kartustok $kartustok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kartustok  $kartustok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $data = product::find($id);
        $jumlah = $request->jumlah;
        $keterangan = $request->keterangan;
        // $pdf = PDF::loadview('tokobesi.laporan.laporanpdf',['data'=>$data,'dari'=>$dari,'sampai'=>$sampai]);
        // return $pdf->download('LaporanPenjualanFrom'.$dari.'To'.$sampai.'.pdf');
        kartustok::create(['nama'=>$data->nama,'jumlah'=>$jumlah,'keterangan'=>$keterangan]);
        product::find($id)->update(['jumlah'=>$jumlah]);
       return view('tokobesi.kartustok.kartustokpdf',compact('data','jumlah','keterangan'));
    // return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kartustok  $kartustok
     * @return \Illuminate\Http\Response
     */
    public function destroy(kartustok $kartustok)
    {
        //
    }
}
