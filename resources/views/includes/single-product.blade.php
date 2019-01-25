
        <div  class="single-product thumb-hover item" style="direction:ltr">
            <!--<a data-toggle="modal" title="Quick View" href="#" class="view-single-product"><i class="fa fa-expand"></i></a>-->
            <div  class="product-thumb img-container ">
                @if($product->active_discount==1)
                <span style="font-family:BYekan" class="label-pro-sale">-{{$product->discount_percentage()}}%</span>
                @endif
                <?php 
                $datetime2 = new DateTime("now");
                $diff=date_diff( $product->created_at,$datetime2);
                $diff1=$diff->format("%R%a");
                ?>
                @if($diff1<30)
                <span style="font-family:BYekan" class="new">
                    جدید
                </span>
                @endif
               
                    <a   href="{{route('product.show',$product->slug)}}" target="_blank">
                     <div class="img1" style="background-color: white;">    
                            <img  src="{{!is_null($product->photo) ? (!empty($product->main_photo())?'/photos/'.$product->main_photo()->name:'/photos/'.$product->photo->name) : 'http://placehold.it/500x600' }}" alt="{{$product->slug}}" />
                      </div>
                    </a>
                
            </div>
            <div class="product-desc" style="">
                <div style="max-height:26px;overflow:hidden;">
                    <h2 class="product-name floatright" style="text-overflow: ellipsis;direction:rtl"><a href="{{route('product.show',$product->slug)}}">{{$product->name}}</a></h2>
                    
                    @if(Request::is('free'))
                     <h5 style="direction:rtl;" class="product-name floatleft"><a href="{{route('product.show',$product->slug)}}">
                           به اندازه نمونه
                        </a></h5>
                    @else
                    <h5 style="direction:rtl;" class="product-name floatleft"><a href="{{route('product.show',$product->slug)}}">
                           {{ $product->weight.' '. $product->weight_unit}}
                        </a></h5>
                    @endif
                    
                </div>
                
                        
                        <p class="storeName">
                            @if(!empty($product->store))
                            <a href="{{route('store.page',$product->store->slug)}}">
                                حجره 
                                {{$product->store->name}}
                            </a>
                             @endif
                        </p>
                   
                <div class="price-box floatleft">
                    @if(Request::is('free'))
                     <p style="color:red; visibility: hidden " class="normal-price"> <span class="floatleft">{{$product->price_unit}}</span>
                               &nbsp; 18000
                            </p>
                     <p style="color:#992F53 " class="normal-price"> 
                               رایگان
                        </p>
                    @else
                        @if($product->quantity==0)
                            <p style="color:red; visibility: hidden " class="normal-price"> <span class="floatleft">{{$product->price_unit}}</span>
                               &nbsp; 18000
                            </p>
                            
                            <p style="color:red " class="normal-price"> 
                               ناموجود
                            </p>
                        @else
                            @if($product->active_discount==0)
                            <p style="color:red; visibility: hidden " class="normal-price"> <span class="floatleft">{{$product->price_unit}}</span>
                               &nbsp; 18000
                            </p>
                            <p  class="normal-price"> <span class="floatleft">{{$product->price_unit}}</span>
                               &nbsp; {{$product->price_sell}}
                            </p>
                            
                            @else
                            <p style="text-decoration: line-through; " class="normal-price"> <span class="floatleft">{{$product->price_unit}}</span>
                               &nbsp; {{$product->price_sell}}
                            </p>
                            <p style="color:red " class="normal-price"> <span class="floatleft">{{$product->price_unit}}</span>
                               &nbsp; {{$product->price_discount}}
                            </p>
                            @endif
                        @endif
                    @endif
                    
                </div>
                <div class="product-action floatright">
                    <br>
                    @if($product->quantity==0)
                    <span style="cursor:not-allowed">
                        <a href="#" style="pointer-events: none;" data-pageAccelerator="false"><i class="fa fa-shopping-cart"></i></a>
                    </span>
                    
                    @else
                    <a href="#" data-pageAccelerator="false" class="add-to-cart" style="" ><i class="fa fa-shopping-cart"></i></a>
                    <input type="hidden" value="{{$product->id}}">
                    
                    @endif
                    @if (Auth::guard('customer')->check())
                        @if($product->like()==0)
                        <a class="heart-click" href="#"><i class="fa fa-heart-o"></i></a>
                        <input type="hidden" value="{{$product->id}}">
                        @else
                        <a class="heart-remove" style="color:#90133B" href="#"><i  class="fa fa-heart"></i></a>
                        <input type="hidden" value="{{$product->id}}">
                        @endif
                     @else
                    <span style="cursor:not-allowed">
                    <a href="#" style="pointer-events: none;"><i class="fa fa-heart-o"></i></a>
                    </span>
                    @endif
                    <!--<a href="index-3.html#"><i class="fa fa-exchange"></i></a>-->
                </div>
            </div>
        

 </div>