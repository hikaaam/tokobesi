<?php

namespace App\Http\Controllers;

use App\penjualan;
use App\product;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = penjualan::all();
        return view('tokobesi/penjualan/penjualan',compact('data'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = product::all();
        return view('tokobesi/penjualan/penjualanbaru',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $nota =  time() . str_random(22) . '::user::' . $request->pelanggan;
        $product = product::where('nama','=',$request->product)->get();
        foreach($product as $item){
            $harga = $item->harga;
            $id = $item->id;
            $jumlah = $item->jumlah;
        }
        $jumlah_sisa = $jumlah - $request->jumlah;
        if($jumlah < $request->jumlah  ){
            return redirect()->back()->withError('Jumlah Product Di Gudang kurang!!! tinggal : '.$jumlah .', jumlah product di beli : '
        .$request->jumlah .'!!');     
        }
        else{

        
        $data = [
            'produk' => $request->product,
            'harga' => $harga,
            'jumlah' => $request->jumlah,
            'pelanggan'=> $request->pelanggan,
            'nota' => $nota
        ];
         
        $updateproduct = product::whereId($id)->update(['jumlah'=>$jumlah_sisa]);
       $pembelian = penjualan::create($data);
        if ($pembelian && $updateproduct)
            return redirect()->back()->withSuccess('Sukses tambah data');
        
        return redirect()->back()->withError('Gagal tambah data');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $delete = penjualan::destroy($id);
        return redirect()->back()->withSuccess('Sukses tambah data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penjualan $penjualan)
    {
        //
    }
}
