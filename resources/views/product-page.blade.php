@extends('layout.main')

@section('metadesc')
<?php $value = str_limit(strip_tags($product->desc), 350);
$value=str_replace('&zwnj;',' ',$value)
?>
    <meta name="description" content="{{$value}}">
    <meta property="og:title" content="{{$product->name}}" />
	<meta property="og:type" content="product" />
	<meta property="og:url" content="{{Request::url()}}" />
	<meta property="og:site_name" content="{{$product->name}}" />
	<meta property="og:image" content="{{$product->photo ? URL::to('/').'/photos/'.$product->photo->name : 'http://placehold.it/400x400' }}" />
@endsection

@section('title')
{{$product->name}} | 
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
								 @foreach($product->category->ancestors as $node)
									 <li><a href="{{route('category.show',$node->slug)}}">
									{{$node->name}}
									<span>&lt;</span></a></li>
								 
								 @endforeach
								
								<li><a href="{{route('category.show',$product->category->slug)}}">
								{{$product->category->name}}
								<span>&lt;</span></a></li>
								<li><a href="{{route('product.show',$product->slug)}}">
								{{$product->name}}
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
                            <h1 style="font-size: 39px!important;">{{$product->name}}</h1>
                        </div>	
					@include('includes.product-desc')
				
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
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "{{$product->name}}",
  "image": [
  	@foreach($product->images as $photo)
  	@if ($loop->last)
    "https://mahalijat.com{{$photo ? '/photos/'.$photo->name : 'http://placehold.it/400x400' }}"
    @else
    "https://mahalijat.com{{$photo ? '/photos/'.$photo->name : 'http://placehold.it/400x400' }}",
    @endif
    @endforeach
   ],
  "description": "{{$value}}",
   "offers": {
    "@type": "Offer",
    "priceCurrency": "IRR",
    "price": "{{$product->price_sell*10}}",
    @if($product->quantity>0)
    "availability": "http://schema.org/InStock"
    @else
    "availability": "http://schema.org/OutOfStock"
    @endif
  },
  @if($product->reviews->count()>0)
  "brand": {
    "@type": "Thing",
    "name": "محلی‌جات"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "{{$product->stars()/20}}",
    "reviewCount": "{{$product->reviews->count()}}"
  }
  @else
  "brand": {
    "@type": "Thing",
    "name": "محلی‌جات"
  }
  @endif
  
}
</script>

@endsection