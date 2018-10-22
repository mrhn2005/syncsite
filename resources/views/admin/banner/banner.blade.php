@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    @include('includes.messages')
                   <h1 class="page-header"  style="margin-right:10px;">
                    بنرهای صفحه اصلی
                    </h1>
                    
                    <div class="col-md-12">
                    
                        
                        
                        <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
                            
                            
                            
                            <div class="form-group">
                                <label for="link">
                                  لینک
                                </label>
                                
                                <input type="link" class="form-control" name="link" id="link" required>
                          
                            </div>
                            <div class="form-group">
                                <label for="photo">
                                    تصویر
                                </label>
                                
                                <input type="file" name="path" id="path">
                          
                            </div>
                            <div class="form-group">
                                
                                <input  type="submit" class="btn btn-primary" value="
                                افزودن
                                " >
                            </div>      
                    
                    
                        </form>
                    
                    
                    </div>
                    <div class="col-md-12">
                        
                            <table class="table" style="text-align:right">
                                <thead>
                                    <tr>
                                        <th>
                                           شماره
                                        </th>
                                        <th>
                                          عکس
                                        </th>
                                        <th>
                                          لینک
                                        </th>
                                        <th>
                                          حذف
                                        </th>
    
                                    </tr>
                                </thead>
                        
                        
                                <tbody>
                                       @foreach($banners as $banner)
                                             <form method="post" action="{{route('banner.destroy',$banner)}}" id="delete{{$banner->id}}" class="confirm-form"> 
                                                <input type="hidden" name="_method" value="DELETE" form="delete{{$banner->id}}">
                                            </form>
                                        <tr>  
                                            <td>
                                                {{$banner->id}}
                                            </td>
        
                                            <td>
                                                  <img height="50" src="{{$banner->path ? '/photos/1/'.$banner->path : 'http://placehold.it/400x400' }} " alt="">                         
                                            </td>
                                            <td>
                                                <a href="{{$banner->link}}">
                                                    لینک
                                                </a>
                                                
                                            </td>
                                              <td><button class="btn btn-danger" type="submit" form="delete{{$banner->id}}">
                                               <i class="fa fa-remove" style="font-size:16px; "></i>
                                               </button></td>
                                        </tr>
                                       @endforeach
                                </tbody>
                    
                            </table>
                            
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