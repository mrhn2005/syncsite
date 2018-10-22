@extends('layout.main')


@section('title')
      فاکتور|
      فروشگاه اینترنتی محلی‌جات
@endsection

@section('style')

<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->
 <link rel="stylesheet" href="/css/invoice.css" type="text/css" />
<style>
    tr{
        border-top:1px solid lightgray;
    }
</style>
@endsection


@section('content')


    @include('includes.header')
<div style="direction:rtl" class="row" id="orderInfo">
    <div class="col-md-8 col-md-offset-2 col-xs-12" style="margin-top: 2%;">
        <div id="finishOrder">
            <div class="panel-body">
                <div class="text-center">
                    <h3>
                        از خرید شما از فروشگاه محلی‌جات سپاس گزاریم.
                    </h3>
                    <h3>
                       سفارش شما با موفقیت ثبت شد. به زودی جهت هماهنگی برای ارسال سفارش با شما تماس گرفته خواهد شد.
                    </h3>
                </div>
                <hr>
                @include('includes.invoice1')
                
            </div>
        </div>
    </div>
</div>

@include('includes.footer')

@endsection

@section('js')


@endsection