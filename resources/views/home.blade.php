@extends('layout.main')

@section('metadesc')
    <meta name="description" content="بستر فروش اینترنتی محصولات محلی، روستایی، ارگانیک، طبیعی و سالم و صنایع دستی بدون واسطه مستقیم از تولیدکننده و کشاورز">
    <meta property="og:title" content="  فروشگاه اینترنتی محلی جات- بستر فروش محصولات محلی، ارگانیک و صنایع دستی "/>
        	<meta property="og:type" content="website" />
        	<meta property="og:url" content="{{Request::url()}}" />
        	<meta property="og:site_name" content="  فروشگاه اینترنتی محلی جات- بستر فروش محصولات محلی، ارگانیک و صنایع دستی "/>
        	<meta property="og:image" content="{{URL::to('/').'/img/logo/mahalijat.png' }}" />
@endsection


@section('title')
        فروشگاه اینترنتی محلی جات- بستر فروش محصولات محلی، ارگانیک و صنایع دستی محلیجات
@endsection

@section('style')
    <style>
    
    .modal-header1 p {
    background-color: #5cb85c !important;
    color: white !important;
    text-align: center;
    font-size: 30px;
}
.modal-header1{
    margin-bottom:30px;
}
         .h2tag{
        padding-bottom:60px;font-weight:bold;color:#7E5738;font-size: 36px;
        }
        .services-left h2 {
    color: #57b652;
    font-size: 48px;
    font-weight: 700;
    letter-spacing: -2px;
    line-height: 36px;
    margin-bottom: 25px;
    padding: 10px 0;
    text-transform: capitalize;
}

.services-left span {
    display: block;
    color: #f37022;
    font-size: 26px;
    font-weight: 700;
    line-height: 36px;
    margin: 0;
    text-transform: uppercase;
}
.services-right .box h3 {
    color: #57b652;
    font-size: 17px;
    font-weight: 700;
    line-height: 26px;
    margin-bottom: 2px;
}
#contdown-timer span{
    font-size:20px;
}
@if($isbanner==1)
    .carousel-control.right , .carousel-control.left{
        background-image: none;
    }
.carousel-inner>.item {
     border: none; 
     margin-right: 0px; 
     margin-top: 0px; 
}
    @media screen and (min-width: 768px){
.carousel-control .fa-chevron-right, .carousel-control .icon-next {
    margin-right: -10px;
}}
@media screen and (min-width: 768px){
.carousel-control .fa-chevron-left, .carousel-control .fa-chevron-right, .carousel-control .icon-next, .carousel-control .icon-prev {
    width: 30px;
    height: 30px;
    margin-top: -10px;
    font-size: 30px;
}}

.carousel-control .fa-chevron-right, .carousel-control .icon-next {
    right: 50%;
    margin-right: -10px;
}
.carousel-control .fa-chevron-left, .carousel-control .fa-chevron-right, .carousel-control .icon-next, .carousel-control .icon-prev {
    position: absolute;
    top: 50%;
    z-index: 5;
    display: inline-block;
    margin-top: -10px;
}

@endif

</style>
<link rel="stylesheet" href="css/vendor.css">
@endsection

@section('content')
@if(!$isbanner)
<div class="bg" style="z-index:2000"></div>
@endif
<!-- home-page-3 start -->
    
        <!-- header start -->
       @if($isbanner==1)
        @include('includes.banner')
        <div class="home-page-3">
       @else
       <div class="home-page-3">
         @include('includes.top-nav')
       @endif
        <!-- header end -->
        <!--slider-area start-->
        
       
        <!--slider-area end-->
        <div class="products-area-3">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2 class="questo">
                            محصولات حجره‌ها
                        </h2>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div>
                            <div >
                                
                                
                                <!-- Nav tabs -->
                                <ul class="product-tab-menu" style="direction:rtl;">
                                    <li class="main-category-select active" data-maincat="-1" >
                                        <a style="text-decoration:none;font-size:130%" href="#" >
                                            @if($mahalije)
                                            محلیژه
                                            @else
                                            جدیدترین محصولات
                                            @endif
                                        </a>
                                      </li>
                                    <!--<li class="main-category-select" maincat="0"  class="questo">-->
                                    <!--    <a style="text-decoration:none" href="#" >-->
                                    <!--        همه محصولات-->
                                    <!--        </a>-->
                                    <!--  </li>-->
                                   
                                    @foreach($categories as $maincat)
                                    <li class="main-category-select" data-maincat="{{$maincat->id}}" ><a  style="text-decoration:none;font-size:130%" href="#">{{$maincat->name}}</a></li>
                                    @endforeach
                
    
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="row text-center">
                    <p id="demo" style="font-size:130%; line-height:2;padding:2px;">
                        @if($mahalije)
                        <!--<span style="text-align:right">-->
                        <!-- زمان باقیمانده تا محلیژه: &nbsp;-->
                        <!-- </span>-->
                        <!-- <div id="demo" class="countdown-box " style="margin-top:-10px;margin-down:-10px">-->
                        <!--    <div id="contdown-timer" style="max-width:300px;margin:auto;" data-countdown="2018/10/2"></div>-->
                        <!--</div>-->
                        <!--<span id="timer" style="font-size:130%;background-color:gray;color:white;padding-left:10px;padding-right:10px;font-weight:bold">-->
                            
                        <!--</span>-->
                        @endif
                    </p>
                </div>
                <div class="posts1">
                @include('includes.maincat')
                </div>
                 
            </div>
            
                <div class="text-center">
                    @include('includes.instagram')
                </div>
                
            
        </div>
        
        <div id="howBuy" class="discount-area margin-top-60" style="background: url('pat8.png') repeat;color:white">
            <div class="container" style="text-align:center;direction:rtl;padding:70px 0 70px 0;font-size:110%" >
                <div class="row" id="info">
                    <div class="col-md-12 text-center">
                        <h2 class="questo h2tag" >
                        چگونه از محلی جات خرید کنم؟
                        </h2>
                    </div>
                    <div class="col-sm-3 col-sm-push-9" >
                        <div class="icon-wrapper"><a href="{{route('shop')}}">
                            <i class="fa fa-shopping-basket custom-icon">
                            <span class="fix-editor">&nbsp;</span>
                            </i>
                            </a>
                        </div>
                        <div class="howtobuy">
                           محصولات دلخواه خود را از 
                           <a href="{{route('shop')}}">
                           فروشگاه 
                           </a>
                             پیدا کرده و به سبد خرید خود اضافه کنید
                           
                        </div>
                    </div>
                    
                    <div class="col-sm-3 col-sm-push-3" >
                        <div class="icon-wrapper"><a href="{{route('contact')}}">
                            <i class="fa fa-phone custom-icon">
                            <span class="fix-editor">&nbsp;</span>
                            </i>
                            </a>
                        </div>
                        <div class="howtobuy">
                           سفارش خود را از طریق
                           <a href="{{route('shop')}}">
                           سایت
                           </a>
                           ،
                           &nbsp;
                           <a href="https://t.me/mahalijat_co" target="_blank">
                           تلگرام
                           </a>
                            یا تماس تلفنی ثبت نمایید.
                            
                           
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-pull-3" >
                        <div class="icon-wrapper">
                            <!--<a href="{{route('cart')}}">-->
                            <i class="fa fa-money custom-icon">
                            <span class="fix-editor">&nbsp;</span>
                            </i>
                            <!--</a>-->
                        </div>
                        <div class="howtobuy">
                           می‌توانید هزینه خریدتان را به صورت آنلاین یا در محل به صورت نقدی و یا استفاده از دستگاه کارت خوان پرداخت نمایید.
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-pull-9" >
                        <div class="icon-wrapper">
                            <!--<a href="{{route('shop')}}">-->
                            <i class="fa fa-motorcycle custom-icon">
                            <span class="fix-editor">&nbsp;</span>
                            </i>
                            <!--</a>-->
                        </div>
                        <div class="howtobuy">
                          محصولات خریداری شده، در اسرع وقت درب منزل شما تحویل داده می‌شود.
                           
                        </div>
                    </div>
                    
                </div>
            </div>
            <!--<div class="single-banner">-->
            <!--    <a href="{{route('shop')}}"><img src="img/banners/salim-4.jpg" alt="" /></a>-->
            <!--</div>-->
        </div>
        
        
    <div class="products-area-3">
            <div class="container">
                <div class="row">
                    
                    <div class="section-title">
                        <h2 class="questo">
                            حجره‌های برگزیده
                        </h2>
                    </div>
                </div>
                
                <div class="row" style="margin:10px">
                     <!--Tab panes -->
                    <div class="tab-content">

                            <div class="row">
                                
                                @foreach($vendors as $vendor)
                                    
                                    
                                    <!-- single-product start-->
                                        <div class="col-md-4 col-sm-6">
                                         @include('store.single-store')
                                    
                                         </div>
                                @endforeach
                                        
                            </div>
 
                    </div>
                    <div class="text-center" style="margin-bottom:40px;">
                        <div class="buttons-cart">
                            <a  class="" href="{{route('vendors')}}" style="font-size:150%;text-decoration:none" >
                                مشاهده تمام حجره ها
                            </a>
                        
                       </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    <div class="services-area margin-top-60" style="padding-bottom:0px;margin-top:0px;background-color:white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="services-left" style="direction:rtl;text-align:justify">
                            
                            <h2>
                                <span>
                                      چرا
                                </span>
                            محلی جات؟
                            </h2>
                            <p>
محلی جات از آبان ماه سال 95 با هدف ارائه محصولات محلی و مطمئن از تولیدکنندگان خانگی و روستایی شروع به فعالیت کرد. این گروه با هسته مرکزی جمعی از دانشجویان دانشگاه صنعتی شریف راه اندازی شده است. محلی جات تاکنون توانسته است نیاز صدها مشتری در حوزه محصولات سالم و طبیعی را پاسخگو بوده و همچنین از تولیدات ده ها تولیدکننده محلی و روستایی و خانگی نیز حمایت کند.
                            </p>
                            <p>
حرکت به سمت کاهش استفاده از تولیدات صنعتی و افزایش سلامت تغذیه در شهرهای بزرگ جزو اصلی ترین اهداف محلی جات است. بسیاری از کسانی که به حوزه استفاده از محصولات سالم علاقه مند هستند، اغلب با چالش اطمینان از طبیعی و محلی بودن محصولاتی مانند: عسل، زعفران، روغن، ادویه جات و عرقیجات مواجه هستند. لذا تیم محلی جات در تلاش است تا محصولات محلی، ارگانیک، طبیعی و سالم را از تامین کنندگان مطمئن تهیه کرده و دراختیار علاقه مندان به این بخش قرار دهد.
                            </p>
                            <p>
محلی جات در تلاش است بتواند دنیای جدیدی را در برابر افراد فعال در حوزه های مربوط به کسب و کارهای اجتماعی ایجاد کند.
                            </p>
                            <div class="readmore" style="text-align:left;margin-bottom:30px;">
                                <a href="{{route('shop')}}" style="margin-top:10px">
                                    همین حالا خرید کنید
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-lg-offset-4 col-md-offset-4 col-md-4 col-sm-6">
                        <div class="services-right floatright" >
<!--                            <div class="box box-1">-->
<!--                                <h3>-->
<!--                                    100% تازه و تمیز-->
<!--                                </h3>-->
<!--                                <p>-->
<!--تیم محلی جات در تلاش است تا محصولات محلی، سالم، طبیعی و ارگانیک و همچنین تولیدات سنتی و دست ساز را از تامین کنندگان مطمئن تهیه کرده و در اختیار علاقه مندان به این بخش قرار دهد. محصولات طبیعی شامل مواد خوراکی و صنایع دستی می باشد.-->
<!--                                </p>-->
<!--                            </div>-->
                            <div class="box box-2">
                                <h3>
                                کسب و کارهای اجتماعی
                                </h3>
                                <p>
محلی جات در تلاش است تا به کسب و کار های خرد و خانگی کمک کند تا بتوانند محصولات خود را به راحتی و بدون پرداخت هیچ گونه درصدی، به فروش برسانند. در این بستر مشتری مستقیما با تولید کننده محصولات محلی، طبیعی، سنتی و ارگانیک ارتباط برقرار کرده و نسبت به اصالت محصول اطمینان حاصل میکند. همچنین محلی جات بستری فراهم کرده است که خریداران با مشاهده زندگی نامه تولید کنندگان و محل تولید این محصولات، حس بهتری نسبت به خرید خود داشته باشند.
                                </p>
                            </div>
                            <!--<div class="box box-3">-->
                            <!--    <h1>-->
                            <!--    بسیار مغذی-->
                            <!--    </h1>-->
                            <!--    <p>-->
                            <!--        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکن-->
                            <!--    </p>-->
                            <!--</div>-->
                            <div class="box box-4">
                                <h3>
                                ارزان ترین در بازار
                                </h3>
                                <p>
                                محلی جات با توجه به بهترین کیفیتی که در اختیار شما قرار می دهد قیمت بسیار مناسبی  را به شما پیشنهاد می‌کند.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="products-area-3">
            <div class="container">
                <div class="row">
                    
                    <div class="section-title">
                        <h2 class="questo">
                            پرفروش ترین محصولات
                        </h2>
                    </div>
                </div>
                
                <div class="row" style="margin:10px">
                     <!--Tab panes -->
                    <div class="tab-content">

                            <div class="single-carousel55">
                                
                                @foreach($sales as $sale)
                                    
                                    <?php
                                    
                                    if($sale->product){
                                     $product=$sale->product;   
                                    }
                                     ?>
                                    <!-- single-product start-->
                                        
                                         @include('includes.single-product')
                                    
                                         
                                @endforeach
                                        
                            </div>
 
                    </div>
                    <div class="text-center" style="margin-bottom:40px;">
                        <div class="buttons-cart">
                            <a  class="" href="{{route('shop')}}" style="font-size:150%;text-decoration:none" >
                                مشاهده تمام محصولات
                            </a>
                        
                       </div>
                    </div>
                    
                </div>
            </div>
        </div>  
    @include('includes.footer')
      <!-- quickview product -->
    
       <!--<link rel="stylesheet" href="/css/bootstrap-rtl.min.css"> -->
            <!-- Modal -->
        
            <!-- END Modal -->
       
    </div>
        

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
@if($isbanner==0)
$(document).ready(function(){
     $("#top-image").load(function() {
     
        $('.bg').hide();
           $('#page-top-nav').show();
           $('.mainmenu').find("a").addClass('animated bounceInDown');
     });
    if(document.getElementById("top-image").complete){
        $('.bg').hide();
        
           $('#page-top-nav').show();
           $('.mainmenu').find("a").addClass('animated bounceInDown');
            
    };
});
@endif          
        
 $('.category-select').click(function(e){
     
      e.preventDefault();
        $.ajax({
          url: "{{route('homeproducts')}}",
          method: 'get',
          data:{
            category_id: $(this).attr('id'),
            _token: "{{csrf_token()}}"
          },
          context: this,
          success: function(response){
              
            //   console.log('hi');
          	// console.log(response);
          	$('.category-select').removeClass('active');
          	$(this).addClass('active');
            $('.posts').html(response);  
            // $.getScript("/js/lightbox.js");
            $(".single-carousel33").owlCarousel({
                autoPlay: true, 
                slideSpeed:2000,
                pagination:true,
                navigation:false,
                loop:true,
                items : 4,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [980,2],
                itemsTablet: [768,2],
                itemsMobile : [479,1],
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
          },
          error: function(xhr){
        //   	console.log(xhr.responseText);
        //   	$('.posts').html(xhr.responseText);
          }
        });
    });
  $('.main-category-select').click(function(e){
     
      e.preventDefault();
        $.ajax({
          url: "{{route('homeproducts1')}}",
          method: 'get',
          data:{
            
            maincat_id: $(this).attr('data-maincat'),
            _token: "{{csrf_token()}}"
          },
          context: this,
          success: function(response){
          
            if ( $(this).attr('data-maincat') != '-1' ) {
               $('#demo').hide();
               $('.product-tab-menu').show();
            } else {
                $('#demo').show();
                $('.product-tab-menu').hide();
            }  
            $('.posts1').html(response);  
            $('.category-select').click(function(e){
     
              e.preventDefault();
                $.ajax({
                  url: "{{route('homeproducts')}}",
                  method: 'get',
                  data:{
                    category_id: $(this).attr('id'),
                    _token: "{{csrf_token()}}"
                  },
                  context: this,
                  success: function(response){
                      
                    //   console.log('hi');
                  	// console.log(response);
                  	$('.category-select').removeClass('active');
                  	$(this).addClass('active');
                    $('.posts').html(response);  
                    // $.getScript("/js/lightbox.js");
                    $(".single-carousel33").owlCarousel({
                autoPlay: true, 
                slideSpeed:2000,
                pagination:true,
                navigation:false,
                loop:true,
                items : 4,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [980,2],
                itemsTablet: [768,2],
                itemsMobile : [479,1],
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
                  },
                  error: function(xhr){
                //   	console.log(xhr.responseText);
                //   	$('.posts').html(xhr.responseText);
                  }
                });
            });
            $('.product-tab-menu').show();
            // $.getScript("/js/lightbox.js");
            $(".single-carousel33").owlCarousel({
                autoPlay: true, 
                slideSpeed:2000,
                pagination:true,
                navigation:false,
                loop:true,
                items : 4,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [980,2],
                itemsTablet: [768,2],
                itemsMobile : [479,1],
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
            if ( $(this).attr('data-maincat') != '-1' ) {
                   $('#demo').hide();
                   $('.product-tab-menu1').show();
            } else {
                    $('#demo').show();
                    $('.product-tab-menu1').hide();
                }
                $('.main-category-select').removeClass('active');
          	$(this).addClass('active');
              },
          error: function(xhr){
        //   	console.log(xhr.responseText);
        //   	$('.posts').html(xhr.responseText);
          }
        });
    });  
    $( document ).ajaxStop(function() {
        
    });
    $(".questo").hover(function (e) {
    $(this).addClass('animated bounce');
});

$(".questo").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function () {
    $(this).removeClass('animated bounce');
});


// Update the count down every 1 second
@if($mahalije==1)
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
    now=now+1000*3*60*60+1000*30*60;
  // Find the distance between now an the count down date
  var distance = 24 - now;

  // Time calculations for days, hours, minutes and seconds
   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = 23-Math.floor((now % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = 59-Math.floor((now % (1000 * 60 * 60)) / (1000 * 60));
   var seconds =60+Math.floor((distance % (1000 * 60)) / 1000);
    if(hours<10){
        hours="0"+hours;
    }
    if(minutes<10){
        minutes="0"+minutes;
    }
    if(seconds<10){
        seconds="0"+seconds;
    }
  // Display the result in the element with id="demo"
  document.getElementById("timer").innerHTML = hours + ":"
  + minutes + ":" + seconds ;
    // console.log(hours);
  // If the count down is finished, write some text 
//   if (distance < 0) {
//     clearInterval(x);
//     document.getElementById("demo").innerHTML = "EXPIRED";
//   }
}, 1000);
@endif
$(document).on('click', '.howtobuy-link', function (e) {
    e.preventDefault();
        document.getElementById('howBuy').scrollIntoView({
        block: "start",
        behavior: "smooth"
    });
    
});


</script>
<!--<script src="js/jquery.countdown.min.js"></script>-->
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "url": "https://mahalijat.com/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://mahalijat.com/search?term={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
@endsection