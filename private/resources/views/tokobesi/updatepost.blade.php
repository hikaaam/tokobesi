@extends('atemplate')
@section('head')
    
<title>CKEditor</title>
<script src="https://cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
@endsection
@section('main')


     <!--main content start-->

      @php
          use App\cat;
      @endphp
   
        
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
    <form action="{{ url('admin-vg/post', [$edit->id]) }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        @method('PUT')
            <div>
                <h4><i class="fa fa-angle-right"></i> Judul Article </h4>
                <div class="row mt">
                    <div class="col-sm-6">
                    <input value="{{$edit->judul}}" type="text" class="form-control" name="judul" id="judul" placeholder="judul">
                            @if ($errors->has('judul'))
                            <p class="text-danger">{{ $errors->first('judul') }}</p>
                        @endif
                        </div>
                </div>      
            </div>
            <br>
            <div>
                <h4><i class="fa fa-angle-right"></i> Gambar Sampul</h4>
                <div class="row mt">
                    
                    <div class="col-sm-6">
                            <img style="width:400px;height:200px;" src="{{ asset('private/images/artikel'.'/'.$edit->sampul) }}" alt="">
                            <br>
                            <br>
                           <input class="btn btn-success" class="form-control" type="file" name="sampul" id="sampul">
                           @if ($errors->has('sampul'))
                           <p class="text-danger">{{ $errors->first('sampul') }}</p>
                       @endif
                        </div>
                </div>      
            </div>
            <br>
            <div>
                <h4><i class="fa fa-angle-right"></i> Gambar Preview</h4>
                <div class="row mt">
                    <div class="col-sm-6">
                            <img style="width:200px;height:200px;" src="{{ asset('private/images/artikel'.'/'.$edit->foto) }}" alt="">
                            <br>
                            <br>
                            <input class="btn btn-info" class="form-control" type="file" name="foto" id="sampul">
                            @if ($errors->has('foto'))
                            <p class="text-danger">{{ $errors->first('foto') }}</p>
                        @endif
                        </div>
                </div>      
            </div>
            <br>
            <div>
                <h4><i class="fa fa-angle-right"></i> Kategori</h4>
                <div class="row mt">
                    <div class="col-sm-6">
                            <input autocomplete="off"   value="{{$edit->kategori}}" list="category" class="form-control" placeholder="double klik to show list" id="kategori" name="category">
                    <datalist id="category">
                                    @php($data = cat::where('deleted',0)->get())
                                    @foreach ($data as $item)       
                                 <option value="{{$item->sub_kategori}}">                                     
                                     @endforeach
                            </datalist>
                            @if ($errors->has('category'))
                    <p class="text-danger">{{ $errors->first('category') }}</p>
                    @endif
                    </div>
                </div>      
            </div>
            <br>
            <div>
                <h4><i class="fa fa-angle-right"></i> Isi Article</h4>
                <div class="row mt">
                    <div class="col-lg-12">
                            <textarea name="editor1" id="isi">{!!$edit->isi!!}</textarea>
                            <script>
                                    CKEDITOR.replace( 'editor1' );
                            </script>
                                
                            @if ($errors->has('isi'))
                            <p class="text-danger">{{ $errors->first('isiberita') }}</p>
                        @endif
                    </div>
                </div>  
            </div> 
            <br>
            <div>
                <h4><i class="fa fa-angle-right"></i> preview</h4>
                <div class="row mt">
                    <div class="col-lg-6">
        {{--                     
                            {{Form::textarea("preview", old("preview") ? old("preview") : (!empty($user) ? $user->preview : null),
                            [
                                "class" => "form-control",
                                "placeholder" => "input manimal 151 character"
                            ])
                        }} --}}
                        <div class="form-group">
                        <textarea  class="form-control" rows="5" name="preview" placeholder="input minimal 151 character">{{$edit->preview}}</textarea>
                            
                            @if($errors->has('preview'))
                            <p class="text-danger">{{ $errors->first('preview') }}</p>
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
