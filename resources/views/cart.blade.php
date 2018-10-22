@extends('layout.main')
@section('title')
سبد خرید| فروشگاه اینترنتی محلی‌جات
@endsection


@section('style')
<style>
	th{
		text-align:right;
	}
</style>
<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection


@section('content')

    
    @include('includes.header')
    <div class="container" style="direction:rtl">
    	@include('includes.messages')	
    </div>
  
<input type="hidden" id="cart-page-identifier" value="1">    
     <!-- cart-page-start -->
		<div class="shopping-cart-area" style="direction:rtl">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="left-sidebar-title">
						    
							<h1>
							    سبد خرید
							</h1>
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					    <!-- table start -->
						<form action="shopping-cart.html#">
							<div class="table-content table-responsive" >
								<div id="main-cart">
								@include('includes.main-cart')
								
								</div>

							</div>
						</form>
						
						<!-- table end -->
						<br>
					</div>
	
				</div>
				<div style="padding-bottom:80px;">
					@if (Auth::guard('customer')->check())
					<div class="col-md-offset-3 col-md-6">
						<form>
					  <div class="input-group">
					  	
					    <input type="text" class="form-control discount-code discount-input" id="discount-code" style="height:50px" required placeholder="کد تخفیف دارید؟">
					    <div class="input-group-btn">
					      <button class="btn btn-default discount-code discount-butt" type="submit"  style="" title="اعمال">
					        <i class="fa fa-check"></i>
					      </button>
					    </div>
					  </div>
					  </form>
					</div>
					
					@endif
				</div>
				<br>
					<div>
						
						<p style="font-size:120%">
							<strong>
								توجه:
							</strong>
							هزینه ارسال برای داخل پارک فناوری و همچنین خرید بالای 100 هزار تومان رایگان است.
							هزینه ارسال برای خریدهای زیر 100 هزار تومان شهر تهران 
							{{DB::table('deliveries')->first()->price}}
							تومان می باشد.
						</p>
					</div>
									
				<!-- place selection start -->
				@if(Cart::count()<1)
					<div class="col-lg-12">
						<div class="text-center" style="margin-bottom:200px">
							<a href="{{route('shop')}}" class="btn btn-success" style="font-size:150%">
						سبد خرید شما خالی است لطفا ابتدا کالاهای مورد نظرتان را انتخاب کنید.
							</a>
						</div>
					</div>
				@elseif (Auth::guard('customer')->check())
				<form id="payment-final-form" method="post" action="{{route('payment')}}">
					{{ csrf_field() }}
					
					
					<div class="row" style="padding-bottom:50px;">
						<div class="col-lg-12">
							<div class="left-sidebar-title">
							    
								<h3>
								   انتخاب آدرس
								</h3>
							
							</div>
								
						</div>
						
						<div id="all-addresses">
						@include('includes.addresses')
						</div>	
						<div class="col-lg-10 col-lg-offset-1">
								<div class="form-group">
									<hr>
		                            <label for="city" class="control-label" style="margin-left:20px">
		                                  شهر:
		                              </label>
		
		                                <?php $cities=DB::table('deliveries')->get();?>
		                                @foreach($cities as $city)
		                                <label class="radio-inline" style="margin-right: 20px;">
		                                  <input value="{{$city->id}}"  type="radio" name="region_id" style="margin-right: -20px;" {{$loop->first?'checked':''}}>{{$city->region}}
		                                </label>
		                                
		                                @endforeach
		                            <br>
		                            
		                        </div>
								<div class="form-group">
		                          
		                          <label for="new_address" class="control-label">
		                                  آدرس:
		                          </label>
		                          <textarea class="form-control" rows="2" style="border: 2px solid #8BA462;" id="new_address" name="new_address"  placeholder="در صورت نیاز آدرس جدیدی وارد نمایید." ></textarea>
		                        </div>
		                        <input type="hidden" id="user_id" name="user_id" value="{{Auth::guard('customer')->user()->id}}" />
		                        <div id="address_error" style="color:red;display:none" >
		                        	آدرس خود را وارد نمایید
		                        </div>
		                        <div class="text-center buttons-cart">
		                            <button    id="add_address">
		                               افزودن آدرس جدید
		                            </button>
		                        </div>
						
						</div>
					</div>
					<div class="row" style="padding-bottom:50px;">
						<div class="col-lg-12">
							<div class="left-sidebar-title">
							    
								<h3>
								   توضیحات سفارش
								</h3>
							
							</div>
								
						</div>
						
						
						<div class="col-lg-10 col-lg-offset-1">
								<div>
									
								</div>
								<div class="form-group">
									<label for="pdescription">
                                 اگر توضیحاتی و نظراتی مانند طعم، رنگ، بسته بندی و ... در مورد سفارش خود دارید در زیر وارد نمایید.
                                </label>
		                          
		                          <textarea id="pdescription" class="form-control" rows="3"  name="description" style="border:1px green solid;"  placeholder="توضیحات سفارش"></textarea>
		                        </div>

						</div>
					</div>
					<div class="row" style="padding-bottom:200px;">
						<div class="col-lg-12">
							<div class="left-sidebar-title">
							    
								<h3>
								   انتخاب روش پرداخت
								</h3>
							</div>
						</div>
						<div class="col-lg-10 col-lg-offset-1" style="border:solid 2px green !important; background-color:white;margin-right:-20px; padding:20px; margin-bottom:20px;">	 
							 <div class="disabled">
							  <span style="margin-right:30px;font-weight:bold;"><input checked  type="radio" name="payment" style="margin-right:-20px" value="پرداخت آنلاین" >
							 	پرداخت آنلاین 
							  </span>
							 </div>
						</div>	
						<div class="col-lg-10 col-lg-offset-1" style="border:solid 2px green !important; background-color:white;margin-right:-20px; padding:20px; margin-bottom:20px;">
							
							  <span style="margin-right:30px;font-weight:bold;"><input  type="radio" name="payment" style="margin-right:-20px" value="پرداخت در محل" >
							  پرداخت در محل
							  </span>
						</div>
						
						<div class="col-lg-10 col-lg-offset-1">
						<div  class="floatleft buttons-cart" style="">
	                            <button  type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class=""  style="font-size:150%;padding:15px;margin-top:40px;">
	                               خرید خود را نهایی کنید
	                            </button>
		                </div>
						</div>
						
					</div>
					
				</form>
				<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog"  aria-hidden="true">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header text-center" style="background-color:#5cb85c;color:white;font-size:140%;font-weight:bold">
				            	<p style="margin: 0 0 5px;">
				            		تایید سفارش
				            	</p>
				                
				            </div>
				            
				            <div class="modal-body">
				            	<p  style="padding-bottom:10px;font-size:120%">
				            		 آیا اطلاعات زیر مورد تایید شما است؟
				            	</p>
				               
				
				               
				                <table class="table">
				                    <tr>
				                        <th>
				                        هزینه نهایی	:
				                        </th>
				                        <td id="subtotal-modal">
				                        	
				                        </td>
				                        
				                    </tr>
				                    <tr>
				                    	<th>
				                       روش پرداخت
				                        </th>
				                    	<td id="payment-modal"></td>
				                        
				                    </tr>
				                    <tr>
				                    	<th>
				                        آدرس:
				                        </th>
				                    	<td id="payment-address"></td>
				                        
				                    </tr>
				                    <tr>
				                    	<th>
				                        شماره تماس:
				                        </th>
				                    	<td>{{Auth::guard('customer')->user()->mobile}}</td>
				                        
				                    </tr>
				                </table>
				
				            </div>
				
					 		 <div class="modal-footer">
					 		 	<div class="text-center" style="padding-bottom:10px;">
					 		 		<!--<button type="button" class="btn btn-default" data-dismiss="modal">-->
						     <!--       لغو	-->
						     <!--       </button>-->
						            <a style="font-size:130%" href="#" id="submit-modal" class="btn btn-success success">
						            نهایی کردن سفارش
						            </a>
					 		 	</div>
					            
					        </div>
				   		</div>
				    </div>
				</div>
				@else
				<div class="row" style="padding-bottom:100px;">
					<div class="col-lg-12">
						<div class="left-sidebar-title">
						    
							<h3>
							    ثبت نام
							</h3>
						</div>
					</div>
					<div class="col-lg-12">
						<h3>
						لطفا برای تکمیل خرید خود ابتدا در سابت ثبت نام کنید.
						</h3>
						<div class="text-center">
							<div class="buttons-cart">
								<a  data-toggle="modal" href="#registerModal" style="font-size:150%;text-decoration:none" >
								ثبت نام	
								</a>
								<a data-toggle="modal" href="#loginModal" style="font-size:150%;padding-right:30px;text-decoration:none">
								ورود
								</a>
							</div>
							
						</div>
					</div>
				</div>
				
				@endif
				

			</div>
		</div>
		 <!-- cart-page-end -->

	@include('includes.footer')
	

@endsection

@section('js')
<script>

$('body').on('click','.delete-one',function(e) {
    	
        e.preventDefault();
        $.ajax({
          url: "{{route('cart.delete')}}",
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
              delivery_price=$("#delivery_price").val();
              $("#mini-cart").html(response[0]);
              $("#main-cart").html(response[1]);
              $("#all-addresses").html(response[2]);
              $("#fixed-message").text("کالای مورد نظر از سبد خرید حذف شد.");
              $(".myAlert-top").removeClass('alert-danger').show();
               
              $(".myAlert-top").delay(4000).fadeOut(1000);
          },
          error: function(xhr){
            // console.log(xhr);
            //  $("#mini-cart").html(xhr.responseText);
          }
          
          
        });
   
    });
$('body').on('click','#add_address',function(e) {

    e.preventDefault();
    if( !$('#new_address').val() ) {
		e.preventDefault();
		$("#fixed-message").text("لطفا ابتدا آدرس خود را وارد نمایید.");
          $(".myAlert-top").addClass('alert-danger').show();
          
          $("#address_error").show();
		  $(".myAlert-top").fadeOut(4000);
		  $('#new_address').focus();
	}else{
	$.ajax({
      url: "{{route('add.address')}}",
      method: 'post',
      data:{
        
        address: $('#new_address').val(),
        customer_id: $('#user_id').val(),
        region_id: $('input[name=region_id]:checked').val(),
        _token: "{{csrf_token()}}"
      },
      success: function(response){
          //console.log(response);
          $("#fixed-message").text("آدرس جدید با موفقیت افزوده شد.");
          $(".myAlert-top").removeClass('alert-danger').show();
		  $(".myAlert-top").fadeOut(5000);
          $('#new_address').val('');
          $("#main-cart").html(response[0]);
          $("#all-addresses").html(response[1]);
          $("#address_error").hide();

      },
      error: function(xhr){
        console.log(xhr);
        // $("#all-addresses").html(xhr.responseText);
        //  $("#mini-cart").html(xhr.responseText);
      }
      
      
    });	
	}
    

});

$('body').on('click','.discount-butt',function(e) {
	
    e.preventDefault();
    if( !$('#discount-code').val() ) {
          $("#fixed-message").text("لطفا ابتدا کد تخفیف را وارد نمایید");
          $(".myAlert-top").addClass('alert-danger').show();
		  $(".myAlert-top").fadeOut(4000);
    }
    else{
    	$.ajax({
      url: "{{route('check.code')}}",
      method: 'post',
      data:{

        code2: $('#discount-code').val(),
        _token: "{{csrf_token()}}"
      },
      success: function(response){
          //console.log(response);
         
          $('#discount').text(response.discount);
          $('#subtotal').text(response.subtotal+parseInt($('#delivery_price').text()));
          $("#fixed-message").text("کد تخفیف با موفقیت اعمال شد. در صورت تغییر سبد خرید باید دوباره کد تخفیف را وارد نمایید.");
          $(".myAlert-top").removeClass('alert-danger').show();
			$(".myAlert-top").fadeOut(5000);
			$('input[name=discount_amount]').val(response.discount);
			$('input[name=subtotal_amount]').val(response.subtotal);
			$('input[name=promocode]').val($('#discount-code').val());
      },
      error: function(xhr){
      	
        
            // $('body').html(xhr.responseText);
          //$("#main-cart").html(response);
          $("#fixed-message").text(xhr.responseJSON.error);
          $(".myAlert-top").addClass('alert-danger').show();
		  $(".myAlert-top").fadeOut(4000);
        // $('body').html(xhr.responseText)
        // $("#all-addresses").html(xhr.responseText);
        //  $("#mini-cart").html(xhr.responseText);
      }
      
      
    });
    }
    // console.log($('#discount-code').val());
    

});


$('#submitBtn').click(function() {
     $('#subtotal-modal').text($('#subtotal-form').text());
     
	$('#payment-modal').text($('input[name=payment]:checked').val());	
	$('#payment-address').text($('input[name=address]:checked').parent().text());
	if($('input[name=payment]:checked').val()=="پرداخت آنلاین"){
		$('#submit-modal').text("برو به درگاه پرداخت"	);
	}else{
		$('#submit-modal').text("نهایی کردن سفارش");
	}
	
     
});
$('#submit-modal').click(function(){
     /* when the submit button in the modal is clicked, submit the form */
    
    $('#payment-final-form').submit();
});

 $(document).bind('ready ajaxComplete', function(){
    $('input[type=radio][name=address]').change(function() {
    	dprice1=$('#delivery_price').text();
    	dprice2=parseInt($('input[name=address]:checked').next().val());
        $('#delivery_price').text(dprice2);
        
        total_price=$('#subtotal').text()-dprice1+dprice2;
        console.log($('#subtotal').text());
        $('#subtotal').text(total_price);
        
    });
});
if(performance.navigation.type == 2){
   location.reload(true);
}
</script>

@endsection