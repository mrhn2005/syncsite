<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Photo;
use Illuminate\Http\Request;
use App\Tag;
use App\Store;
class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function update_quantity(Request $request){
        
        $product=Product::withoutGlobalScopes()->find($request->id);
        $product->quantity=$request->new_product_quantity;
        $product->active_discount=$request->active_discount;
        $product->free=$request->free;
        $product->weight=$request->weight;
        $product->weight_unit=$request->weight_unit;
        $product->price_sell=$request->price_sell;
        $product->save();
        
        return redirect()->back()->with(["success"=>"
            محصول به روز شد.
        "]);
        
    }
    
     public function product_search(Request $request)
    {
        $term=$request->term;
    	
    	
    	
    	$products = Product::whereHas('category', function ($query) use ( $term ) {
    $query->where('name', 'like', '%'.$term.'%');
})->orWhere('name', 'LIKE', '%'.$term.'%')->orderBy('id','desc')->get();
    	$categories=Category::whereIsLeaf()->get();
    
        
    	return view('admin.products.search-results',compact('products','categories'));
        
    }
     
    public function index()
    {   
        $categories=Category::whereIsLeaf()->get();
        $stores=Store::all();
        $products=Product::withoutGlobalScopes()->orderBy('id','desc')->with(['category','store'])->paginate(12);
        //  foreach($products as $product){
        //      $text=substr(strip_tags($product->desc), 0,250);
        //      $text=str_replace("&zwnj;"," ",$text);
        //      $text=str_replace("\xD9"," ",$text);
             
        //      $product->desc_short=$text;
             
        //      $product->update();
        //  }
        return view('admin.products.index',compact('products','categories','stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::whereIsLeaf()->get();
        
        return view('admin.products.add',compact('categories')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'price_buy' => 'required',
            'price_sell' => 'required',
            'category_id'=>'required'
        ]);

         $input=$request->all();
         $product=Product::create($input);
         if(count($request->tags)>0){
            $product->tag($request->tags);
         }
         if($file=$request->file('image')){
                $name=time().$file ->getClientOriginalName();
                $name = preg_replace('/\s+/', '-', $name);
                $file->move('photos',$name);
                $photo=new Photo;
                $photo->product_id=$product->id;
                $photo->name=$name;
                $photo->save();
                //return $input;
            }
         return redirect()->route('product.photos',$product)->with(['success'=>'
         محصول با موفقیت اضافه شد. می توانید تصاویر بیشتری اضافه نمایید.
         ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        
       
        // return substr(strip_tags($product->desc), 0, 450);
        $categories=Category::whereIsLeaf()->get();
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
       
        if($file = $request->file('image')){
            $name = time() . $file->getClientOriginalName();
            $name = preg_replace('/\s+/', '-', $name);
            $file->move('photos',$name);
            if(is_null($product->photo)){
                $photo=new Photo;
                $photo->product_id=$product->id;
                $photo->name=$name;
                $photo->save();
            }else{
                if(file_exists(public_path() .'/photos/'. $product->photo->name)){
                unlink(public_path() .'/photos/'. $product->photo->name);}
                $photo=Photo::where('product_id',$product->id)->first();
                
                $photo->name=$name;
                $photo->update();
            }
        }



        $product->update($request->all());
        if(count($request->tags)>0){
            $product->retag($request->tags);
        }

        return redirect()->route('products.index')->with(['success'=>'
         محصول با موفقیت ویرایش شد.
         ']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       
        foreach($product->images as $photo){
            if(!is_null($photo)){
                if(file_exists(public_path() .'/photos/'. $photo->name)){
                    unlink(public_path() .'/photos/'. $photo->name);}
            }
            
             $photo->delete();
        }
        Product::withoutGlobalScopes()->find($product->id)->delete();
        
        return redirect()->back()->with(['success'=>'
        محصول مورد نظر حذف شد.
        ']);
        
    }
    
    public function discount(){
        $categories=Category::all();
        $products=Product::orderBy('id','desc')->where('active_discount',1)->get();
        
        return view('admin.products.index',compact('products','categories'));   
    }
    
    public function free(){
        $categories=Category::all();
        $products=Product::orderBy('id','desc')->where('free',1)->get();
        
        return view('admin.products.index',compact('products','categories'));   
    }
    
    public function single_category($id){
        $categories=Category::all();
        $products=Product::where('category_id',$id)->orderBy('id','desc')->get();
        return view('admin.products.index',compact('products','categories'));   
    }
    
    public function tags_autosearch(Request $request){
        $term=$request->term;
    	
    	$results = array();
    	
    	$queries = Tag::where('name', 'LIKE', '%'.$term.'%')->take(5)->get();
    	
    	foreach ($queries as $query)
    	{
    	    
    	    $results[] = [ 'id' => $query->id,'key'=>$query->name, 'value' =>  $query->name ];
    	}
   
    	return json_encode($results);
    }
    
    public function update_multiple(Request $request){
        
        $products=Product::withoutGlobalScopes()->findOrFail($request->product_id);
        $i=count($products);
    
        foreach($products as $product){
            $i=$i-1;
            $product->quantity=$request->product_quantity[$i];
            $product->active_discount=$request->active_discount[$i];
            $product->weight=$request->weight[$i];
            // $product->free=$request->free[$i];
            $product->active=$request->active[$i];
            $product->weight_unit=$request->weight_unit[$i];
            $product->price_sell=$request->product_price_sell[$i];
            $product->category_id=$request->category_id[$i];
            $product->store_id=$request->store_id[$i];
            $product->save();
            
        }
        return redirect()->back()->with(["success"=>"
            محصول به روز شد.
        "]);
    }
    
      
}
