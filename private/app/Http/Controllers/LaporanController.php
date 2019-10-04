<?php

namespace App\Http\Controllers;

use App\laporan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tokobesi.laporan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = laporan::selectRaw('nota,pelanggan,created_at, sum(harga_jual) as total')->
        whereRaw('created_at <= ? + interval 1 day',[$request->sampai])->where('created_at','>=',$request->dari)->groupBy('nota')->get();
        $dari = $request->dari;
        $sampai = $request->sampai;
        return view('tokobesi.laporan.laporan',compact('data','dari','sampai'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show($tanggalan)
    {
      
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$laporan)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $data = laporan::selectRaw('nota,pelanggan,created_at, sum(harga_jual) as total')->
        whereRaw('created_at <= ? + interval 1 day',[$sampai])->where('created_at','>=',$dari)->groupBy('nota')->get();
   
        // $pdf = PDF::loadview('tokobesi.laporan.laporanpdf',['data'=>$data,'dari'=>$dari,'sampai'=>$sampai]);
        // return $pdf->download('LaporanPenjualanFrom'.$dari.'To'.$sampai.'.pdf');
       return view('tokobesi.laporan.laporanpdf',compact('data','dari','sampai'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporan $laporan)
    {
        //
    }
}
