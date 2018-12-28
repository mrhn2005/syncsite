@extends('layout.error')

@section('style')
<?php class Erro {
    function has() {
        $this->model = "x";
    }
}

// create an object
$errors = new Erro(); ?>
<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection


@section('content')

    
    @include('includes.header2')
   
    
        
	<div class="text-center" style="direction:rtl;height:100vh;">
            
            <h1 style="padding-top:100px">
               مشکلی پیش آمده است. لطفا چند دقیقه بعد دوباره تلاش کنید.
            </h1>
            
    </div>	



	@include('includes.footer')
	<!--footer end-->
	


@endsection

