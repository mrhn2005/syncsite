@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                       هزینه ها
                    
                    </h1>
                   
                    <a style="margin:20px" href="{{route('costs.create')}}" class="btn btn-success">
                        افزودن هزینه
                    </a>
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   شماره
                                </th>
                               <th>
                                 توضیحات
                                 </th>
                               <th>
                                  نوع هزینه
                                </th>
                               <th>
                                 فایل فاکتور
                                </th>
                                <th>
                                   مقدار هزینه (تومان)
                                </th>
                                <th>
                                  به روز رسانی
                                </th>
                                <th>
                                  حذف کامنت
                                </th>
                                
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($costs as $cost)
                        <form method="post" action="{{route('costs.destroy',$cost)}}" id="delete{{$cost->id}}" class="confirm-form"> </form>
                        <form method="post" action="{{route('costs.update',$cost)}}" id="update{{$cost->id}}" class="confirm-form" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PATCH" form="update{{$cost->id}}">
                            {{ csrf_field() }} </form> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" form="delete{{$cost->id}}">
                        <input type="hidden" name="_method" value="DELETE" form="delete{{$cost->id}}" >
                            <tr>
                               <td>{{$loop->index+1}}</td>
                               <td>
                                 <textarea name="description" id="desc"  rows="4" class="form-control" form="update{{$cost->id}}">{{isset($cost)?$cost->description:Request::old('description')}}</textarea>

                                </td>
                               <td>
                                    <select name="cost_type_id" form="update{{$cost->id}}"  class="form-control" style="font-size:90%">
                                
                                        @foreach($cost_types as $type)
                                                @if (old('type_id') == $type->id)
                                                      <option value="{{$type->id}}" selected>{{$type->name}}</option>
                                                @elseif (isset($cost))
                                                    @if($cost->cost_type->id==$type->id)
                                                        <option value="{{$type->id}}" selected>{{$type->name}}</option>
                                                    @else
                                                      <option value="{{$type->id}}">
                                                            {{$type->name}}
                                                        </option>
                                                    @endif
                                                    
                                                
                                                @else
                                                      <option value="{{$type->id}}">
                                                            {{$type->name}}
                                                        </option>
                                                @endif 
                                            
                                        @endforeach
                                    </select>     
                                   
                                </td>
                               <td>
                                   <input type="file" name="photo" form="update{{$cost->id}}">
                                   <br>
                                   @if(isset($cost->photo))
                                   <a href="/photos/costs/{{$cost->photo}}" target='_blank'>
                                       مشاهده فاکتور
                                   </a>
                                   @endif
                                </td>

                                <td> 
                                    <input style="max-width:100px;" type="text" name="price" class="form-control" value="{{$cost->price}}" form="update{{$cost->id}}">
                                </td>
                               
                               <td><button class="btn btn-primary" type="submit" form="update{{$cost->id}}">
                                   <i class="fa fa-refresh" ></i>
                               </button></td>
                               <td><button class="btn btn-danger" type="submit" form="delete{{$cost->id}}">
                                   <i class="fa fa-remove" style="font-size:16px; "></i>
                               </button></td>
                               
                               
                            </tr>
                            @endforeach
                      </tbody>
                    </table>   
                </div>
            </section>
        </section>
@endsection