@extends('layout.main')

@section('metadesc')

    <meta name="description" content="هر محصول محلی، ارگانیک، طبیعی و سالم را که علاقه دارید همین حالا سفارش دهید تا در سریعترین زمان ممکن آن را در فروشگاه موجود نماییم.">
@endsection

@section('title')
محلی خواه| فروشگاه اینترنتی محلی جات
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
							    محلی خواه ما باشید!
							</h3>
						</div>
					</div>
					<div class="col-lg-offset-2 col-lg-8" style="text-align:justify;">
					    <h3 style="font-family:BYekan">
					         محلی خواه عزیز سلام
					    </h3>
					    <p style="font-family:IranSans">
لطفا اگر شما هم محصول محلی می شناسید که در سایت محلی جات وجود ندارد در این بخش مشخصات آن ها را وارد کنید تا در اسرع وقت تولیدکننده مناسب برای آن بیابیم.
                        </p>
					</div>
				</div>
				<div  class="col-lg-offset-2 col-lg-8"  style="border:2px solid #A4B784; padding:20px;">
                <div class="col-md-12">
                    <form class="upload-form" role="form" data-toggle="validator" id="mahalisaz"  method="post" action="{{route('mahalikhah.store')}}" enctype="multipart/form-data">
   
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <h3 style="margin-top:40px;">
                                اطلاعات محصول یا محصولات:
                            </h3>
                            <hr style="border-top: 3px solid #bbb;">
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="favorites">
                             عناوین محصولات مورد علاقه:
                                </label>
                              <textarea class="form-control" rows="3" id="favorites" name="favorites"  data-error="لطفا این فیلد را  پر نمایید."  required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="spec">
                            مشخصات محصولات مورد علاقه شما (برای کدام منطقه است، چه مراحلی برای تولیدش طی شده و ...):
                                </label>
                              <textarea class="form-control" rows="3" id="spec" name="spec"  data-error="لطفا این فیلد را  پر نمایید."  required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3 style="margin-top:40px;font-size:150%">
اطلاعات خود را وارد کنید تا پس از تامین با شما تماس بگیریم.
</h3>
                            <hr style="border-top: 3px solid #bbb;">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">
                                 نام محلی خواه:
                                </label>
                                <input type="text" class="form-control" id="name" name="name" data-error="لطفا این فیلد را  پر نمایید."   >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!--<div class="col-md-12">-->
                        <!--    <div class="form-group">-->
                        <!--        <label for="location">-->
                        <!--        محل سکونت:-->
                        <!--        </label>-->
                        <!--        <input type="text" class="form-control" id="location" name="location" data-error="لطفا این فیلد را  پر نمایید."  required>-->
                        <!--        <div class="help-block with-errors"></div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">
                                شماره تماس (تلفن همراه یا تلفن ثابت همراه با کد شهر):
                                </label>
                                <input type="text" class="form-control" id="phone" placeholder="02144335544" pattern="^[\u06F0-\u06F90-9]{11}$" name="phone"   data-error="لطفا این فیلد را مطابق فرمت خواسته شده پر نمایید." >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        
                        
                       
                        
  
                        <div  class="text-center mini-cart-action">
                            <button style="width:50%;font-weight:bold;font-size:130%;margin-top:10px;" type="submit" class="button " >
                              ثبت اطلاعات
                            </button>
                        </div>
                    </form>
                    <div class="text-center" style="margin:20px">
                        <p>
                            از اینکه به ما کمک می کنید متشکریم.
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