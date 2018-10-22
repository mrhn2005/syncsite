@extends('layout.main')


@section('metadesc')

    <meta name="description" content="شما می توانید محصولات محلی، سالم، ارگانیک و طبیعی ما را در فروشگاه، خانه، کافی شاپ و ... خود به فروش برسانید.">
@endsection

@section('title')
محلی یار| فروشگاه اینترنتی محلی جات
@endsection


@section('style')

<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection


@section('content')


    
    @include('includes.header1')
    <div class="container" style="direction:rtl">
    	@include('includes.messages')	
    </div>
  
     <!-- cart-page-start -->
		<div class="shopping-cart-area" style="direction:rtl">
			<div class="container">
				<div class="row">
					<div class="col-lg-12" >
						<div class="left-sidebar-title">
						    
							<h3 >
							    محلی یار ما باشید!
							</h3>
						</div>
					</div>
					<div class="col-lg-offset-2 col-lg-8" style="text-align:justify;">
					    <h3 style="font-family:BYekan">
					         محلی یار عزیز سلام 
					    </h3>
					    <p style="font-family:IranSans">
					       
با توجه به اینکه محلی جات برای معرفی بهتر محصولات شما نیاز به اطلاعات بیشتر و کامل تری از شما و محصولاتی که تجمیع کرده اید و موقعیت شما داره، لطفا این معرفی نامه رو با نهایت صداقت پر کنید و برای ما بفرستید تا بتونیم با بهتر معرفی کردن محصولات شما و شخصی که زحمت تولید این محصولات رو میکشه فروش بهتری رو برای شما و محلی جات رقم بزنیم					    </p>
					</div>
				</div>
				<div  class="col-lg-offset-2 col-lg-8"  style="border:2px solid #A4B784; padding:20px;">
                <div class="col-md-12">
                    <form class="upload-form" role="form" data-toggle="validator" id="mahalisaz"  method="post" action="{{route('mahaliyar.store')}}" enctype="multipart/form-data">
   
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <h3 style="margin-top:40px;">
                               اطلاعات محلی ساز:
                            </h3>
                            <hr style="border-top: 3px solid #bbb;">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">
                                 نام محلی یار:
                                </label>
                                <input type="text" class="form-control" id="name" name="name" data-error="لطفا این فیلد را  پر نمایید."   required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="location">
                                محل سکونت:
                                </label>
                                <input type="text" class="form-control" id="location" name="location" data-error="لطفا این فیلد را  پر نمایید."  required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">
                                شماره تماس (تلفن همراه یا تلفن ثابت همراه با کد شهر):
                                </label>
                                <input type="text" class="form-control" id="phone" placeholder="02144335544" pattern="^[\u06F0-\u06F90-9]{11}$" name="phone" Required  data-error="لطفا این فیلد را مطابق فرمت خواسته شده پر نمایید." >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                       <div class="col-md-12">
                            <div class="form-group">
                              <label for="biography">
                                خلاصه ای از زندگی نامه (بیوگرافی) جهت آشنایی بیشتر مشتریان با محلی یار:
                                </label>
                              <textarea class="form-control" rows="3" id="biography" name="biography"  data-error="لطفا این فیلد را  پر نمایید."  required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                       
                        
                        
                        <div class="col-md-12">
                            <h3 style="margin-top:40px;">
                                اطلاعات محصول یا محصولات:
                            </h3>
                            <hr style="border-top: 3px solid #bbb;">
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="spec">
                              مشخصات محصول تولیدی (برای کدام منطقه است، چه مراحلی برای تولیدش طی شده و ...):
                                </label>
                              <textarea class="form-control" rows="3" id="spec" name="spec"  data-error="لطفا این فیلد را  پر نمایید."  required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="property">
                              خواص و موارد مصرف محصول تولیدی:
                                </label>
                              <textarea class="form-control" rows="3" id="property" name="property"  data-error="لطفا این فیلد را  پر نمایید."  required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="how">
                              نحوه سفارش و تحویل:
                                </label>
                              <textarea class="form-control" rows="3" id="how" name="how"  data-error="لطفا این فیلد را  پر نمایید."  required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="image">
                                      عکسهایی از محصول
                                (حداکثر 5 مگابایت)
                                <br>
                                ( هرچی عکس طبیعی تر و از محل کار و تولید محصول باشه مطمئنا تاثیر بیشتری میتونه داشته باشه)
                                </label>
                              <input type="file" class="" data-max-size="5000000"  id="image" name="images[]" multiple required data-error="لطفا عکس محصول را بارگذاری نماید.">
                              <div class="help-block with-errors"></div>
                              
                            </div>
                        </div>
  
                        <div  class="text-center mini-cart-action">
                            <button style="width:50%;font-weight:bold;font-size:130%;margin-top:10px;" type="submit" class="button " >
                              ثبت اطلاعات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
				

			</div>
		</div>
		 <!-- cart-page-end -->

	@include('includes.footer')
	

@endsection

@section('js')


@endsection