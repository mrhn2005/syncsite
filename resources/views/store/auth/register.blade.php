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

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 col-md-push-8 control-label">
                            آدرس پست الکترونیکی:
                            </label>

                            <div class="col-md-6 col-md-pull-2" >
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

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
                                <button type="submit" class="btn btn-primary">
                                    ثبت نام
                                </button>
                            </div>
                        </div>
                    </form>
                    <div style="margin-right:-10px;">
                <div class="text-center">
           
                   <a class="btn btn-link"  href="store/login" >
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
