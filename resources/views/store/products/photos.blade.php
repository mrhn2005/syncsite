@extends('store.layout.temple')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css" type="text/css" />
<style>
    th{
        text-align:right!important;
    }
</style>
@endsection

@section('store-content')

        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    
                     <h3 class="page-header">
                      تصاویر محصول 
                      <strong>{{$product->name}}</strong>
                    
                    </h3>
                   
                    
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   شماره
                                </th>
                               <th>
                                   عنوان محصول
                                 </th>
                               <th>
                                   تصویر
                                </th>
                               <th>
                                   حذف تصویر
                                </th>
                               <th>
                                   تصویر اول
                               </th>
                          </tr>
                        </thead>
                        
                            <?php $i=0; ?>
                          @foreach($product->images as $photo)
                             <form method="post" action="{{route('photo.destroy',$photo)}}" id="delete{{$photo->id}}"> </form>
                             <input type="hidden" name="product_id" value="{{$product->id}}"  form="delete{{$photo->id}}">
                             <form method="post" action="{{route('photo.update',$photo)}}" id="update{{$photo->id}}" >
                                 <input type="hidden" name="_method" value="PATCH" form="update{{$photo->id}}">
                                 <input type="hidden" name="product_id" value="{{$product->id}}"  form="update{{$photo->id}}">
                               </form>
                             <input type="hidden" name="_method" value="DELETE" form="delete{{$photo->id}}" >
                          <tbody>
                          <?php $i=$i+1; ?>
                              <td>
                                  {{$i}}
                              </td>
                              <td>
                                  {{$product->name}}
                              </td>
                              
                              <td>
                                  <img style="width:70px" src="/photos/{{$photo->name}}"></img>
                              </td>
                              <td><button class="btn btn-danger" type="submit" form="delete{{$photo->id}}">
                                   <i class="fa fa-remove" style="font-size:16px; "></i>
                               </button></td>
                               @if($photo->main_photo==1)
                                   <td>
                                       تصویر اصلی
                                   </td>
                               
                               @else
                               <td><button class="btn btn-success" type="submit" form="update{{$photo->id}}">
                                   تبدیل به تصویر اصلی
                               </button></td>
                               @endif
                             </tbody>
                           @endforeach 
                      
                    </table>  
                    <div style="max-width:100%" class="container" >
                        <form  method="post" action="{{route('photo.store')}}"
                      class="dropzone"
                      id="myDropzone">
                            <input type="hidden" name="product_id"  value="{{$product->id}}" />
                        </form>
                    </div>
                    
                 </div>
            </section>
        </section>
@endsection

@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
<script>

Dropzone.options.myDropzone = {
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
    init: function() {
        
        this.on("success", function() {
            location.reload();
        });
    }
};
$('form').append('{{csrf_field()}}');
</script>
@endsection