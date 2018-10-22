@extends('admin.layout.auth')

@section('content')
<?php $this_month=jDate::forge(Carbon\Carbon::now())->format('%m')+jDate::forge(Carbon\Carbon::now())->format('%Y')*12; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                       گزارش ها
                    
                    </h1>
                   
                    
                    <h2>
                        سفارش ها
                    </h2>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   زمان
                                </th>
                               <th>
                                 تعداد کل سفارش ها
                                 </th>
                               <th>
                                 مجموع پرداخت ها (تومان)
                                </th>
                                <th>
                                   مجموع تخفیف ها (تومان)
                                </th>
                                <th>
                                   تعداد خریدهای با تخفیف
                                </th>
                                <th>
                                 تعداد خریدهای تحویل داده نشده
                                </th>
                                <th>
                                    تعداد افراد ثبت نامی
                                </th>
                                
                          </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                               <td>
                                   کل
                               </td>
                               <td>{{$orders->count()}}</td>
                               <td>{{$orders->sum('price')}}</td>
                               <td>{{$orders->sum('discount')}}</td>
                               <td>{{$orders->where('discount','>','0')->count()}}</td>
                               <td>{{$orders->where('delivered','0')->count()}}</td>
                               <td>{{$customers->count()}}</td>
                            </tr>
                            @for($i=0;$i<5;$i++)
                            <tr>
                               <td>
                                   @if($i==0)
                                   ماه جاری
                                   @else
                                  {{ $i}}
                                   ماه قبل
                                   @endif
                               </td>
                               
                               <td>{{$orders->where('RelativeMonth',$this_month-$i)->count()}}</td>
                               
                               <td>{{$orders->where('RelativeMonth',$this_month-$i)->sum('price')}}</td>
                               <td>{{$orders->where('RelativeMonth',$this_month-$i)->sum('discount')}}</td>
                               <td>{{$orders->where('RelativeMonth',$this_month-$i)->where('discount','>','0')->count()}}</td>
                               <td>{{$orders->where('RelativeMonth',$this_month-$i)->where('delivered','0')->count()}}</td>
                               <td>{{$customers->where('RelativeMonth',$this_month-$i)->count()}}</td>
                               
                            </tr>
                            @endfor

                      </tbody>
                    </table>   
                    
                    <h2>
                       کاربران
                    </h2>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   زمان
                                </th>
                               <th>
                                تعداد مراجعه کنندگان
                                 </th>
                               <th>
                                 تعداد صفحات بازدید شده
                                </th>
                          </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                               <td>
                                  امروز
                               </td>
                               <td>{{$analytic[2]['visitors']}}</td>
                               <td>{{$analytic[2]['pageViews']}}</td>
                            </tr>
                            
                            <tr>
                               <td>
                                 روز قبل
                               </td>
                               <td>{{$analytic[1]['visitors']}}</td>
                               <td>{{$analytic[1]['pageViews']}}</td>
                            </tr>
                            
                            <tr>
                               <td>
                                  روز ماقبل
                               </td>
                               <td>{{$analytic[0]['visitors']}}</td>
                               <td>{{$analytic[0]['pageViews']}}</td>
                            </tr>
                            


                      </tbody>
                    </table>
                    
                </div>
            </section>
        </section>
@endsection
