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
    <style>
    #margin{
        margin-bottom: 5%;
    }
    </style>
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
            @if(Session::has('beli'))
            @php($order = Session::get('beli') ) 
                @php($nomor = $order[0])
            @else
            @php($nomor = time() . str_random(22))
            @php(Session::push('beli', $nomor))    
            @endif
            @if(Session::has('supplier'))
                @php($namas = Session::get('supplier') )
                @php($nama = $namas[0])
            @elseif(isset($_GET['supplier']))
                @php($nama = $_GET['supplier'])
                @php(Session::push('supplier', $nama))
            @else 
                @php($nama = '')
            @endif
            <div class="row">
                <div class="col-md-8">
            <h5>Nomor Nota : {{$nomor}}</h5>
                <h5>Nama Supplier : {{$nama}}</h5>
            <table id="table" class="table table-hover">
                <thead class="thead-dark">
                    <th>Nama Barang</th>
                    <th>kategori</th>
                    <th>harga</th>
                    <th>jumlah</th>
                    <th>harga jual</th>
                </thead>
                <tbody>
                  
                       
                  
                        @php($data1 = App\pembelian::where('nota',$nomor)->get())
                        
                        @foreach ($data1 as $prod)
                    <tr>
                        <td>{{$prod->nama}}</td>
                        <td>{{$prod->kategori}}</td>
                        
                        <td>{{$prod->harga_beli}}</td>
                        <td>{{$prod->jumlah}}</td>
                        <td>{{$prod->harga_jual}}</td>
                      
                    </tr>
                        @endforeach
    
                
                </tbody>
            </table>  
            <thead>
                    <th><a href="{{ url('beli', []) }}" type="button" class="btn btn-primary"><i style="font-size:20px;" class="fa fa-save"></i> SIMPAN</a></th>
            </thead>
        </div>
        <div class="col-md-4">
            <br>
            <br>
            <hr>
        <div id="formnama" style="@if(Session::has('supplier')){!!'display:none'!!}@endif">
            <form  action="{{ url('pembelian/create', []) }}" enctype="multipart/form-data" method="GET">
                {{ csrf_field() }} 
                        <div class="row mt">
                            <div class="col-sm-8">
                              <input class="form-control" autocomplete="off" type="text" placeholder="Nama Supplier" name="supplier">
                            </div>
                        <div class="col-sm-4">
                            <div style="position:relative;right:10px;">
                                <input type="submit" value="Simpan Nama" class="btn btn-info">                  
                            </div>
                        </div>  
                    </div>
                </form>   
        </div>
        <div id="formproduct" style="@if(Session::has('supplier')){!!'display:block'!!}@else {!! 'display:none' !!} @endif">
            <form action="{{ url('pembelian', []) }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}           
                        <div class="row mt">
                            <label class="col-sm-12">Nama Barang</label>
                            <div id="margin" class="col-sm-12">
                                    <input type="text"   autocomplete="off" class="form-control" placeholder="masukan nama produk" name="nama">
                            </div>
                            <label class="col-sm-12">Kategori</label>
                            <div id="margin" class="col-sm-12">
                                    <input type="text"   autocomplete="off" class="form-control" placeholder="masukan nama produk" name="kategori">
                            </div>
                            <label class="col-sm-12">Jumlah</label>
                            <div  id="margin" class="col-sm-12">
                                    <input  class="form-control" type="number" required  name="jumlah" placeholder="Jumlah product">
                            </div>
                            <label class="col-sm-12">Harga</label>
                            <div  id="margin" class="col-sm-12">
                                    <input  class="form-control" type="number" required  name="harga" placeholder="Harga product">
                            </div>
                            <label class="col-sm-12">Harga Jual</label>
                            <div  id="margin" class="col-sm-12">
                                    <input  class="form-control" type="number" required  name="harga_jual" placeholder="Harga Jual product">
                            </div>
                      
                        <div class="col-sm-12">
                            
                                <input type="submit" value="Tambah Barang" class="btn btn-info">                  
                        
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
    
    
    
    