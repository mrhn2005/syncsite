
    <a id="mini-cart1"  href="{{route('cart')}}">
        <i class="fa fa-shopping-cart" style="font-size:140%"></i>
        <span>
        {{Cart::count()}}    
        </span>
    </a>
    <div class="mini-cart-dropdown">
        @foreach(Cart::content() as $row)
        <?php $product=App\Product::where('id', '=', $row->id)->first(); ?>
        <div class="single-mini-cart">
            <div class="mini-cart-thumb">
                <a href="{{route('product.show',$product->slug)}}">
                    <img src="{{!is_null($product->photo) ? (!empty($product->main_photo())?'/photos/'.$product->main_photo()->name:'/photos/'.$product->photo->name) : 'http://placehold.it/400x400' }}" alt="" />
                </a>
            </div>
            <div class="mini-cart-content">
                 <a href="{{route('product.show',$product->slug)}}" class="product-name">{{$row->name}}</a>
                <span class="mini-cart-quantity">{{$row->qty}}</span>
                <span>x</span>
                <span class="mini-cart-price">
                    تومان
                    {{$row->price()}}</span>
            </div>
            <div class="cart-item-remove-edit">
                @if(!$row->price()==0)
                <a href="" class="edit-item add-to-cart" style="background: url(/img/icons/add.png) no-repeat;" ></a>
                @endif
                <input type="hidden" value="{{$product->id}}">
                <a href="" class="remove-item minus-one">
 
                </a>
                <input type="hidden" value="{{$row->rowId}}"  data-qty="{{$row->qty}}" />
                <input type="hidden" value="{{$row->id}}"/>
            </div>
        </div>
        @endforeach
        <div class="single-mini-cart">
            <div class="mini-cart-subtotal" style="direction:rtl">
                
                    
                     {{Cart::subtotal(0)}}
                تومان
                
                 <span class="price" style="font-size:90%">
                     مجموع
                     </span>
                     
            </div>
        </div>
        <div class="mini-cart-action">
            <a href="{{route('cart')}}" class="floatleft">
                <i class="fa fa-angle-left" style=""></i>
                &nbsp;&nbsp;
                مشاهده سبد خرید
            </a>
            <!--<button class="floatright">checkout <i class="fa fa-angle-right"></i></button>-->
        </div>
    </div>
