@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                          حجره ها
                    </h1>

                    <table class="table table-hover">
                        <thead>
                            
                            
                          <tr>
                              <th>
                                  شماره
                              </th>
                               <th>
                                  نام حجره
                                </th>
                               <th>
                                 تاریخ ایجاد
                                 </th>
                                <th>
                                 تلفن
                                </th>
                                <th>
                                    ایمیل
                                </th>
                                <th>
                                آدرس    
                                </th>
                              
                                <th>
                                تعداد محصولات
                                </th>
                                <th>
                                    نمایش محصولات
                                </th>
                                <th>
                                 ویرایش 
                                </th>
                                <th>
                                   ارسال پیام
                                </th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $store)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$store->name}}</td>
                                <td>{{$store->created_at}}</td>
                                <td>{{$store->mobile}}</td>
                                <td>{{$store->email}}</td>
                                <td>{{$store->address}}</td>
                                <td>
                                    
                                    {{$store->products->count()}}
                                    
                                </td>
                                <td><a href="{{route('admin.store.products',$store->id)}}">
                                        <i class="fa fa-eye"></i></a></td>
                                <td><a href="{{route('admin.store.edit',$store)}}">
                                    <i style="font-size:130%;" class="fa fa-edit"></i>
                                </a></td>
                                
                                <td><a href="{{route('admin.store.notification',$store)}}">
                                    <i style="font-size:130%;" class="fa fa-bell"></i>
                                </a></td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>   
                </div>
            </section>
        </section>
@endsection