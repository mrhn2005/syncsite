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
                                <div class="logo ">
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
                                                        <li><a href="{{route('contact')}}">
                                                            درباره ما
                                                         </a>
                                                        </li>
                                                        <li><a href="{{route('blog')}}">
                                                            وبلاگ
                                                         </a>
                                                        </li>
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
                                            <li><a href="{{route('contact')}}">
                                                درباره ما
                                             </a>
                                            </li>
                                            <li><a href="{{route('blog')}}">
                                                            وبلاگ
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