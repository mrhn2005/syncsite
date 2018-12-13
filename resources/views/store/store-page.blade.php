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
.tab-content{
    direction:rtl;
}

.no-product{
    font-size:160%;font-weight:bold;padding:50px 0;direction:rtl;
}
.product-name h1 {
    color: #8ba462;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 0;
    margin-top: 15px;
    padding-bottom: 10px;
    text-transform: uppercase;
}

.sin-pro-tab li a {

    font-size: 16px;

}

.product-spec {
    display: block;
    background: #fafafa;
    padding: 14px 18px 12px;
    /*font-size: 13px;*/
    /*font-size: .929rem;*/
    line-height: 1.692;
    color: #4d4d4d;
    letter-spacing: -.3px;
    min-height: 47px;
    position: relative;
}
@media only screen and (max-width: 992px){
	
	.spec-mobile{
		background: #cdcdcd !important;
	}
}

.sin-pro-tab li a {
    font-size: 22px;
    padding: 20px;
    min-width: 200px;
    text-align: right;
    direction: rtl;
}
.section-title {
     background: none; 
    margin: 0px;
    padding: 0px;
    text-align: center;
}
.single-product-page-area{
    margin-bottom:0px;
}

.owl-wrapper-outer {
    margin-bottom:-40px;
}

blockquote {
    background-color:#F7F7F7;
    border-right: 5px solid #F55035;
    border-left: 0px;
    font-family: 'BYekan';
    font-size: 17px !important;
}
.sin-product-shot-desc a{
   color:#90133B;
   font-size:110% !important;
}

.sin-product-shot-desc p{
   line-height:36px;
}

.sin-product-shot-desc p strong{
   line-height:60px;
}
/*blockquote a{*/
/*    font-size:110% !important;*/
/*}*/

blockquote strong{
    color:#F55035;
}
.sin-pro-tab li.active a{
    color: #90133B;
    /*border-bottom: 1px solid #90133B;*/
    /*border-right: none;*/
}
@media only screen and (max-width: 767px){
    .sin-pro-tab li {
        border-bottom: 1px solid #e1e1e1; ;
        /*border-top: 1px solid ;*/
        width: 100%;
        margin-bottom: 8px;
    }
    .sin-pro-tab li:last-child{
        margin-bottom: 0;
    }
    .sin-pro-tab li a:before{
        border: none;
    }
    .sin-pro-tab li.active a{
        border-bottom: 2px solid #90133B;
    }
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
							<ul>
								<li><a href="{{route('home')}}">
								    خانه
								 <span></span></a></li>
								 <li><a href="{{route('vendors')}}">
								   حجره‌ها
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
			    	
					@include('store.page.store-desc')
				
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
							    <li class="active"><a href="#products" data-toggle="tab" style="direction:rtl">
									<i class="fa fa-list" style="font-weight:bold"></i>&nbsp;
									محصولات
								</a></li>
								<li class=""><a href="#product-des" data-toggle="tab" style="direction:rtl">
									<i class="fa fa-file-text-o" style="font-weight:bold"></i>&nbsp;
									داستان زندگی حجره دار
								</a></li>
								<li><a href="#product-review" data-toggle="tab" style="direction:rtl">
										<i class="fa fa-comments" style="font-weight:bold"></i>&nbsp;
								نظرات کاربران
								</a></li>
								<!--<li><a href="single-product.html#product-rev" data-toggle="tab">Reviews</a></li>-->
								<!--<li><a href="single-product.html#product-tag" data-toggle="tab">Product Tags</a></li>-->
							</ul>
							<!-- Tab Content -->
							<div class="tab-content">
							    <div class="tab-pane active" id="products">
								    <div class="container">
                    
                                        <div class="row">
                                            
                                            <div class="section-title">
                                                <h2 class="questo">
                                                    محصولات حجره 
                                                    
                                                </h2>
                                            </div>
                                        </div>
                    
                                        <div class="row" style="margin:10px">
                                         <!--Tab panes -->
                                            <div class="">
                    
                                                @include('store.page.side-nav')
                                                @include('includes.products')
                                                @if(count($store->products)<1)
                                                
                                                <div class="text-center no-product" >
                                                    <p>
                                                        هنوز محصولی اضافه نشده است.
                                                    </p>
                                                </div>
                                                    
                                                @endif
                                            </div>
                      
                                        </div>
                                    </div>
                                
							    </div>
								<div class="tab-pane" id="product-des">
								    <div class="sin-product-shot-desc" style="font-family:'IranSans','BYekan';direction:rtl;font-size:100%;text-align:justify;line-height:34px;">
						                {{$store->history}}
						            </div>
								</div>
								<div class="tab-pane" id="product-review">
								    @include('store.page.reviews')
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
<script>
    
$(".single-carousel55").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:true,
        navigation:false,	  
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [980,3],
        itemsTablet: [768,2],
        itemsMobile : [479,1],
    });
</script>


@endsection