<!DOCTYPE html>
<html id="home" lang="en">

<head>
    <meta charset=utf-8 />
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
    </style>
    <!--<link rel="stylesheet" href="/assets/site.min.css">-->
</head>

<body> 
@foreach($products as $product)
{{$product->name}}
<br>
@endforeach
{{ $products->links()}}
    <ol class='example serialization'>
    @foreach($categories as $child)
        <li  data-id="{{$child->id}}" data-name="{{$child->name}}">
            {{$child->name}}
        @include('admin.categories.myPartial')
        </li>
    @endforeach
    </ol>
    <ol class='example '>
      <li data-name="first1">First</li>
      <li data-name="Second2">Second</li>
      <li data-name="Third3">Third</li>
    </ol>
    <form method="post" action="admin/reorder">
        <input type="hidden" name="tree" id="input_tree" />
        <div class="form-group text-center">
          <input type="submit" class="btn btn-success" value="Submit"/>
        </div>
        
    </form>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable-min.js"></script>-->
<script type="text/javascript" src="assets/sortable.js"></script>

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
</body>

</html>