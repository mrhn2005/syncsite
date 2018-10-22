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

    
    
    @include('includes.header1')
    
        
	<div class="text-center" style="direction:rtl;height:100vh;">
            
            <h1 style="padding-top:100px">
                خطایی در سرور پیش آمده است.
            </h1>
            
    </div>	



	@include('includes.footer')
	<!--footer end-->
	


@endsection

