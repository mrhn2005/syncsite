@extends('admin.layout.auth')

@Section('style')
<link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
@endsection

@section('content')
        <section id="main-content" style="margin-bottom:200px;">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                       ویرایش سفارش
                    
                    </h1>
                   <form method="post" action="{{route('orders.update',$order)}}">
                       <input type="hidden" name="_method" value="PUT">
                      {{ csrf_field() }}
                    <div class="col-xs-12" style="font-size:20px;">
                        نام خریدار:
                        <span style="font-weight:bold">
                        {{$order->customer->name}}
                        </span>
                    </div>
                    
                    
                    <div class="col-md-12" style="margin-top:20px;">
                    
                        <div class="form-group">
                        <label for="phone">
                            شماره تماس
                        </label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{isset($order)?$order->phone:Request::old('phone')}}">
                           
                        </div>
                    
                    
                        <div class="form-group">
                               <label for="address">
                                   آدرس
                                </label>
                          <textarea name="address" id="address"  rows="3" class="form-control" >{{isset($order)?$order->address:Request::old('address')}}</textarea>
                        </div>
                        <div class="form-group text-center">
                           <!--<input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">-->
                            <input style="width:40%" type="submit" name="publish" class="btn btn-primary btn-lg" value="
                            تایید
                            ">
                        </div>
                    </div>
                        
                    </form>
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   شماره
                                </th>
                               <th>
                                  نام محصول
                                 </th>
                               <th>
                                   تعداد
                                </th>

                               <th>
                                   قیمت 
                                </th>
                                <th>
                                  به روز رسانی
                                </th>
                                <th>
                                   حذف
                                </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                         @foreach($order->sales as $item) 
                         <?php $i=$i+1; ?>
                        <form method="post" action="{{route('sale.destroy',$item)}}" id="delete{{$item->id}}"> </form>
                        <form method="post" action="{{route('sale.update',$item)}}" id="update{{$item->id}}">
                            <input type="hidden" name="_method" value="PATCH" form="update{{$item->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" form="udpdate{{$item->id}}">
                             </form> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" form="delete{{$item->id}}">
                        <input type="hidden" name="_method" value="DELETE" form="delete{{$item->id}}" >
                            <tr>
                               <td>{{$i}}</td>
                               <td>{{$item->product->name}}</td>
                               <td><input type="number" name="quantity" class="form-control" form="update{{$item->id}}"  value="{{isset($item)?$item->quantity:Request::old('quantity')}}"></td>
                               <td><input type="number" name="price" class="form-control" form="update{{$item->id}}"  value="{{isset($item)?$item->price:Request::old('price')}}"></td>
                               <td><button class="btn btn-primary" type="submit" form="update{{$item->id}}">
                                   <i class="fa fa-refresh" ></i>
                               </button></td>
                               <td><button class="btn btn-danger" type="submit" form="delete{{$item->id}}">
                                   <i class="fa fa-remove" style="font-size:16px; "></i>
                               </button></td>
                            </tr>
                        @endforeach    
                      </tbody>
                    </table>   
                </div>
                <div>
                    <form method="post" action="/products/search" id="search-form" class="confirm-form">
                        <div class="form-group">
                            <input class="form-control" type="text" name="term" value="{{Request::get('term')}}" style="direction: rtl;padding-right: 10px;" placeholder="اضافه کردن محصول " />
                            <input type="hidden" name="order_id" value="{{$order->id}}">
                            <input type="hidden" name="customer_id" value="{{$order->customer->id}}">
                            <button id="submit" type="" style="visibility: hidden;"><i class="fa fa-check"></i></button>
                        </div>
                    </form>
                </div>
            </section>
        </section>
@endsection

@section('js')
<script src="/js/vendor/jquery-1.12.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>

<script>
    $(function(){
      $("input[name=term]").autocomplete({
        
        source: '{{route("proudcts.autocomplete")}}',
        minLength: 2,
        select: function(event, ui){
          $(this).val(ui.item.value);
          $("#search-form").attr("action", "/admin/add/product/" + ui.item.id).submit();
            document.getElementById('submit').click();
    
        }
        
      });
      
    });  
</script>
@endsection