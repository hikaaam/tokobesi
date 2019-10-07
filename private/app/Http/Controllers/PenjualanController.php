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
            $nota1 = Session::get('order');
            $nota = $nota1[0];
            $nama1 = Session::get('total');
            $total = $nama1[0][0];
            $uang = $request->uang;

            $array = [
                'status'=>1,
                'bayar'=>$uang
            ];
          
            if($total<=$uang)
            {
            penjualan::where('nota',$nota)->update($array);
            Session::forget('order');
            Session::forget('nama');
            Session::forget('total');
              return redirect()->action(
               'PenjualanController@show', [$nota]
           );
            }
            else{
                return redirect()->back()->withError('Maaf Uang nya kurang');
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
        $data = penjualan::where('nota',$id)->get();
        return view('tokobesi/penjualan/penjualanbaru2',compact('data'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = penjualan::where('nota', '=' ,$id)->groupBy('produk')->get();
        return view('tokobesi/penjualan/invoice',compact('data'));
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
