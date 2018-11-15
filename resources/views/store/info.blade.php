@extends('store.layout.temple')
@section('style')
<!--<link rel="stylesheet" href="/css/invoice.css" type="text/css" />-->
<style>

</style>
<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection
@section('store-content')
    <?php $store=Auth::guard('store')->user(); ?>
    @include('store.edit')
@endsection