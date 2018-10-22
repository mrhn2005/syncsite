<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Banner::all();
        return view('admin.banner.banner',compact('banners'));
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
        $this->validate($request, [
            'path' => 'required',
        ]);

        //  $input=$request->all();
        //  $product=banner::create($input);
        $banner=new Banner;
        $banner->link=$request->link;
         if($file=$request->file('path')){
                $name=time().$file ->getClientOriginalName();
                $file->move('photos/1',$name);
                $banner->path=$name;
                //return $input;
            }
            $banner->save();
         return redirect()->back()->with(['success'=>'
        بنر با موفقیت افزوده شد.
         ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $photo=$banner->path;
        if(!is_null($photo)){
            if(file_exists(public_path() .'/photos/1/'. $photo)){
                unlink(public_path() .'/photos/1/'. $photo);}
        }
        
         $banner->delete();
        
        return redirect()->back()->with(['success'=>'
        بنر مورد نظر حذف شد.
        ']);
    }
}
