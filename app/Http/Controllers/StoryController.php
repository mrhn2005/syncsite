<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\StoryForm;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories=Story::orderBy('id','desc')->get();
        return view('admin.story.index',compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
         $form = $formBuilder->create(StoryForm::class, [
            'method' => 'POST',
            'url' => route('story.store'),
            'enctype'=>"multipart/form-data"
        ]);

        return view('admin.story.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        
         
        if($file=$request->file('photo')){
            $name=time().$file ->getClientOriginalName();
            $name = preg_replace('/\s+/', '-', $name);
            $file->move('photos/blog',$name);
            $input['photo']=$name;
            //return $input;
        }
        $story=Story::create($input);
        if(count($request->tags)>0){
           $story->tag($request->tags); 
        }
        
        return redirect()->route('story.index')->with(['success'=>'
          پست جدید با موفقیت اضافه شد.
        ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story,FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(StoryForm::class, [
            'method' => 'PUT',
            'url' => route('story.update',$story),
            'enctype'=>"multipart/form-data",
            'model'=>$story
        ]);
        return view('admin.story.edit',compact('form','story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $input=$request->all();
        if($file = $request->file('photo')){
            
            $name = time() . $file->getClientOriginalName();
            $name = preg_replace('/\s+/', '-', $name);
            $file->move('photos/blog',$name);
            if(!is_null($story->photo)){
                if(file_exists(public_path() .'/photos/blog/'.$story->photo)){
                unlink(public_path() .'/photos/blog/'.$story->photo);
                }
                
            }
            $input['photo']=$name;
        }
       $story->update($input);
       if(count($request->tags)>0){
           $story->retag($request->tags);
       }
       
        return redirect()->route('story.index')->with([
            'success'=>'
            پست با موفقیت به روز شد.
            ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
         $photo=$story->photo;
        if(!is_null($photo)){
            if(file_exists(public_path() .'/photos/blog/'. $photo)){
                unlink(public_path() .'/photos/blog/'. $photo);}
        }
        
         $story->delete();
        
        return redirect()->back()->with(['success'=>'
        پست مورد نظر حذف شد.
        ']);
    }
}
