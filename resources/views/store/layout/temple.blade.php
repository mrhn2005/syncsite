@extends('layout.main')

@section('title')
        فروشگاه اینترنتی محلی جات- بستر فروش محصولات محلی، ارگانیک و صنایع دستی محلیجات
@endsection




@section('content')


    
    @include('store.header')
    
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
    									<li class="category-select {{strpos($_SERVER['REQUEST_URI'],'home')?'active':'' }}" ><a href="{{ route('store.home')}}" style="width:100%" >
    									مشخصات  حجره
    									</a></li>
    									<li class="category-select {{strpos($_SERVER['REQUEST_URI'],'products')?'active':'' }}" ><a href="{{ route('store.products')}}" style="width:100%" >
    										محصولات شما
    									</a></li>
    									<li class="category-select {{strpos($_SERVER['REQUEST_URI'],'notification')?'active':'' }}" ><a href="{{ route('store.notifications.show')}}" style="width:100%" >
    									پیام ها
    									<?php $count=count(Auth::guard('store')->user()->unreadNotifications->where('type','App\Notifications\StoreNotification')); ?>
    									@if($count>0)
    									<span style="background-color:lightgreen" class="badge">{{$count}}</span>
    									@endif
    									</a></li>
    									<li class="category-select" ><a href="{{ route('store.page',Auth::guard('store')->user()->slug)}}" style="width:100%" >
    									حجره شما
    									</a></li>
    								
    								</ul>
    							</div>
    							</nav>
							</div>
					
						</div>
					</div>
					<div class="col-sm-9 col-sm-pull-3" style="padding-bottom:150px;padding-top:30px">
					    
					    <div class="posts" >
					    
					    	@yield('store-content')
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