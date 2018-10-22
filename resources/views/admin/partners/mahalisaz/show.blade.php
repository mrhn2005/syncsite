@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                        محلی ساز
                        {{$mahalisaz->name}}
                    </h1>
                   <div class="row">
                        <div class="col-sm-9">
                            {{$mahalisaz->name}}
                        </div>
                        <div class="col-sm-3">
                            نام محلی ساز:
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahalisaz->location}}
                        </div>
                        <div class="col-sm-3">
                            محل سکونت:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahalisaz->phone}}
                        </div>
                        <div class="col-sm-3">
                            شماره تماس:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahalisaz->biography}}
                        </div>
                        <div class="col-sm-3">
                            زندگی نامه:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahalisaz->spec}}
                        </div>
                        <div class="col-sm-3">
                           مشخصات محصول تولیدی:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahalisaz->property}}
                        </div>
                        <div class="col-sm-3">
                            خواص محصول تولیدی:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahalisaz->price}}
                        </div>
                        <div class="col-sm-3">
                           قیمت محصولات تولیدی:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{$mahalisaz->weight}}
                        </div>
                        <div class="col-sm-3">
                           وزن محصولات تولیدی:
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            {{jDate::forge($mahalisaz->created_at)->format('date')}}
                        </div>
                        <div class="col-sm-3">
                           تاریخ ثبت
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-9">
                            @foreach($mahalisaz->photos as $photo)
                                <div class="col-md-4">
                                    <img style="width:200px;" src="/photos/mahalisaz/{{$photo->name}}"></img>
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