 @if(count($orders)>0)
<table class="table table-hover">
    <thead>
      <tr>
           <th>
               شماره
            </th>
           <th>
               شماره تماس
            </th>
           <th>
               نحوه پرداخت
            </th>
           <th>
               قیمت قابل پرداخت
            </th>
            <th>
               نمایش فاکتور سفارش
            </th>
            <th>
              تحویل سفارش
            </th>
      </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        @foreach ($orders as $order)
            <tr>
               <td>{{$i}}</td>
               <td>{{$order->phone}}</td>
               <td>{{$order->payment}}</td>
               <td>{{filter_var($order->total_price,FILTER_SANITIZE_NUMBER_INT)+$order->delivery_price}}</td>
               
               <td><a href="{{route('customer.orders.show',[$order->id])}}">
                   <i class="fa fa-eye" style="font-size:22px; color:green;"></i>
               </a></td>

               @if($order->delivered==0)
               <td style="color:red;font-weight:bold;">
                   تحویل داده نشده
                   <i class="fa fa-motorcycle" style="font-size:16px; "></i>
               </td>
               @else
               <td style="color:green;font-weight:bold;">
                   تحویل داده شد.
               </td>
               @endif
            </tr>
            <?php $i++; ?>
        @endforeach
    </tbody>
</table>
@else
    <h3>
        شما هنوز هیچ سفارشی ثبت نکرده اید.
    </h3>

@endif