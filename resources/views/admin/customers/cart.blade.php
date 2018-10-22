@extends('admin.layout.auth')

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-right:10px;">
                    @include('includes.messages')
                     <h1 class="page-header">
                        سبد خرید:    
                        {{$customer->name}}
                    </h1>
                        
                    <div>
                        آدرس:
                        {{$customer->addresses->first()->delivery->region}}-
                        {{$customer->addresses->first()->name}}
                    </div>
                    <hr>
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
                                  تصویر
                                </th>
                                <th>
                                 قیمت واحد
                                </th>
                                <th>
                                   تعداد
                                </th>
                                
                                
                          </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach ($cartContent as $row)
                                <?php $product=App\Product::where('id', '=', $row->id)->first(); ?>
                            <tr>
                                <td>
                                    {{$i}}
                                </td>
                               <td><a  href="{{route('product.show',$product->slug)}}">{{$product->name}}</a></td>
                               <td>
                                   <a href="{{route('product.show',$product->slug)}}">
                						<img style="max-width:100px;" src="{{!is_null($product->photo) ? (!empty($product->main_photo())?'/photos/'.$product->main_photo()->name:'/photos/'.$product->photo->name) : 'http://placehold.it/400x400' }}" alt="" />
                					</a>
                               </td>
                               <td>
                               		<span class="amounte">{{$row->price()}}
                    					تومان
                    				</span>
                               </td>
                               <td>
                               	{{$row->qty}}
                               </td>
                               
                               
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                      </tbody>
                    </table>   
                </div>
            </section>
        </section>
@endsection