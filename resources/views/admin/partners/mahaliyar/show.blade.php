@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                        محلی یار
                        {{$mahaliyar->name}}
                    </h1>
                   <div class="row">
                        <div class="col-sm-9">
                            {{$mahaliyar->name}}
                        </div>
                        <div class="col-sm-3">
                            نام محلی یار:
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahaliyar->location}}
                        </div>
                        <div class="col-sm-3">
                            محل سکونت:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahaliyar->phone}}
                        </div>
                        <div class="col-sm-3">
                            شماره تماس:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahaliyar->biography}}
                        </div>
                        <div class="col-sm-3">
                            زندگی نامه:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahaliyar->spec}}
                        </div>
                        <div class="col-sm-3">
                           مشخصات محصول تولیدی:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahaliyar->property}}
                        </div>
                        <div class="col-sm-3">
                            خواص محصول تولیدی:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahaliyar->how}}
                        </div>
                        <div class="col-sm-3">
                           نحوه سفارش و تحویل:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{jDate::forge($mahaliyar->created_at)->format('date')}}
                        </div>
                        <div class="col-sm-3">
                           تاریخ ثبت
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            @foreach($mahaliyar->photos as $photo)
                                <div class="col-md-4">
                                    <img style="width:200px;" src="/photos/mahaliyar/{{$photo->name}}"></img>
                                </div>
                            
                            @endforeach
                        </div>
                        <div class="col-sm-3">
                          تصاویر
                        </div>
                    </div>
                    <hr>
                    
                    
                </div>
            </section>
        </section>
@endsection