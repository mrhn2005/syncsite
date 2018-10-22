@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                        همه اعضا                    
                    </h1>
                   
                    
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   شماره
                                </th>
                               <th>
                                سوال
                                 </th>
                                 <th>
                                جواب
                                 </th>
                               <th>
                                  دموی
                                </th>
                                <th>
                                صفراوی
                                 </th>
                                 <th>
                                بلغمی
                                 </th>
                                 <th>
                                سوداوی
                                 </th>
                                 <th>
                               گرم
                                 </th>
                                 <th>
                               تر
                                 </th>
                            

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($answers as $answer)

                            <tr>
                               <td>{{$answer->question->id}}</td>
                               <td>{{$answer->question->title}}</td>
                               <td>{{$answer->title}}</td>
                               <td>{{$answer->damavi}}</td>
                               <td>{{$answer->safravi}}</td>
                               <td>{{$answer->balghami}}</td>
                               <td>{{$answer->sodavi}}</td>
                               <td>{{$answer->cold}}</td>
                               <td>{{$answer->wet}}</td>
                            </tr>
                            @endforeach
                      </tbody>
                    </table>   
                </div>
            </section>
        </section>
@endsection