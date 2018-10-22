@extends('layout.main')

@section('title')
        فروشگاه اینترنتی محلی جات- بستر فروش محصولات محلی، ارگانیک و صنایع دستی محلیجات
@endsection

@section('style')
<link rel="stylesheet" href="/css/invoice.css" type="text/css" />
<style>
th{
	text-align: right;
}
</style>
<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection


@section('content')

<?php $customer=Auth::guard('customer')->user(); ?>
    
    @include('includes.header')
    
    <div class="container" style="direction:rtl">
    	@include('includes.messages')	
    </div>
    <div class="shop-product-area">
			<div class="container">
				<div class="row" style="direction:rtl">
					<div class="col-sm-3 col-sm-push-9">
						<div class="left-sidebar">
							<div class="left-sidebar-title">
								<h3>
								    
								   پنل کاربری
								</h3>
							</div>
							
							<!--<div class="single-sidebar"  data-spy="affix" data-offset-top="305" data-offset-bottom="505">-->
							<div class="single-sidebar" style="">
								<nav class="navbar navbar-default" role="navigation">
								<div class="navbar-header">
                                  <button class="navbar-toggle " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                                     <span class="sr-only">
                                        نمایش
                                        </span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>   
                                    
                                  </button>
                                  
                                </div>
                                 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-top:20px;padding-bottom:20px;">
    								<ul class="nav nav-pills nav-stacked">
    									<li class="category-select {{strpos($_SERVER['REQUEST_URI'],'profile')?'active':'' }}" ><a href="{{ route('customer.panel')}}" style="width:100%" >
    									مشخصات
    									</a></li>
    									<li class="category-select {{strpos($_SERVER['REQUEST_URI'],'order')?'active':'' }}" ><a href="{{ route('customer.orders')}}" style="width:100%" >
    									خریدهای پیشین
    									</a></li>
    									<li class="category-select {{strpos($_SERVER['REQUEST_URI'],'addresses')?'active':'' }}" ><a href="{{ route('customer.addresses')}}" style="width:100%" >
    									آدرس ها
    									</a></li>
    									<li class="category-select {{strpos($_SERVER['REQUEST_URI'],'favorites')?'active':'' }}" ><a href="{{ route('customer.favorites')}}" style="width:100%" >
    									محصولات مورد علاقه
    									</a></li>
    								
    								</ul>
    							</div>
    							</nav>
							</div>
					
						</div>
					</div>
					<div class="col-sm-9 col-sm-pull-3" style="padding-bottom:150px;padding-top:30px">
					    
					    <div class="posts" >
					    	@if(strpos($_SERVER['REQUEST_URI'],'profile'))
					         @include('includes.customer.info')
					        @elseif(strpos($_SERVER['REQUEST_URI'],'favorites'))
					         @include('includes.customer.favorites')
					        @elseif(strpos($_SERVER['REQUEST_URI'],'orders'))
					         @include('includes.customer.orders')
					        @elseif(strpos($_SERVER['REQUEST_URI'],'order'))
					         @include('includes.customer.orders-show')
					        @elseif(strpos($_SERVER['REQUEST_URI'],'addresses'))
					         @include('includes.customer.addresses')
					        @endif
					    </div>
					</div>
					
					
				</div>
			</div>
		 </div>
		 <!-- shop-page-end -->


	@include('includes.footer')
	<!--footer end-->
	
	


@endsection

@section('js')
<script src="/js/jquery.PrintArea.js"></script>
<script>
$(document).ready(function(){
    $("#printButton").click(function(){
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = { mode : mode, popClose : close};
        $("div.printableArea").printArea( options );
    });
});
</script>

@endsection