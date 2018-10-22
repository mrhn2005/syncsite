@extends('layout.main')

@section('metadesc')

    <meta name="description" content="اگر محصول محلی، ارگانیک، طبیعی و سالم تولید می کنید میتوانید محصولات خود را در محلی جات به فروش رسانید.">
@endsection

@section('title')
محلی ساز| فروشگاه اینترنتی محلی جات
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
							    محلی ساز ما باشید!
							</h3>
						</div>
					</div>
					<div class="col-lg-offset-2 col-lg-8" style="text-align:justify;">
					    <h3 style="font-family:BYekan">
					        تولید کننده (محلی ساز) گرامی
					    </h3>
					    <p style="font-family:IranSans">
					       
محلی جات برای معرفی محصولات شما به اطلاعات کاملی از شما و محصول تولیدی نیاز دارد. بنابراین لطفا فرم زیر را با دقت تکمیل کنید. بعد از بررسی محصول، ما با شما تماس می گیریم و محصول شما در سایت قرار خواهد گرفت.
<strong>
    بدیهی است هر چه اطلاعات دقیق تر و کامل تری ارائه کنید فروش بهتری خواهید داشت.
</strong>
					    </p>
					</div>
				</div>
				<div  class="col-lg-offset-2 col-lg-8"  style="border:2px solid #A4B784; padding:20px;">
                <div class="col-md-12">
                    <form class="upload-form" role="form" data-toggle="validator" id="mahalisaz"  method="post" action="{{route('mahalisaz.store')}}" enctype="multipart/form-data">
   
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
                                 نام محلی ساز:
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
                                 خلاصه ای از زندگی نامه (بیوگرافی) جهت آشنایی بیشتر مشتریان با تولید کننده:
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
                              <label for="spec">
                              خواص و موارد مصرف محصول تولیدی:
                                </label>
                              <textarea class="form-control" rows="3" id="property" name="property"  data-error="لطفا این فیلد را  پر نمایید."  required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">
                               قیمت محصولات تولیدی:
                                </label>
                                <input type="text" class="form-control" id="price" name="price" data-error="لطفا این فیلد را  پر نمایید."  required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="weight">
                               وزن یا حجم محصولات:
                                </label>
                                <input type="text" class="form-control" id="weight" name="weight">
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
  
                        <div class="text-center mini-cart-action">
                            <button style="width:50%;font-weight:bold;font-size:130%;margin-top:10px;" type="submit" class="button" >
                              ثبت اطلاعات
                            </button>
                        </div>
                    </form>
                    <div class="text-center" style="margin:20px">
                        <p>
                            بعد از بررسی اطلاعات در اسرع وقت با شما تماس گرفته خواهد شد.
                        </p>
                    </div>
                </div>
            </div>
				

			</div>
		</div>
		 <!-- cart-page-end -->

	@include('includes.footer')
	

@endsection

@section('js')


@endsection