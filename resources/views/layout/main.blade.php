<!doctype html> 
<html class="no-js" lang="fa" >

<head>
    <meta name="yandex-verification" content="940bb71838ebd5e3" />
 <!-- Global site tag (gtag.js) - Google Analytics -->
 
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111472260-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-111472260-2');
    </script>
    <script>window.$crisp=[];window.CRISP_WEBSITE_ID="9ceb273e-843e-4657-9d5d-5d9641907602";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
   


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--<meta name="keywords" content="محلی جات، محلیجات، محصولات محلی، صنایع دستی، خشکبار">-->
    
     @if(View::hasSection('metadesc'))
        @yield('metadesc')
    @else
            <meta name="description" content="محلی جات از آبان ماه سال 95 با هدف ارائه محصولات محلی خوراکی سالم، طبیعی و ارگانیک و صنایع دستی مطمئن از تولیدکنندگان خانگی و روستایی شروع به فعالیت کرد. این گروه با هسته مرکزی جمعی از دانشجویان دانشگاه صنعتی شریف راه اندازی شده است. محلی جات نیاز صدها مشتری را پاسخگو بوده و از تولیدات ده ها تولیدکننده محلی و روستایی و خانگی حمایت کرده است.">
            <meta property="og:title" content="  فروشگاه اینترنتی محلی جات- بستر فروش محصولات محلی، ارگانیک و صنایع دستی "/>
        	<meta property="og:type" content="website" />
        	<meta property="og:url" content="{{Request::url()}}" />
        	<meta property="og:site_name" content="  فروشگاه اینترنتی محلی جات- بستر فروش محصولات محلی، ارگانیک و صنایع دستی "/>
        	<meta property="og:image" content="{{URL::to('/').'/img/logo/mahalijat.png' }}" />
    @endif
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo/mahalijat.1.png">

    
    <!-- all css here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- master CSS
    ============================================ -->			
    <link rel="stylesheet" href="/css/minified.css">
    
    <!--<link rel="stylesheet" href="/css/bootstrap-rtl.min.css">-->
    <!--<link rel="stylesheet" href="/css/css/bootstrap.min.css">-->
    <!--<link rel="stylesheet" href="/css/css/animate.css">-->
    <!--<link rel="stylesheet" href="/css/css/nivo-slider.css">-->
    <!--<link rel="stylesheet" href="/css/css/jquery-ui.min.css">-->
    <!--<link rel="stylesheet" href="/css/css/img-zoom/jquery.simpleLens.css">-->
    <!--<link rel="stylesheet" href="/css/css/meanmenu.min.css">-->
    <!--<link rel="stylesheet" href="/css/css/owl.carousel.css">-->
    <!--<link rel="stylesheet" href="/css/css/font-awesome.min.css">-->
    <!--<link rel="stylesheet" href="/css/css/style.css">-->
    <!--<link rel="stylesheet" href="/css/css/responsive.css">-->
    <!--<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css' />-->
    <link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    @yield('style')
    <link rel="stylesheet" href="/css/myhome.css">
     <style>
     .storeName{
        margin-bottom:0px;
        min-height:24px;
        float:right;
    }
    
    .price-box {
        clear:both;
    }
     .sin-product-shot-desc ul {
        margin-left:0px;
    }
    .left-sidebar-title h1 {
        border-bottom: 4px solid #ebebeb;
        margin-bottom: 30px;
        padding-bottom: 5px;
        position: relative;
        text-transform: uppercase;
        font-weight: 700;
        color: #8ba462;
        font-size: 24px;
    }
    .left-sidebar-title h1:after {
    background: #952a44;
    bottom: -4px;
    content: "";
    height: 4px;
    left: 0;
    position: absolute;
    width: 100%;
}
        h3.product-name{
            margin-top:-7px;text-overflow: ellipsis;direction:rtl;
        }
         h3.product-name a:hover {
            color: #57b652;
        }
        
        h3.product-name a {
            font-size: 15px;
            color: #7e5738;
            font-weight: 700;
            line-height: normal;
            text-transform: uppercase;
        }
        .product-name h3 {
            color: #8ba462;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 0;
            margin-top: 15px;
            padding-bottom: 10px;
            text-transform: uppercase;
        }
        .footer-about-us-content > h2 {
            color: #ffffff;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            margin-top: -1px;
            text-transform: uppercase;
        }
        .logintoreview{
            font-size: 20px;
            font-family: IranSans;
        }
        
        p.product-name a {
            color: #7e5738;
            font-size: 15px;font-weight: 700;
        }
        .product-modal12 {
            margin-left:15px;
        }
        .form-control{
            height:auto;
        }
        .myAlert-corner{
             position: fixed;
            bottom: 0.2%;
            right: 1%;
            max-width: 350px;
            text-align: center;
            direction: rtl;
            border:2px solid SteelBlue;
            
        }
        
        .myAlert-corner a{
             color:#90133B;
             font-weight:bold;
        }
        .myAlert-top{
            position: fixed;
            top: 0.5%;
            left: 1%;
            max-width: 350px;
            text-align: center;
            direction: rtl;
            border:2px solid SteelBlue;
        }
        .myAlert-top a{
            color:#90133B;
            font-weight:bold;
        }
        .right-class{
            text-align:right;
            direction:rtl;
        }
        
        .mainmenu nav ul li .mega-menu, .mainmenu nav ul li ul.sub-menu{
            border-bottom:2px solid #90133b!important; 
            /*border-top-width:2px;*/
        }
        .mega-menu-three {
            min-width:900px;
            
        }
        .header-bottom-area-3 .mainmenu nav ul li .mega-menu{
            border-bottom:2px solid #57b652 !important;
            border-top: 2px solid #57b652;
        }
        .menu > li> ul {
                background-color: #f6f6f6!important;
        }
        .mainmenu nav ul li .mega-menu li a.mega-menu-title {
            width:auto;
            
        }
        
        
        .menu > li> ul>li>a:hover {
                color: #90133B!important;
                font-weight:bold!important;
        }
        
        .mainmenu nav >ul> li> ul>li>a:hover {
                color: #90133B!important;
                font-weight:bold!important;
        }
    </style>
    <!-- modernizr js -->
    <!--<script src="/js/vendor/modernizr-2.8.3.min.js"></script>-->
</head>

<body style="padding-right:0;">
    <!--<div class="loader" style="background-color:#FFFFFF"></div>-->
    
    @include('includes.telegram')
    @include('includes.fixed-message') 
    @if(!strpos($_SERVER['REQUEST_URI'],'store'))
        @if(!Auth::guard('customer')->check())
          @include('includes.register-modal')
          @include('includes.login')
        @endif
    @endif
    @yield('content')
     
        <!-- all js here -->
    <!-- jquery latest version -->
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/page-accelerator/0.1.1/page-accelerator.min.js"></script>-->
    <script src="/js/minified.js"></script>
    <!--<script src="/js/vendor/jquery-1.12.0.min.js"></script>-->
    <!-- bootstrap js -->
    <!--<script src="/js/bootstrap.min.js"></script>-->
    <!-- nivo slider js -->
    <!--<script src="/js/jquery.nivo.slider.pack.js"></script>-->
    <!-- jquery.countdown js -->
    <!--<script src="/js/jquery.countdown.min.js"></script>-->
    <!-- owl.carousel js -->
    <!--<script src="/js/owl.carousel.min.js"></script>-->
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>-->
    <!-- Img Zoom js -->
    <!--<script src="/js/img-zoom/jquery.simpleLens.min.js"></script>-->
    <!-- meanmenu js -->
    <!--<script src="/js/jquery.meanmenu.js"></script>-->
    <!-- jquery-ui js -->
    <!--<script src="/js/jquery-ui.min.js"></script>-->
    <!-- wow js -->
    <!--<script src="/js/wow.min.js"></script>-->
    <!-- plugins js -->
    <!--<script src="/js/plugins.js"></script>-->
    <!-- main js -->
    <!--<script src="/js/main.js"></script>-->
    <!--<script src="/js/custom.js"></script>-->
    <script>
// $(window).load(function() {
// 	$(".loader").fadeOut("slow");
// })

// document.addEventListener("DOMContentLoaded", function() {
//     var elements = document.getElementsByTagName("INPUT");
//     for (var i = 0; i < elements.length; i++) {
//         elements[i].oninvalid = function(e) {
//             e.target.setCustomValidity("");
//             if (!e.target.validity.valid) {
//                 e.target.setCustomValidity("لطفا این فیلد را پر نمایید.");
//             }
//         };
//         elements[i].oninput = function(e) {
//             e.target.setCustomValidity("");
//         };
//     }
// })

setTimeout(function(){
    $(".myAlert-top").hide(); 
  }, 4000);
</script>


@if(Session::has('fail_register'))
<script>
    $(window).on('load',function(){
        $('#registerModal').modal('show');
    });
</script>
@elseif(count($errors) > 0)
<script>
    $(window).on('load',function(){
        $('#loginModal').modal('show');
    });
</script>
@endif
<script>

    

   $(document).ready(function(){
 $( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
 $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
       
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
          $('.header-inner').css("padding-right","0px");
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
       $(".register-pop").click(function(){
        //   $("#loginModal").modal("hide");
            // $('#myModal').on('hidden', function () {
               $('#registerModal').modal('show').css('overflow-y','scroll');
            //   $('body').css('overflow','hidden');
            //   $('.header-inner').css('padding-right','17px');
         
        });
    //     $("#registerModal").on("hidden.bs.modal", function () {
               
    //       $('body').css('overflow','auto');
    //       $('body').css("padding-right","0px");
    //   });
    //     $("#registerModal").on("show.bs.modal", function () {
               
    //       $('body').css('overflow','hidden');
    //       $('body').css("padding-right","17px");
    //   });
    $('body').on('click','.add-to-cart',function(e) {
        e.preventDefault();
        $.ajax({
          url: "{{route('cart.add')}}",
          method: 'post',
          
          data:{
            id: $(this).next().val(),
            cart: $('#cart-page-identifier').val(),
            address_id:$('input[name=address]:checked').val(),
            free_buy: $('#free-buy').val(),
            _token: "{{csrf_token()}}"
          },
          success: function(response){
              if(response.hasOwnProperty("out_of_quantity") ){
                  $("#fixed-message").html(response.out_of_quantity);
             
                  $(".myAlert-top").addClass('alert-danger').show();
                   
                  
                        $(".myAlert-top").delay(4000).fadeOut(1000);
                     
                //   console.log(1)
                //   console.log(response.out_of_quantity);
              }
               else{
                   
                //   console.log(response[1]);
                     $("#mini-cart").html(response[0]);
                     $("#main-cart").html(response[1]);
                     $("#all-addresses").html(response[2]);
                     @if(Request::is('cart'))
                     var fixed_html="کالای مورد نظر به سبد خرید اضافه شد.";
                     @else
                     var fixed_html="کالای مورد نظر به سبد خرید اضافه شد.<br><a href='/cart'>برو به سبد خرید</a>";
                     @endif
                     
                    $("#fixed-message").html(fixed_html);
                    // $("#fixed-message").text("کالای مورد نظر به سبد خرید اضافه شد.");
                    $(".myAlert-top").removeClass('alert-danger').show();
                    
                    // setTimeout(function(){
                    //     $(".myAlert-top").hide(); 
                    // }, 4000);

                   $(".myAlert-top").delay(4000).fadeOut(1000);
               }     
              
          },
          error: function(xhr){

          }
          
          
        });
   
    });
    $('body').on('click','.minus-one',function(e) {
    
        e.preventDefault();
        $.ajax({
          url: "{{route('cart.remove')}}",
          method: 'post',
          data:{
            rowId: $(this).next().val(),
            qty: $(this).next().attr('data-qty'),
            id: $(this).next().next().val(),
            cart: $('#cart-page-identifier').val(),
            address_id:$('input[name=address]:checked').val(),
            _token: "{{csrf_token()}}"
          },
          success: function(response){
            //   console.log(response[1]);
              $("#mini-cart").html(response[0]);
              $("#main-cart").html(response[1]);
              $("#all-addresses").html(response[2]);
            //   console.log(response[2]);
              $("#fixed-message").text("کالای مورد نظر از سبد خرید حذف شد.");
              $(".myAlert-top").removeClass('alert-danger').show();
               
              setTimeout(function(){
                    $(".myAlert-top").hide(); 
                  }, 4000);

          },
          error: function(xhr){
            // console.log(xhr);
             $("#shopping-cart-area").html(xhr.responseText);
          }
          
          
        });
   
    });
$('body').on('click','.heart-click',function(e) {
        e.preventDefault();
        $.ajax({
          url: "{{route('add.like')}}",
          method: 'post',
          data:{
            product_id: $(this).next().val(),
            _token: "{{csrf_token()}}"
          },
           context: this,
          success: function(response){
            //   console.log(response);
              $(this).removeClass('heart-click').addClass('heart-remove').css("color", "#90133B");
              $(this).children().removeClass('fa-heart-o').addClass('fa-heart');
          },
          error: function(xhr){
            // console.log(xhr.responseText);
            //  $("body").html(xhr.responseText);
          }
        });
   
    }); 
$('body').on('click','.heart-remove',function(e) {
        e.preventDefault();
        $.ajax({
          url: "{{route('remove.like')}}",
          method: 'post',
          data:{
            product_id: $(this).next().val(),
            _token: "{{csrf_token()}}"
          },
           context: this,
          success: function(response){
            //   console.log(response);
              $(this).removeClass('heart-remove').addClass('heart-click').css("color", "black");
              $(this).children().removeClass('fa-heart').addClass('fa-heart-o');
          },
          error: function(xhr){
            // console.log(xhr.responseText);
            //  $("body").html(xhr.responseText);
          }
        });
   
    });  
    
   $('body').on('click',"input[name = 'submit_review']",function(){
        $.ajax({
          @if(Request::is('blog/*'))
          url: "{{route('comment.add')}}",
          @else
          url: "{{route('review.add')}}",
          @endif
          method: 'post',
          data:{
            product_id: $(this).prev().val(),
            description: $(this).parent().prev().children().val(),
            star: $(this).parent().prev().prev().children("input:checked").val(),
            _token: "{{csrf_token()}}"
          },
          context: this,
          success: function(response){
              $("#fixed-message").text(response);
            //   $("#mini-cart").html(response);
              $(".myAlert-top").removeClass('alert-danger').show();
               
              setTimeout(function(){
                    $(".myAlert-top").hide(); 
                  }, 4000);
               $(this).parent().prev().children().val('');
               $(this).parent().prev().prev().children("input:checked").attr('checked', false);
          },
            error: function(xhr){
            //   $('body').html(xhr.responseText);
              $("#fixed-message").text('لطفا امتیاز خود را ثبت کنید');
             
              $(".myAlert-top").addClass('alert-danger').show();
               
              setTimeout(function(){
                    $(".myAlert-top").hide(); 
                  }, 4000);
            }
          
          
        });
   
    });
    
  });
  
  
  


</script>  
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js" ></script>
<script>
    $(function(){
      $("input[name=term]").autocomplete({
        
        source: '{{route("proudcts.autocomplete")}}',
        minLength: 2,
        select: function(event, ui){
            window.location.href = ("/product/" + ui.item.slug);
        //   $(this).val(ui.item.value);
        //   $("#search-form").attr("action", "/product/" + ui.item.slug).submit();
        //     document.getElementById('submit').click();
    
        }
        
      });
      
    });  
    

$('body').on('click','#mini-cart1',function(e) {
    
        e.preventDefault();
});
  </script>
  
<script  src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.7/validator.min.js"></script>

<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/page-accelerator/0.1.1/page-accelerator.min.js"></script>-->
<script>
var person = {
  afterLoading : function() {
    $('body').on('click','.add-to-cart',function(e) {
        e.preventDefault();
        $.ajax({
          url: "{{route('cart.add')}}",
          method: 'post',
          
          data:{
            id: $(this).next().val(),
            cart: $('#cart-page-identifier').val(),
            _token: "{{csrf_token()}}"
          },
          success: function(response){
              if(response.hasOwnProperty("out_of_quantity") ){
                  $("#fixed-message").text(response.out_of_quantity);
             
                  $(".myAlert-top").addClass('alert-danger').show();
                   
                  setTimeout(function(){
                        $(".myAlert-top").hide(); 
                      }, 4000);
                
              }
               else{
                   
                
                     $("#mini-cart").html(response[0]);
                     $("#main-cart").html(response[1]);
                    $("#fixed-message").text("کالای مورد نظر به سبد خرید اضافه شد.");
                    $(".myAlert-top").removeClass('alert-danger').show();
                    
                    setTimeout(function(){
                        $(".myAlert-top").hide(); 
                    }, 4000);

                   
               }     
              
          },
          error: function(xhr){

          }
          
          
        });
   
    });
    $('#topSlider').nivoSlider({
        effect: 'random',
        slices: 15,
        boxCols: 12,
        boxRows: 4,
        animSpeed: 600,
        pauseTime: 500000,
        startSlide: 0,
        controlNavThumbs: false,
        pauseOnHover: true,
        manualAdvance: false,
        prevText: '',
        nextText: '',
    });
     
        $('.bg').hide();
           $('#page-top-nav').show();
           $('.mainmenu').find("a").addClass('animated bounceInDown');
   
   
     $(".single-carousel33").owlCarousel({
                autoPlay: false, 
                slideSpeed:2000,
                pagination:false,
                navigation:false,	  
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
     $(".single-carousel55").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:true,
        navigation:false,	  
        items : 5,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [980,3],
        itemsTablet: [768,2],
        itemsMobile : [479,1],
    });
             $('.simpleLens-big-image').simpleLens({
    loading_image: 'demo/images/loading.gif'
    });
    $('.modal').on('hidden.bs.modal', function () {
      $('.header-inner').css("padding-right","0px");
           if ($(window).width() > 768) {
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
  }
};
$("#search-form").submit(function(e){
     if($.trim($('#search-term').val()) == ''){
      e.preventDefault();
  }
        
    });
$('form').submit(function(){
   $(this).find('.submit1').prop('disabled',true);
});


// pageAccelerator(person);
</script>

@yield('js')
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter48718796 = new Ya.Metrika({
                    id:48718796,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "https://mahalijat.com",
  "logo": "https://mahalijat.com/img/logo/mahalijat.png",
  "contactPoint": [{
    "@type": "ContactPoint",
    "telephone": "+98-021-76250350-328",
    "contactType": "sales"
  }] 
}
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/48718796" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>