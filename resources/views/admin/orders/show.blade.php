@extends('admin.layout.auth')
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
        <section id="main-content">
            <section class="wrapper ">
                @include('includes.invoice1')
                <div class="text-center" style="font-size:24px;padding:30px" >
                    <button class="btn btn-primary" href="javascript:void(0);" id="printButton" style="font-size:24px;padding:15px">
                    چاپ
                    </button> 
                </div>
            </section>
        </section>
@endsection


@section('js')

<script type="text/javascript" src="/js/jquery.PrintArea.js"></script>
<script>
$(document).ready(function(){
    $("#printButton").click(function(){
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = { mode : mode, popClose : close};
        $("div.printableArea").printArea( options );
    });
});
</script>
@endsection