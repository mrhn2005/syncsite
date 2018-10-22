console.log(cart_add);
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
$(document).ready(function(){
       $('.bg').hide();
       $('#page-top-nav').fadeIn("slow");
       
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
          url: cart_add,
          method: 'post',
          
          data:{
            id: $(this).next().val(),
            cart: $('#cart-page-identifier').val(),
            _token: token
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
          $('body').html(xhr.responseText);
          }
          
          
        });
   
    });
    $('body').on('click','.minus-one',function(e) {
    
        e.preventDefault();
        $.ajax({
          url: "/cart/remove",
          method: 'post',
          data:{
            rowId: $(this).next().val(),
            qty: $(this).next().attr('id'),
            id: $(this).next().next().val(),
            cart: $('#cart-page-identifier').val(),
            _token: token
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
    
   $("input[name = 'submit_review']").click(function(){
        $.ajax({
          url: "{{route('reviews.store')}}",
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
            //   $('body').html(xhr.responseText);
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
              
              console.log('hi');
          	// console.log(response);
          	$('.category-select').removeClass('active');
          	$(this).addClass('active');
            $('.posts').html(response);  

          },
          error: function(xhr){
          	console.log(xhr.responseText);
          	$('.posts').html(xhr.responseText);
          }
        });
    });
    
    $( document ).ajaxStop(function() {
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
    });
    $(".questo").hover(function (e) {
    $(this).addClass('animated bounce');
});

$(".questo").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function () {
    $(this).removeClass('animated bounce');
});


 $('.category-select').click(function(e){
      e.preventDefault();
        $.ajax({
          url: "/shop",
          method: 'get',
          data:{
            category_id: $(this).attr('id'),
            _token: token
          },
          context: this,
          success: function(response){
          	// console.log(response);
          	$('.category-select').removeClass('active');
          	$(this).addClass('active');
            $('.posts').html(response);  

          },
          error: function(xhr){
          	console.log(xhr);
          }
        });
    });


    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
        }).done(function (data) {
            console.log(data);
            $('.posts').html(data);
            location.hash = page;
        }).fail(function (er) {
            // console.log(er);
            $('.posts').html(er.responseText);
            // alert('Posts could not be loaded.');
        });
    }
