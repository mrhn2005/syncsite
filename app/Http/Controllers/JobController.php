<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
   public function form(){
       return view('partners.employment');
   }
   
   public function store(Request $request){
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
         $input=$request->all();
         
         if($file=$request->file('file')){
                $name=time().$file ->getClientOriginalName();
                $file->move('employment',$name);
                $input['file']=$name;
                //return $input;
            }
            $job=Job::create($input);
         return redirect()->route('thankyou')->with(['thankyou'=>'
        از ثبت نام شما بسیار سپاسگزاریم. به زودی با شما تماس گرفته خواهد شد.
         ']);
   }
   
   
   public function index(){
       $jobs=Job::orderBy('id','desc')->get();
       return view('admin.partners.jobs.index',compact('jobs'));
   }
   
   
   public function show(Job $job){
       
       return view('admin.partners.jobs.show',compact('job'));
   }
   
   
}
