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
                                       <h2> <a style="font-size: 22px;"  href="{{ url('penjualan/create', []) }}"><i style="font-size: 28px;" class="fa fa-plus-square"></i> Tambah penjualan <i style="font-size: 28px;"  class="fa fa-plus-square"></i></a></h2>
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
    <table id="table" class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nota</th>
                <th>pelanggan</th>
                <th>Tanggal Keluar</th>
                <th colspan="2" style="text-align: center" >Tools</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nota}}</td>
                <td>{{$item->pelanggan}}</td>
                <td>{{$item->created_at->format('M, d Y')}}</td>
                <td style="font-size:16px;text-align:right;right:20px;position:relative;" ><a href="{{ url('penjualan', [$item->nota]) }}"><i style="color:blue;" class="fa fa-eye"> Lihat / Cetak Nota </i></a></td>
                <td style="font-size:16px;text-align:right;right:20px;position:relative;" ><a onclick="return confirm('Are you sure?')" href="{{ url('penjualan', [$item->nota]) }}"><i style="color:red;" class="fa fa-trash"> Delete </i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

            </div>
			</div><!-- /row -->
		
		</section><! --/wrapper -->
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