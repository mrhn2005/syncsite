@extends('layout.main')

@section('metadesc')

    <meta name="description" content="در صورت داشتن هر گونه شکایت از خدمات محلی جات با ما تماس بگیرید.">
@endsection

@section('title')
 ثبت شکایت | فروشگاه اینترنتی محلی جات
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
.about-us{
    font-family: IranSans;
    text-align: justify;
}
input[type="text"]{
    padding-right: 14px;
}
.contact-area{
        direction: rtl;
}
.gm-style .gm-style-iw {
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    font-family: 'BYekan';
    text-transform: uppercase;
}
.map-area {
    margin-top: 0px!important;
}
.single-form{
  margin-bottom:15px;
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
							  ثبت شکایت
							</h3>
						</div>
					</div>
				</div>
				<div  class="col-lg-12"  style="border:2px solid #A4B784; padding:5px;">
            <div class="col-md-12">
                <p style="font-size:130%;margin-top:30px">
                شما می توایند شکایات خود را از طریق شماره تلفن یا ایمیل زیر ثبت نمایید. یا به صورت حضوری به آدرس محلی جات مراجعه نمایید و یا از طریق فرم زیر شکایات خود را ثبت نمایید.
                </p>
                <div class="contact-desc">
                        <h3 class="contact-title"><i class="fa fa-user"></i>
                         اطلاعات تماس
                        </h3>
                        <ul>
                            <li><i class="fa fa-map-marker"></i><strong>
                            آدرس:
                            </strong> 
                              تهران - کیلومتر ۲۰ جاده دماوند - پارک فناوری پردیس - خیابان نوآوری دوم - پلاک ۲۳
                            </li>
                            <li><i class="fa fa-phone"></i><strong>
                            تلفن:    
                            </strong> 
                             76250350-021
                             
                             داخلی 328
                            </li>
                            <li><i class="fa fa-envelope"></i><strong>
                            ایمیل:
                            </strong> info [at] mahalijat.com</li>
                            <li><i class="fa fa-telegram"></i><strong>
                            کانال تلگرام:
                            </strong> <a href="https://t.me/mahalijat_co">@mahalijat_co</a></li>
                        </ul>
                    </div>
                    
                      <div class="contact-form">
                        <h3 class="contact-title"><i class="fa fa-envelope"></i>
                         شکایت خود را ارسال نمایید.
                        </h3>
                        <form action="{{route('your_message')}}" method="POST">
                            <div class="single-form">
                                <input name="name" type="text" placeholder="نام" />
                            </div>
                            <div class="single-form">
                                <input name="email" type="text" placeholder="ایمیل" />
                            </div>
                            <div class="single-form">
                                <input name="subject" type="text" placeholder="عنوان" />
                            </div>
                            <div class="single-form">
                                <textarea name="body" required placeholder="متن پیام"></textarea>
                            </div>
                            <button class="cart-button floatright" type="submit" style="float:left!important">
                            ارسال پیام
                            </button>
                        </form>
                    </div>
                                      
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