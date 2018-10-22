@extends('layout.main')
@section('title')
{{$scategory->name}}|
 فروشگاه اینترنتی محلی‌جات
@endsection

@section('style')
<style>
.subcat{
	 text-indent: -4px;
	margin-right:45px;text-decoration:none; list-style-type: none;
}
	.subcat:hover, .subcat:focus {
    text-decoration: none;
    background-color: #eee;
}
.shop-banner {
    position: relative; 
    /*max-width: 800px; */
    margin: 0 auto; /* Center it */
}

.shop-banner .content {
    position: absolute; /* Position the background text */
    bottom: 0; /* At the bottom. Use top:0 to append it to the top */
    background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
    color: #f1f1f1; /* Grey text */
    width: 100%; /* Full width */
    padding: 20px; /* Some padding */
    display:none;
    
}
.shop-banner .content h3{
	color:white;
}
.shop-banner img{
border: solid lightgray 1px	
}
@media screen and (max-width: 1200px) {
    .content p {
        display:none;
        
    }
    .content h3 {
        font-size: 120%;
    }
}
</style>
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
		  <div class="breadcrumbs-area log">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="{{route('home')}}">
								    خانه
								 <span></span></a></li>
								 <li><a href="{{route('shop')}}">
								    فروشگاه
								 <span>&lt;</span></a></li>
								<li><a href="{{route('category.show',$scategory->slug)}}">
								{{$scategory->name}}
								<span>&lt;</span></a></li>
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		 </div>
    <div class="shop-product-area">
		<div class="container">
			<div class="row" style="direction:rtl">
				<div class="left-sidebar-title">
					<h1>
					    
					   {{$scategory->name}}
					</h1>
				</div>
				<?php $maincat1=$scategory ?>
				@include('includes.side-nav')
				
				@include('includes.products')
				
				
			</div>
		</div>
	 </div> 
		 

		 <!-- cart-page-end -->
		<!-- Single Description Tab -->
		
		<!-- End Single Description Tab -->
		<!--brands-area start-->
		<div style="min-height:20px;"></div>
		@include('includes.footer')
		<!--footer end-->
		
	

		@foreach($products as $product)

				 @include('includes.product-modal')
		@endforeach

@endsection

@section('js')
<script>
$(document).ready(function () {


    var tmpImg = new Image() ;
    tmpImg.src = $('.img-banner').attr('src') ;
    tmpImg.onload = function() {
        $('.content').show();
    } ;

});
</script>

@endsection