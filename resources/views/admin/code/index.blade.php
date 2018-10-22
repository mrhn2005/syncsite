@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                       کدهای تخفیف
                    </h1>
                   
                    
                    <a class="btn btn-success" href="{{route('promocode.create')}}">
                        افزودن کد تخفیف
                    </a>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   کد
                                </th>
                               <th>
                                 تاریخ انقضا
                                 </th>
                                <th>
                                  نوع
                                </th>
                                <th>
                                 درصد تخفیف یا مقدار تخفیف به تومان
                                </th>
                              
                                <th>
                                 حداکثر یا حداقل مقدار سفارش
                                </th>
                                <th>
                                  تعداد کد تخفیف
                                </th>
                                <th>
                                  تعداد کد استفاده شده
                                </th>
                                <th>
                                   وضعیت
                                </th>
                                <th>
                                    ویرایش
                                </th>
                                <th>
                                   حذف
                                </th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($codes as $code)
                            <form method="post" action="{{route('promocode.destroy',$code)}}" id="delete{{$code->id}}" class="confirm-form"> 
                        
                                {{ csrf_field() }}  
                                 <input type="hidden" name="_method" value="DELETE" >
                            </form>
                            <tr>
                               <td>{{$code->code}}</td>
                               <td>{{\Carbon\Carbon::parse($code->expires_at)}}</td>
                               <td>{{$code->is_fixed?"
                               ریالی
                               ":"
                               درصدی
                               "}}</td>
                               <td>{{$code->discount_amount}}</td>
                               <td>{{$code->order_amount}}</td>
                               <td>{{$code->max_uses_user}}</td>
                               <td>{{$code->uses}}</td>
                               @if($code->isExpired())
                                  <td style="color:red">
                                      منقضی
                                  </td>
                                @else
                                <td style="color:green">
                                    دارای اعتبار
                                </td>
                                @endif
                                <td>
                                    <a href="{{route('promocode.edit',$code)}}">
                                        <i class="fa fa-edit" style="font-size:26px;color:blue"></i>
                                    </a>
                                </td>
                                <td><button class="btn btn-danger" type="submit" form="delete{{$code->id}}">
                                   <i class="fa fa-remove" style="font-size:16px; "></i>
                               </button></td>
                            </tr>
                            @endforeach
                      </tbody>
                    </table>   
                </div>
            </section>
        </section>
@endsection