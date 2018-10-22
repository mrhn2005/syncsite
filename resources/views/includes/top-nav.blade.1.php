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
                                                        <li><a href="{{route('cart')}}">
                                                        سبد خرید
                                                        </a></li>
                                                        <li><a href="{{route('contact')}}">
                                                             درباره ما
                                                        </a>
                                                          
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
                                           
                                            
                                            <li><a href="{{route('contact')}}">
                                            درباره ما
                                            </a>
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
                                                    @foreach($maincats as $maincat)
                                                    <li>
                                                        
                                                        <a href="{{route('maincat.show',$maincat->slug)}}" class="mega-menu-title">{{$maincat->name}}</a>
                                                        @foreach($maincat->categories as $category)
                                                            <a href="{{route('category.show',$category->slug)}}">{{$category->name}}</a>
                                                        @endforeach
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                
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