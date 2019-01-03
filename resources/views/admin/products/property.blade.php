@extends('admin.layout.auth')

@section('content')
        @include('admin.products.property-in')
@endsection

@section('js')
<script>
$('form').append('{{csrf_field()}}');
</script>
@endsection