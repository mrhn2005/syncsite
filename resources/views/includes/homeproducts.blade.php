@if(!isset($products))
<div class="text-center" style="font-size:160%; height:300px;direction:rtl;font-weight:bold">
    محصولات ارگانیک به زودی به محلی جات افزوده خواهند شد.
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

@foreach($products as $product) 
<?php $in_sale=0; ?>
<!-- quickview product -->
    @foreach($sales as $sale)
        @if($sale->product->id == $product->id)
         <?php $in_sale=1; break;?>
        @endif
    @endforeach
    @if($in_sale==0)
     @include('includes.product-modal')
    @endif
@endforeach

@endif