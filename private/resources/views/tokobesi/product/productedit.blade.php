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
    <form action="{{ url('product', [$data->id]) }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div>
                <h4><i class="fa fa-angle-right"></i> Nama Barang</h4>
                <div class="row mt">
                    <div class="col-sm-6">
                    <input type="text" class="form-control" value="{{$data->nama}}" name="nama" id="judul" placeholder="nama barang">
                            @if ($errors->has('nama'))
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        @endif
                        </div>
                </div>      
            </div>
            <br>
            <div>
                    <h4><i class="fa fa-angle-right"></i> Kategori</h4>
                    <div class="row mt">
                        <div class="col-sm-6">
                                <input type="text" class="form-control" value="{{$data->kategori}}" name="kategori" id="judul" placeholder="Sub Category">
                                @if ($errors->has('kategori'))
                                <p class="text-danger">{{ $errors->first('kategori') }}</p>
                            @endif
                            </div>
                    </div>      
                </div>
                <br>
                <div>
                        <h4><i class="fa fa-angle-right"></i> Supplier</h4>
                        <div class="row mt">
                            <div class="col-sm-6">
                                    <input type="text" class="form-control" value="{{$data->suplier}}" name="suplier" id="judul" placeholder="Supplier">
                                    @if ($errors->has('suplier'))
                                    <p class="text-danger">{{ $errors->first('suplier') }}</p>
                                @endif
                                </div>
                        </div>      
                    </div>
                    <br>
                    <div>
                            <h4><i class="fa fa-angle-right"></i> Harga</h4>
                            <div class="row mt">
                                <div class="col-sm-6">
                                        <input type="number" class="form-control" value="{{$data->harga}}" name="harga" id="judul" placeholder="Harga Barang">
                                        @if ($errors->has('harga'))
                                        <p class="text-danger">{{ $errors->first('harga') }}</p>
                                    @endif
                                    </div>
                            </div>      
                        </div>
                        <br>
                        <div>
                                <h4><i class="fa fa-angle-right"></i> Jumlah Barang</h4>
                                <div class="row mt">
                                    <div class="col-sm-6">
                                            <input type="number" class="form-control" value="{{$data->jumlah}}" name="jumlah" id="judul" placeholder="Jumlah Barang">
                                            @if ($errors->has('jumlah'))
                                            <p class="text-danger">{{ $errors->first('jumlah') }}</p>
                                        @endif
                                        </div>
                                </div>      
                            </div>
                            <br>
                            <div>
                                <h4><i class="fa fa-angle-right"></i> Satuan</h4>
                                <div class="row mt">
                                    <div class="col-sm-6">
                                    <input type="text" autocomplete="off" class="form-control" value="{{$data->satuan}}" name="satuan" id="judul" placeholder="Satuan">
                                            @if ($errors->has('satuan'))
                                            <p class="text-danger">{{ $errors->first('satuan') }}</p>
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
