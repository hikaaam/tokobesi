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
      @foreach ($data1 as $item)
          @php($nomor = $item->nota)
          @php($nama = $item->suplier)
      @endforeach
            <div class="row">
                <div class="col-md-12">
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
                    <th><a href="{{ url('pembelian', []) }}" type="button" class="btn btn-primary"><i style="font-size:20px;" class="fa fa-back"></i> Back</a></th>
            </thead>
        </div>
        </div>
        </div>
                </section><!--/wrapper -->
            </section><!-- /MAIN CONTENT -->
        
    @endsection
    
    
    
    