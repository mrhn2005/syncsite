@extends('layout.error')

@section('style')

<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection


@section('content')


    
    @include('includes.header1')
<div class="container" style="margin-top:60px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="direction:rtl">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding-right:20px;">
               تغییر رمز عبور
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4  control-label" style="text-align:left">
                            آدرس ایمیل شما:
                            </label>

                            <div class=" col-md-6 col-md-offset-2">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label" style="text-align:left">
                            رمز عبور
                            </label>

                            <div class="col-md-6 col-md-offset-2">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label" style="text-align:left">
                            تایید رمز عبور
                            </label>
                            <div class="col-md-6 col-md-offset-2">
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
                                    بازگردانی رمز عبور
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
