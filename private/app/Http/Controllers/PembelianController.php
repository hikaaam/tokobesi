<?php

namespace App\Http\Controllers;

use App\pembelian;
use App\product;
use Session;
use Illuminate\Http\Request;

class PembelianController extends Controller
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
        $data = pembelian::groupBy('nota')->get();
      return view('tokobesi/pembelian/pembelian',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('tokobesi/pembelian/onepage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $suplier = Session::get('supplier');
      $supp = $suplier[0];
      $note = Session::get('beli');
      $nota = $note[0];
       $product = product::where('nama',$request->nama)->count();
       
       if($product >=1){
             $data = [
            'nama' => $request->nama,
            'harga_beli' => $request->harga,
            'harga_jual'=> $request->harga_jual,
            'jumlah' => $request->jumlah,
            'suplier' => $supp,
            'satuan' => $request->satuan,
            'nota'=> $nota,
            'kategori' => $request->kategori,
        ];
        $produk = product::where('nama',$request->nama)->get();
        $jumlah = $produk[0]['jumlah']+$request->jumlah;
        $data_product = 
        ['jumlah'=>$jumlah, 'harga' => $request->harga_jual];
       
       product::where('nama',$request->nama)->update($data_product);
       pembelian::create($data);
       return redirect()->back();
       }
       else{
        $data = [
            'nama' => $request->nama,
            'harga_beli' => $request->harga,
            'harga_jual'=> $request->harga_jual,
            'jumlah' => $request->jumlah,
            'suplier' => $supp,
            'satuan' => $request->satuan,
            'nota'=> $nota,
            'kategori' => $request->kategori,
        ];
        $data_product = [
            'nama' => $request->nama,
            'harga' => $request->harga_jual,
            'jumlah' => $request->jumlah,
            'suplier' => $supp,
            'kategori' => $request->kategori,
        ];
       $product = product::create($data_product);
       $pembelian = pembelian::create($data);
        if ($pembelian && $product )
            return redirect()->back();
        
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $delete = pembelian::where('nota',$id)->delete();
        if ($delete)
        return redirect()->back()->withSuccess('Sukses hapus data');
        
        return redirect()->back()->withError('Gagal hapus data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $data1 = pembelian::where('nota',$id)->get();
      return view('tokobesi/pembelian/pembelianedit',compact('data1'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         
        
       $article = pembelian::whereId($id)->update(['nama'=>$request->nama,
       'harga_beli'=>$request->harga,'harga_jual'=>$request->harga_jual,'jumlah'=>$request->jumlah,
       'suplier'=>$request->suplier,
       'satuan' => $request->satuan,
       'kategori'=>$request->kategori]);
        if ($article)
            return redirect()->back()->withSuccess('Sukses update data');
        
        return redirect()->back()->withError('Gagal update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembelian $pembelian)
    {
        //
    }
}
