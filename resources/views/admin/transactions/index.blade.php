@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                      همه پرداخت ها
                    
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
                                   مبلغ
                                </th>
                               <th>
                                   وضعیت
                                </th>
                               <th>
                                  شماره کارت
                                </th>
                                
                                <th>
                                   transId
                                </th>
                                <th>
                                  مشاهده فاکتور سفارش
                                </th>
                                <th>
                                  زمان سفارش
                                </th>
                                <th>
                                  تاریخ سفارش
                                </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                        
                            <tr>
                               <td>{{$transaction->id}}</td>
                               
                               <td>{{isset($transaction->customer)?$transaction->customer->name:''}}</td>
                               <td>{{$transaction->amount/10}}</td>
                               
                               <td style="color:{{$transaction->status=='SUCCESS'?'green;font-weight:bold':'red'}}">{{$transaction->status}}</td>
                               
                               <td>{{$transaction->cardNumber}}</td>
                               <td>{{$transaction->transId}}</td>
                               @if(count($transaction->order))
                               <td><a href="{{route('orders.show',$transaction->order->id)}}"> {{$transaction->order->id}} </td>
                               @else
                               <td></td>
                               
                               @endif
                               <td>{{ jDate::forge($transaction->created_at)->format('time')}}</td>
                               <td>{{ jDate::forge($transaction->created_at)->format('date')}}</td>
                            </tr>
                            @endforeach
                      </tbody>
                    </table>   
                </div>
            </section>
        </section>
@endsection