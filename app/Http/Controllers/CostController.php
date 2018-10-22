<?php

namespace App\Http\Controllers;

use App\Cost;
use App\CostType;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cost_types=CostType::all();
        $costs=Cost::with('cost_type')->orderBy('id','desc')->paginate(15);
        return view('admin.costs.index',compact('costs','cost_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cost_types=CostType::all();
        return view('admin.costs.create',compact('cost_types'));
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
            'price' => 'required',
        ]);

         $input=$request->all();
        //  $product=cost::create($input);
        
         if($file=$request->file('photo')){
                $name=time().$file ->getClientOriginalName();
                $file->move('photos/costs',$name);
                $input['photo']=$name;
                //return $input;
            }
            Cost::create($input);
            
         return redirect()->route('costs.index')->with(['success'=>'
        هزینه با موفقیت اضافه شد.
          
         ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function show(Cost $cost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function edit(Cost $cost)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cost $cost)
    {
        $input=$request->all();
        if($file = $request->file('photo')){
            $name = time() . $file->getClientOriginalName();
            $file->move('photos/costs',$name);
            if(is_null($cost->photo)){
                $input['photo']=$name;
                
            }else{
                if(file_exists(public_path() .'/photos/costs/'. $cost->photo)){
                unlink(public_path() .'/photos/costs/'. $cost->photo);}
                $input['photo']=$name;
            }
        }



        $cost->update($input);
         return redirect()->back()->with(['success'=>'
        با موفقیت به روز شد.
         ']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cost $cost)
    {
        if(file_exists(public_path() .'/photos/costs/'. $cost->photo && isset($cost->photo))){
                unlink(public_path() .'/photos/costs/'. $cost->photo);
        }
        $cost->delete();
        return redirect()->back()->with(['success'=>'
            هزینه مورد نظر با موفقیت حذف شد.
        ']);
    }
}
