@extends('layout.main')

@section('metadesc')
    <meta name="description" content="بستر فروش اینترنتی محصولات محلی، روستایی، ارگانیک، طبیعی و سالم و صنایع دستی بدون واسطه مستقیم از تولیدکننده و کشاورز">
@endsection


@section('title')
        فروشگاه اینترنتی محلی جات- بستر فروش محصولات محلی، ارگانیک و صنایع دستی محلیجات
@endsection

@section('style')
<style>
/*@media(min-width:767px){*/
/*    .affix {*/
/*        width:19.5%;*/
/*      top: 20px;*/
/*      z-index: 9999 !important;*/
/*      position:fixed!important;*/
/*  }*/
/*}*/
/*@media(max-width:767px){*/
/*   .affix {*/
/*     position: relative;*/
/*     width: auto;*/
/*     top: 0;*/
/*    }*/
/*}*/
/*  .affix-bottom {*/
      /*width:102.5%;*/
/*  }*/
</style>
<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection


@section('content')


    
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
								<h1>
								    
								    فروشگاه
								</h1>
							</div>
							
							<!--<div class="single-sidebar"  data-spy="affix" data-offset-top="305" data-offset-bottom="505">-->
							<div class="single-sidebar">
								<h3 class="single-sidebar-title" style="font-size:160%">
								دسته بندی محصولات
								</h3>
								<nav class="navbar navbar-default">
								<div class="navbar-header">
                                  <button class="navbar-toggle " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                                     <span class="sr-only">
                                        نمایش دسته بندی ها 
                                        </span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>   
                                    
                                  </button>
                                  
                                </div>
                                 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-top:20px;padding-bottom:20px">
    								<ul class="nav nav-pills nav-stacked">
    									<li class="category-select active " ><a href="#" style="width:100%" >
    									همه محصولات
    									</a></li>
    									@foreach($categories as $maincat)
    									@if(count($maincat->children)>0)
    									<li  id="{{$maincat->id}}" data-category-image="{{$maincat->photo}}" ><a style="width:100%" href="#" >
    									    {{$maincat->name}} <i class="fa fa-chevron-down floatleft" style="margin-top:10px" aria-hidden="true"></i>
    									        
    									    </a>
    									     <ul class="sub-menu1" style="display:none">
    									         @foreach ($maincat->children as $category)
    									
                									<li style="margin-right:35px;text-decoration:none; list-style-type: circle;" class="category-select" data-id="{{$category->id}}" data-category-image="{{$category->photo}}" ><a style="width:100%;text-decoration: none !important;" href="#" data-pageAccelerator="false">
                									   {{$category->name}}
                									    </a></li>
            									@endforeach
    									         
    									       </ul>
    									 </li>
    									 @endif
    									@endforeach
    								</ul>
    							</div>
    							</nav>
							</div>
					
						</div>
					</div>
					<div class="col-sm-9 col-sm-pull-3">
					    <div class="shop-banner">
                            <img style="border: solid lightgray 1px" src="/photos/1515659454all.1.jpg" alt="">
                        </div>
					    <div class="posts" id="containerDiv">
					         @include('includes.shop')
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
<script>
// $('.pages a').click(function() {
     $(window).on('hashchange', function() {
        if (window.location.hash) {
            // console.log(window.location.hash);
            var page = window.location.hash.replace('?', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                console.log(page);
                if($.isNumeric(page)){
                getPosts(page);
                }
                
            }
        }
    });
// });

 $('.category-select').click(function(e){
      e.preventDefault();
        $.ajax({
          url: "{{route('shop')}}",
          method: 'get',
          data:{
            category_id: $(this).attr('data-id'),
            _token: "{{csrf_token()}}"
          },
          context: this,
          success: function(response){
          	// console.log(response);
          	var src=$(this).attr('data-category-image');
          	if(typeof src != 'undefined'){
          	    
          	    $('.shop-banner img').attr("src","/photos/"+src);}
          	else{
          	    
          	 $('.shop-banner img').attr("src","/photos/1515659454all.1.jpg");   
          	}
        //   	$('.shop-banner img').attr("src","/photos/"+src);
          	$('.category-select').removeClass('active');
          	$(this).addClass('active');
            $('.posts').html(response);  
            $(".pro-img-tab-slider").owlCarousel({
                items : 4,
                itemsDesktop : [1199,4],
                itemsDesktopSmall : [768,4],
                itemsTablet: [767,3],
                itemsMobile : [479,2],
                slideSpeed : 1500,
                paginationSpeed : 1500,
                rewindSpeed : 1500,
                navigation : true,
                navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                pagination : false,
                addClassActive: true,
            });
          },
          error: function(xhr){
        //   	console.log(xhr);
          }
        });
    });


   
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            
            getPosts($(this).attr('href').split('page=')[1]);
            
            e.preventDefault();
          document.getElementById('containerDiv').scrollIntoView({
    block: "start",
    behavior: "smooth"
});
            // $("#containerDiv").scrollIntoView();
        });
    });
    function getPosts(page) {
        console.log(page);
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
        }).done(function (data) {
            
            // console.log(data);
            $('.posts').html(data);
            location.hash = page;
             
        }).fail(function (er) {
            // console.log(er);
            $('.posts').html(er.responseText);
            // alert('Posts could not be loaded.');
        });
    }
    $( document ).ajaxStop(function() {
    
    $('.simpleLens-big-image').simpleLens({
    loading_image: 'demo/images/loading.gif'
    });
    $('.modal').on('hidden.bs.modal', function () {
           if ($(window).width() > 768) {
           $('.header-inner').css("padding-right","0px");
          $('body').css("padding-right","0px");
          $('body').css('overflow','auto');
           }
          var hash = this.id;
	        history.pushState('', document.title, window.location.pathname);
        });
        
        $('.modal').on('show.bs.modal', function () {
           if ($(window).width() > 768) { 
          $('body').css("padding-right","17px");
          $('.header-inner').css("padding-right","17px");
          $('body').css('overflow','hidden');
           }
          var modal = this;
        	var hash = modal.id;
        	window.location.hash = hash;
        	window.onhashchange = function() {
        		if (!location.hash){
        			$(modal).modal('hide');
        		}
        	}
        });
     $(".pro-img-tab-slider").owlCarousel({
        items : 2,
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [768,2],
        itemsTablet: [767,2],
        itemsMobile : [479,2],
        slideSpeed : 1500,
        paginationSpeed : 1500,
        rewindSpeed : 1500,
        navigation : true,
        navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        pagination : false,
        addClassActive: true,
    });
});
// $('.sub-menu1').hide();

$("li:has(ul) > a").click(function(e){
$(this).find("i").toggleClass('fa-chevron-down');
$(this).find("i").toggleClass('fa-chevron-up');
e.preventDefault();
$(this).next("ul").toggle('slow');
});
    </script>

@endsection