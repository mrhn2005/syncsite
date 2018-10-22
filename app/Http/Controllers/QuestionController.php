<?php

namespace App\Http\Controllers;

use App\Question;
use App\Customer;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
   public function temper1(){
       if (!Auth::guard('customer')->check()){
           return view('temper.temper1');
       }
       $customer=Auth::guard('customer')->user();
    //   return count($customer->answers->pluck('question')->where('type',1));
    //   return count($customer->answers->pluck('question')->where('type',3));
    //   $answers=Answer::all();
    //   return view('test',compact('answers'));
    //   return $customer->temper;
    // return count($customer->answers);
        if(count($customer->answers)>0){
           if(count($customer->answers->pluck('question')->where('type',2))>1){
              return view('temper.thankyou');
          }
           if(count($customer->answers->pluck('question')->where('type',1))>1){
               $questions=Question::where('type',2)->get();
           }
           elseif(count($customer->answers->pluck('question')->where('type',3))>1){
               $questions=Question::where('type',1)->get();
           } 
        }
       else{
           $questions=Question::where('type',3)->get();
       }
    //   $questions=Question::where('type',1)->get();  
      return view('temper.temper1',compact('questions'));
       return view('temper.temper1',compact('questions'));
       return $questions;
   }
   
   public function temper1_store(Request $request){
       $customer=Auth::guard('customer')->user();
    //   return count($customer->answers->pluck('question')->where('type',1));
    //   Auth::guard('customer')->user()->answers()->sync($request->choice);
    // $array_keys = array_keys($request->choice);
    // $array_values = array_values($request->choice);
    // // // return $array_keys;
    // $answers=(array) Answer::find($array_keys);
    if(count($customer->answers->pluck('question')->where('type',2))>1){
          return view('temper.thankyou');
      }
    
    //  Auth::guard('customer')->user()->answers()->sync($answers, ['choice' => $array_values]);
      foreach ($request->choice as $key => $value){
          $answer=Answer::find($value);
        //   return $value;
            $customer->answers()->save($answer, ['choice' => $key]);
            // Auth::guard('customer')->user()->answers()->sync([$key => ['choice' => $value]]);
        //   return $key;
      }
    //   $customer=Auth::guard('customer')->user();
    // //   return count($customer->answers->pluck('question')->where('type',1));
    //   if(count($customer->answers)>0){
    //       if(count($customer->answers->pluck('question')->where('type',2))>1){
    //           return view('temper.thankyou');
    //       }
    //       if(count($customer->answers->pluck('question')->where('type',1))>1){
    //           $questions=Question::where('type',2)->get();
    //       }
    //       elseif(count($customer->answers->pluck('question')->where('type',3))>1){
    //           $questions=Question::where('type',1)->get();
    //       } 
    //     }
    //   else{
    //       return 'hi2';
    //       $questions=Question::where('type',3)->get();
    //   }
    //   return $questions; 
    //   $questions=Question::where('type',1)->get();  
      return redirect()->route('temper.first');
       
   }
   public function temper2_store(Request $request){
       
      foreach ($request->choice as $key => $value){
          $answer=Answer::find($key);
            Auth::guard('customer')->user()->answers()->save($answer, ['choice' => $value]);
      }
      $questions=Question::where('type',2)->get();  
      return view('temper.temper1',compact('questions'));
       
   }
   
   
   public function tempers(){
       $customers=Customer::all();
       return view('admin.temper.index',compact('customers'));
   }
}
