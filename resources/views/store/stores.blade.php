@extends('layout.main')
@section('title')
حجره ها |
 فروشگاه اینترنتی محلی‌جات
@endsection

@section('style')
<style>
	body {
  /*background: #f2f2f2;*/
  font-family: 'proxima-nova-soft', sans-serif;
  font-size: 14px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

</style>
<link rel="stylesheet" href="css/vendor.css">
<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection


@section('content')


        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<!-- header start -->
		
    <!-- header end -->
    @include('includes.header')
		 <!-- breadcrumbs-area-area start -->
		 
		 <!-- cart-page-start -->
		 
		<div class="single-product-page-area" >
		    
			<div class="container">
				<div class="left-sidebar">
					<div class="left-sidebar-title">
						<h3 style="text-align:right; font-size:200%;direction:rtl">
						    
						    حجره‌ها
						</h3>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container" style="padding-bottom: 100px;">
			<div class="row">
			    @foreach($vendors as $vendor)
			        <div class="col-md-4 col-sm-6">
				    @include('store.single-store')
				    </div>
				@endforeach
			     
			</div>
			<div class="pages">
                {{ $vendors->links() }}
            </div>
		</div>
		 <!-- cart-page-end -->
		<!-- Single Description Tab -->
		
		<!-- End Single Description Tab -->
		<!--brands-area start-->
		<div style="min-height:20px;"></div>
		@include('includes.footer')
		<!--footer end-->
	



@endsection
@section('js')
<script>
	$(window).load(function() {
  $('.post-module').hover(function() {
    $(this).find('.description').stop().animate({
      height: "toggle",
      opacity: "toggle"
    }, 300);
  });
});
</script>
@endsection