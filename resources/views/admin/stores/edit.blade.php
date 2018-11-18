@extends('admin.layout.auth')
@section('style')
<!--<link rel="stylesheet" href="/css/invoice.css" type="text/css" />-->
<style>

</style>
<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection
@section('content')
<section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                        ویرایش غرفه 
                        {{$store->name}}
                    </h1>
                    @include('store.edit')
                </div>
            </section>
        </section>

@endsection



@section('js')
<script>
    
    function getCity(val) {
        $("#city").html('');
    	$.ajax({
    	type: "POST",
    	url: "{{route('get_cities')}}",
    	data:'state_id='+val,
    	success: function(data){
    		$("#city").html(data);
    		
    	}
    	});
    }
</script>

@endsection