@if(!isset($products))
<div class="text-center" style="font-size:160%; height:300px;direction:rtl;font-weight:bold">
    محصولات این دسته به زودی به محلی جات افزوده خواهند شد.
</div>


@else
<div class="row">
                     <!--Tab panes -->
    <div class="tab-content">
      
        <div  role="tabpanel" class="tab-pane active" id="shop-square">
           
            <div class="single-carousel33">
                
                @foreach($products as $product)
                    
                    <div>
                    <!-- single-product start-->
                        <div class="col-lg-3">
                         @include('includes.single-product')
                       </div>
                    </div>
                         
                @endforeach
                        
            </div>
        </div>
       
    </div>
 </div>

 <div class="text-center" style="margin-bottom:40px;">
    <div class="buttons-cart">
        @if(isset($categor))
        <a id="category_link" href="{{route('category.show',$categor->slug)}}" style="font-size:150%;text-decoration:none" >
            مشاهده تمام محصولات
        </a>
        @else
        <a id="category_link" href="{{route('shop')}}" style="font-size:150%;text-decoration:none" >
            مشاهده تمام محصولات
        </a>
        @endif
        
        <a  href="{{route('vendors')}}" style="font-size:150%;text-decoration:none" >
            مشاهده حجره‌ها
        </a>
   </div>
</div>

@endif