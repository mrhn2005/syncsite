<h2 class="right-class">
    مشخصات اصلی 
    {{$product->name}}
</h2>
<br>
@foreach($product->properties as $property)
@if(!empty($property->pivot->name))
<div class="row" style="direction:rtl;text-align:right">
    
    
    
    <div class="col-md-3 col-md-push-9" >
        <span class="product-spec spec-mobile">
        {{$property->subject}}:
        </span>
    </div>
    <div class="col-md-9 col-md-pull-3" style="padding-bottom:10px">
        <span class="product-spec">
        {{$property->pivot->name}}
        </span>
    </div>
</div>
@endif
@endforeach

