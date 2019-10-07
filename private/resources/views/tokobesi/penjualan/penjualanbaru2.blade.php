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
            <hr>
            @php
            use Illuminate\Support\Facades\DB;
        @endphp
        @foreach ($data as $item)
            @php($nota = $item->nota)
            @php($tanggal = $item->created_at->format('d/m/Y'))
            @php($nama = $item->pelanggan)
            @php($status = $item->status)
        @endforeach
<div class="container">
        <div>
        <h5>Nomor Nota : {{$nota}}</h5>
        </div>
        <div>
        <h5>Nama Pelanggan : {{$nama}}</h5>
        </div>
        <div>
           <h5>Status : @if($status==1){{'di bayar'}} @else {{'belum dibayar'}} @endif</h5>
         </div>
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
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead> 
        <tbody>
                @php($total = [])
		
                @foreach ($data as $col)
                <tr>	
                    <td>{{$col->produk}}</td>
                    @php( $jumlah = $col->jumlah);
                    <td>{{$jumlah}}</td>
                    <td>{{$col->harga}}</td>
                    <td>{{$jumlah*$col->harga}}</td>	
                    @php(array_push($total,$jumlah*$col->harga))
                    
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>Jumlah</td>
                <td>{{array_sum($total)}}</td>
                </tr>
        </tbody>
    </table>
    <a href="{{ url('cetak', [$nota]) }}" class="btn btn-primary" target="_blank">CETAK NOTA</a>	
</div>

            </div>
			</div><!-- /row -->
		
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2019-catur ayu
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