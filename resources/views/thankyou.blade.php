@extends('layout.error')


@section('title')
        فروشگاه اینترنتی محلی جات- بستر فروش محصولات محلی، ارگانیک و صنایع دستی محلیجات
@endsection

@section('style')

<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection


@section('content')

    
    
    @include('includes.header')
    
        
	<div class="text-center" style="direction:rtl;height:100vh;">
            
            <h1 style="padding-top:100px;margin:40px">
                @if(Session::has('thankyou'))
                {{ Session::get('thankyou') }}
                @else
                 آدرس وارد شده صحیح نمی باشد.
                @endif
                
            </h1>
            
    </div>	



	@include('includes.footer')
	<!--footer end-->
	


@endsection

