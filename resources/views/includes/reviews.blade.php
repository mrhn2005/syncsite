<!--<hr style="height:2px;border:none;color:#333;background-color:#333;margin-top:0px">  -->
<div class="row" style="margin-left:10px; direction:rtl;">
    
    <div class="col-md-12">
        
       @foreach($product->reviews as $review)
           @if($review->active==1)
               <div>
                   
                    {{jDate::forge($review->created_at->diffForHumans())->ago()}}
                    {{$review->customer->name}}
                </div>
                <div>
                    توسط
                     
                
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
    </div>
    <div class="col-md-12">
        
     <hr style="height:1px;border:none;color:#eee;background-color:#aaa;">
          <!--<form method="post" action="">-->
          <!--    {{ csrf_field() }}-->
            
                <label style="padding-top:12px;">
                     نظر شما:
                </label>
                <div class="review-star" style="float:left; margin-top:8px;margin-left:-25px">
                    <input checked class="star star-5" id="star-5{{$product->id}}" type="radio" name="star" value="5" />
                    <label class="star star-5" for="star-5{{$product->id}}"></label>
                    <input class="star star-4" id="star-4{{$product->id}}" type="radio" name="star" value="4"/>
                    <label class="star star-4" for="star-4{{$product->id}}"></label>
                    <input class="star star-3" id="star-3{{$product->id}}" type="radio" name="star" value="3"/>
                    <label class="star star-3" for="star-3{{$product->id}}"></label>
                    <input class="star star-2" id="star-2{{$product->id}}" type="radio" name="star" value="2"/>
                    <label class="star star-2" for="star-2{{$product->id}}"></label>
                    <input class="star star-1" id="star-1{{$product->id}}" type="radio" name="star" value="1"/>
                    <label class="star star-1" for="star-1{{$product->id}}"></label>
                </div>
            <div class="form-group">
                 
                 <textarea name="description"   rows="3" class="form-control review-desc"></textarea>
            </div>
    @if(Auth::guard('customer')->check())
            <div class="form-group" style="margin-bottom:40px;">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="submit" name="submit_review" class="btn btn-success floatleft" style="font-size:130%" value="
                    ثبت نظر
                    ">
            </div>
    @else
        <div class="text-center">
			<div class="buttons-cart">
				<a  data-toggle="modal" href="#registerModal" style="font-size:150%;text-decoration:none" >
				ثبت نام	
				</a>
				<a data-toggle="modal" href="#loginModal" style="font-size:150%;padding-right:30px;text-decoration:none">
				ورود
				</a>
			</div>
			
		</div>
    @endif    
        
    </div>
    
</div>