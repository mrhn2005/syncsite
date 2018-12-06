<?php $categories =App\Category::defaultOrder()->get(['id', 'name','slug','photo' ,'_lft', '_rgt', 'parent_id'])->toTree(); ?>
<form id="logout-form" action="{{ url('/customer/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
		<header>
            <!-- header-top start -->
            <div class="header-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <!-- header-top-left start -->
                            <div class="header-top-left res1">
                                <div class="top-menu lang-select floatleft">
                                    
                                </div>
     
                                <div class="phone-number floatleft" style="direction:rtl"><i class="fa fa-phone" ></i>
                                021-76250350
                            
                                </div>
                            </div>
                            <!-- header-top-left end -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <!-- header-top-right start -->
                            <div class="header-top-right">
                                @if(Auth::guard('store')->check())
                                <div class="top-menu floatright ">
                                    <ul> 
                                        <li><a href="{{ route('store.home')}}" style="direction:rtl;text-align:right">
                                            حجره من
                                        </a></li>
                                    </ul>
                                </div>
                                @elseif(Auth::guard('customer')->check())
                                
                                <div class="top-menu floatright ">
                                    <ul> 
                                        <li><a href="{{ route('customer.panel')}}" style="direction:rtl;text-align:right">
                                        <i class="fa fa-user" style="font-size:14px"></i>
                                                            خوش آمدید
                                                           {{ Auth::guard('customer')->user()->name}}
                                                            </a>
                                                <ul class="sub-menu" >
                                                        <li>
                                                            <a style="text-align:right" href="{{ route('customer.panel')}}">
                                                                پنل کاربری
                                                                </a>
                                                        </li>
                                                        <li>
                                                            <a style="text-align:right" href="{{ url('/customer/logout') }}"
                                                                  onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                                خروج
                                                                </a>
                                                        </li>
                                                </ul>
                                            </li>
                                    </ul>
                                </div>
                                
                                @else
                                <div class="top-menu floatright" style="padding-left:14px;">
                                    <ul><li>
                                        <a data-toggle="modal"  href="#registerModal" style="direction:rtl">
                                            <i class="fa fa-user-plus" style="font-size:14px"></i>
                                        ثبت نام
                                    </a>
                                    </li></ul>
                                   
                                
                                </div>
                                <div class="top-menu floatright">
                                    
                                    <ul><li>
                                        <a data-toggle="modal"  href="#loginModal" style="direction:rtl">
                                            <i class="fa fa-sign-in" style="font-size:14px"></i>
                                        ورود
                                        </a>
                                    </li></ul>
                                    
                                    
                                   
                                  </div>
                                 @endif
                                        
                                
                                
                            </div>
                            <!-- header-top-right end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-top end -->
            <!-- header-bottom start -->
            <div class="header-bottom-area">
                <div class="container">
                    <div class="header-bottom-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12" style="margin-top:-4%;margin-bottom:-2%">
                                <!--logo start-->
                                <div class="logo" >
                                    <a href="{{route('home')}}"><img src="/img/logo/mahalijat.png" alt="" /></a>
                                </div>
                                <!--logo end-->
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="cart-and-search floatright">
                                    <!--search-box-start-->
                                    <div class="search-box floatleft">
                                         @include('includes.search')
                                    </div>
                                    <!--search-box-end-->
                                    <!--total-cart-start-->
                                    <div id="mini-cart" class="total-cart floatleft">
                                        @include('includes.mini-cart')
                                    </div>
                                    <!--total-cart-end-->
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="direction:rtl">
                                <div class="mobile-menu-area">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mobile-menu">
                                                <nav id="dropdown">
                                                    <ul class="menu">
                                                        <li><a href="{{route('home')}}">
                                                            <!--<i class="fa fa-home" style="color:black"></i>-->
                                                                خانه
                                                                
                                                            </a>
                                                        </li>
                                                        <li><a href="{{route('shop')}}">
                                                            فروشگاه
                                                            </a>
                                                        </li>
                                                        <li><a href="{{route('cart')}}">
                                                            سبد خرید
                                                            </a>
                                                        </li>
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
                                                        <li><a href="{{route('blog')}}">
                                                            وبلاگ
                                                         </a>
                                                        </li>
                                                        <li><a href="{{route('temper.first')}}">
                                                            طبع شناسی
                                                         </a>
                                                        </li>
                                                        @if(Auth::guard('store')->check())
                                                        <li><a href="{{route('store.home')}}">
                                                        حجره من
                                                         </a>
                                                        </li>
                                                        @elseif(Auth::guard('customer')->check())
                                                            <li><a href="{{ route('customer.panel')}}" style="direction:rtl">
                                                                            خوش آمدید
                                                                           {{ Auth::guard('customer')->user()->name}}
                                                                            </a>
                                                                <ul class="sub-menu">
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
                                                            <li><a data-toggle="modal"  href="#loginModal">
                                                                ورود
                                                                </a>
                                                                <!--<ul class="sub-menu">-->
                                                                <!--    <li><a href="index.html" class="mega-menu-title">Home Version One</a></li>-->
                                                                <!--    <li><a href="index-2.html">Home Version Two</a></li>-->
                                                                <!--    <li><a href="index-3.html">Home Version Three</a></li>-->
                                                                <!--    <li><a href="index-4.html">Home Version Four</a></li>-->
                                                                <!--</ul>-->
                                                            </li>
                                                            
                                                            @endif
                                                        <!--<li><a class="active" href="#about-us">-->
                                                        <!--    تماس با ما-->
                                                        <!--    </a>-->
                                                        <!--</li>-->
  
                                                        
                                                    </ul>
                                                </nav>
                                            </div>					
                                        </div>
                                    </div>
                                </div>
                                <!--mainmenu start-->
                                <div class="mainmenu">
                                    <nav>
                                        <ul class="menu" style="direction:rtl">
                                            <li style="padding-left: 25px;"><a href="{{route('home')}}">
                                                    خانه
                                                </a>
                                            </li>
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
                                            <li><a href="{{route('cart')}}">
                                                سبد خرید
                                                </a>
                                            </li>
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
                                            <li><a href="{{route('blog')}}">
                                                وبلاگ
                                             </a>
                                            </li>
                                            <li><a href="{{route('temper.first')}}">
                                                            طبع شناسی
                                                         </a>
                                                        </li>
                                            <!--<li><a class="active" href="#about-us">-->
                                            <!--    تماس با ما-->
                                            <!--    </a>-->
                                            <!--</li>-->
                                       </ul>
                                    </nav> 
                                </div>
                                <!--mainmenu end-->
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="brb-gray mrgb-btm-20"></div>
            </div>
            <!-- header-bottom end -->
        </header>