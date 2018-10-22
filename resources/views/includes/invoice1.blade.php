<div class="row printableArea" >
            <div class="container" style="    border: 1px solid #bfbdbd;
width: 700px;direction:rtl!important">
                <div class="left-sidebar">
					<div class="left-sidebar-title">
						<h3 style="text-align:center">
						    فاکتور خرید
						</h3>
					</div>
				</div>
			     
                 <div class="table-responsive"  >          
                      <table class="table table-striped">
                        
                        <tbody style="text-align:center">
                            <tr style="border-top:1px solid lightgray">
                            <td>
                                نام فروشنده
                            </td>
                            <td>
                                فروشگاه اینترنتی محلی‌جات
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                            نام خریدار
                            </td>
                            <td>
                                {{$order->customer->name}}
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                            شماره تماس خریدار
                            </td>
                            <td>
                                {{$order->phone}}
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                            کد پیگیری
                            </td>
                            <td>
                                {{$order->year.$order->month.$order->day.$order->customer->id}}-{{$order->id*99}}
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                                نحوه پرداخت
                            </td>
                            <td>
                                {{$order->payment}}
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                               تاریخ ثبت سفارش
                            </td>
                            <td>
                                {{jDate::forge($order->created_at)->format('date')}}
                            </td>
                            
                          </tr>
                          <tr>
                             <td>
                                زمان ثبت سفارش
                            </td>
                            <td>
                                {{jDate::forge($order->created_at)->format('time')}}
                            </td>
                            
                          </tr>
                        </tbody>
                      </table>
                      </div>
                    
                    <div class="row">
                        @if(!empty($order->description))
                                <div class="col-md-12 col-xs-12"><span class="">
                                           توضیحات سفارش:
                                        </span>
                                        <span style="font-size:100%">
                                        &thinsp;&thinsp;
                                        {{$order->description}}
                                        </span>
                                        <hr>
                                </div>
                                @endif
                        <div class="col-md-12 col-xs-12"><span class="">
                                    آدرس:
                                </span>
                                <span style="font-size:130%">
                                &thinsp;&thinsp;
                                {{$order->address}}
                                </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 idn-section-table">
                        <table class="table table-responsive invoice-table" >
                            <thead>
                                <tr class="idn-header-table">
                                    <th>ردیف</th>
                                    <th>نام سفارش</th>
                                    <th>تعداد</th>
                                    <th>قیمت ( تومان )</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach($order->sales as $product)
                                <?php $i=$i+1; ?>
                                <tr class="food-row">
                                    <td rowspan="1" rel="index"  style="text-align:center;"><span class="kk-fa-digit kk-fa-digit-done">{{$i}}</span></td>
                                     <td rel="title">
                                         <a href="{{route('product.show',$product->product->slug)}}">
                                        {{$product->product->name}} 
                                        
                                        - {{$product->product_weight}} {{$product->product_weight_unit}}
                                        
                                        </a>
                                    </td>
                                    <td rowspan="1" rel="quantity" style="text-align:center;" ><span class="kk-fa-digit kk-fa-digit-done">{{$product->quantity}}</span></td>
                                    <td class="kk-apply-comma kk-comma-done" rel="price" style="font-size:12px" >{{$product->price*$product->quantity}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="idn-span-line-txt idn-right idn-right-border" colspan="3">مجموع</td>
                                    <td class="kk-apply-comma idn-span-line-txt idn-left idn-left-border kk-comma-done">{{number_format(filter_var($order->total_price,FILTER_SANITIZE_NUMBER_INT)+($order->discount))}}</td>
                                </tr>
                                <tr>
                                    <td class="idn-span-line-txt idn-right idn-right-border" colspan="3">مالیات</td>
                                    <td class="kk-apply-comma idn-span-line-txt idn-left idn-left-border kk-comma-done">
                                        0</td>
                                </tr>
                                <tr>
                                    <td class="idn-span-line-txt idn-right idn-right-border" colspan="3">هزینه ارسال </td>
                                    <td class="kk-apply-comma idn-span-line-txt idn-left idn-left-border kk-comma-done">{{$order->delivery_price}}</td>
                                </tr>
                                
                                <tr style="color:#ed0c6e">
                                    <td class="idn-span-line-txt idn-right idn-right-border" colspan="3">تخفیف</td>
                                    <td class="kk-apply-comma idn-span-line-txt idn-left idn-left-border kk-comma-done" style="direction:ltr">{{($order->discount)*-1}}</td>
                                </tr>
                                <tr class="idn-final-payment">
                                    <td class="idn-right " style="padding-right:5%;" colspan="3">مبلغ قابل پرداخت</td>
                                    <td class="idn-pink-span  idn-left " style="padding-left: 5%;"><span class="kk-apply-comma kk-comma-done">{{filter_var($order->total_price,FILTER_SANITIZE_NUMBER_INT)+$order->delivery_price}} &thinsp;</span>تومان</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>