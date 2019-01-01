<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use Intervention\Image\Facades\Image;
use App\Category;
use App\Product;
use App\Photo;
use App\Province;
use Illuminate\Support\Facades\Auth;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces=Province::all();
        return view('store.info',compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Store $store)
    {
        $input=$request->all();
        if($file=$request->file('photo')){
           $name=time().$file ->getClientOriginalName();
           $name = preg_replace('/\s+/', '-', $name); 
           Image::make($request->file('photo'))->resize(368, 341)->save('photos/stores/'.$name,80);
           $input['photo']=$name;
        }
        
        $store->update($input);
        return redirect()->back()->with(['success'=>'
        مشخصات شما با موفقیت به روزرسانی شد.
        ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    
    public function add_product(){
        $categories=Category::whereIsLeaf()->get();
        return view('store.products.add',compact('categories'));
    }
    
    public function store_product(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price_buy' => 'required',
            'price_sell' => 'required',
            'category_id'=>'required',
            'weight'=>'required|numeric',
            'desc'=>'required',
        ]);

         $input=$request->all();
         $product=Product::create($input);
         $product->store_id=Auth::guard('store')->user()->id;
         $product->active=0;
         $product->update();
         if(count($request->tags)>0){
            $product->tag($request->tags);
         }
         if($file=$request->file('image')){
                $name=time().$file ->getClientOriginalName();
                $name = preg_replace('/\s+/', '-', $name);
                Image::make($request->file('image'))->resize(502, 602)->save('photos/'.$name,80);
                $photo=new Photo;
                $photo->product_id=$product->id;
                $photo->name=$name;
                $photo->save();
                //return $input;
            }
         return redirect()->route('store.products')->with(['success'=>'
         محصول با موفقیت اضافه شد. می توانید تصاویر بیشتری اضافه نمایید.
         ']);
    }
    
    
    public function products(){
        return view('store.products.show');
    }
    
    public function add_photos($id){
        
        $product=Product::withoutGlobalScopes()->where('id',$id)->first();
        // return $product;
        return view('store.products.photos',compact('product'));
    } 
    
    public function edit_product($id){
        $product=Product::withoutGlobalScopes()->where('id',$id)->first();
        if(!$this->can_edit($product)){
            return redirect()->route('store.home');
        }
        $categories=Category::whereIsLeaf()->get();
        return view('store.products.edit',compact('product','categories'));
    } 
    
    
    
    public function update_product(Request $request,$id){
        $product=Product::withoutGlobalScopes()->where('id',$id)->first();
        if(!$this->can_edit($product)){
            return redirect()->route('store.home');
        }
        if($file = $request->file('image')){
            $name = time() . $file->getClientOriginalName();
            $name = preg_replace('/\s+/', '-', $name);
            Image::make($request->file('image'))->resize(502, 602)->save('photos/'.$name,80);
            $photo=new Photo;
                $photo->product_id=$product->id;
                $photo->name=$name;
                $photo->save();

        }
        $product->update($request->all());
        if(count($request->tags)>0){
            $product->retag($request->tags);
        }

        return redirect()->route('store.products')->with(['success'=>'
         محصول با موفقیت ویرایش شد.
         ']);
    } 
    
 
    public function notifications(){
         $store=Auth::guard('store')->user(); 
         
    //   foreach($store->notifications as $notification){
    //     //   $a=$notification->data;
    //     //   var_dump($a['message']);
    //         return $notification->data['message'];
    //     }
        return view('store.notifications',compact('store'));
    }
 
    
    public function get_cities(Request $request){
        $province=Province::where('id',$request->state_id)->with('cities')->first();
        
        return view('store.city',compact('province'));
    }
    
    
    private function can_edit($product){
        if(!empty($product->store)){
            if($product->store->id==Auth::guard('store')->user()->id){
                return 1;
            }
        }
        return 0;
    }
}
