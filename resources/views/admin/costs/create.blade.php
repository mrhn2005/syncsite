@extends('admin.layout.auth')

@section('style')
<style>
    #tags_tagsinput{
        width:100% !important;
    }
     #tags_tagsinput span{
        font-size: 110%;
        font-family: Calibri;
     }
     div.tagsinput span.tag a {
         font-size: 140% !important;
         color:white !important;
     }
     div.tagsinput span.tag a:hover{
         color:red!important;
     }

</style>
@endsection

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                        ایجاد هزینه جدید
                    </h1>
                    
                    <div style="margin-left:100px;margin-bottom:100px;">
                        <div class="col-md-12">
                    
                        
                        
                        <form action="{{route('costs.store')}}" method="post" enctype="multipart/form-data">
                            
                            
                            
                            <div class="form-group">
                                <label for="link">
                                 توضیحات
                                </label>
                                <textarea name="description" id="desc_short"  rows="6"  required class="form-control" >{{isset($cost)?$cost->description:Request::old('description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="path">
                                    تصویر
                                </label>
                                
                                <input type="file" name="photo" id="path">
                          
                            </div>
                            <div class="form-group">
                                <label for="price">
                                    مقدار هزینه
                                </label>
                                
                                <input type="number" name="price" id="price" class="form-control" required>
                          
                            </div>
                            
                            <div class="form-group">
                                <label for="cost_type">
                                 نوع هزینه
                                </label>
                                
                                <select name="cost_type_id" id="cost_type"  class="form-control" style="font-size:90%">
                            
                                    @foreach($cost_types as $cost_type)
                                            @if (old('cost_type_id') == $cost_type->id)
                                                  <option value="{{$cost_type->id}}" selected>{{$cost_type->name}}</option>
                                            @elseif (isset($cost))
                                                @if($cost->cost_cost_type->id==$cost_type->id)
                                                    <option value="{{$cost_type->id}}" selected>{{$cost_type->name}}</option>
                                                @else
                                                  <option value="{{$cost_type->id}}">
                                                        {{$cost_type->name}}
                                                    </option>
                                                @endif
                                                
                                            
                                            @else
                                                  <option value="{{$cost_type->id}}">
                                                        {{$cost_type->name}}
                                                    </option>
                                            @endif 
                                        
                                    @endforeach
                                </select>
                          
                            </div>
                            
                             
                            <div class="form-group text-center">
                                
                                <input  type="submit" class="btn btn-primary" value="
                                افزودن
                                " >
                            </div>      
                    
                    
                        </form>
                    
                    
                    </div>
                    </div> 
                </div>
            </section>
        </section>
@endsection

@section('js')

@endsection
