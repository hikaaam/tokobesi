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
    <form action="{{ url('admin-vg/cat', []) }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
            <div>
                <h4><i class="fa fa-angle-right"></i> Main Category</h4>
                <div class="row mt">
                    <div class="col-sm-6">
                            <input type="text" class="form-control" name="Cat" id="judul" placeholder="Main Category">
                            @if ($errors->has('Cat'))
                            <p class="text-danger">{{ $errors->first('Cat') }}</p>
                        @endif
                        </div>
                </div>      
            </div>
            <br>
            <div>
                    <h4><i class="fa fa-angle-right"></i> Sub Category</h4>
                    <div class="row mt">
                        <div class="col-sm-6">
                                <input type="text" class="form-control" name="Tags" id="judul" placeholder="Sub Category">
                                @if ($errors->has('Tags'))
                                <p class="text-danger">{{ $errors->first('Tags') }}</p>
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
