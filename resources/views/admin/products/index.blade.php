@extends('admin.layout.auth')

@section('content')

        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                       همه محصولات
                    
                    </h1>
                   <div class="container">
                        <div class="input-group">
                            <span class="input-group-addon" style="    border-radius: 0px; border: solid 1px #CCCCCC;">
                                انتخاب دسته بندی
                            </span>
                            <select id="active_discount" name="active_discount"  class="form-control" onchange="location = this.value;">
                                 
                                  <option value="{{route('products.index')}}">
                                  همه محصولات
                                </option>
                                @foreach($categories as $category)
                                    <option value="{{route('products.category',$category->id)}}" {{request()->route('id')==$category->id?"selected":""}}>
                                      {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                    </div>
                    <div class="container">
                        <div class="input-group">
                            <span class="input-group-addon" style="    border-radius: 0px; border: solid 1px #CCCCCC;">
                            عبارت جستجو
                            </span>
                            <input id="product_search" type="text" class="form-control" name="msg" placeholder="نام کالای مورد نظر خود را وارد نمایید.">
                        </div>
                    </div>
                    <form method="post" action="{{route('multiple.update')}}" id="update-multiple" class="confirm-form">
                        
                    </form> 
                    <hr>
                        <div class="text-center">
                            <button class="btn btn-success" type="submit" style="font-size:120%" form="update-multiple" > 
                            به روز رسانی همه
                            </button>
                             @if(method_exists($products,'links' ))
                            <div class="pull-left" style="margin-left:20px;">
                            {{ $products->links()}}
                            </div>
                            @endif
                        </div>
                   
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   شماره
                                </th>
                               <th>
                                   عنوان
                                 </th>
                               <th>
                                   دسته بندی
                                </th>
                               <th>
                                  قیمت فروش
                                </th>
                               <th>
                                  موجودی
                                </th>
                                <th>
                                    تخفیف
                                </th>
                                <th>
                                   نمونه رایگان
                                </th>
                                <th>
                                    وزن
                                </th>
                                <th>
                                    واحد وزن
                                </th>
                                <th>
                                    ویرایش
                                </th>
                                <th>
                                    افزودن ویژگی ها
                                </th>
                                <th>
                                    حذف
                                </th>
                          </tr>
                        </thead>
                        <tbody>
                           
                            @include('admin.products.search-results')
                      </tbody>
                    </table>  
                    @if(method_exists($products,'links' ))
                    <div class="text-center">
                      {{ $products->links()}}
                    </div>
                    @endif
                    
                </div>
            </section>
        </section>
@endsection

@section('js')
<script>
    var typingTimer;                //timer identifier
    var doneTypingInterval = 500;  //time in ms, 5 second for example
    var $input = $('#product_search');
    
    //on keyup, start the countdown
    $input.on('keyup', function () {
        clearTimeout(typingTimer);
      typingTimer = setTimeout(doneTyping, doneTypingInterval);
      
    //   console.log('hi');
    });
    
    //on keydown, clear the countdown 
    $input.on('keydown', function () {
      clearTimeout(typingTimer);
    });
    
    //user is "finished typing," do something
    function doneTyping () {
        // console.log('hi');
        
        $.ajax({
              url: "{{route('admin.product.search')}}",
              method: 'post',
              data:{
                term: $('#product_search').val(),
                
                _token: "{{csrf_token()}}"
              },
              success: function(response){
                  console.log(response);
                  $('tbody').html(response);
                  $('form').append('{{csrf_field()}}');
   
              },
              error: function(xhr){
                  $('body').html(xhr.responseText);
              }
            });
       
        
    }
    $('form').append('{{csrf_field()}}');
</script>
@endsection