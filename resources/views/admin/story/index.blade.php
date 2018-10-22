@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                       پست های وبلاگ
                    </h1>
                   
                    
                    <a class="btn btn-success" href="{{route('story.create')}}">
                       افزودن پست جدید
                    </a>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                                <th>
                                   شماره
                                </th>
                                <th>
                                   تصویر
                                </th>
                                <th>
                                 تاریخ نوشته
                                 </th>
                                <th>
                                  نویسنده
                                </th>
                                <th>
                                     عنوان
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
                            @foreach ($stories as $story)
                            <form method="post" action="{{route('story.destroy',$story)}}" id="delete{{$story->id}}" class="confirm-form"> 
                        
                                {{ csrf_field() }}  
                                 <input type="hidden" name="_method" value="DELETE" >
                            </form>
                            <tr>
                               <td>{{$story->id}}</td>
                               <td><img height="50" src="{{$story->photo ? '/photos/blog/'.$story->photo : 'http://placehold.it/400x400' }} " alt=""></td>
                               <td>{{\Carbon\Carbon::parse($story->created_at)}}</td>
                               <td>{{$story->author}}</td>
                               <td>{{$story->subject}}</td>
                                <td>
                                    <a href="{{route('story.edit',$story)}}">
                                        <i class="fa fa-edit" style="font-size:26px;color:blue"></i>
                                    </a>
                                </td>
                                <td><button class="btn btn-danger" type="submit" form="delete{{$story->id}}">
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