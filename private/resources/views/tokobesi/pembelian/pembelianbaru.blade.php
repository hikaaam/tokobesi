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
    <form action="{{ url('pembelian', []) }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
            <div>
                <h4><i class="fa fa-angle-right"></i> Nama Barang</h4>
                <div class="row mt">
                    <div class="col-sm-6">
                            <input type="text" class="form-control" name="nama" id="judul" placeholder="nama barang">
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
                                <input type="text" class="form-control" name="kategori" id="judul" placeholder="Sub Category">
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
                                    <input type="text" class="form-control" name="suplier" id="judul" placeholder="Supplier">
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
                                        <input type="number" class="form-control" name="harga" id="judul" placeholder="Harga Barang">
                                        @if ($errors->has('harga'))
                                        <p class="text-danger">{{ $errors->first('harga') }}</p>
                                    @endif
                                    </div>
                            </div>      
                        </div>
                        <br>
                    <div>
                            <h4><i class="fa fa-angle-right"></i> harga jual</h4>
                            <div class="row mt">
                                <div class="col-sm-6">
                                        <input type="number" class="form-control" name="harga_jual" id="judul" placeholder="Harga Jual">
                                        @if ($errors->has('harga_jual'))
                                        <p class="text-danger">{{ $errors->first('harga_jual') }}</p>
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
