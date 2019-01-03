@extends('store.layout.temple')
@section('style')
<style>

</style>
@endsection

@section('store-content')

       @include('admin.products.property-in')
@endsection

@section('js')
<script>
$('form').append('{{csrf_field()}}');
</script>
@endsection