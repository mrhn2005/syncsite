@extends('store.layout.temple')
@section('style')
<style>
    .edit{
        /*border:1px solid gray;*/
        margin-right:8px;
        margin-top:-5px;
        padding:4px;
    }
    .edit-mom{
        padding-bottom:40px;
    }
</style>

@endsection

@section('store-content')
<?php $store=Auth::guard('store')->user(); ?>
        
        @if(count($store->products)>0) 
        <div style="margin:30px;">
           <a style="paddin-right:10px;font-size:130%" class="btn btn-success" href="{{route('store.products.add')}}">
            افزودن محصول جدید
        </a> 
        </div>
        
            @foreach ($store->products as $product)
            	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 edit-mom">
            		@include('includes.single-product')
            		<div class="edit">
                         <a class="btn btn-success" href="{{route('store.product.photos',$product->id)}}">
                             افزودن عکس
                         </a>
                         
                         <a class="btn btn-primary" href="{{route('store.products.edit',$product->id)}}">
                            ویرایش
                         </a>
                     </div>
            	</div>
            @endforeach

        @else
        
        <h3 style="padding-top:40px;text-align:center">
            شما هنوز محصولی اضافه نکرده اید.
        </h3>
            <div style="margin-top:30px" class="text-center">
                <a style="paddin-right:10px;font-size:130%" class="btn btn-success" href="{{route('store.products.add')}}">
            افزودن محصول جدید
        </a>
            </div>
        @endif
@endsection

@section('js')

@endsection