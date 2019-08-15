<script>
console.log("is work!");
    function showinput(){   
        document.getElementById('del').style.display = 'block';
        document.getElementById('formproduct').style.display = 'block';
        document.getElementById('add').style.display = 'none';
    }
    function hideinput(){
        document.getElementById('del').style.display = 'none';
        document.getElementById('formproduct').style.display = 'none';
        document.getElementById('add').style.display = 'block';
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
                        <h4><i class="fa fa-angle-right"></i> Tambah Product</h4>
                        <button onclick="showinput()" id="add" style="padding:5px 5px;background-color:black;display:none">
                            <i style="text-align:center;color:green;font-size:20px;" class="fa fa-plus"></i>
                        </button>
                        <button onclick="hideinput()" id="del" style="padding:5px 5px;background-color:black;display:block;">
                            <i style="text-align:center;color:red;font-size:20px;" class="fa fa-times"></i>
                        </button>
<form action="{{ url('penjualan/create', []) }}" enctype="multipart/form-data" method="GET">
    {{ csrf_field() }}
        <div style="display:block;" id="formproduct">
        <div>
          
            <div class="row mt">
                <div class="col-sm-6">
                        <input  list="products"  autocomplete="off" class="form-control" placeholder="double klik untuk lihat produk" id="product" name="product">
                        <datalist id="products">
                                
                                @foreach ($data as $item)       
                             <option value="{{$item->nama}}">                                     
                                 @endforeach
                        </datalist>
                        @if ($errors->has('product'))
<p class="text-danger">{{ $errors->first('product') }}</p>
@endif
                </div>
            </div>  
        <div>
            <div class="row mt">
                <div style="margin-left:10px;">
                    <input type="submit" value="Simpan Product" class="btn btn-info">                  
                </div>
            </div>  
        </div>  
    </div>    
</div>    
    </form>   
@if(isset($_GET['product']))
@php($i = 1)
@php(Session::push('dataproduct', $_GET['product']))
@php($prod = Session::get('dataproduct') )  
    @foreach ($prod as $prods)  
        {{$i.'.'.$prods}}
        @php($i = $i+1)
        {!!'<br>'!!}
    @endforeach
@else
@php(Session::forget('dataproduct'))
@endif


    <form action="{{ url('penjualan', []) }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
           
            <div>
                <div>
                        <h4><i class="fa fa-angle-right"></i> pelanggan</h4>
                        <div class="row mt">
                            <div class="col-sm-6">
                                    <input type="text" class="form-control" name="pelanggan" id="judul" placeholder="pelanggan">
                                    @if ($errors->has('pelanggan'))
                                    <p class="text-danger">{{ $errors->first('pelanggan') }}</p>
                                @endif
                                </div>
                        </div>      
                    </div>
                    <br>
           
            <div>
                <div class="row mt">
                    <div style="margin-left:10px;">
                        <input type="submit" value="Simpan" class="btn btn-success">
                            {{-- {{Form::submit('Submit Form',
                            [
                                "class" => "btn btn-success"
                            ])
                        }} --}}
                    </div>
                </div>  
            </div>          
        </form>
          </section><!--/wrapper -->
        </section><!-- /MAIN CONTENT -->
  
@endsection



