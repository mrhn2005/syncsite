@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;max-width:95%">
                    @include('includes.messages')
                     <h1 class="page-header">
                         ارسال پیام به حجره
                         {{$store->name}}
                    </h1>
                    <form method="post" action="{{route('admin.store.notification.store',$store)}}" >
                       {{ csrf_field() }}
                       <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="product_id">
                               موضوع
                            </label>
                        
                            <select id="product_id" name="product_id"  class="form-control">
                                 
                                    <option value="0">
                                      کلی
                                    </option>
                                    @foreach($store->products as $product)
                                    <option value="{{$product->id}}" >
                                      {{$product->name}}
                                    </option>
                                    @endforeach
                            </select>
                         </div>
                         <div class="form-group">
                            <label for="message">
                              متن پیام
                            </label>
                            
                            <input type="text" name="message" id="message" class="form-control" >
                         </div>
                         <div class="text-center">
                            <button type="submit"  class="btn btn-primary btn-lg">
                                ارسال
                                </button>
                        </div>
                     </form>            
                </div>
            </section>
        </section>
@endsection