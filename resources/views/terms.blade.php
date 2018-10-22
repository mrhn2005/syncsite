@extends('layout.main')

@section('metadesc')

    <meta name="description" content="قوانین و مقررات محلی جات">
@endsection

@section('title')
 قوانین و مقررات| فروشگاه اینترنتی محلی جات
@endsection

@section('style')
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto);
@keyframes ripple {
  0% {
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0);
  }
  50% {
    box-shadow: 0px 0px 0px 15px rgba(0, 0, 0, 0.1);
  }
  100% {
    box-shadow: 0px 0px 0px 15px rgba(0, 0, 0, 0);
  }
}
.md-radio {
  margin: 16px 0;
}
.md-radio.md-radio-inline {
  display: inline-block;
}
.md-radio input[type=radio] {
  display: none;
}
.md-radio input[type=radio]:checked + label:before {
  border-color: #90133B;
  animation: ripple 0.2s linear forwards;
}
.md-radio input[type=radio]:checked + label:after {
  transform: scale(1);
}
.md-radio label {
  display: inline-block;
  height: 20px;
  position: relative;
  padding: 0 30px;
  margin-bottom: 0;
  cursor: pointer;
  vertical-align: bottom;
}
.md-radio label:before, .md-radio label:after {
  position: absolute;
  content: "";
  border-radius: 50%;
  transition: all 0.3s ease;
  transition-property: transform, border-color;
}
.md-radio label:before {
  right: 0;
  top: 0;
  width: 20px;
  height: 20px;
  border: 2px solid rgba(0, 0, 0, 0.54);
}
.md-radio label:after {
  top: 5px;
  right: 5px;
  width: 10px;
  height: 10px;
  transform: scale(0);
  background: #90133B;
}

*, *:before, *:after {
  box-sizing: border-box;
}



section {
  background: white;
  margin: 0 auto;
  padding: 4em;
  max-width: 800px;
}
section h1 {
  margin: 0 0 2em;
}

</style>
<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection


@section('content')


    
    @include('includes.header')
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
							  قوانین و مقررات سایت
							</h3>
						</div>
					</div>
				</div>
				<div  class="col-lg-12"  style="border:2px solid #A4B784; padding:5px;">
				    <h4>
				        قوانین
				    </h4>
                    <div class="col-md-12" style="font-size:120%;margin-top:20px">
                        <p>کلیه کاربرانی که قصد عضویت و خریداری از سایت محلی جات را دارند ، باید مفاد این توافق&zwnj;نامه را کامل مطالعه و سپس اقدام به عضویت و خرید از سایت کنند.</p>
                        <p>عضویت در سایت و یا خرید از آن به منزله مطالعه و قبول شرایط خرید و عضویت و قوانین و مقررات مربوطه است،&nbsp; محلی جات&nbsp; مطابق با قوانین جمهوری اسلامی ایران فعالیت میکند.</p>
                        <p><strong>بند </strong><strong>۱</strong></p>
                        <p>افراد برای عضویت در سایت باید به قسمت ثبت نام مراجعه کنند.&nbsp;در این مرحله با وارد کردن نام و نام&zwnj;خانوادگی، شماره تماس، آدرس محل سکونت، رمز عبور و آدرس پست الکترونیکی، در محلی جات عضویت پیدا می&shy; کنند.</p>
                        <p><strong>تبصره</strong><strong>&nbsp;</strong><strong>۱</strong><strong><br /> </strong>کاربر باید رمز عبور و نام کاربری خود را حفظ نموده و چنانچه آن را فراموش کند، می&zwnj;تواند برای اخذ کلمه عبور جدید اقدام کند.</p>
                        <p><strong>تبصره</strong><strong>&nbsp;</strong><strong>۲</strong><strong><br /> </strong>کاربر باید آدرس پست الکترونیک خود را به همراه سایر اطلاعات درخواستی به&zwnj; طور صحیح اعلام نموده و مسئولیت ثبت اشتباه و یا خلاف واقع بر عهده شخص کاربر است.</p>
                        <p><strong>تبصره</strong><strong>&nbsp;</strong><strong>۳</strong><strong><br /> </strong>عضویت در سایت محلی جات رایگان است.</p>
                        <p><strong>بند</strong><strong>&nbsp;</strong><strong>۲</strong></p>
                        <p><strong>فرایند خرید از سایت توسط کاربر به این شرح است</strong><strong>:</strong></p>
                        <p><strong>قسمت اول:</strong><strong>&nbsp;</strong>بازدید از کالاهای ارائه شده در سایت</p>
                        <p><strong>قسمت دوم</strong><strong>:&nbsp;</strong>ورود کد تخفیف در صورت دارا بودن و تایید آدرس محل سکونت</p>
                        <p>قسمت سوم: انتخاب روش پرداخت مبلغ فاکتور از بین گزینه های آنلاین و یا پرداخت در محل</p>
                        <p><strong>قسمت چهارم:</strong>&nbsp;ارسال کالا توسط محلی جات</p>
                        <p><strong>تبصره</strong><strong>&nbsp;</strong><strong>۱</strong><strong><br /> </strong>چنانچه خریدار با هویت غیرواقعی اعم از نام، نام خانوادگی و &hellip; اقدام به خرید کند و موضوع مشخص شود، محلی جات حق دارد سفارش را باطل کند.&nbsp;</p>
                        <p><strong>بند </strong><strong>۳</strong></p>
                        <p>حق امتیاز کلیه محصولات این سایت برای محلی جات محفوظ بوده و هر گونه استفاده از نام محلی جات، بدون هماهنگی پیگرد قانونی خواهد داشت.</p>
                        <p><strong>بند </strong><strong>۴</strong></p>
                        <p>محلی جات اطلاعات زیر را به&zwnj; منظور آگاهی کاربر در اختیار آنان قرار می&zwnj;دهد&nbsp;:</p>
                        <p>&ndash; مشخصات فیزیکی و ویژگی&zwnj;های محصول</p>
                        <p>&ndash; تعیین کلیه هزینه&zwnj;هایی که برای خرید کالا بر عهده مشتری است.</p>
                                              
                    </div>
                </div>
				

			</div>
		</div>
		 <!-- cart-page-end -->

	@include('includes.footer')
	

@endsection

@section('js')


<script>

  $('#temper').validator().on('submit', function (e) {
  if (e.isDefaultPrevented()) {
    alert('لطفا به همه سوالات پاسخ دهید');
  } 
})
</script>
@endsection