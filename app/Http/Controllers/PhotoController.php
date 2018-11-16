<?php

namespace App\Http\Controllers;
use App\Product;
use App\Photo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function add_photos($id){
        $product=Product::withoutGlobalScopes()->where('id',$id)->first();
        return view('admin.products.photos',compact('product'));
    } 
     
    public function index()
    {
        //
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
        
        $file=$request->file('file');
        $name=time().$file ->getClientOriginalName();
        $name = preg_replace('/\s+/', '-', $name);
        // $file->move('photos',$name);
        Image::make($request->file('file'))->resize(502, 602)->save('photos/'.$name,80);
        $photo=new Photo;
        $photo->name=$name;
        $photo->product_id=$request->product_id;
        
        $photo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $images=Photo::where('product_id',$photo->product_id)->get();
        
        foreach($images as $image){
            
            $image->main_photo=0;
            $image->update();
        }
        $photo->main_photo=1;
        $photo->update();
         return redirect()->back()->with(['success'=>'
       تصویر اصلی تغییر پیدا کرد.
        ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
         if(!is_null($photo)){
            if(file_exists(public_path() .'/photos/'. $photo->name)){
                unlink(public_path() .'/photos/'. $photo->name);}
        }
        $photo->delete();
        return redirect()->back()->with(['success'=>'
        تصویر مورد نظر حذف شد
        ']);
    }
}
