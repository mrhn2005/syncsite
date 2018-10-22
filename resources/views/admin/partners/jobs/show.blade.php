@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                      فرم
                        {{$job->first_name}} {{$job->last_name}}
                    </h1>
                   <div class="row">
                        <div class="col-sm-9">
                            {{$job->first_name}} {{$job->last_name}}
                        </div>
                        <div class="col-sm-3">
                           نام و نام خانوادگی
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-9">
                            {{$job->age}}
                        </div>
                        <div class="col-sm-3">
                        سن:
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-9">
                            {{$job->email}}
                        </div>
                        <div class="col-sm-3">
                          ایمیل:
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-9">
                            {{$job->field}} 
                        </div>
                        <div class="col-sm-3">
                         رشته تحصیلی:
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-9">
                            {{$job->degree}} 
                        </div>
                        <div class="col-sm-3">
                         مدرک تجصیلی:
                            
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$job->location}}
                        </div>
                        <div class="col-sm-3">
                            محل سکونت:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$job->phone}}
                        </div>
                        <div class="col-sm-3">
                            شماره تماس:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$job->ability}}
                        </div>
                        <div class="col-sm-3">
                            توانایی ها 
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-9">
                            {{$job->interest}}
                        </div>
                        <div class="col-sm-3">
                           علایق:<img src=""></img> 
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-9">
                            {{$job->know}}
                        </div>
                        <div class="col-sm-3">
                          طرز آشنایی با محلی جات
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$job->extra}}
                        </div>
                        <div class="col-sm-3">
                            توضیحات اضافه:
                        </div>
                    </div>
                    <hr>

                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{jDate::forge($job->created_at)->format('date')}}
                        </div>
                        <div class="col-sm-3">
                           تاریخ ثبت
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                         
                            <a  href="/employment/{{$job->file}}">
                                دانلود
                            </a>

                            
                            
                        </div>
                        <div class="col-sm-3">
                         فایل رزومه
                        </div>
                    </div>
                    <hr>
                    
                    
                </div>
            </section>
        </section>
@endsection