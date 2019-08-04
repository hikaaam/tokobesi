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
                    <h4><i class="fa fa-angle-right"></i> Nama product</h4>
                    <div class="row mt">
                        <div class="col-sm-6">
                                <input list="products"  autocomplete="off" class="form-control" placeholder="double klik untuk lihat produk" id="product" name="product">
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
                </div>
                <br>
                        <div>
                                <h4><i class="fa fa-angle-right"></i> Jumlah Barang</h4>
                                <div class="row mt">
                                    <div class="col-sm-6">
                                            <input type="number" class="form-control" name="jumlah" id="judul" placeholder="Jumlah Barang">
                                            @if ($errors->has('jumlah'))
                                            <p class="text-danger">{{ $errors->first('jumlah') }}</p>
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
