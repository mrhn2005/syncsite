@extends('layout.main')
@section('title')
نتایج جستجو|
 فروشگاه اینترنتی محلی‌جات
@endsection

@section('style')

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
						    
						    نتایج جستجو ...
						</h3>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container" style="padding-bottom: 100px;">
			<div class="row">
				@if(count($results)>0)
					@foreach($results as $product)
						<div class="col-sm-3">
							@include('includes.single-product')
						</div>
					
					@endforeach
				@else
				  <p style="text-align:center;direction:rtl;line-height:40px; font-size:150%">
				  	متاسفانه محصول مورد نظر در فروشگاه موجود نمی باشد.
				  	<br>
				  	<a style="color:#952A44" href="{{route('mahalikhah.create')}}">
				  		برای سفارش این محصول کلیک کنید.
				  	</a>
				  </p>
				@endif
			</div>
		</div>
		 <!-- cart-page-end -->
		<!-- Single Description Tab -->
		
		<!-- End Single Description Tab -->
		<!--brands-area start-->
		<div style="min-height:20px;"></div>
		@include('includes.footer')
		<!--footer end-->
		
		@foreach($results as $product)    
<!-- quickview product -->
         @include('includes.product-modal')
        <!-- END quickview product -->
        @endforeach		



@endsection