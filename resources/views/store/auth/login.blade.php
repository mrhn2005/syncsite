@extends('store.layout.auth')
@section('style')
<style>
    label{
        text-align:left!important;
    }
    .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio]{
        margin-right:-20px;
    }
</style>

@endsection
@section('content')
<div class="container" style="direction:rtl;text-align:right">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                ورود
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/store/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 col-md-push-8 control-label">
                            آدرس پست الکترونیکی:
                            </label>

                            <div class="col-md-6 col-md-pull-2">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> 
                                        مرا به خاطر بسپار
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-0">
                                <button type="submit" class="btn btn-primary">
                                    ورود
                                </button>

                                <a class="btn btn-link" href="{{ url('/store/password/reset') }}">
                                    
                    رمز عبورم را فراموش کردم.
                
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
