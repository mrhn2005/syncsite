@extends('layout.main')

@section('metadesc')

    <meta name="description" content="اگر محصول محلی، ارگانیک، طبیعی و سالم تولید می کنید میتوانید محصولات خود را در محلی جات به فروش رسانید.">
@endsection

@section('title')
استخدام در محلی جات | فروشگاه اینترنتی محلی جات
@endsection

@section('style')

<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->
<link href="/css/bootstrap-datepicker.min.css" rel="stylesheet">
<style>
        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
     background: #F0F2F7 !important; 
    color: #333;
    border-radius: 3px;
}
.ui-datepicker-today .ui-state-default {
    background: red!important;
    color:white!important;
}
.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
    background: #08c!important;
    color: #fff!important;
}
</style>
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
							    به ما ملحق شوید!
							</h3>
						</div>
					</div>
<!--					<div class="col-lg-offset-2 col-lg-8" style="text-align:justify;">-->
<!--					    <h3 style="font-family:BYekan">-->
<!--					        تولید کننده (محلی ساز) گرامی-->
<!--					    </h3>-->
<!--					    <p style="font-family:IranSans">-->
					       
<!--محلی جات برای معرفی محصولات شما به اطلاعات کاملی از شما و محصول تولیدی نیاز دارد. بنابراین لطفا فرم زیر را با دقت تکمیل کنید. بعد از بررسی محصول، ما با شما تماس می گیریم و محصول شما در سایت قرار خواهد گرفت.-->
<!--<strong>-->
<!--    بدیهی است هر چه اطلاعات دقیق تر و کامل تری ارائه کنید فروش بهتری خواهید داشت.-->
<!--</strong>-->
<!--					    </p>-->
<!--					</div>-->
				</div>
				<div  class="col-lg-offset-2 col-lg-8"  style="border:2px solid #A4B784; padding:20px;">
                <div class="col-md-12">
                    <form class="upload-form" role="form" data-toggle="validator" id="mahalisaz"  method="post" action="{{route('job.store')}}" enctype="multipart/form-data">
   
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <h3 style="margin-top:20px;">
                               لطفا فرم زیر را پر نمایید.
                            </h3>
                            <hr style="border-top: 3px solid #bbb;">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="first_name">
                                 نام:
                                </label>
                                <input type="text" class="form-control" id="first_name" name="first_name" data-error="لطفا این فیلد را  پر نمایید."   required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12" >
                            <div class="form-group">
                                <label for="last_name">
                                 نام خانوادگی:
                                </label>
                                <input type="text" class="form-control" id="last_name" name="last_name" data-error="لطفا این فیلد را  پر نمایید."   required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12" >
                            <div class="form-group">
                                <label for="age">
                                 سن:
                                </label>
                                <input type="number" class="form-control" id="age" name="age" data-error="لطفا این فیلد را  پر نمایید."   required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field">
                                رشته تحصیلی:
                                </label>
                                <input type="text" class="form-control" id="field" name="field" data-error="لطفا این فیلد را  پر نمایید."  required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field">
                               آخرین مقطع تحصلی:
                                </label>
                                <input type="text" class="form-control" id="degree" name="degree" data-error="لطفا این فیلد را  پر نمایید."  required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="EMAIL">
                                آدرس ایمیل:
                                </label>
<input id="email" type="email" placeholder="test@test.com" class="form-control" name="email" required value="{{ old('email') }}" data-error="لطفا این فیلد را به فرمت ایمیل پر نمایید." >
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
                                 <label for="interest">
                                علایق:
                                 </label>
                                 <textarea class="form-control" rows="3" id="interest" name="interest"  data-error="لطفا این فیلد را  پر نمایید."  required></textarea>
                                 <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                 <label for="ability">
                                توانمندی ها:
                                 </label>
                                 <textarea class="form-control" rows="3" id="ability" name="ability"  data-error="لطفا این فیلد را  پر نمایید."  required></textarea>
                                 <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="know">
                              نحوه آشنایی با محلی جات:
                                </label>
                                <input type="text" class="form-control" id="know" name="know" data-error="لطفا این فیلد را  پر نمایید."  required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                 <label for="extra">
                                توضیحات بیشتر:
                                 </label>
                                 <textarea class="form-control" rows="3" id="extra" name="extra"  data-error="لطفا این فیلد را  پر نمایید."  required></textarea>
                                 <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="file">
                                     فایل رزومه:
                                </label>
                              <input type="file" class="" data-max-size="5000000"  id="file" name="file" multiple required data-error="لطفا فایل رزومه را بارگذاری نماید.">
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
<script src="/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/bootstrap-datepicker.fa.min.js"></script>
<script>
    $(document).ready(function() {
        $(".datetimepicker").datepicker({
            changeMonth: true,
            changeYear: true
        });
         $("#datepickerbtn1").click(function(event) {
            event.preventDefault();
            $("#begin_date").focus();
        })
        $("#datepickerbtn").click(function(event) {
            event.preventDefault();
            $("#end_date").focus();
        })
    });
</script>

@endsection