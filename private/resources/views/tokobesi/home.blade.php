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
    <form action="{{ url('admin-vg/home', ['1']) }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        @method('PUT')
            <div>
               
                <div class="row mt">
                    <div class="col-sm-6">
                            <h4><i class="fa fa-angle-right"></i> Footer</h4>
                    <input type="text" value="{{$data->footer}}" class="form-control" name="footer" id="judul" placeholder="judul">
                            @if ($errors->has('footer'))
                            <p class="text-danger">{{ $errors->first('footer') }}</p>
                        @endif
                        </div>
                </div>      
            </div>
            <br>
            <div>
                
                <div class="row mt">
                    <div class="col-sm-5">
                            <h4><i class="fa fa-angle-right"></i> Logo</h4>
                        <img style="width:150px;height:150px;" src="{{ url('private/images', [$data->logo]) }}" alt="">
                        <br>
                        <br>
                           <input class="btn btn-success" class="form-control" type="file" name="logo" id="sampul">
                           @if ($errors->has('logo'))
                           <p class="text-danger">{{ $errors->first('logo') }}</p>
                       @endif
                        </div>
                        <div class="col-sm-6">
                                <h4><i class="fa fa-angle-right"></i> Slider 1</h4>
                                <img style="width:350px;height:150px;" src="{{ url('private/images', [$data->slider1]) }}" alt="">
                                <br>
                                <br>
                                <input class="btn btn-info" class="form-control" type="file" name="slider1" id="sampul">
                                @if ($errors->has('slider1'))
                                <p class="text-danger">{{ $errors->first('slider1') }}</p>
                            @endif
                </div>      
            </div>
            <br>
            <div>
                  
                    <div class="row mt">
                        <div class="col-sm-5">
                                <h4><i class="fa fa-angle-right"></i> Slider 2</h4>
                                <img style="width:350px;height:150px;" src="{{ url('private/images', [$data->slider2]) }}" alt="">
                                <br>
                                <br>
                                <input class="btn btn-info" class="form-control" type="file" name="slider2" id="sampul">
                                @if ($errors->has('slider2'))
                                <p class="text-danger">{{ $errors->first('slider2') }}</p>
                            @endif
                            </div>
                            <div class="col-sm-6">
                                    <h4><i class="fa fa-angle-right"></i> Slider 3</h4>
                                    <img style="width:350px;height:150px;" src="{{ url('private/images', [$data->slider3]) }}" alt="">
                                    <br>
                                    <br>
                                    <input class="btn btn-info" class="form-control" type="file" name="slider3" id="sampul">
                                    @if ($errors->has('slider3'))
                                    <p class="text-danger">{{ $errors->first('slider3') }}</p>
                                @endif
                                </div>
                    </div>      
                </div>
                <br>
     
            <div>
               
                <div class="row mt">
                    <div class="col-sm-4">
                            <h4><i class="fa fa-angle-right"></i> Paginate</h4>
                        <div class="form-group">
                        <input type="number" value="{{$data->paginate}}" class="form-control" name="paginate" >
                            
                            @if($errors->has('paginate'))
                            <p class="text-danger">{{ $errors->first('paginate') }}</p>
                        </div>
                        @endif
                    </div>
                </div>  
            </div>       
            <br>
            <div>
                  
                    <div class="row mt">
                        <div class="col-sm-4">
                            <h4><i class="fa fa-angle-right"></i> Most Read</h4>
                            <div class="form-group">
                            <input type="number" value="{{$data->mostread}}" class="form-control"  name="mostread" >
                                
                                @if($errors->has('mostread'))
                                <p class="text-danger">{{ $errors->first('mostread') }}</p>
                            </div>
                            @endif
                        </div>
                    </div>  
                </div>       
                <br>
            <div>
                <div class="row mt">
                    <div style="margin-left:10px;">
                        <input type="submit" value="upload" class="btn btn-success">
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
