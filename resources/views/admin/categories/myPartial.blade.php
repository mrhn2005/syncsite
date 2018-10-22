 <ol>

 @foreach($child->children as $child)
     <li  data-id="{{$child->id}}" data-name="{{$child->name}}">
    {{ $child->name }}
    
        @include('admin.categories.myPartial')
    
    </li>
  @endforeach
 </ol>