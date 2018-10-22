@extends('admin.layout.auth')

@section('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" type="text/css" />
@endsection

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                        ویرایش
                    </h1>
                    <form method="post" action="{{route('promocode.update',$promocode)}}">
                        <input type="hidden" name="_method" value="PUT">
                        <div style="margin-left:100px">
                        <div class="form-group">
                          <label for="code">
                             کد:
                              </label>
                            <input type="text" name="code" id="code" class="form-control" value="{{isset($promocode)?$promocode->code:Request::old('code')}}">
                        </div>
                        </div>
                      {{ csrf_field() }}
                        @include('admin.code.form') 
                    </form>
                </div>
            </section>
        </section>
@endsection

@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/locale/fa.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            
        });
    });
</script>
@endsection