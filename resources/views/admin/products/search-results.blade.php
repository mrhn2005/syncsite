
@foreach ($products as $product)
<form method="post" action="{{route('products.destroy',$product)}}" id="delete{{$product->id}}"> </form>


<input type="hidden" name="_method" value="DELETE" form="delete{{$product->id}}" >

<tr>
   <td>{{$product->id}}</td>
   <input type="hidden" name="product_id[]" value="{{$product->id}}" form="update-multiple">
   <td>{{$product->name}}
   <br>
<a href="{{route('product.photos',$product)}}"><img height="50" src="{{$product->photo ? '/photos/'.$product->photo->name : 'http://placehold.it/400x400' }} " alt="">
</a>
   </td>
   <td>
     <select name="category_id[]" form="update-multiple"  class="form-control" style="font-size:90%">
                                
                                    <option value="">
                                    انتخاب دسته بندی
                                    </option>
                                @foreach($categories as $category)
                                        @if (old('category_id') == $category->id)
                                              <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @elseif (isset($product))
                                            @if(!empty($product->category))
                                                @if($product->category->id==$category->id)
                                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                                @else
                                              <option value="{{$category->id}}">
                                                    {{$category->name}}
                                                </option>
                                                @endif
                                            @else
                                              <option value="{{$category->id}}">
                                                    {{$category->name}}
                                                </option>
                                            @endif
                                            
                                        
                                        @else
                                              <option value="{{$category->id}}">
                                                    {{$category->name}}
                                                </option>
                                        @endif 
                                    
                                @endforeach
                            </select>  
       
    </td>
   <td>
       <input style="max-width:100px;" type="number" name="product_price_sell[]" class="form-control" value="{{$product->price_sell}}" form="update-multiple">
    </td>
   <td>
       <input style="max-width:100px;" type="number" name="product_quantity[]" class="form-control" value="{{$product->quantity}}" form="update-multiple">
       
       <input type="hidden" name="id" value="{{$product->id}}" form="update{{$product->id}}">
    </td>
    <td>
     <select name="store_id[]" form="update-multiple"  class="form-control" style="font-size:90%">
                                
                                    <option value="">
                                    انتخاب غرفه
                                    </option>
                                @foreach($stores as $store)
                                        @if (old('store_id') == $store->id)
                                              <option value="{{$store->id}}" selected>{{$store->name}}</option>
                                        @elseif (isset($product))
                                            @if(!empty($product->store))
                                                @if($product->store->id==$store->id)
                                                <option value="{{$store->id}}" selected>{{$store->name}}</option>
                                                @else
                                              <option value="{{$store->id}}">
                                                    {{$store->name}}
                                                </option>
                                                @endif
                                            @else
                                              <option value="{{$store->id}}">
                                                    {{$store->name}}
                                                </option>
                                            @endif
                                            
                                        
                                        @else
                                              <option value="{{$store->id}}">
                                                    {{$store->name}}
                                                </option>
                                        @endif 
                                    
                                @endforeach
                            </select>  
       
    </td>
    <td>
        <select name="active_discount[]"  class="form-control" form="update-multiple">
             <?php $selected=""?>
                    @if (old('active_discount') == '1')
                          <?php $selected="selected"?>
                    @elseif (isset($product))
                        @if($product->active_discount=='1')
                            <?php $selected="selected"?>
                        @endif
                    @endif
              <option value="0">
             غیر فعال
              </option>
              <option value="1" {{$selected}}>
              فعال
            </option>
        </select>
    </td>
    <td>
        <select name="active[]"  class="form-control" form="update-multiple" style="padding-right:0px">
             <?php $selected=""?>
                    @if (old('active') == '1')
                          <?php $selected="selected"?>
                    @elseif (isset($product))
                        @if($product->active=='1')
                            <?php $selected="selected"?>
                        @endif
                    @endif
              <option value="0">
               خیر
              </option>
              <option value="1" {{$selected}}>
             بله
            </option>
        </select>
    </td>
    <td>
       <input style="max-width:100px;" type="text" name="weight[]" class="form-control" value="{{$product->weight}}" form="update-multiple">
    </td>
     <td>
       <input style="max-width:100px;" type="text" name="weight_unit[]" class="form-control" value="{{$product->weight_unit}}" form="update-multiple">
    </td>

    <td>
          <a class="btn btn-info" data-pageAccelerator="false" href="{{route('products.edit',$product)}}">
              <i class="fa fa-edit"></i> </a> 
    </td>
    <td>
          <a class="btn btn-success"  href="{{route('products.properties',$product)}}">
              <i class="fa fa-plus"></i> </a> 
    </td>
  
  <td>
     <button class="btn btn-danger" type="submit" form="delete{{$product->id}}">
       <span class="glyphicon glyphicon-remove"></span>
    </button> 
   </td>
 
 <!--<td><a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>-->
</tr>
@endforeach
