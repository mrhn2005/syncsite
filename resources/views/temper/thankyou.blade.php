@extends('layout.main')


@section('title')
        فروشگاه اینترنتی محلی جات- بستر فروش محصولات محلی، ارگانیک و صنایع دستی محلیجات
@endsection

@section('style')

<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection


@section('content')

    
    
    @include('includes.header')
    
        
	<div class="text-center" style="direction:rtl;">
            
            <h1 style="padding-top:40px;margin:20px">
                {{$customer=Auth::guard('customer')->user()->name}}
                عزیز از شرکت شما در مسابقه طبع شناسی بینهایت ممنونیم.
                <br>
                طبع شما:
                <span style="color:red">
                   {{$customer=Auth::guard('customer')->user()->temperf}} 
                </span>
                <br>
                امتیاز شما:
                <span style="color:red">
                   {{$customer=Auth::guard('customer')->user()->temperscore}} 
                </span>
                <br>
                کد شرکت در مسابقه:
                <span style="color:red">
                   {{$customer=Auth::guard('customer')->user()->id*2003+123}} 
                </span>
            </h1>
            <div class="text-center">
                <a href="{{$customer=Auth::guard('customer')->user()->temperphoto}}">
                <img style="margin:auto" src="{{$customer=Auth::guard('customer')->user()->temperphoto}}" class="img-responsive" alt="{{$customer=Auth::guard('customer')->user()->temperf}}" > 
                </a>
            </div>
            
    </div>	



	@include('includes.footer')
	<!--footer end-->
	


@endsection

