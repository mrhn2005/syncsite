<?php

namespace App\Http\Controllers;
use App\Like;
use App\Order;
use App\Category;
use App\Product;
use App\Address;
use App\Sale;
use App\Banner;
use App\Review;
use App\Comment;
use App\Maincat;
use App\Promocode;
use App\Customer;
use App\Message;
use App\Store;
use Session;
use DB;
use App;
use URL;
use App\Story;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Aries\Seppay\Pay;
use Aries\Seppay\Models\Transaction;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;
use Kavenegar;
use Illuminate\Support\Facades\Cache;
class HomeController extends Controller
{
    private $product_num=6;
    
    public function vendor(){
        $vendors=Store::has('products')->withCount('products')->paginate(12);
        
        return view('store.stores',compact('vendors'));
    }
    
    public function home_view(){
        $start=microtime(true);
        $this->sync_cart();
        $categories =Category::defaultOrder()->get(['id', 'name','slug', '_lft', '_rgt', 'parent_id'])->toTree();
        $maincats=Maincat::all();
        $sales=Cache::remember('sales',10,function(){
            return Sale::select('product_id', DB::raw('SUM(quantity) as sum'))
                        ->groupBy('product_id')
                        ->orderBy('sum', 'desc')
                        ->take(5)->get();
        });
        // $sales=Sale::select('product_id', DB::raw('SUM(quantity) as sum'))
        //                 ->groupBy('product_id')
        //                 ->orderBy('sum', 'desc')
        //                 ->take(5)->get();
                        
        $mahalije=0;
        if(Product::where('active_discount',1)->count()>3){
           $mahalije=0; 
        }
        if($mahalije){
         $products=Product::where('active_discount',1)->inRandomOrder()->take($this->product_num)->get();   
        }else{
            $products=Product::where('quantity','>',0)->orderBy('created_at','desc')->take($this->product_num)->get();
        }
        
        $banners=Banner::all();
        if($banners->count()>0){
            $isbanner=1;
            
        //   return view('home1',compact('categories','products','sales','maincats','mahalije','banners')); 
        }else{
            $isbanner=0;
            
        }
        $duration=(microtime(true)-$start)*1000;
    // return $duration;
        return view('home',compact('categories','products','sales','maincats','mahalije','isbanner','banners'));
    }
    
    public function show_store($id,$category_slug=null){
        $store=Store::where('id',$id)->orWhere('slug',$id)->with('visible')->firstOrFail();
        if(!$category_slug==null){
            $category=Category::where('slug',$category_slug)->firstOrFail();
            $products=Product::where('category_id',$category->id)->where('store_id',$store->id)->orderBy('quantity','desc')->paginate(9);
            
            return view('store.store-page',compact('store','products','category'));
        }
                
        $products=$store->visible->sortByDesc('quantity')->paginate(9);
        return view('store.store-page',compact('store','products'));
    }
    
    public function blog(){
        $stories=Story::orderBy('id','desc')->paginate(7);
        $titles=Story::select('subject','slug')->orderBy('id','desc')->get();
        return view('blog.index',compact('stories','titles'));
    }
    
    public function blog_show($slug){
        $sstory=Story::where('slug',$slug)->firstOrFail();
        $titles=Story::orderBy('id','desc')->get();
        return view('blog.show',compact('titles','sstory'));
    }
    
    public function blog_amp($slug){
        $sstory=Story::where('slug',$slug)->firstOrFail();
        $titles=Story::orderBy('id','desc')->get();
        return view('blog.amp',compact('titles','sstory'));
    }
    
    public function contact(){
        return view('contact');
    }
    
    public function your_message(Request $request){
        Message::create($request->all());
        return redirect()->back()->with([
            'success'=>'
                پیام شما با موفقیت ثبت گردید.
            ']);
    }
    
    public function add_like(Request $request){
        $like=new Like;
        $like->customer_id=Auth::guard('customer')->user()->id;
        $like->product_id=$request->product_id;
        $like->save();
        return "seccess";
    }
    public function remove_like(Request $request){
        $like=Like::where('product_id',$request->product_id)->where('customer_id',Auth::guard('customer')->user()->id)->firstOrFail();
        $like->delete();
        return "seccess";
    }
    
    public function review_store(Request $request)
    {   
        $this->validate($request, [
            'star' => 'required',
            
        ]);
        $review=new Review;
        $review->customer_id=Auth::guard('customer')->user()->id;
        $review->product_id=$request->product_id;
        $review->star=$request->star;
        $review->description=$request->description;
        $review->active=0;
        $review->save();
        return "
        نظر شما با موفقیت ثبت شد پس از تایید انتشار خواهد یافت. با تشکر
        ";
    }

    public function comment_store(Request $request)
    {   
        $this->validate($request, [
            'star' => 'required',
            
        ]);
        $review=new Comment;
        $review->customer_id=Auth::guard('customer')->user()->id;
        $review->story_id=$request->product_id;
        $review->star=$request->star;
        $review->description=$request->description;
        $review->active=0;
        $review->save();
        return "
        نظر شما با موفقیت ثبت شد پس از تایید انتشار خواهد یافت. با تشکر
        ";
    }
    
    public function homeproducts(Request $request){

        if (\Request::ajax()&&!empty($request->category_id)){
            // return $request->category_id;
            // $products=Product::where('category_id',$request->category_id)->orderBy('id','desc')->take(4)->get();
           $category=Category::find($request->category_id);
           $productss=Category::with('products')->descendantsAndSelf($category->id)->pluck('products');
                    $categor=$category;
                 $products=$productss->collapse()->sortByDesc('quantity')->take($this->product_num);
            return view ('includes.homeproducts',compact('products','categor'));
        }
        
        $products=Product::inRandomOrder()->take($this->product_num)->get();
        if (\Request::ajax()) {
            
            return view ('includes.homeproducts',compact('products','categor'));
            // return \Response::json(View::make('includes.shop', array('products' => $products))->render());
        }
        
    }
     public function homeproducts1(Request $request){
         $sales=Sale::select('product_id', DB::raw('SUM(quantity) as sum'))
                        ->groupBy('product_id')
                        ->orderBy('sum', 'desc')
                        ->take(5)->get();
        if ($request->maincat_id==-1){
            $categories=Category::where('maincat_id',$request->maincat_id)->get();
            // $products=Product::where('active_discount',1)->take(4)->get();
            $mahalije=0;
            if(Product::where('active_discount',1)->count()>3){
               $mahalije=0; 
            }
            if($mahalije){
             $products=Product::where('active_discount',1)->take($this->product_num)->get();   
            }else{
                $products=Product::where('quantity','>',0)->orderBy('created_at','desc')->take($this->product_num)->get();
            }
            return view ('includes.maincat',compact('products','categories','mahalije','sales'));  
            
        }elseif(\Request::ajax()&&!empty($request->maincat_id)){
          // return $request->category_id;
            $categories=Category::defaultOrder()->where('parent_id',$request->maincat_id)->get();
            $category=$categories->first();
            // return $category->id;
            if(isset($category)){
                $categor=$category;
            // $products=Product::where('category_id',$category->id)->orderBy('id','desc')->take(4)->get();
                $productss=Category::with('products')->descendantsAndSelf($category->id)->pluck('products');
        
                 $products=$productss->collapse()->sortByDesc('quantity')->take($this->product_num);   
                
            }
            
            return view ('includes.maincat',compact('products','categories','sales','categor'));  
        }
        
        $products=Product::inRandomOrder()->take($this->product_num)->get();
        if (\Request::ajax()) {
            return view ('includes.homeproducts',compact('products','sales'));
            // return \Response::json(View::make('includes.shop', array('products' => $products))->render());
        }
        
    }
    public function shop(Request $request){
        //  $products=Category::with('products')->descendantsAndSelf(1)->pluck('products');
        //  return $products[0]->paginate(5);
        if (\Request::ajax()&&!empty($request->category_id)){
            // return $request->category_id;
            $products=Category::with('products')->descendantsAndSelf($request->category_id)->pluck('products');
            $products=$products->collapse()->sortByDesc('quantity')->paginate(50);
            // $products=Product::where('category_id',$request->category_id)->orderBy('id','asc')->paginate(16);
            return view ('includes.shop',compact('products'));
        }
        $maincats=Maincat::all();
        $categories =Category::defaultOrder()->get(['id', 'name','slug','photo' ,'_lft', '_rgt', 'parent_id'])->toTree();
        $products=Product::orderBy('quantity','desc')->paginate(9);
        if (\Request::ajax()) {
            return view ('includes.shop',compact('products'));
            // return \Response::json(View::make('includes.shop', array('products' => $products))->render());
        }
        return view('shop',compact('categories','products','maincats'));  
    }
    
    public function cart(){
        // $product=Product::inRandomOrder()->get();
        return view('cart');
    }
    
    public function autocomplete(Request $request)
    {
        $term=$request->term;
    	
    	$results = array();
    	
    	$queries = Product::where('name', 'LIKE', '%'.$term.'%')->take(5)->get();
    	
    	foreach ($queries as $query)
    	{
    	    
    	    $results[] = [ 'id' => $query->id, 'value' =>  trim($query->name),'slug'=>$query->slug ];
    	}
   
    	return $results;
        
    }
    
    public function product_search(Request $request)
    {
        $term=$request->term;
    	
    // 	$results = array();
    	
    // 	$results = Product::where('name', 'LIKE', '%'.$term.'%')->take(12)->get();
    // 	$term=$request->term;
    	
    	
    	
    	$results = Product::whereHas('category', function ($query) use ( $term ) {
            $query->where('name', 'like', '%'.$term.'%');
        })->orWhere('name', 'LIKE', '%'.$term.'%')->get();
    	
    
   
    	return view('search-results',compact('results'));
        
    }
        
    public function single_product($id){
        
        $this->sync_cart();
    
        $product=Product::where('slug',$id)->orWhere('id',$id)->firstOrFail();
        
        // $related_products=Product::whereHas('category', function($query) use($product) 
        //     { 
        //         $query->where('name', $product->category); 
        //     })->whereNotIn('name', [$product->name])->get();
        $related_products=Product::with('photo')->where('category_id',$product->category_id)->whereNotIn('id', [$product->id])->inRandomOrder()->take(5)->get();
        
        // $categories =Category::defaultOrder()->get(['id', 'name','slug','photo' ,'_lft', '_rgt', 'parent_id'])->toTree();
        return view('product-page2',compact('related_products','product'));
    }
    
    
    public function payment(Request $request){
        // return $request->subtotal_amount;
        if (Cart::count()<1){
            return redirect()->route('shop')->with(["fail"=>
            "
            سبد خرید شما خالی است لطفا ابتدا کالاهای مورد نظرتان را انتخاب کنید.
            "]);
        }
        $address=Address::where('id',$request->address)->firstOrFail();
        $delivery_price=Cart::delivery($address);
        
        foreach(Cart::content() as $row){
            
            $product=Product::where('id', '=', $row->id)->firstOrFail();
            $new_quantity=$product->quantity-$row->qty;
            if($new_quantity<0){
                     return redirect()->back()->with(["fail"=>
                "
                متاسفانه موجودی
                ".$product->name."
                فقط
                ".$product->quantity."
                عدد است.
                "
                ]);
            }
            
        }
        if($request->main_subtotal!=Cart::subtotal()){
            return redirect()->back()->with(["fail"=>
            "
                سبد خرید شما به روز شد. لطفا مجددا خرید خود را تکمیل نمایید.
            "]);
        }
        if($request->payment=="پرداخت آنلاین"){
            $factor_number = time();
            // $amount = $request->subtotal_amount;
            $amount=filter_var($request->subtotal_amount,FILTER_SANITIZE_NUMBER_INT)*10+$delivery_price*10;
            // return $amount;
            if($amount>0){
                 try {
                $pay = new Pay();
                $pay->amount($amount);
                $pay->factorNumber($factor_number);
                $pay->callback(url('/payment/verify'));
                $response = $pay->ready();
                
                $transaction=Transaction::create([
                    'amount'        =>  $amount,
                    'transId'       =>  $response->transId,
                    'factorNumber'  =>  $factor_number,
                    'customer_id'  =>  Auth::guard('customer')->user()->id
                ]);
                
                /*
                 * do anything you want with $response Object
                 * Like: store Transaction ID on your cart with: $response->transId;
                 */
                 session([
                     'address' => $address->name,
                     'trans_id' => $transaction->id,
                     'promocode' => $request->promocode,
                     'subtotal_amount' => $request->subtotal_amount,
                     'discount_amount' => $request->discount_amount,
                     'description' => $request->description,
                      'delivery_price' =>$delivery_price,
                     ]);
                 
                    
                return $pay->start();
    
            }
                catch (\Exception $e) {
                    return redirect()->route('shop')->with(['fail'=>$e->getMessage()]);
                    return $e->getMessage();
                    
                }
            }
           
        }
        foreach(Cart::content() as $row){
            $product=Product::where('id', '=', $row->id)->firstOrFail();
            $new_quantity=$product->quantity-$row->qty;
            $product->quantity=$new_quantity;
            $product->update();
        }
        $this->save_order($address->name,$request->payment,$request->discount_amount, $request->promocode,$request->subtotal_amount,$request->description,$delivery_price);
        Cart::destroy();
        Cart::delete_cart(Auth::guard('customer')->user()->id);
        session()->flash('shopping-complete', 'Shopping completted!');
        
        return redirect()->route('invoice');

    }
    
    private function sync_cart(){
        if (Auth::guard('customer')->check()){
            if (!(Cart::content()->count()>0)){
                // $stored=DB::table('shoppingcart')->where('identifier',2)->firstOrFail();
                // $storedContent = unserialize($stored->content);
                Cart::restore(Auth::guard('customer')->user()->id);
                Cart::delete_cart(Auth::guard('customer')->user()->id);
                Cart::store(Auth::guard('customer')->user()->id);
            }
        }
        
    }
    
    public function invoice(){
        if(!Session::has('shopping-complete')){
            return redirect()->route('home');
        }
        $order=Order::where('customer_id',Auth::guard('customer')->user()->id)->orderBy('id','desc')->firstOrFail();
        return view('includes.invoice',compact('order'));
    }
    
    
    private function get_client_ip_env() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
     
        return $ipaddress;
    }
    
    
    public function callback()
    {
        try {
            
            $pay = new Pay();
            $response = $pay->verify();
            
            if($response->status==1){
                foreach(Cart::content() as $row){
                    $product=Product::where('id', '=', $row->id)->firstOrFail();
                    $new_quantity=$product->quantity-$row->qty;
                    $product->quantity=$new_quantity;
                    $product->update();
                }
                $this->save_order(session('address'), 'پرداخت آنلاین',session('discount_amount'),session('promocode'),session('subtotal_amount'),session('description'),session('delivery_price'));
                Cart::destroy();
                Cart::delete_cart(Auth::guard('customer')->user()->id);
                session()->flash('shopping-complete', 'Shopping completted!');
                session()->forget('address');
                session()->forget('trans_id');
                 return redirect()->route('invoice')->with(['success'=>'
                 پرداخت شما با موفقیت انجام شد.
                 '
                     ]);
            }
            /*
             * if verification was successful you can send order for your customer
             */
        } catch (\Exception $e) {
               session()->forget('address');
                session()->forget('trans_id');
            return redirect()->route('cart')->with(['fail'=>$e->getMessage()]);
            return $e->getMessage();
        }
    }
    
    
    private function save_order($addrss,$payment,$discount_amount,$promocode,$subtotal_amount,$description,$delivery_price){
        $order=new Order;
        $order->customer_id=Auth::guard('customer')->user()->id;
        $order->phone=Auth::guard('customer')->user()->mobile;
        $order->address=$addrss;
        $order->total_price=$subtotal_amount;
        $order->discount=$discount_amount;
        $order->promocode=$promocode;
        $order->payment=$payment;
        $order->delivery_price=$delivery_price;
        $order->description=$description;
        $order->transaction_id=session('trans_id');
        $order->save();
        if(!empty($order->promocode)){
            $code=Promocode::where('code',$promocode)->first();
            $code->uses=$code->uses+1;
            $code->save();
            $customer=Customer::where('id',Auth::guard('customer')->user()->id)->first();
            $code->customers()->attach(Auth::guard('customer')->user()->id);
        }
        
        foreach(Cart::content() as $row){
            $product=Product::where('id', '=', $row->id)->firstOrFail();
            $sale=new Sale;
            $sale->order_id=$order->id;
            $sale->customer_id=$order->customer_id;
            $sale->product_id=$product->id;
            $sale->price=$row->price();
            $sale->price_buy=$product->price_buy;
            $sale->quantity=$row->qty;
            $sale->discount=$product->active_discount;
            if($row->price()==0){
               $sale->product_weight_unit="
               به اندازه نمونه
               ";
            }else{
                $sale->product_weight_unit=$product->weight_unit;
                $sale->product_weight=$product->weight;
            }
            
            $sale->product_name=$product->name;
            $sale->save();
        }
        try{
            Telegram::sendMessage([
            'chat_id' =>"-1001375444683",
            'text' => "سفارش جدید ثبت شد.\n  نام مشتری:".$order->customer->name."\nمشاهده سفارش: \n https://mahalijat.com/admin/orders/".$order->id."\n مبلغ سفارش (تومان):".$order->total_price
            // 'text' => "Order \n link:\n https://mahalijat.com/admin/orders/".$order->id,
            
        ]);
        }
        catch(\Exception $e){
            
        }
        
    }
    
    
    public function thankyou(){
        return view('thankyou');
    }
    
//     public function sitemap(){
//         	$sitemap = App::make('sitemap');

// 	// set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
// 	// by default cache is disabled
// // 	$sitemap->setCache('laravel.sitemap', 1);

// 	// check if there is cached sitemap and build new only if is not
// // 	if (!$sitemap->isCached()) {
// 		// add item to the sitemap (url, date, priority, freq)
// 		$sitemap->add(URL::to('/'), '2018-01-01T20:10:00+02:00', '1.0', 'daily');
// 		$sitemap->add(URL::to('/shop'), '2018-01-01T12:30:00+02:00', '0.9', 'monthly');

// 		// get all products from db, with image relations
// 		$products = Product::all();

// 		// add every product to the sitemap
// 		foreach ($products as $product) {
// 		  //  return $product->slug;
// 			// get all images for the current product
// 			$images = array();
// 			foreach ($product->images as $image) {
// 				$images[] = array(
// 					'url' => '/photos/'.$image->name,
// 				);
// 			}

// 			$sitemap->add('/product/'.$product->slug, $product->updated_at,$images);
		
// 		}
// // 	}

// 	// show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
// 	return $sitemap->render('html');
//     }
    
 public function category_select($id){
        $this->sync_cart();
        $scategory=Category::defaultOrder()->with('ancestors')->where('slug',$id)->orWhere('id',$id)->firstOrFail();
        $productss=Category::with('products')->descendantsAndSelf($scategory->id)->pluck('products');
        $products=$productss->collapse()->sortByDesc('quantity')->paginate(9);
        $maincats=Maincat::all();
        $categories =Category::defaultOrder()->get(['id', 'name','slug','photo' ,'_lft', '_rgt', 'parent_id'])->toTree();
			
        
        return view('category-page',compact('products','scategory','maincats','categories'));
    }
    
    public function maincat_select($id){
        
        $this->sync_cart();
        $scategory=Category::where('slug',$id)->orWhere('id',$id)->firstOrFail();
        // return $scategory->id;
        $productss=Category::with('products')->descendantsAndSelf($scategory->id)->pluck('products');
        
        $products=$productss->collapse()->sortByDesc('quantity')->paginate(9);
        // return $products;
        $maincats=Maincat::all();
        $categories =Category::defaultOrder()->get(['id', 'name','slug','photo' ,'_lft', '_rgt', 'parent_id'])->toTree();
        
        
        return view('maincat-page',compact('products','scategory','maincats','categories'));
    }
    
    public function terms(){
        return view('terms');
    }
    public function complaint(){
        return view('complaint');
    }
    
}
