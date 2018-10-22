@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    @include('includes.messages')
                   <h1 class="page-header"  style="margin-right:10px;">
                      دسته بندی ها
                    
                    </h1>
                    <a style="margin:20px" href="{{route('sort')}}" class="btn btn-success">
                      تغییر چیدمان
                    </a>
                    <br>
                    <a style="margin:20px" href="{{route('property.index')}}" class="btn btn-success">
                        افزودن ویژگی ها
                    </a>
                    <div class="col-md-8">
                    
                        <table class="table" style="text-align:right">
                            <thead>
                                <tr>
                                    <th>
                                        شماره
                                    </th>
                                    <th>
                                       عنوان
                                    </th>
                                    <th>
                                        تغییر عکس
                                    </th>
                                    <th>
                                        به‌روزرسانی
                                    </th>
                                    <th>
                                        افزودن ویژگیها
                                    </th>
                                    <th>
                                       حذف
                                    </th>
                                </tr>
                            </thead>
                    
                    
                        <tbody>
                               @foreach($categories as $category)
                                    <form method="post" action="{{route('categories.destroy',$category)}}" id="delete{{$category->id}}" class="confirm-form"> 
                                    <input type="hidden" name="_method" value="DELETE" form="delete{{$category->id}}">
                                    </form>
                                    <form method="post" action="{{route('categories.update',$category)}}" id="update{{$category->id}}" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="PATCH" form="update{{$category->id}}">
                                        
                                      </form>
                                   <tr>
                                    <td>
                                        {{$category->id}}
                                    </td>
                                    <td>
                                        <input style="max-width:100px;" type="text" name="name" class="form-control" value="{{$category->name}}" form="update{{$category->id}}">
                                    <!--<input type="hidden" name="id" value="{{$category->id}}" form="update{{$category->id}}">-->
                                        <img height="50" src="{{$category->photo ? '/photos/'.$category->photo : 'http://placehold.it/400x400' }} " alt="">
                                       
                                    </td>
                                    <td>
                                        <input type="file" name="photo" form="update{{$category->id}}">	                                  
                                    </td>
                                    <td><button class="btn btn-primary" type="submit" form="update{{$category->id}}">
                                   <i class="fa fa-refresh" ></i>
                               </button></td>
                                   <td>
                                       <a href="{{route('categories.properties',$category)}}">
                                           <i class="fa fa-plus" style="font-size:16px;color:green"></i>
                                       </a>
                                   </td>
                                    <td><button class="btn btn-danger" type="submit" form="delete{{$category->id}}">
                                   <i class="fa fa-remove" style="font-size:16px; "></i>
                                   </button></td>
                                </tr>
                               @endforeach
                        </tbody>
                    
                            </table>
                    
                    </div> 
                    <div class="col-md-4">
                    
                        
                        
                        <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label for="name">
                                    عنوان
                                </label>
                                <input name="name" type="text" class="form-control" id="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="photo">
                                    تصویر
                                </label>
                                
                                <input type="file" name="photo" id="photo">
                          
                            </div>
                    
                            <div class="form-group">
                                
                                <input name="add_category" type="submit" class="btn btn-primary" value="
                                افزودن
                                " >
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