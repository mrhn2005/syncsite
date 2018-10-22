@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                        محلی خواه ها
                    </h1>
                   
                    
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>
                                   نام
                                </th>
                               <th>
                                  نام محلی خواه
                                 </th>
                                <th>
                                  شماره تماس
                                </th>
                                <th>
                                   تاریخ ثبت
                                </th>
                              
                                <th>
                                  نام محصولات مورد علاقه
                                </th>
                                <th>
                                 مشخصات محصولات
                                </th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahalikhahs as $mahalikhah)

                            <tr>
                               <td>{{$mahalikhah->id}}</td>
                               <td>{{$mahalikhah->name}}</td>
                               <td>{{$mahalikhah->phone}}</td>
                               <td>{{jDate::forge($mahalikhah->created_at)->format('date')}}</td>

                               <td>{{$mahalikhah->favorites}}</td>
                               <td>{{$mahalikhah->spec}}</td>
                            </tr>
                            @endforeach
                      </tbody>
                    </table>   
                </div>
            </section>
        </section>
@endsection