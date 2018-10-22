@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                       همه پیامها
                    
                    </h1>
                   
                    
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   شماره
                                </th>
                               <th>
                                  نام 
                                 </th>
                               <th>
                                   ایمیل
                                </th>
                                <th>
                                   موضوع
                                </th>
                               <th>
                                   متن پیام
                                </th>

                                <th>
                                  حذف پیام
                                </th>
                                
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                        <form method="post" action="{{route('message.destroy',$message)}}" id="delete{{$message->id}}"> </form>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" form="delete{{$message->id}}">
                        <input type="hidden" name="_method" value="DELETE" form="delete{{$message->id}}" >
                            <tr>
                               <td>{{$message->id}}</td>
                               <td>{{$message->name}}</td>
                               <td>{{$message->email}}</td>
                               <td>{{$message->subject}}</td>
                               <td>{{$message->body}}</td>
                               <td><button class="btn btn-danger" type="submit" form="delete{{$message->id}}">
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