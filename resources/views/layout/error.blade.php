<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        محلی جات: بستر فروش محصولات محلی
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
        if(document.images)
            (new Image()).src='https://mahalijat-mrhn2005.c9users.io/img/loading.gif';
   </script>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo/mahalijat.1.png">

    
    <!-- all css here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- master CSS
    ============================================ -->			
    <!--<link rel="stylesheet" href="/css/master1.css">-->
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
    <link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
    @yield('style')
    <link rel="stylesheet" href="/css/myhome.css">
    <!-- modernizr js -->
    <!--<script src="/js/vendor/modernizr-2.8.3.min.js"></script>-->
</head>

<body style="padding-right:0;">
    <!--<div class="loader" style="background-color:#FFFFFF"></div>-->
    @include('includes.telegram')
   
     @yield('content')
        <!-- all js here -->
    <!-- jquery latest version -->
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/page-accelerator/0.1.1/page-accelerator.min.js"></script>-->

    <script src="/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- nivo slider js -->
    <script src="/js/jquery.nivo.slider.pack.js"></script>
    <!-- jquery.countdown js -->
    <script src="/js/jquery.countdown.min.js"></script>
    <!-- owl.carousel js -->
    <script src="/js/owl.carousel.min.js"></script>
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>-->
    <!-- Img Zoom js -->
    <script src="/js/img-zoom/jquery.simpleLens.min.js"></script>
    <!-- meanmenu js -->
    <script src="/js/jquery.meanmenu.js"></script>
    <!-- jquery-ui js -->
    <script src="/js/jquery-ui.min.js"></script>
    <!-- wow js -->
    <script src="/js/wow.min.js"></script>
    <!-- plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- main js -->
    <script src="/js/main.js"></script>
    <script src="/js/custom.js"></script>
    <script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})

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
<script type="text/javascript">
    $(window).on('load',function(){
        $('#registerModal').modal('show');
    });
</script>
@elseif(count($errors) > 0)
<script type="text/javascript">
    $(window).on('load',function(){
        $('#loginModal').modal('show');
    });
</script>
@endif
<script>

    

   $(document).ready(function(){
       
       
       
       $('.modal').on('hide', function () {
           $('.header-inner').css("padding-right","0px");
          $('body').css("padding-right","0px");
          $('body').css('overflow','auto');
        });
        $('.modal').on('show', function () {
          $('body').css("padding-right","17px");
          $('.header-inner').css("padding-right","17px");
          $('body').css('overflow','hidden');
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
            _token: "{{csrf_token()}}"
          },
          success: function(response){
              if(response.hasOwnProperty("out_of_quantity") ){
                  $("#fixed-message").text(response.out_of_quantity);
             
                  $(".myAlert-top").addClass('alert-danger').show();
                   
                  setTimeout(function(){
                        $(".myAlert-top").hide(); 
                      }, 4000);
                  console.log(1)
                  console.log(response.out_of_quantity);
              }
               else{
                   
                   console.log(response[1]);
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
    $('body').on('click','.minus-one',function(e) {
    
        e.preventDefault();
        $.ajax({
          url: "{{route('cart.remove')}}",
          method: 'post',
          data:{
            rowId: $(this).next().val(),
            qty: $(this).next().attr('id'),
            id: $(this).next().next().val(),
            cart: $('#cart-page-identifier').val(),
            _token: "{{csrf_token()}}"
          },
          success: function(response){
              console.log(response[1]);
              $("#mini-cart").html(response[0]);
              $("#main-cart").html(response[1]);
              $("#fixed-message").text("کالای مورد نظر از سبد خرید حذف شد.");
              $(".myAlert-top").removeClass('alert-danger').show();
               
              setTimeout(function(){
                    $(".myAlert-top").hide(); 
                  }, 4000);

          },
          error: function(xhr){
            console.log(xhr);
            //  $("#mini-cart").html(xhr.responseText);
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
              console.log(response);
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
              console.log(response);
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
          url: "{{route('review.add')}}",
          method: 'post',
          data:{
            product_id: $(this).prev().val(),
            desc: $(this).parent().prev().children().val(),
            star: $(this).parent().prev().prev().children("input:checked").val(),
            _token: "{{csrf_token()}}"
          },
          success: function(response){
              $("#fixed-message").text(response);
            //   $("#mini-cart").html(response);
              $(".myAlert-top").removeClass('alert-danger').show();
               
              setTimeout(function(){
                    $(".myAlert-top").hide(); 
                  }, 4000);
               
            // if(group.id!=null){
            //   $(".group-input").removeClass('has-error').val('');
            //   $("#error-message").text('');
            //     $("#group-name").hide(500);
            //     var newOption=$('<option></option>').attr('value',group.id).attr('selected',true).text(group.name);
            //     $("select[name=group_id]").append(newOption);
              
            // }
          },
          error: function(xhr){
              $('body').html(xhr.responseText);
              $("#fixed-message").text('لطفا امتیاز خود را ثبت کنید');
             
              $(".myAlert-top").addClass('alert-danger').show();
               
              setTimeout(function(){
                    $(".myAlert-top").hide(); 
                  }, 4000);
            // var errors=xhr.responseJSON;
            // var error=errors.name[0];
            // console.log(error);
            // if(error){
            //   $(".group-input")
            //     .addClass('has-error');
            //   $("#error-message").text(error);
            //   $("#group-input").focus();
            // }
          }
          
          
        });
   
    });
    
  });
  
  
  


</script>  
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script>
    $(function(){
      $("input[name=term]").autocomplete({
        
        source: '{{route("proudcts.autocomplete")}}',
        minLength: 2,
        select: function(event, ui){
          $(this).val(ui.item.value);
          $("#search-form").attr("action", "/product/" + ui.item.slug);
          document.getElementById('submit').click();
        }
        
      });
      
    });  
    
$( document ).ajaxStop(function() {
    
    $('.simpleLens-big-image').simpleLens({
    loading_image: 'demo/images/loading.gif'
    });
    
});
$('body').on('click','#mini-cart1',function(e) {
    
        e.preventDefault();
});
  </script>
  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.7/validator.min.js"></script>
@yield('js')
</body>