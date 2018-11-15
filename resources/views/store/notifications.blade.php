@extends('store.layout.temple')
@section('style')
<!--<link rel="stylesheet" href="/css/invoice.css" type="text/css" />-->
<style>
th{
    text-align:right;
}

.font-bold{
    font-weight:bold;
    color:#90133B;
    background-color:lightblue;
}
</style>
<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection
@section('store-content')
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        موضوع
                    </th>
                    
                    <th>
                        متن پیام
                    </th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($store->notifications as $notification)
                
                <tr class="{{$notification->unread()?'font-bold':''}}">
                    <td>
                    <?php echo ($notification->data['message']) ?>
                    </td>
                    
                    <td>
                    <?php 
                    if($notification->data['product_id']==0){
                        echo 'کلی';
                    }else{
                        $product=DB::table('products')->where('id',$notification->data['product_id'])->first();
                        $product= json_decode( json_encode($product), true);
                        echo ($product['name']);  
                    }
                    ?> 
                    </td>
                </tr>
                @endforeach
                <?php $store->unreadNotifications->markAsRead(); ?>
            </tbody>
            
        </table>
    </div>
    
@endsection