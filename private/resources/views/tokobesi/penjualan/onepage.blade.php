{{-- @php(Session::forget('nama'))
@php(Session::forget('order'))
@php(Session::forget('product')) --}}
<script>
console.log("is work!");
    function showinput(){   
        document.getElementById('del').style.display = 'block';
        document.getElementById('formproduct').style.display = 'block';
        document.getElementById('add').style.display = 'none';
    }
    function hideinput(){
        document.getElementById('formnama').style.display = 'none';
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
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </thead>
            <tbody>
                @if(Session::has('product'))
                @php($products = Session::get('product'))
                @php($i=0)
                @php($total = [])
                @foreach ($products['product'] as $item) 
                   
                <tr>
                    @php($data1 = App\product::where('nama',$item)->get())
                    @foreach ($data1 as $prod)
                    <td>{{$prod->nama}}</td>
                    <td>{{$products['jumlah'][$i]}}</td>
                        @php($qty = $products['jumlah'][$i])
                    <td>{{$prod->harga}}</td>
                    <td>{{$qty*$prod->harga}}</td>
                    @php(array_push($total,$qty*$prod->harga))
                    @endforeach
                </tr>
                @php($i=$i+1)
                @endforeach
                @endif
            </tbody>
            <tr>
                    <td></td>
                    <td></td>
                    <td>Jumlah</td>
                    <td>{{array_sum($total)}}</td>
                </tr>
        </table>
        
        <thead>
            <th><button type="button" class="btn btn-primary"><i style="font-size:20px;" class="fa fa-save"></i> SIMPAN</button></th>
        </thead>
    </div>
    <div class="col-md-4">
        <br>
        <br>
        <hr>
    <div id="formnama" style="@if(Session::has('nama')){!!'display:none'!!}@endif">
        <form  action="{{ url('penjualan/create', []) }}" enctype="multipart/form-data" method="GET">
            {{ csrf_field() }}
                <div  id="formproduct">
                  
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
    </div>
        <form action="{{ url('penjualan/create', []) }}" enctype="multipart/form-data" method="GET">
            {{ csrf_field() }}
                <div  id="formproduct">
                <div>
                  
                    <div class="row mt">
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
    </div>
            </section><!--/wrapper -->
        </section><!-- /MAIN CONTENT -->
    
@endsection



