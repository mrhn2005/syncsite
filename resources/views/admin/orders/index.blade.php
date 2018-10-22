@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                      همه سفارش ها
                    @if(isset($customer))
                        {{$customer->name}}
                        
                    @endif
                    </h1>
                   
                    
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   شماره
                                </th>
                               <th>
                                  نام مشتری
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
                                   کد تخفیف
                                </th>
                                <th>
                                   نمایش فاکتور سفارش
                                </th>
                                <th>
                                  ویرایش سفارش
                                </th>
                                <th>
                                   لغو سفارش
                                </th>
                                <th>
                                     وضعیت پرداخت
                                </th>
                                <th>
                                  تحویل سفارش
                                </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                        <form method="post" action="{{route('orders.destroy',$order)}}" id="delete{{$order->id}}" class="confirm-form"> </form>
                        <form method="post" action="{{route('orders.update_delivery',$order)}}" id="update{{$order->id}}" class="confirm-form">
                            <input type="hidden" name="_method" value="PATCH" form="update{{$order->id}}">
                            {{ csrf_field() }} </form>
                        <form method="post" action="{{route('orders.update_payed',$order)}}" id="update_payed{{$order->id}}" class="confirm-form">
                            <input type="hidden" name="_method" value="PATCH" form="update_payed{{$order->id}}">
                            {{ csrf_field() }} </form> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" form="delete{{$order->id}}">
                        <input type="hidden" name="_method" value="DELETE" form="delete{{$order->id}}" >
                            <tr {{$order->opened?'':'style=color:red'}}>
                               <td>{{$order->id}}</td>
                               <td>
                                   <a href="{{route('customers.show',$order->customer->id)}}" style="color:blue;">
                                   <!--<i class="fa fa-eye" style="font-size:22px; color:green;"></i>-->
                                   {{$order->customer->name}}- {{$order->customer->orders->count()}}
                               </a>
                                   </td>
                               <td>{{$order->phone}}</td>
                               <td>{{$order->payment}}</td>
                               <td>{{filter_var($order->total_price,FILTER_SANITIZE_NUMBER_INT)+$order->delivery_price}}</td>
                               <td>{{$order->promocode}}</td>
                               <td><a href="{{route('orders.show',$order)}}">
                                   <i class="fa fa-eye" style="font-size:22px; color:green;"></i>
                               </a></td>
                               <td><a href="{{route('orders.edit',$order)}}">
                                   <i class="fa fa-edit" style="font-size:22px; color:purple;"></i>
                               </a></td>
                               <td><button class="btn btn-danger" type="submit" form="delete{{$order->id}}">
                                   <i class="fa fa-remove" style="font-size:16px; "></i>
                               </button></td>
                               
                               @if($order->payment=='پرداخت در محل' && $order->payed==0 )
                               <td><button class="btn btn-danger" type="submit" form="update_payed{{$order->id}}">
                                  
                                   <i class="fa fa-money " style="font-size:16px; "></i>
                               </button></td>
                               @else
                               <td style="color:green;font-weight:bold;">
                                  <i class="fa fa-check " style="font-size:16px; "></i>
                               </td>
                               @endif
                               @if($order->delivered==0)
                               <td><button class="btn btn-danger" type="submit" form="update{{$order->id}}">
                                   
                                   <i class="fa fa-motorcycle" style="font-size:16px; "></i>
                               </button></td>
                               @else
                               <td style="color:green;font-weight:bold;">
                                   <i class="fa fa-check " style="font-size:16px; "></i>
                               </td>
                               @endif
                            </tr>
                            @endforeach
                      </tbody>
                    </table>   
                    @if(isset($customer))
                    <hr>
                        <h3>
                           آدرس ها
                        </h3>
                    <hr>
                        @foreach($customer->addresses as $address)
                        <h4>
                            {{$address->delivery->region}}-{{$address->name}}
                        </h4>
                        
                        @endforeach
                        
                    @if($customer->contest)    
                    
                    <hr>
                        <h3>
                          طبع شناسی
                        </h3>
                    <hr>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                  نام
                                </th>
                                <th>
                                تلقن
                                </th>
                               <th>
                                طبع
                                 </th>
                                 <th>
                               سردی و گرمی
                                 </th>
                               <th>
                                 تری و خشکی
                                </th>
                                <th>
                               امتیاز
                                 </th>
                                 <th>
                               کد
                                 </th>
                                 
                          </tr>
                        </thead>
                        <tbody>
                            
                            
                            <tr>
                               <td>{{$customer->name}}</td>
                               <td>{{$customer->mobile}}</td>
                               <td>{{$customer->temperf}}</td>
                               <td>{{$customer->hot}}</td>
                               <td>{{$customer->wet}}</td>
                               <td>{{$customer->temperscore}}</td>
                               <td>{{$customer->id*2003+123}}</td>
                               
                            </tr>
                            
                            
                      </tbody>
                    </table>
                    @endif
                    @endif
                    
                    @if(method_exists($orders,'links' ))
                    <div class="text-center">
                      {{ $orders->links()}}
                    </div>
                    @endif
                </div>
            </section>
        </section>
@endsection