@extends('layout.main')

@section('metadesc')
<?php $value = str_limit(strip_tags($store->description), 350);
$value=str_replace('&zwnj;',' ',$value)
?>
    <meta name="description" content="{{$value}}">
    <meta property="og:title" content="{{$store->name}}" />
	<meta property="og:type" content="store" />
	<meta property="og:url" content="{{Request::url()}}" />
	<meta property="og:site_name" content="{{$store->name}}" />
	<meta property="og:image" content="{{$store->photo ? URL::to('/').$store->photo : 'http://placehold.it/400x400' }}" />
@endsection

@section('title')
حجره
{{$store->name}} | 
 فروشگاه اینترنتی محلی‌جات
@endsection



@section('style')
<style>
.product-name h1 {
    color: #8ba462;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 0;
    margin-top: 15px;
    padding-bottom: 10px;
    text-transform: uppercase;
}
</style>
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
								
								<li><a href="{{route('store.page',$store->slug)}}">
								{{$store->name}}
								<span>&lt;</span></a></li>
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		 </div>
		 <!-- cart-page-start -->
		 
		<div class="single-product-page-area" >
		    
			<div class="container">
			    <div class="product-name " style="margin-right:20px;text-align:right;margin-bottom:20px;font-size: 39px!important;">
                            <h1 style="font-size: 39px!important;">
                            	حجره: 
                            	{{$store->name}}
                            </h1>
                        </div>	
					
				
			</div>
		</div>
		 <!-- cart-page-end -->
		<!-- Single Description Tab -->
		<div class="single-product-description">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					    
						<div class="product-description-tab custom-tab">
							<!-- tab bar -->
							<ul class="sin-pro-tab" role="tablist">
								<li class="active"><a href="#" data-toggle="tab">
								نظرات کاربران
								</a></li>
								<!--<li><a href="single-product.html#product-rev" data-toggle="tab">Reviews</a></li>-->
								<!--<li><a href="single-product.html#product-tag" data-toggle="tab">Product Tags</a></li>-->
							</ul>
							<!-- Tab Content -->
							<div class="tab-content">
								<div class="tab-pane active" id="product-des">
								    @include('includes.reviews')
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Single Description Tab -->
		<!--brands-area start-->
		@include('includes.footer')
		<!--footer end-->
		
		


@endsection


@section('js')


@endsection