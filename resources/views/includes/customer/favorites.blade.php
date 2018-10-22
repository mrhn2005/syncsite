@if(count($products)>0)    
    @foreach ($products as $product)
    	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    		@include('includes.single-product')
    	</div>
    @endforeach
    
    @foreach($products as $product)
    <div class="test">
         @include('includes.product-modal')
     </div>   
    @endforeach	
@else

<h3 style="padding-top:40px;">
    شما هنوز محصولی را نپسندیده اید. برای پسندیدن یک  محصول روی آیکون قلب در گوشه راست پایین محصول کلیک کنید.
</h3>
    
@endif