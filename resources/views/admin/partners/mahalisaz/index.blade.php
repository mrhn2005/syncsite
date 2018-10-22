@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                        محلی سازها         
                    </h1>
                   
                    
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   نام
                                </th>
                               <th>
                                  نام محلی ساز
                                 </th>
                               <th>
                                  محل سکونت
                                </th>
                                <th>
                                  شماره تماس
                                </th>
                                <th>
                                   تاریخ ثبت
                                </th>
                              
                                <th>
                                  مشاهده جزئیاات
                                </th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahalisazs as $mahalisaz)

                            <tr>
                               <td>{{$mahalisaz->id}}</td>
                               <td>{{$mahalisaz->name}}</td>
                               <td>{{$mahalisaz->location}}</td>
                               <td>{{$mahalisaz->phone}}</td>
                               <td>{{jDate::forge($mahalisaz->created_at)->format('date')}}</td>

                               <td><a href="{{route('mahalisaz.show',$mahalisaz)}}" style="color:red; font-size:120%">
                                   <i class="fa fa-eye" style="color:green"></i>
                               </a></td>
                               
                            </tr>
                            @endforeach
                      </tbody>
                    </table>   
                </div>
            </section>
        </section>
@endsection