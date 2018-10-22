@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                       همه کامنتها
                    
                    </h1>
                   
                    
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   شماره
                                </th>
                               <th>
                                  نام مشتری
                                 </th>
                               <th>
                                   نام محصول
                                </th>
                               <th>
                                   امتیاز
                                </th>
                               <th>
                                   متن کامنت
                                </th>
                                <th>
                                   پاسخ
                                </th>
                                <th>
                                   وضعیت کامنت
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
                            @foreach ($reviews as $review)
                        <form method="post" action="{{route('reviews.destroy',$review)}}" id="delete{{$review->id}}"> </form>
                        <form method="post" action="{{route('reviews.update',$review)}}" id="update{{$review->id}}">
                            <input type="hidden" name="_method" value="PATCH" form="update{{$review->id}}">
                            {{ csrf_field() }} </form> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" form="delete{{$review->id}}">
                        <input type="hidden" name="_method" value="DELETE" form="delete{{$review->id}}" >
                            <tr>
                               <td>{{$review->id}}</td>
                               <td>{{$review->customer->name}}</td>
                               <td>{{$review->product->name}}</td>
                               <td>{{$review->star}}</td>
                               <td>
                                 <textarea name="description" id="desc"  rows="4" class="form-control" form="update{{$review->id}}">{{isset($review)?$review->description:Request::old('description')}}</textarea>

                                </td>
                                 <td>
                                 <textarea name="reply" id="reply"  rows="4" class="form-control" form="update{{$review->id}}">{{isset($review)?$review->reply:Request::old('reply')}}</textarea>

                                </td>
                                <td>
                                    <select style="color:{{$review->active=='1'?'green':'red'}}" id="active" name="active" form="update{{$review->id}}" class="form-control">
                                         <?php $selected=""?>
                                       
                                        @if (isset($review))
                                            @if($review->active=='1')
                                                <?php $selected="selected"?>
                                            @endif
                                        @endif
                                          <option  value="0">
                                         غیر فعال
                                          </option>
                                          <option value="1" {{$selected}}>
                                          فعال
                                        </option>
                                    </select>
                                </td>
                               
                               <td><button class="btn btn-primary" type="submit" form="update{{$review->id}}">
                                   <i class="fa fa-refresh" ></i>
                               </button></td>
                               <td><button class="btn btn-danger" type="submit" form="delete{{$review->id}}">
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