@extends('admin.layout.auth')
@section('style')
    <style>
        body.dragging, body.dragging * {
          cursor: move !important;
        }
        
        .dragged {
          position: absolute;
          opacity: 0.5;
          z-index: 2000;
        }
        
        ol.example li.placeholder {
          position: relative;
          /** More li styles **/
        }
        ol.example li.placeholder:before {
          position: absolute;
          /** Define arrowhead **/
        }
        
        .reorder li{
            max-width:400px;
            display: block;
            margin: 10px;
            padding: 7px;
            border: 1px solid #cccccc;
            color: #0088cc;
            background: #eeeeee;
            cursor: pointer;
        }
    </style>

@endsection
@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    @include('includes.messages')
                   <h1 class="page-header"  style="margin-right:10px;">
                    تغییر چیدمان دسته بندی ها
                    </h1>
                    <p style="margin:14px;font-size:130%">
                        چیدمان دسته بندی ها را با استفاده از 
                        drag & drop
                        تغییر دهید.
                    </p>
                    <div class="col-md-12 reorder">
                        <ol class='example serialization'>
                        @foreach($categories as $child)
                            <li  data-id="{{$child->id}}" data-name="{{$child->name}}">
                                {{$child->name}}
                            @include('admin.categories.myPartial')
                            </li>
                        @endforeach
                        </ol>
                    </div>
                    <form method="post" action="{{route('reorder')}}">
                        <input type="hidden" name="tree" id="input_tree" />
                        <div class="form-group text-center">
                          <input type="submit" class="btn btn-success" value="تایید"/>
                        </div>
                    </form>
                </div>
            </section>
        </section>
@endsection

@section('js')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable-min.js"></script>
<!--<script type="text/javascript" src="assets/sortable.js"></script>-->

<script>
    // $(function  () {
    //   $("ol.example").sortable();
    // });
    
    var group = $("ol.serialization").sortable({
  group: 'serialization',
  delay: 500,
  onDrop: function ($item, container, _super) {
    var data = group.sortable("serialize").get();

    var jsonString = JSON.stringify(data, null, ' ');
    console.log(jsonString);
    
    $('#input_tree').val(jsonString);
    _super($item, container);
  }
});
</script>
<script>
$('form').append('{{csrf_field()}}');
</script>
@endsection