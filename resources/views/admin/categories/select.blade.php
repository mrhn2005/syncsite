@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    @include('includes.messages')
                   <h1 class="page-header"  style="margin-right:10px;">
                 انتخاب ویژگی ها دسته
                     {{$category->name}}
                    </h1>
                    
                    <div class="col-md-12">
                    
                        
                        
                        <form action="{{route('category.property.store')}}" method="post">
                            <input type="hidden" name="category" value="{{$category->id}}">
                            @foreach($properties as $property)
                            <div class="checkbox" style="margin-right: 30px;font-size:140%">
                              <label><input class="checkbox_check" id="check{{$property->id}}" name="property[]" type="checkbox" value="{{$property->id}}" style="margin-right: -20px;" {{$category->properties->contains($property->id)?'checked':''}}>
                              {{$property->subject}}</label>
                              <input  type="text" class="form-control float-left default" {{$category->properties->contains($property->id)?'name=name[]':'disabled'}} placeholder="مقدار پیش فرض" >
                              <hr>
                            </div>
                            @endforeach
                            <div class="checkbox" style="margin-right: 30px;font-size:140%;color:blue">
                              <label ><input type="checkbox"  value="{{$property->id}}" style="margin-right: -20px;" id="checkAll">
                                 انتخاب همه
                              </label>
                              <hr>
                            </div>
                            
                                 
                            <input name="add_property" type="submit" class="btn btn-primary" value="
                                افزودن
                                " >
                    
                        </form>
                    
                    
                    </div>
                    
                    
                    
                </div>
            </section>
        </section>
@endsection

@section('js')
<script>
$('form').append('{{csrf_field()}}');
$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
    if(this.checked) {
        $('.default').removeAttr('disabled');
        $('.default').attr('name','name[]');
    }else{
        $('.default').attr('disabled','disabled');
        $('.default').removeAttr('name');
    }
});


$(".checkbox_check").change(function() {
    if(this.checked) {
        $(this).parent().next().removeAttr('disabled');
        $(this).parent().next().attr('name','name[]');
    }else{
        $(this).parent().next().attr('disabled','disabled');
        $(this).parent().next().removeAttr('name');
    }
});
</script>
@endsection