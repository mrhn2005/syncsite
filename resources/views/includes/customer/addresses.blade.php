<form method="post" action="{{route('store.address')}}" id="store">
    {{ csrf_field() }}
</form> 
<?php $cities=DB::table('deliveries')->get();?>
<table class="table table-hover">
    <thead>
      <tr>
            <th>
               شماره
            </th>
            <th>
               شهر
            </th>
           <th>
               آدرس
            </th>
           <th>
               ویرایش
            </th>
             <th>
               حذف
            </th>
      </tr>
    </thead>
    <tbody>
        <?php $num_addreses=count($addresses); $i=1; ?>
        @foreach ($addresses as $address)
            <form method="post" action="{{route('edit.address',[$address->id])}}" id="update{{$address->id}}">
                {{ csrf_field() }}
            </form> 
            <form method="post" action="{{route('delete.address',[$address->id])}}" id="delete{{$address->id}}">
                {{ csrf_field() }}
             </form> 
            <tr>
               <td>{{$i}}</td>
               <td>
                     <select name="region_id" id="city" class="form-control" form="update{{$address->id}}" >
                        
                        @foreach($cities as $city)
                            
                        <option value="{{$city->id}}" {{($address->delivery_id == $city->id)?'selected':''}}>{{$city->region}}</option>
                            
                        @endforeach
                    </select>  
                </td>
               <td>
                    <textarea name="name"  rows="2" class="form-control" form="update{{$address->id}}" required>{{isset($address)?$address->name:Request::old('name')}}</textarea>
                </td>
               <td><button class="btn btn-success" type="submit" form="update{{$address->id}}">
                   <i class="fa fa-refresh" ></i>
               </button></td>
               <td>
                   @if($num_addreses>1) 
                   <button class="btn btn-danger submit1" type="submit" form="delete{{$address->id}}">
                       <i class="fa fa-remove" style="font-size:16px; "></i>
                   </button>
                   @endif
               </td>
         <?php $i=$i+1; ?> 
             </tr>
        @endforeach
           <tr>
                <td>{{$i}}</td>
                <td>
                     <select name="region_id" id="city" class="form-control" form="store">
                        
                        @foreach($cities as $city)
                            
                        <option value="{{$city->id}}">{{$city->region}}</option>
                            
                        @endforeach
                    </select>  
                </td>
               <td>
                    <textarea name="name"  rows="2" class="form-control" form="store" required placeholder="آدرس جدید را وارد کنید."></textarea>
                </td>
               <td><button class="btn btn-success" type="submit" form="store">
                   افزودن آدرس جدید
               </button></td>
               <td>
                  
               </td>
          </tr>
    </tbody>
</table>