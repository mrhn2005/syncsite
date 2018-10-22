<div itemscope itemtype="http://schema.org/Product" class="row" style="margin-left:10px;">
    <div class="col-lg-7 col-sm-12 col-xs-12" style="padding-bottom:60px" >
        <div  style="text-align:right" class="page-single-product-desc">
            <div  class="product-name " style="text-align:right;font-size: 39px!important;display:inline-block">
                <h1 style="font-size: 39px!important;">
                 <span itemprop="name">{{$product->name}}</span>    
                </h1>
            </div>
            <!--<p class="availability in-stock">Availability: <span>In stock</span></p>-->
            
            <div  class="rating pull-left" style="margin-top:40px">
                <div class="gray">
                    <div style="width:{{$product->stars()}}%" class="red"></div>
                    
                </div>
                @if(count($product->reviews)>0)
                <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" class="pull-right">
                    ( 
                    امتیاز:
                    <span itemprop="ratingValue">{{$product->stars()/20}}</span>
                 از 
                <span itemprop="reviewCount">{{count($product->reviews)}}</span>
                رای)
                </div>
            @endif
            </div>
            
            <div  class="right-class" style="clear:both;padding-top:20px">
                <div class="gray">
                    دسته بندی:
                    <a style="color:#90133B" href="{{route('category.show',$product->category->slug)}}">{{$product->category->name}}</a>
                </div>
            </div>
            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="price-box single-product-price">
                <meta itemprop="priceCurrency" content="IRR" />
            @if(Request::is('free'))
                <p style="color:red;direction:rtl;" class="normal-price floatright" > 
                      رایگان
                </p>
                <p class="normal-price floatleft" style="direction:rtl;">
                       به اندازه نمونه
                  </p>
            @else
                @if($product->quantity==0) 
                <link itemprop="availability" href="http://schema.org/OutOfStock"/>
                    <p style="color:red;direction:rtl;" class="normal-price floatright" > 
                       ناموجود
                    </p>
                @else
                <link itemprop="availability" href="http://schema.org/InStock"/>
                    @if($product->active_discount==0)
                    <p class="normal-price floatright" style="direction:rtl;">
                        <span itemprop="price">{{$product->price_sell}}</span>
                        
                            تومان
                     </p>
                     @else
                     <p class="normal-price floatright" style="direction:rtl;text-decoration: line-through;">
                        {{$product->price_sell}}
                        
                            تومان
                            
                     </p>
                     
                     
                      <p class="normal-price floatright" style="direction:rtl;color:red">
                          &nbsp;
                        <span itemprop="price">{{$product->price_discount}}</span>
                        
                            تومان
                     </p>
                     @endif
                @endif
                <br>
                <br>
                  <p class="normal-price " style="direction:rtl;">
                       {{$product->weight.' '. $product->weight_unit}}
                  </p>
            @endif
            </div>
            <div class="sin-product-add-cart floatleft" style="margin-bottom:20px">
                <!--<label>-->
                <!--    تعداد-->
                <!--    </label>-->
                <!--<input class="number" type="number" value="1" />-->
                @if($product->quantity==0)
                <span style="cursor:not-allowed">
                    <button style="pointer-events: none;">
                        <i class="fa fa-shopping-cart"></i>
                        <span>
                            افزودن به سبد خرید
                        </span>
                    </button>
                </span>
                @else
                    <button class="add-to-cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span>
                            افزودن به سبد خرید
                        </span>
                    </button>
                    <input type="hidden" value="{{$product->id}}">
                @endif
            </div>
            <div itemprop="description" class="sin-product-shot-desc" style="font-family:'IranSans','BYekan';direction:rtl;font-size:100%">
                @if(count($product->properties)>1)
                <p style="fint-weight:bold;font-size:140%">
                    ویژگیهای کلیدی:
                </p>
                <?php $i=0; ?>
                    @foreach($product->properties as $property)
                        @if(!empty($property->pivot->name )&& $property->subject!='وزن')
                         <p style="text-align:justify; background-color:#f6f6f6;padding:7px;" >
                             <span>
                                 {{$property->subject}}:
                             </span>
                              <span>
                                  {{$property->pivot->name}}
                              </span>
                         </p>
                             @if($i>1)
                                 <?php break; ?>
                             @endif
                             <?php $i=$i+1; ?>
                        @endif
                    @endforeach
                    ...
                @elseif(!empty($product->desc_short))
                    <div  style="text-align:justify">
                       {{$product->desc_short}} 
                    </div>
                @else    
                     <div  style="text-align:justify">
                       {{$value}} 
                    </div>
                @endif
            </div>
            
            <!--<div class="product-action">-->
            <!--    <a href="{{route('cart.add',$product)}}"><i class="fa fa-shopping-cart"></i></a>-->
            <!--    <a href="index-3.html#"><i class="fa fa-heart-o"></i></a>-->
            <!--    <a href="index-3.html#"><i class="fa fa-exchange"></i></a>-->
            <!--</div>-->
            <!--<img src="img/buttons/social-buttons-1.jpg" alt="" />-->
        </div>
    </div>
    <div class="col-lg-5 col-sm-12 col-xs-12">
        <div class="zoom-all">
            
            @if($product->images->count()<2)
                <div class="pro-img-tab-content tab-content">
                    <div class="tab-pane active">
                        <div class="simpleLens-big-image-container ">
                            <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="{{$product->photo ? '/photos/'.$product->photo->name : 'http://placehold.it/400x400' }}" href="{{route('product.show',$product->slug)}}">
                                <img itemprop="image" src="{{$product->photo ? '/photos/'.$product->photo->name : 'http://placehold.it/400x400' }}" alt="{{$product->slug}}" class="simpleLens-big-image">
                            </a>
                        </div>
                    </div>
                   
                </div>
            @else
                <div class="pro-img-tab-content tab-content">
                    <?php $i=0;?>
                    @foreach($product->images as $photo)
                    <?php $i=$i+1;?>
                    <div class="tab-pane{{$i==1?' active':''}}" id="image-{{$product->id}}-{{$photo->id}}">
                        <div class="simpleLens-big-image-container ">
                            <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="{{$photo ? '/photos/'.$photo->name : 'http://placehold.it/400x400' }}" href="{{$photo ? '/photos/'.$photo->name : 'http://placehold.it/400x400' }}">
                                <img  src="{{$photo ? '/photos/'.$photo->name : 'http://placehold.it/400x400' }}" alt="" class="simpleLens-big-image">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pro-img-tab-slider indicator-style2 " style="padding-bottom:30px;">
                    @foreach($product->images as $photo)
                    
                    <div class="item">
                        <a href="index-3.html#image-{{$product->id}}-{{$photo->id}}" data-toggle="tab">
                            <img itemprop="image" src="{{$photo ? '/photos/'.$photo->name : 'http://placehold.it/400x400' }}" alt="" />
                        </a>
                    </div>
                    
                    @endforeach
                </div>
            @endif
        </div>
    </div>



</div>