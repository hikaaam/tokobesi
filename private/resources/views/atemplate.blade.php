<!DOCTYPE html>
<html lang="en">
<head>
  @yield('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- online library --}}
    <link href="{{ asset('public/assets_admin/js/fancybox/jquery.fancybox.css') }}" rel="stylesheet" />

    <script src="{{ asset('public/assets_admin/js/fancybox/jquery.fancybox.js') }}"></script>   
 
    <link rel="stylesheet" type="text/css"    href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></link>
  




    {{-- offline library --}}
      <!-- Bootstrap core CSS -->
      <link href="{{ asset('public/assets_admin/css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('public/assets_admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets_admin/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets_admin/js/gritter/css/jquery.gritter.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets_admin/lineicons/style.css') }}">    

    <!-- Custom styles for this template -->
    <link href="{{ asset('public/assets_admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets_admin/css/style-responsive.css') }}" rel="stylesheet">

    <script src="{{ asset('public/assets_admin/js/chart-master/Chart.js') }}"></script>

   <!-- js placed at the end of the document so the pages load faster -->
 <script src="{{ asset('public/assets_admin/js/jquery.js') }}"></script>
 <script src="{{ asset('public/assets_admin/js/jquery-1.8.3.min.js') }}"></script>
 <script src="{{ asset('public/assets_admin/js/bootstrap.min.js') }}"></script>
 <script class="include" type="text/javascript" src="{{ asset('public/assets_admin/js/jquery.dcjqaccordion.2.7.js') }}"></script>
 <script src="{{ asset('public/assets_admin/js/jquery.sparkline.js') }}"></script>


 <!--common script for all pages-->
 <script src="{{ asset('public/assets_admin/js/common-scripts.js') }}"></script>
 
 <script type="text/javascript" src="{{ asset('public/assets_admin/js/gritter/js/jquery.gritter.js') }}"></script>
 <script type="text/javascript" src="{{ asset('public/assets_admin/js/gritter-conf.js') }}"></script>

 <!--script for this page-->
 <script src="{{ asset('public/assets_admin/js/sparkline-chart.js') }}"></script>    
 <script src="{{ asset('public/assets_admin/js/zabuto_calendar.js') }}"></script>
 	

    

</head>
<body>
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
      <!--logo start-->
      <a href="#" class="logo"><b>VG DashBoard</b></a>
      <!--logo end-->
     
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
              <li><a class="logout" href="{{ url('logout', []) }}">Logout</a></li>
        </ul>
      </div>
  </header>
<!--header end-->

<!-- **********************************************************************************************************************************************************
MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
  
              <h5 class="centered">Selamat Datang</h5>
              
            <li class="mt">
                <a  href="{{ url('/', []) }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{ url('pembelian', []) }}" >
                    <i class="fa fa-cogs"></i>
                    <span>Pembelian</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{ url('penjualan', []) }}" >
                    <i class="fa fa-book"></i>
                    <span>Penjualan</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{ url('product', []) }}" >
                    <i class="fa fa-tasks"></i>
                    <span>Product</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{ url('logout', []) }}" >
                    <i class="fa fa-th"></i>
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
        @yield('main')
    

        
        <hr>
    @yield('footer')



</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
      $(document).ready(function() {
        $('#table').DataTable();
      });
    </script>
</html>