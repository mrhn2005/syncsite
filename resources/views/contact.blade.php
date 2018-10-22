@extends('layout.main')

@section('title')
درباره ما | فروشگاه اینترنتی محلی جات
@endsection

@section('style')
<style>
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
</style>

@endsection


@section('content')


    
    @include('includes.header')
    <div class="container" style="direction:rtl">
    	@include('includes.messages')	
    </div>
    <div class="map-area">
        <div id="googleMap" style="width:100%;height:410px;"></div>
    </div>
		 <!-- shop-page-end -->
     <!-- contact-area-start-->
    <div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-desc" style="margin-bottom:0px;"> 
                        <h3 class="contact-title"><i class="fa fa-info-circle"></i>
                             درباره ما
                        </h3>
                        <p class="about-us">
                            محلی جات از آبان ماه سال 95 با هدف ارائه محصولات محلی و مطمئن از تولیدکنندگان خانگی و روستایی شروع به فعالیت کرد. این گروه با هسته مرکزی جمعی از دانشجویان دانشگاه صنعتی شریف راه اندازی شده است. محلی جات تاکنون توانسته است نیاز صدها مشتری در حوزه محصولات سالم و طبیعی را پاسخگو بوده و همچنین از تولیدات ده ها تولیدکننده محلی و روستایی و خانگی نیز حمایت کند.
                            <br>
حرکت به سمت کاهش استفاده از تولیدات صنعتی و افزایش سلامت تغذیه در شهرهای بزرگ جزو اصلی ترین اهداف محلی جات است. بسیاری از کسانی که به حوزه استفاده از محصولات سالم علاقه مند هستند، اغلب با چالش اطمینان از طبیعی و محلی بودن محصولاتی مانند: عسل، زعفران، روغن، ادویه جات و عرقیجات مواجه هستند. لذا تیم محلی جات در تلاش است تا محصولات محلی، ارگانیک، طبیعی و سالم را از تامین کنندگان مطمئن تهیه کرده و دراختیار علاقه مندان به این بخش قرار دهد.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="contact-form">
                        <h3 class="contact-title"><i class="fa fa-envelope"></i>
                         پیام خود را ارسال نمایید.
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
    <!-- contact-area-end-->

	@include('includes.footer')
	<!--footer end-->
	
	


@endsection

@section('js')
<script>
	function myMap() {
	  var myCenter = new google.maps.LatLng(35.732318, 51.825407);
	  var mapCanvas = document.getElementById("googleMap");
	  var mapOptions = {center: myCenter, zoom: 13};
	  var map = new google.maps.Map(mapCanvas, mapOptions);
	  var marker = new google.maps.Marker({position:myCenter});
	  marker.setMap(map);
	
	  var infowindow = new google.maps.InfoWindow({
	    content: "فروشگاه اینترنتی محلی جات"
	  });
	  infowindow.open(map,marker);
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5DPZQM-IcQiRm-_m0sMydLGwHpRwGz9I&callback=myMap"></script>

@endsection