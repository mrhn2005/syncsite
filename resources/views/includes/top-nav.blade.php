<header id="page-top-nav" style="display:none!important">
    <div class="header-inner">
        <!-- header-top start -->
        <div class="header-top-area header-top-area-3" >
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <!--logo start-->
                        <div class="logo text-center">
                            <a href="{{route('home')}}"><img id="logo-top" src="/img/logo/mahalijat.png" alt="" />
                            </a>
                        </div>
                        <!--logo end-->
                    </div>

                </div>
            </div>
        </div>
        <!-- header-top end -->
        <div class="header-bottom-area header-bottom-area-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="header-bottom-inner">
                            <div class="col-lg-6 col-md-6 col-sm-12" >
                                <div class="mobile-menu-area" style="direction:rtl; text-align:right">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mobile-menu">
                                                <nav id="dropdown">
                                                    <ul class="menu">
                                                        <li><a class="active" href="{{route('home')}}">
                                                            خانه
                                                        </a>

                                                        </li>
                                                        <li><a href="{{route('shop')}}">
                                                            فروشگاه
                                                            </a>
                                                            
                                                        </li>
                                                        <li><a href="{{route('vendors')}}">
                                                           حجره‌ها
                                                            </a>
                                                            
                                                        </li>
                                                        <li><a href="{{route('cart')}}">
                                                        سبد خرید
                                                        </a></li>
                                                        <li><a href="#">
                                                             درباره ما
                                                        </a>
                                                          <ul class="sub-menu" >
                                                            <li><a href="{{route('contact')}}">
                                                            درباره ما
                                                            </a></li>
                                                            <li><a href="{{route('terms')}}">
                                                            قوانین و مقررات
                                                            </a></li>
                                                            <li><a href="{{route('complaint')}}">
                                                            ثبت شکایت
                                                            </a></li>
                                                            
                                                            </ul>
                                                        </li>
                                                        <li><a class="howtobuy-link" href="#howBuy">
                                                            راهنمای خرید
                                                        </a>
                                                           
                                                        </li>
                                                        <li><a href="{{route('blog')}}">
                                                            وبلاگ
                                                         </a>
                                                        </li>
                                                        <li><a href="{{route('temper.first')}}">
                                                            طبع شناسی
                                                         </a>
                                                        </li>
                                                         @if (Auth::guard('customer')->check())
                                                            <li><a href="{{ route('customer.panel')}}" style="direction:rtl">
                                                                            خوش آمدید
                                                                           {{ Auth::guard('customer')->user()->name}}
                                                                            </a>
                                                                <ul class="sub-menu" >
                                                                    <li>
                                                                            <a href="{{ route('customer.panel')}}">
                                                                                پنل کاربری
                                                                                </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="{{ url('/customer/logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                                                خروج
                                                                                </a>
                                                                        </li>
                                                                        
                                                                </ul>
                                                            </li>
                                                            @else
                                                            <li><a data-toggle="modal"  href="#registerModal">
                                                                ثبت نام
                                                                </a>
                                                                <!--<ul class="sub-menu">-->
                                                                <!--    <li><a href="index.html" class="mega-menu-title">Home Version One</a></li>-->
                                                                <!--    <li><a href="index-2.html">Home Version Two</a></li>-->
                                                                <!--    <li><a href="index-3.html">Home Version Three</a></li>-->
                                                                <!--    <li><a href="index-4.html">Home Version Four</a></li>-->
                                                                <!--</ul>-->
                                                            </li>
                                                            <li><a  href="#">
                                                                ورود
                                                                </a>
                                                                <ul class="sub-menu" >
                                                                    <li><a data-toggle="modal"  href="#loginModal">
                                                                       ورود خریدار
                                                                    </a></li>
                                                                    <li><a href="{{ url('/store/login') }}">
                                                                    ورود حجره دار
                                                                    </a></li>
                                                                    
                                                                    
                                                                </ul>
                                                            </li>
                                                            
                                                            @endif
                                                        
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--mainmenu start-->
                                <div class="mainmenu ">
                                    <nav>
                                        <ul>
                                            @if (Auth::guard('customer')->check())
                                            <li ><a  href="{{ route('customer.panel')}}" style="direction:rtl">
                                                            خوش آمدید
                                                           {{ Auth::guard('customer')->user()->name}}
                                                            </a>
                                                <ul class="sub-menu sub-menu1" style="direction:rtl; text-align:right; left:0px;width:100%">
                                                    <li> 
                                                                            <a href="{{ route('customer.panel')}}">
                                                                                پنل کاربری
                                                                                </a>
                                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/customer/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                                                خروج
                                                                </a>
                                                        </li>
                                                </ul>
                                            </li>
                                            @else
                                            <li><a data-toggle="modal"  href="#registerModal">
                                                ثبت نام
                                                </a>

                                            </li>
                                            <li><a  href="#">
                                                ورود
                                                </a>
                                                <ul class="sub-menu"  style="direction:rtl; text-align:right; left:0px;width:100%" >
                                                    <li><a data-toggle="modal"  href="#loginModal">
                                                       ورود خریدار
                                                    </a></li>
                                                    <li><a href="{{ url('/store/login') }}">
                                                    ورود حجره دار
                                                    </a></li>
                                                </ul>
                                            </li>
                                            
                                            @endif
                                           
                                            
                                            <li><a href="#">
                                            درباره ما
                                            </a>
                                            
                                            <ul class="sub-menu" style="direction:rtl; text-align:right; left:0px;width:100%">
                                                <li><a href="{{route('contact')}}">
                                                درباره ما
                                                </a></li>
                                                <li><a href="{{route('terms')}}">
                                                قوانین و مقررات
                                                </a></li>
                                                <li><a href="{{route('complaint')}}">
                                                ثبت شکایت
                                                </a></li>
                                                
                                            </ul>
                                            </li>
                                            <li><a class="howtobuy-link" href="#howBuy">
                                           راهنمای خرید
                                            </a></li>
                                            <li><a href="{{route('temper.first')}}">
                                                            طبع شناسی
                                                         </a>
                                                        </li>
                                            
                                        </ul>
                                    </nav>
                                </div>
                                <!--mainmenu end-->
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" >
                                <div class="mainmenu header-bottom-menu">
                                    <nav >
                                        <ul>
                                            <li><a href="{{route('blog')}}">
                                                وبلاگ
                                             </a>
                                            </li>
                                            <li><a href=" {{route('cart')}}">
                                            سبد خرید
                                            </a></li>
                                            <li><a href="{{route('shop')}}">
                                                فروشگاه
                                                </a>
                                                <ul class="mega-menu mega-menu-three">
                                                     @foreach($categories as $child)
                                                    <li>
                                                        
                                                        <a href="{{route('maincat.show',$child->slug)}}" class="mega-menu-title">{{$child->name}}</a>
                                                        @foreach($child->children as $child)
                                                            <a href="{{route('category.show',$child->slug)}}">{{$child->name}}</a>
                                                        @endforeach
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                
                                            </li>
                                            <li><a href="{{route('vendors')}}">
                                               حجره‌ها
                                                </a>
                                                
                                            </li>
                                            <li><a href="{{route('home')}}">
                                                خانه
                                            </a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="cart-and-search floatright">
                                    <div class="search-box floatleft">
                                        @include('includes.search')
                                    </div>
                                    <div id="mini-cart" class="total-cart floatleft">
                                        @include('includes.mini-cart')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</header>
          <form id="logout-form" action="{{ url('/customer/logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

<div class="slider-area">
            <!-- slider start -->
            <div class="slider">
                <div id="topSlider" class="nivoSlider nevo-slider" >
                    <!--<img src="/img/slider/6.jpg" alt="main slider" title="#htmlcaption1" />-->
                    <img id="top-image" src="/img/slider/4.jpg" alt="main slider" title="#htmlcaption2" style="transform: translate(0,-50%);" />
                </div>

                <div id="htmlcaption2" class="nivo-html-caption slider-caption">
                    <div class="slider-progress"></div>
                    <div class="bannerslideshow slider-2 h3sldr">
                        <h1 class="title1 ">
                            <!--<span class="word1">-->
                            <!--فروشگاه -->
                            <!--</span>-->
                            <span class="word2 ">
                            محلی
                            </span>
                            <span class="word3">
                            جات    
                            </span>
                        </h1>
                        <h2 class="title2">
								<span class="word1  ">
								بستر
								</span>
								<span class="word2">
								فروش
								</span>
								<span class="word3">
								محصولات
								</span>
								<span class="word4">
								محلی
								</span>
								
								<!--<span class="word7">your</span>-->
								<!--<span class="word8">family</span>-->
								<!--<span class="word9">heath</span>-->
								<!--<span class="word10">!</span>-->
							</h2>
							<br>
                        <div  class="banner7-readmore shop-now">
                            <br>
                            <a title="Shop Now" href="{{route('shop')}}" >
                           می خواهم خرید کنم
                            </a>
                            
                            
                        </div>
                        
                        <div    class="banner7-readmore shop-now">
                            <br>
                            <a  title="Shop Now" href="/store/register" >
                               می خواهم حجره بسازم
                            </a>
                            
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- slider end -->
        </div>