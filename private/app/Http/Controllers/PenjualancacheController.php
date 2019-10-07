<?php

namespace App\Http\Controllers;

use App\penjualancache;
use App\product;
use Session;
use Illuminate\Http\Request;

class PenjualancacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $nota1 = Session::get('order');
        $nota = $nota1[0];
        $pelanggan1 = Session::get('nama');
        $pelanggan = $pelanggan1[0];
        $jumlah = $request->jumlah;
        $product = $request->product;

        $data = product::where('nama',$product)->get();
        $jumlah_product_digudang = $data[0]['jumlah'];
        $harga = $data[0]['harga'];
        $cache = [
           'nota' => $nota,
           'produk' => $product,
           'harga' => $harga,
           'pelanggan' => $pelanggan,
           'jumlah' => $jumlah,
        ];
        $jumlah_sisa = $jumlah_product_digudang-$jumlah;
        if($jumlah<=$jumlah_product_digudang){

            penjualancache::create($cache);
            product::where('nama',$product)->update(['jumlah'=>$jumlah_sisa]);
         return redirect()->action('PenjualanController@create');
        }
        else{
            return redirect()->action('PenjualanController@create')->withError('Jumlah Product '.$product.' di gudang Kurang!!'); 
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\penjualancache  $penjualancache
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = penjualancache::find($id);
        $product = $data->produk;
        $data1 = product::where('nama',$product)->get();
        $jumlah = $data->jumlah-1;
        $jumlah_prod = $data1[0]['jumlah']+1;
        if($jumlah<1){
            penjualancache::destroy($id);
            return redirect()->back();
        }
        else{
            penjualancache::find($id)->update(['jumlah'=>$jumlah]);
            product::where('nama',$product)->update(['jumlah'=>$jumlah_prod]);
            return redirect()->back();
        }
     
    }
  
    
    /**
     * Display the specified resource.
     *
     * @param  \App\penjualancache  $penjualancache
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
 
        $data = penjualancache::find($id);
        $product = $data->produk;
        $data1 = product::where('nama',$product)->get();
        $jumlah = $data->jumlah;
        $jumlah_prod = $data1[0]['jumlah']+$jumlah;
            product::where('nama',$product)->update(['jumlah'=>$jumlah_prod]);
            penjualancache::destroy($id);
            return redirect()->back();
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\penjualancache  $penjualancache
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = penjualancache::find($id);
        $product = $data->produk;
        $data1 = product::where('nama',$product)->get();
        $jumlah = $data->jumlah+1;
        $jumlah_prod = $data1[0]['jumlah']-1;
       
            if($jumlah_prod<=0){
                return redirect()->back()->withError('maaf produk '.$product.' habis');
            }
            else{
            penjualancache::find($id)->update(['jumlah'=>$jumlah]);
            product::where('nama',$product)->update(['jumlah'=>$jumlah_prod]);
            return redirect()->back();
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\penjualancache  $penjualancache
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penjualancache $penjualancache)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\penjualancache  $penjualancache
     * @return \Illuminate\Http\Response
     */
    public function destroy(penjualancache $penjualancache)
    {
        //
    }
}
