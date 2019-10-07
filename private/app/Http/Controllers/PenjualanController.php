<?php

namespace App\Http\Controllers;

use App\penjualan;
use App\product;
use PDF;
use Session;
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
        $data = penjualan::groupBy('nota')->get();
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
        return view('tokobesi/penjualan/onepage',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $nota =  time() . str_random(22);
        $prod = Session::get('dataproduct');
        if(count($prod) <= 1 ){
            $item = product::where('nama','=',$prod[0])->get();
        
             
                    $harga_jual = $item[0]->harga_jual;
                    $id = $item[0]->id;
                    $jumlah = $item[0]->jumlah;
                
                $jumlah_sisa = $jumlah - 1;
                if($jumlah < 1  ){
                    return redirect()->action('PenjualanController@create')->withError('Jumlah Product  Di Gudang kurang!!!');     
                }
                else{
        
                
                $data = [
                    'produk' => $prod[0],
                    'harga_jual' => $harga_jual,
                    'jumlah' => '1',
                    'pelanggan'=> $request->pelanggan,
                    'nota' => $nota
                ];
               
                            
                $updateproduct = product::whereId($id)->update(['jumlah'=>$jumlah_sisa]);
                $pembelian = penjualan::create($data);
                 
            }
         }

        else{  
        foreach($prod as $prods){
        $product = product::where('nama','=',$prods)->get();
        foreach($product as $item){
            $harga_jual = $item->harga_jual;
            $id = $item->id;
            $jumlah = $item->jumlah;
        }
        $jumlah_sisa = $jumlah - 1;
        if($jumlah < 1  ){
         
            return redirect()->action('PenjualanController@create')->withError('Jumlah Product di gudang Kurang!!');     
        }
        else{

        
        $data = [
            'produk' => $prods,
            'harga_jual' => $harga_jual,
            'jumlah' => '1',
            'pelanggan'=> $request->pelanggan,
            'nota' => $nota
        ];
         
        $updateproduct = product::whereId($id)->update(['jumlah'=>$jumlah_sisa]);
       $pembelian = penjualan::create($data);
    
    }  
}
}
return redirect()->action('PenjualanController@create')->withSuccess('Sukses tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = penjualan::where('nota', '=' ,$id)->groupBy('produk')->get();
        return view('tokobesi/penjualan/penjualanbaru2',compact('data'));
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
