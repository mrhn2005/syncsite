@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                        محلی یارها         
                    </h1>
                   
                    
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   نام
                                </th>
                               <th>
                                  نام محلی یار
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
                            @foreach ($mahaliyars as $mahaliyar)

                            <tr>
                               <td>{{$mahaliyar->id}}</td>
                               <td>{{$mahaliyar->name}}</td>
                               <td>{{$mahaliyar->location}}</td>
                               <td>{{$mahaliyar->phone}}</td>
                               <td>{{jDate::forge($mahaliyar->created_at)->format('date')}}</td>

                               <td><a href="{{route('mahaliyar.show',$mahaliyar)}}" style="color:red; font-size:120%">
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