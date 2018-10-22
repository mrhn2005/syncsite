<?php

namespace App\Http\Controllers;

use App\Mahaliyar;
use App\MahaliyarPhoto;
use Illuminate\Http\Request;

class MahaliyarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['store','create']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahaliyars=Mahaliyar::all();
        return view('admin.partners.mahaliyar.index',compact('mahaliyars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partners.mahaliyar');
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
         $mahaliyar=Mahaliyar::create($input);
         if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach($files as $file){
                
                $name=time().$file ->getClientOriginalName();
                $file->move('photos/mahaliyar',$name);
                $photo=new MahaliyarPhoto;
                $photo->mahaliyar_id=$mahaliyar->id;
                $photo->name=$name;
                $photo->save();
                //return $input;
            }
         }
         return redirect()->route('thankyou')->with(['thankyou'=>'
        از اینکه به عنوان محلی یار ما ثبت نام کردید بسیار خرسندیم. به زودی با شما تماس گرفته خواهد شد.
         ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahaliyar  $mahaliyar
     * @return \Illuminate\Http\Response
     */
    public function show(Mahaliyar $mahaliyar)
    {
        return view('admin.partners.mahaliyar.show',compact('mahaliyar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahaliyar  $mahaliyar
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahaliyar $mahaliyar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahaliyar  $mahaliyar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahaliyar $mahaliyar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahaliyar  $mahaliyar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahaliyar $mahaliyar)
    {
        //
    }
}
