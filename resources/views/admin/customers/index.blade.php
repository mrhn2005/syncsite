@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                        همه اعضا                    
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
                                  ایمیل
                                </th>
                                <th>
                                    تاریخ عضویت
                                </th>
                                <th>
                                   تعداد سفارش
                                </th>
                                <th>
                                  تعداد پرداخت آنلاین (موفق یا ناموفق)
                                </th>
                                <th>
                                  مشاهده سبد خرید
                                </th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)

                            <tr>
                               <td>{{$customer->id}}</td>
                               <td>
                                   <a href="{{route('customers.show',$customer->id)}}" style="color:blue;">
                                   <!--<i class="fa fa-eye" style="font-size:22px; color:green;"></i>-->
                                   {{$customer->name}}- {{$customer->orders->count()}}
                               </a>
                                   </td>
                               <td>{{$customer->mobile}}
                               @if($customer->phone)
                               <br>
                               {{$customer->phone}}
                               @endif
                               </td>
                               <td>{{$customer->email}}</td>
                               <td>{{jDate::forge($customer->created_at)->format('date')}}</td>
                               <td><a href="{{route('customers.show',$customer->id)}}" style="color:red; font-size:120%">
                                   <!--<i class="fa fa-eye" style="font-size:22px; color:green;"></i>-->
                                   {{$customer->orders->count()}}
                               </a></td>
                               <td><a href="{{route('customers.show1',$customer->id)}}" style="color:red; font-size:120%">
                                   {{$customer->transactions->count()}}
                               </a></td>
                               <td><a href="{{route('customers.cart',$customer->id)}}" style="color:red; font-size:120%">
                                   <i class="fa fa-eye" style="color:green"></i>
                               </a></td>
                               
                            </tr>
                            @endforeach
                      </tbody>
                    </table>   
                    @if(method_exists($customers,'links' ))
                    <div class="text-center">
                      {{ $customers->links()}}
                    </div>
                    @endif
                </div>
            </section>
        </section>
@endsection