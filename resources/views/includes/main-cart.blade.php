<?php
if(Auth::guard('customer')->check()){
	
	if(isset($address_id)){
		
		$delivery_price=Cart::delivery(Auth::guard('customer')->user()->addresses->where('id',$address_id)->first());
		// $delivery_price=0;
	}else{
		$delivery_price=Cart::delivery(Auth::guard('customer')->user()->addresses->last());
	}
}
else{
	$delivery_price=0;
}
?>  
<table>
		<thead>
			<tr>
			    <th class="product-name">
			     نام محصول
			    </th>
				
				<th class="product-thumbnail">
				تصویر
				</th>
				<th class="real-product-price">
				قیمت واحد
				</th>
				<th class="product-quantity">
				    تعداد
				</th>
				<th class="product-edit">
				افزودن
				</th>
				<th class="product-remove">
				کم کردن
				</th>
				<th class="product-delete">
				حذف کردن
				</th>
				<th class="product-subtotal">
				مجموع
				</th>
			</tr>
		</thead>
		<tbody>
		    @foreach(Cart::content() as $row)
		    
		    <?php $product=App\Product::where('id', '=', $row->id)->first(); ?>
			<tr>
			    <td class="product-name">
					<a  href="{{route('product.show',$product->slug)}}">{{$product->name}}</a>
				</td>
			    
				<td class="product-thumbnail">
					<a href="{{route('product.show',$product->slug)}}">
						<img style="max-width:100px;" src="{{!is_null($product->photo) ? (!empty($product->main_photo())?'/photos/'.$product->main_photo()->name:'/photos/'.$product->photo->name) : 'http://placehold.it/400x400' }}" alt="" />
					</a>
				</td>
				
				
				<td class="real-product-price">
					<span class="amounte">{{$row->price()}}
					تومان
					</span>
					
				</td>
				<td  class="product-quantity" style="font-size:140%">
					{{$row->qty}}
				</td>
				<td class="product-edit">
					@if(!$row->price()==0)
                        <a href="" class="edit-item add-to-cart" >
                            <i class="fa fa-plus" style="color:green;font-size:25px" ></i>
                        </a>
                        <input type="hidden" value="{{$product->id}}">
                    @endif   
				</td>
				<td class="product-remove">
					<a href="" class="remove-item minus-one">

						<i class="fa fa-minus" style="color:orange;font-size:25px"></i>
					</a>
					 <input type="hidden" value="{{$row->rowId}}"  data-qty="{{$row->qty}}" />
                        <input type="hidden" value="{{$row->id}}"/>
				</td>
				<td class="product-delete">
					<a href="" class="delete-item delete-one">

						<i class="fa fa-trash-o" style="color:red;font-size:25px"></i>
					</a>
					 <input type="hidden" value="{{$row->rowId}}"  data-qty="{{$row->qty}}" />
                        <input type="hidden" value="{{$row->id}}"/>
				</td>
				<td class="product-subtotal">
				{{$row->qty*$product->price()}}
				تومان
				</td>
			</tr>
			@endforeach
			<tr>
				<!--<td colspan="4" class="blank_row"></td>-->
				<td class="product-subtotal" colspan="2" style="padding-top:10px;padding-bottom:10px;color:green;"> 
				مجموع
				</td>
				<td class="product-subtotal" colspan="6" style="padding-top:10px;padding-bottom:10px;color:green;">
				<span id="subtotal2">{{Cart::subtotal()}}</span>
				تومان
				</td>
			</tr>
			<tr>
				<!--<td colspan="4" class="blank_row"></td>-->
				<td class="product-subtotal" colspan="2" style="padding-top:10px;padding-bottom:10px;color:green;"> 
				هزینه حمل و نقل
				</td>
				<td class="product-subtotal"   colspan="6" style="padding-top:10px;padding-bottom:10px;color:green;">
					<span id="delivery_price">{{$delivery_price}}</span>
					تومان
					
				</td>
			</tr>
			<tr>
				<!--<td colspan="4" class="blank_row"></td>-->
				<td class="product-subtotal" colspan="2" style="padding-top:10px;padding-bottom:10px;color:green;"> 
				تخفیف
				</td>
				<td class="product-subtotal" colspan="6" style="padding-top:10px;padding-bottom:10px;color:green;">
					<span id="discount">0</span>-
					تومان
				</td>
			</tr>
			<tr>
				<!--<td colspan="4" class="blank_row"></td>-->
				<td class="product-subtotal" colspan="2" style="padding-top:30px;padding-bottom:30px;color:green; font-size:160%"> 
				هزینه نهایی
				</td>
				<td class="product-subtotal" id="subtotal-form" colspan="6" style="padding-top:30px;padding-bottom:30px;color:green; font-size:160%">
				<span id="subtotal">{{(Cart::subtotal())+$delivery_price}}</span>
				تومان
				</td>
			</tr>
		</tbody>
</table>
<input type="hidden" name="promocode" value="" form="payment-final-form" />
<input type="hidden" name="discount_amount" value="0" form="payment-final-form" />
<input type="hidden" name="subtotal_amount" value="{{Cart::subtotal()}}" form="payment-final-form" />
<input type="hidden" name="main_subtotal" value="{{Cart::subtotal()}}" form="payment-final-form" />