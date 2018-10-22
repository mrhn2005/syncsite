@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                        درخواست های استخدام    
                    </h1>
                   
                    
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   ردیف
                               </th>
                               <th>
                                   نام
                                </th>
                               <th>
                                  نام خانوادگی
                                 </th>
                               <th>
                                  محل سکونت
                                </th>
                                <th>
                                  شماره تماس
                                </th>
                                <th>
                                  رشته تحصیلی
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
                            <?php $i=0;?>
                            @foreach ($jobs as $job)
                                <?php $i++;?>
                            <tr>
                               <td>{{$i}}</td>
                               <td>{{$job->first_name}}</td>
                               <td>{{$job->last_name}}</td>
                               <td>{{$job->location}}</td>
                               <td>{{$job->phone}}</td>
                               <td>{{$job->field}}</td>
                               <td>{{jDate::forge($job->created_at)->format('date')}}</td>

                               <td><a href="{{route('job.show',$job)}}" style="color:red; font-size:120%">
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