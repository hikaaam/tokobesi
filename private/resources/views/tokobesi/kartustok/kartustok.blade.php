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
          
            <div class="row">
                <div class="col-md-8">
                    <h1>Kartu Stok</h1>
            <table id="table" class="table table-hover">
                <thead class="thead-dark">
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Tanggal masuk</th>
                    <th>Tool</th>
                </thead>
                <tbody> 
                        @foreach ($data as $prod)
                    <tr>
                        <td>{{$prod->nama}}</td>
                        <td>{{$prod->jumlah}}</td>
                         <td>{{$prod->satuan}}</td>
                        <td>{{$prod->harga}}</td>
                    <td>{{$prod->created_at->format('M, d Y')}}</td>
                    <td>
                    <form action="{{ url('kartustok', []) }}" method="GET">
                    <input type="text" style="display:none" name="produk" value="{{$prod->id}}">
                            <input type="submit" value="Edit" class="btn btn-success">
                    </form>
                    </td>
                    </tr>
                        @endforeach
    
                
                </tbody>
            </table>  
  
        </div>
        <div class="col-md-4">
            <br>
            <br>
            <hr>
        <div>
                @php
                use App\product;   
                @endphp
            @isset($_GET['produk'])
                @php($id = $_GET['produk'])
               
                @php($produk = product::find($id))
                @php($jumlah = $produk->jumlah)
            @else
                @php($id= '')
                @php($jumlah = '')
            @endisset
            <form  action="{{ url('kartustok',[$id]) }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }} 
                @method('PUT')
                        <div class="row mt">
                                <div class="col-sm-12"><label>Jumlah Produk</label></div>
                            <div class="col-sm-12">
                            <input class="form-control" @isset($_GET['produk'])
                            @else
                            {{'disabled'}}
                        @endisset autocomplete="off" type="number" value="{{$jumlah}}" placeholder="Jumlah Produk" name="jumlah">
                            </div>
                            
                            <div style="margin-top:40px" class="col-sm-12"><label>Keterangan</label></div>
                            <div class="col-sm-12">
                                   <textarea required name="keterangan" @isset($_GET['produk'])
                                       @else
                                       {{'disabled'}}
                                   @endisset placeholder="Keterangan" class="form-control" rows="5"></textarea>
                            </div>
                           
                        <div  style="margin-top:40px" class="col-sm-12">
                        
                                <input type="submit" value="Cetak Kartu Stok" class="btn btn-info">                  
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
    
    
    
    