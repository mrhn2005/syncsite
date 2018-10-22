@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    @include('includes.messages')
                   <h1 class="page-header"  style="margin-right:10px;">
                     ویژگی ها
                    </h1>
                    
                    <div class="col-md-12">
                    
                        
                        
                        <form action="{{route('property.store')}}" method="post">
                            
                            
                            
                            <div class="form-group">
                                <label for="subject">
                                   عنوان
                                </label>
                                
                                <input type="text" class="form-control" name="subject" id="subject">
                          
                            </div>
                    
                            <div class="form-group">
                                
                                <input name="add_property" type="submit" class="btn btn-primary" value="
                                افزودن
                                " >
                            </div>      
                    
                    
                        </form>
                    
                    
                    </div>
                    <div class="col-md-12">
                        <form method="post" action="{{route('category.property.update')}}" >
                            <table class="table" style="text-align:right">
                                <thead>
                                    <tr>
                                        <th>
                                            شماره
                                        </th>
                                        <th>
                                          موضوع
                                        </th>
    
                                    </tr>
                                </thead>
                        
                        
                                <tbody>
                                       @foreach($properties as $property)
                                            
                                        <tr>  
                                            <td>
                                                {{$property->id}}
                                            </td>
        
                                            <td>
                                                <input  type="text" name="new_subject[]" class="form-control" value="{{$property->subject}}">
                                                 <input type="hidden"   name="property_id[]" value="{{$property->id}}">                             
                                            </td>
                                   
                                        </tr>
                                       @endforeach
                                </tbody>
                    
                            </table>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">
                                    به روز رسانی همه
                                </button>
                            </div>
                        </form>
                    </div> 
                    
                    
                </div>
            </section>
        </section>
@endsection

@section('js')
<script>
$('form').append('{{csrf_field()}}');
</script>
@endsection