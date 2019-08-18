@extends('atemplate')
@section('head')
	<link rel="stylesheet" href="{{ asset('assets/css/post.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection
@section('main')


  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
    
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
			  			<!-- row -->
        <div class="row">
            <div class="col-md-12"> 
                <div class="section-title">
                    <h2> <a style="font-size: 22px;">Cetak Laporan Penjualan </a></h2>
                    <hr>	
                </div>
            </div>
   
<div class="container">
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
    
<form action="{{ url('laporan', []) }}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
        <div style="display:block;" id="formproduct">
        <div>
          
            <div class="row mt">
                <div class="col-sm-4">
                    <h3>Dari Tanggal</h3>
                        <input  type='date' autocomplete="off" class="form-control" id="product" name="dari">
                   
                        @if ($errors->has('product'))
<p class="text-danger">{{ $errors->first('product') }}</p>
@endif
                </div>
            </div>  
        <div>
                <div class="row mt">
                        <div class="col-sm-4">
                            <h3>Sampai Tanggal</h3>
                                <input  type='date' autocomplete="off" class="form-control" id="product" name="sampai">
                           
                                @if ($errors->has('product'))
        <p class="text-danger">{{ $errors->first('product') }}</p>
        @endif
                        </div>
                    </div>  
                <div>
            <div class="row mt">
                <div style="margin-left:10px;">
                    <input type="submit" value="Cetak Laporan" class="btn btn-info">                  
                </div>
            </div>  
        </div>  
    </div>    
</div>    
    </form>   
</div>
            </div>
			</div><!-- /row -->
		
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="gallery.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
	<script src="assets_admin/js/fancybox/jquery.fancybox.js"></script>    
    <script src="assets_admin/js/bootstrap.min.js"></script>
    
    


    <!--common script for all pages-->
    <script src="assets_admin/js/common-scripts.js"></script>

    <!--script for this page-->
  
  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
  

    
@endsection