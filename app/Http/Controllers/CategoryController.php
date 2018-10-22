<?php

namespace App\Http\Controllers;

use App\Category;
use App\Maincat;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     public function sort(){
        //  return 'hi';
         $categories =Category::defaultOrder()->get(['id', 'name','slug', '_lft', '_rgt', 'parent_id'])->toTree();
        //  $categories=Category::all();
         return view('admin.categories.sort',compact('categories'));
     }
     
     public function reorder(Request $request){
         $tree=json_decode($request->tree, true);
        //  return $tree;
         Category::rebuildTree($tree);
        //  return 'hi';
// $categories =Category::get(['id', 'name','slug', '_lft', '_rgt', 'parent_id'])->toTree();
//          return view('admin.categories.sort',compact('categories'));
         return redirect()->route('sort')->with(['success'=>'
         چیدمان با موفقیت تغییر کرد.
         ']);
     }
     
    public function index()
    {
        $maincats=Maincat::all();
        $categories=Category::all();
        return view('admin.categories.index', compact('categories','maincats')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        ]);

        //  $input=$request->all();
        //  $product=Category::create($input);
        $category=new Category;
        $category->name=$request->name;
        $category->maincat_id=4;
         if($file=$request->file('photo')){
                $name=time().$file ->getClientOriginalName();
                $file->move('photos',$name);
                $category->photo=$name;
                //return $input;
            }
            $category->save();
         return redirect()->route('sort')->with(['success'=>'
        دسته بندی با موفقیت اضافه شد.
            لطفا جای آن را تعیین نمایید.
         ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
       $category->name=$request->name;
        if($file = $request->file('photo')){
            $name = time() . $file->getClientOriginalName();
            $file->move('photos',$name);
            if(is_null($category->photo)){
                $category->photo=$name;
                
            }else{
                if(file_exists(public_path() .'/photos/'. $category->photo)){
                unlink(public_path() .'/photos/'. $category->photo);}
                $category->photo=$name;
            }
        }



        $category->update();
         return redirect()->back()->with(['success'=>'
        دسته بندی با موفقیت به روز شد.
         ']);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with(['success'=>'
        دسته بندی با موفقیت حذف شد.
        ']);
    }
}
