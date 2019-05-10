@extends('store.layout.auth')

@section('style')
<style>
    label{
        text-align:left!important;
    }
</style>

@endsection

@section('content')
<div class="container" style="direction:rtl;text-align:right">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ثبت نام
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/store/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 col-md-push-8 control-label">
                            نام حجره:
                            </label>

                            <div class="col-md-6 col-md-pull-2 ">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label  class="col-md-4 col-md-push-8 control-label">
                              تلفن همراه:
                              </label>
                    
                            <div class="col-md-6 col-md-pull-2">
                                <input  type="text" class="form-control" name="mobile" required pattern="^[\u06F0-\u06F90-9]{11}$" value="{{ old('mobile') }}" placeholder="09121234567"  data-error="لطفا این فیلد را مطابق فرمت خواسته شده پر نمایید." >
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 col-md-push-8 control-label">
                            آدرس پست الکترونیکی:
                            </label>

                            <div class="col-md-6 col-md-pull-2" >
                                <input id="email" required type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 col-md-push-8 control-label">
                            رمز عبور:
                            </label>
 
                            <div class="col-md-6 col-md-pull-2">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 col-md-push-8 control-label">
                            تکرار رمز عبور:
                            </label>

                            <div class="col-md-6 col-md-pull-2">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <p>
                            شما با کلیک بر روی ثبت نام با 
                            <a style="color:#D9534F" href="{{route('terms')}}">
                                قوانین و مقررات
                            </a>
                            خرید و فروش در محلی جات موافقت می نمایید.
                        </p>
                                <button type="submit" class="btn btn-primary">
                                    ثبت نام
                                </button>
                            </div>
                        </div>
                    </form>
                    <div style="margin-right:-10px;">
                <div class="text-center">
           
                   <a class="btn btn-link"  href="{{ url('/store/login') }}" >
                          اگر قبلا ثبت نام کرده ایدِ برای ورود اینجا کلیک نمایید.
                    </a>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
