 @extends('atemplate')
@section('head')

	<link rel="stylesheet" href="{{ asset('assets_admin/css/chart.css') }}">
@endsection
 @section('main')
  

 <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
     
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
                  
                  	<div class="row mtbox">
                  		<div class="col-md-3 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
								<span><a href="{{ url('product', []) }}"><i class="fa fa-home"></i></a></span>
					  			<h3>product</h3>
                  			</div>
					  			<p>ini adalah barang barang yang ada di gudang!</p>
                  		</div>
                  		<div class="col-md-3 col-sm-2 box0">
                  			<div class="box1">
					  			<span><a href="{{ url('pembelian', []) }}"><i class="fa fa-dollar"></i></a></span>
					  			<h3>pembelian</h3>
                  			</div>
					  			<p>ini adalah barang barang yang di bely dari supplier.</p>
                  		</div>
                  		<div class="col-md-3 col-sm-2 box0">
                  			<div class="box1">
					  			<span><a href="{{ url('penjualan', []) }}"><i class="fa fa-shopping-cart"></i></a>
								  </span>  
									<h3>penjualan</h3>
                  			</div>
					  			<p>ini adalah barang barang yang di beli pelanggan.</p>
                  		</div>
                  		                  	
                  	</div><!-- /row mt -->	
                 
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
             
              </div><!--/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <!--footer end-->
  </section>
 
	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to VG Dashboard!',
            // (string | mandatory) the text inside the notification
            text: 'How was your day?',
            // (string | optional) the image to display on the left
            image: "{{ asset('private/images/logo.png') }}",
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  @endsection
