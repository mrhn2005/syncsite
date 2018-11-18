<!--<hr style="height:2px;border:none;color:#333;background-color:#333;margin-top:0px">  -->
<div class="row" style="margin-left:10px; direction:rtl;">
    
    <div class="col-md-12">
    @foreach($store->products as $product)    
       @foreach($product->reviews as $review)
           @if($review->active==1)
               <div>
                   
                    {{jDate::forge($review->created_at->diffForHumans())->ago()}}
                    
                </div>
                <div>
                    توسط
                     
                    {{$review->customer->name}}
                    (محصول
                    {{$product->name}}
                    )
                    <div style="float:left"  class="rating">
                        <div  class="gray">
                            <div style="width:{{($review->star)*100/5}}%" class="red"></div>
                        </div>
                    </div>
                    
                </div>

        
        
                <div class="alert alert-info" style="text-align:justify;">
                  {{$review->description}}
                </div>
                @if(!empty($review->reply))
                <div class="alert alert-success" style="margin-right:30px;text-align:justify">
                    <span style="font-weight:bold;">
                    پاسخ محلی جات: 
                    </span>
                  {{$review->reply}}
                </div>
                <hr>
                @endif
           @endif
       @endforeach
      @endforeach
    </div>
    
    
</div>