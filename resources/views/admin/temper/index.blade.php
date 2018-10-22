@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                       طبع شناسی 
                    </h1>
                   
                    
                    
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
                            @foreach ($customers as $customer)
                            @if($customer->contest)
                            <tr>
                               <td>{{$customer->name}}</td>
                               <td>{{$customer->mobile}}</td>
                               <td>{{$customer->temperf}}</td>
                               <td>{{$customer->hot}}</td>
                               <td>{{$customer->wet}}</td>
                               <td>{{$customer->temperscore}}</td>
                               <td>{{$customer->id*2003+123}}</td>
                               
                            </tr>
                            @endif
                            @endforeach
                      </tbody>
                    </table>   
                </div>
            </section>
        </section>
@endsection