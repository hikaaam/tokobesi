{{-- @php(Session::forget('nama'))
@php(Session::forget('order'))
@php(Session::forget('product')) --}}
<script>
    function bayar(){   
        
        document.getElementById('formbayar').style.display = 'block';
        document.getElementById('formproduct').style.display = 'none';
    }
    function batal(){
        document.getElementById('formproduct').style.display = 'block';
        document.getElementById('formbayar').style.display = 'none';
    }
</script>  
@extends('atemplate')
@section('head')
    
<script src="https://cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>

@endsection
@section('main')
    

        <!--main content start-->
<section class="wrapper site-min-height">
    <section id="main-content">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        @if (session('error'))
            <div class="alert alert-success">
                {{ session('error') }}
            </div>
        @endif
        @php($total = [])
        @if(Session::has('order'))
        @php($order = Session::get('order') ) 
            @php($nomor = $order[0])
        @else
        @php($nomor = time() . str_random(22))
        @php(Session::push('order', $nomor))    
        @endif
        @if(Session::has('nama'))
            @php($namas = Session::get('nama') )
            @php($nama = $namas[0])
        @elseif(isset($_GET['nama']))
            @php($nama = $_GET['nama'])
            @php(Session::push('nama', $nama))
        @else 
            @php($nama = '')
        @endif

        @if(isset($_GET['product']))
            @php($product = $_GET['product'] )
            @php($jumlah = $_GET['jumlah'])
           
            @php(Session::push('product.product',$product))
            @php(Session::push('product.jumlah',$jumlah))
        @endif
        <div class="row">
            <div class="col-md-8">
        <h5>Nomor Nota : {{$nomor}}</h5>
            <h5>Nama Pelanggan : {{$nama}}</h5>
        <table id="table" class="table table-hover">
            <thead class="thead-dark">
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tool</th>
                <th>Satuan</th>
                <th>Price</th>
                <th>Total</th>
            </thead>
            <tbody>
              
                   
              
                    @php($data1 = App\penjualancache::where('nota',$nomor)->get())
                    
                    @foreach ($data1 as $prod)
                <tr>
                    <td>{{$prod->produk}}</td>
                    <td>{{$prod->jumlah}}</td>
                    @php($qty = $prod->jumlah)
                    <td><a href="{{ action('PenjualancacheController@show',[$prod->id]) }}"><i style="font-size:20px;color:orange;" class="fa fa-minus"></i></a>
                        <a href="{{ url('cachepenjualan/'.$prod->id.'/edit') }}"><i style="margin-left:10px;font-size:20px;color:green;" class="fa fa-plus"></i></a>
                        <a href="{{  url('pelanggan',[$prod->id]) }}"><i style="margin-left:10px;font-size:20px;color:red;" class="fa fa-times"></i></a>
                    </td>
                     <td>{{$prod->satuan}}</td>
                    <td>{{$prod->harga}}</td>
                    <td>{{$qty*$prod->harga}}</td>
                    @php(array_push($total,$qty*$prod->harga))
                </tr>
                    @endforeach

            
            </tbody>
            <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Jumlah</td>
                    <td>{{array_sum($total)}}</td>
                    @php(Session::forget('total'))
                    @php(Session::push('total', $total))
                </tr>
        </table>  
        <thead>
                <th><button onclick="bayar()" type="button" class="btn btn-danger"><i style="font-size:20px;" class="fa fa-money"></i> BAYAR</button></th>
        </thead>
        <thead>
                <th><a href="{{ url('pelanggan', []) }}" type="button" class="btn btn-primary"><i style="font-size:20px;" class="fa fa-save"></i> SIMPAN</a></th>
        </thead>
    </div>
    <div class="col-md-4">
        <br>
        <br>
        <hr>
    <div id="formnama" style="@if(Session::has('nama')){!!'display:none'!!}@endif">
        <form  action="{{ url('penjualan/create', []) }}" enctype="multipart/form-data" method="GET">
            {{ csrf_field() }} 
                    <div class="row mt">
                        <div class="col-sm-8">
                          <input class="form-control" autocomplete="off" type="text" placeholder="Nama Pelanggan" name="nama">
                        </div>
                    <div class="col-sm-4">
                        <div style="position:relative;right:10px;">
                            <input type="submit" value="Simpan Nama" class="btn btn-info">                  
                        </div>
                    </div>  
                </div>
            </form>   
    </div>
    <div id="formproduct" style="@if(Session::has('nama')){!!'display:block'!!}@else {!! 'display:none' !!} @endif">
        <form action="{{ url('cachepenjualan', []) }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}           
                    <div class="row mt">
                        <div class="col-sm-12"><label >Nama Product</label></div>
                        <div class="col-sm-12">
                                <input  list="products"  autocomplete="off" class="form-control" placeholder="double klik untuk lihat produk" id="product" name="product">
                                <datalist id="products">
                                        
                                        @foreach ($data as $item)       
                                     <option value="{{$item->nama}}">                                     
                                         @endforeach
                                </datalist>
                        </div>
                        <br>
                        <br>
                        <div style="margin-top:10px" class="col-sm-12"><label >Jumlah Product</label></div>
                        <div class="col-sm-8">
                                <input  class="form-control" type="number" required  name="jumlah" placeholder="Jumlah product">
                        </div>
                        
                  
                    <div class="col-sm-4">
                        <div style="position:relative;right:10px;">
                            <input type="submit" value="Simpan Product" class="btn btn-info">                  
                        </div>
                    </div>  
                </div>
         
            </form>   
    </div>
    <div id="formbayar" style="display:none">
            <form  action="{{ url('penjualan', []) }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                  
                      
                        <div class="row mt">
                            <div class="col-sm-8">
                              <input class="form-control" autocomplete="off" type="number" required placeholder="Jumlah Uang" name="uang">
                            </div>
                            <div class="col-sm-1" style="position:relative;right:10px;">
                                    <button onclick="batal()" type="button" class="btn btn-danger"><i style="font-size:20px" class="fa fa-times"></i></button>  
                                </div>  
                        <div class="col-sm-3">
                            <div style="margin-left:2px">
                                <input type="submit" value="Simpan" class="btn btn-info">           
                            </div>
                        </div>  
                     
                           </div>   
                </form>   
            </div>
        </div>
    </div>
    </div>
            </section><!--/wrapper -->
        </section><!-- /MAIN CONTENT -->
    
@endsection



