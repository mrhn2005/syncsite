<?php

namespace App\Http\Controllers;

use App\Property;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties=Property::all();
        return view('admin.categories.property',compact('properties'));
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
        $property=new Property();
        $property->subject=$request->subject;
        $property->save();
        $categories=Category::all();
        foreach($categories as $category){
            $category->properties()->attach($property->id);
        }
        return redirect()->back()->with(['success'=>'
         ویژگی با موفقیت اضافه شد.
         ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
    
    public function category_add(Category $category){
        $properties=Property::all();
        return view('admin.categories.select',compact('properties','category'));
    }
    
    public function category_store(Request $request){
        
        // $category=$request->category;
        $category=Category::where('id',$request->category)->firstOrFail();
        // return $request->property;
        $category->properties()->sync($request->property);
        foreach($category->products as $product){
             $i=0;
            foreach($request->property as $property){
                $property=Property::where('id',$property)->firstOrFail();
                // return $request->property_name[$i];
                // return count($product->properties()->where('property_id',$property->id)->wherePivot('name','!=','null')->get());
                if(!$product->properties->contains($property->id)){
                    $product->properties()->save($property, ['name' => $request->name[$i]]); 
                }
                // return $product->properties()->where('property_id',$property->id)->wherePivot('name',NULL)->get();
                if(count($product->properties()->where('property_id',$property->id)->wherePivot('name',NULL)->get())>0){
                    // return $request->name[$i];
                    $product->properties()->updateExistingPivot($property->id, ['name' => $request->name[$i]]);
                }
               
               $i=$i+1;
            }
            
        }
         return redirect()->back()->with(['success'=>'
         ویژگی با موفقیت اضافه شد.
         ']);
    }
    
    
    public function category_update(Request $request){
        
        $properties=Property::findOrFail($request->property_id);;
        
        $i=0;
        foreach($properties as $property){
            $property->subject=$request->new_subject[$i];
            $property->save();
            $i=$i+1;
        }
        return redirect()->back()->with(['success'=>'
         ویژگی ها با موفقیت ویرایش شدند.
         ']);
    }
    
    public function product_add(Product $product){
        
        return view('admin.products.property',compact('product'));
    }
    
    public function product_store(Request $request){
        // $product=$request->product;
        $product=Product::where('id',$request->product)->firstOrFail();
        // return $product;
        $i=0;
        foreach($request->property as $property){
            $property=Property::where('id',$property)->firstOrFail();
            // return $request->property_name[$i];
            if($product->properties->contains($property->id)){
                $product->properties()->updateExistingPivot($property->id, ['name' => $request->property_name[$i]]);
            }else{
                $product->properties()->save($property, ['name' => $request->property_name[$i]]);  
            }
           
           $i=$i+1;
        }
        // $product->properties()->sync($request->property);
         return redirect()->back()->with(['success'=>'
         ویژگی با موفقیت اضافه شد.
         ']);
    }
}
