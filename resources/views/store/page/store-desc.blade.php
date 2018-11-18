<div class="row" style="margin-left:10px;">
    <div class="col-lg-7 col-sm-12 col-xs-12" style="padding-bottom:60px" >
        <div style="text-align:right" class="page-single-product-desc">
            <div class="row">
                <div class="col-md-7 col-md-push-5">
                    <div class="product-name " style="text-align:right;margin-bottom:10px;margin-top:-25px;font-size: 39px!important;">
                         <h1 style="font-size: 39px!important;">
                             شهر-حجره:
                             {{$store->name}}
                             </h1>
                    </div>
                    <!--<p class="availability in-stock">Availability: <span>In stock</span></p>-->
                    
                   
                    
                    <div  class="right-class" style="clear:both;padding-top:20px">
                            
                            <p>
                                محل سکونت:
                                @if($store->city)
                                {{$store->city->name}}
                                @endif
                            </p>
                            
                            <p>
                                شماره تماس:
                                {{$store->mobile}}
                            </p>
                    </div> 
                    
                </div>
                
            </div>
            <div class="sin-product-shot-desc" style="font-family:'IranSans','BYekan';direction:rtl;font-size:100%;background-color:#f6f6f6;">
               
                <p style="fint-weight:bold;font-size:140%">
                    توضیحات حجره دار:
                </p>
   
                 <div  style="text-align:justify; padding:7px;">
                   {{$store->description}} 
                </div>

            </div>

        </div>
    </div>
    <div class="col-lg-5 col-sm-12 col-xs-12">
        <div class="zoom-all">
            
                <div class="pro-img-tab-content tab-content">
                    <div class="tab-pane active">
                        <div class="simpleLens-big-image-container ">
                            <a class="simpleLens-lens-image" data-lightbox="roadtrip" 
                            data-lens-image="{{$store->photo ? $store->photo : 'http://placehold.it/400x400' }}" href="{{route('store.page',$store->slug)}}">
                                <img src="{{$store->photo ? $store->photo : 'http://placehold.it/400x400' }}" alt="{{$store->slug}}" class="simpleLens-big-image">
                            </a>
                        </div>
                    </div>
                   
                </div>
       
        </div>
    </div>



</div>