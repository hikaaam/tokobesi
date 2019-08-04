@extends('atemplate')
@section('head')
	<link rel="stylesheet" href="{{ asset('public/assets/css/post.css') }}">
	<link rel="stylesheet" href="{{ asset('public/assets/css/main.css') }}">
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
                                       <h2> <a href="{{ url('admin-vg/post/create', []) }}">Create New Article</a></h2>
										<hr>	
									</div>
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
			
		@foreach ($post as $item)		
				<!-- post -->
				<div class="col-md-4">
					<div class="post">
						<a class="post-img" href="{{ url('admin-vg/post/'.$item->id.'/edit') }}"><img style="width:300px;height:300px;" src=" {{ asset('private/images/artikel').'/'.$item->foto }} " alt=""></a>
						<div class="post-body">
							<div class="post-meta">
							<a class="post-category cat-2" href="{{ url('admin-vg/post/'.$item->id.'/edit') }} ">{{$item->kategori}}</a>
							<span class="post-date">{{$item->created_at->format('M d, Y')}}</span>
							</div>
                        <h3 class="post-title"><a href="{{ url('admin-vg/post/'.$item->id.'/edit') }}">{{strtoupper($item->judul)}}</a><br>
                        <a onclick="return confirm('Are you sure?')" style="color:red" href="{{ url('admin-vg/post', [$item->id]) }}">( Delete <i class="fa fa-times"></i> )</a></h3>
						</div>
					</div>
				</div>
				<!-- /post -->	
		@endforeach
			</div><!-- /row -->
<br>
{{ $post->links() }}
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
	<script src="public/assets_admin/js/fancybox/jquery.fancybox.js"></script>    
    <script src="public/assets_admin/js/bootstrap.min.js"></script>
    
    


    <!--common script for all pages-->
    <script src="public/assets_admin/js/common-scripts.js"></script>

    <!--script for this page-->
  
  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
  

    
@endsection