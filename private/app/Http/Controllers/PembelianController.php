<?php

namespace App\Http\Controllers;

use App\pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pembelian::all();
        return view('tokobesi/pembelian/pembelian',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('tokobesi/pembelian/pembelianbaru');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
       
 
        $data = [
            'nama' => $request->nama,
            'harga_beli' => $request->harga,
            'jumlah' => $request->jumlah,
            'suplier' => $request->supplier,
            'kategori' => $request->kategori,
        ];
         
        
       $pembelian = pembelian::create($data);
        if ($pembelian)
            return redirect()->back()->withSuccess('Sukses tambah data');
        
        return redirect()->back()->withError('Gagal tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $delete = pembelian::destroy($id);
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
        $data = pembelian::find($id);
    
        return view('tokobesi/pembelian/pembelianedit',compact('data'));
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
       'harga_beli'=>$request->harga,'jumlah'=>$request->jumlah,
       'suplier'=>$request->supplier,
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
