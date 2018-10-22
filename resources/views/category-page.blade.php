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

.breadcrumbs-menu ul li a span{
    font-family: IranSans;
    color: #3f3f3f;
    font-size: 15px;
}
.breadcrumbs-menu ul li a span:hover {
    color: #952A44;
    font-weight: 700;
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
							<ul itemscope itemtype="http://schema.org/BreadcrumbList">
								<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" ><a itemtype="http://schema.org/Thing"
       itemprop="item" href="{{route('home')}}">
								    
								 <span itemprop="name">خانه</span></a>
								 <meta itemprop="position" content="1" />
								 </li>
								 <li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><a itemtype="http://schema.org/Thing"
       itemprop="item" href="{{route('shop')}}">
								    <span itemprop="name">
								        فروشگاه
								    </span>
								    <meta itemprop="position" content="2" />
								 <span>&lt;</span></a></li>
								 <?php $i=2; ?>
								 @foreach($scategory->ancestors->reverse() as $node)
									 <?php $i++; ?>
									 <li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><a itemtype="http://schema.org/Thing"
       itemprop="item" href="{{route('category.show',$node->slug)}}">
									<span itemprop="name">{{$node->name}}</span>
									<meta itemprop="position" content="{{$i}}" />
									<span>&lt;</span></a></li>
								 
								 @endforeach
								 <li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><a itemtype="http://schema.org/Thing"
       itemprop="item" href="{{route('category.show',$scategory->slug)}}">
								<span itemprop="name">{{$scategory->name}}</span>
								<meta itemprop="position" content="{{$i+1}}" />
								<span>&lt;</span></a></li>
									
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		 </div>
		 <!-- cart-page-start -->
		<div class="container" style="direction:rtl">
    	@include('includes.messages')	
    </div>
    <div class="shop-product-area">
		<div class="container">
			<div class="row" style="direction:rtl">
				<div class="left-sidebar-title">
					<h1>
					    
					   {{$scategory->name}}
					</h1>
				</div>
				<?php $subcat1=$scategory ?>
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
<!-- quickview product -->
         @include('includes.product-modal')
        <!-- END quickview product -->
        @endforeach		



@endsection