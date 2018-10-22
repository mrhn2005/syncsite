<?php

namespace App\Http\Controllers;

use App\Mahalisaz;
use App\MahalisazPhoto;
use Illuminate\Http\Request;
use App\Admin;
use App\Notifications\MahalisazCreated;
class MahalisazController extends Controller
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
        $mahalisazs=Mahalisaz::all();
        return view('admin.partners.mahalisaz.index',compact('mahalisazs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partners.mahalisaz');
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
         $mahalisaz=Mahalisaz::create($input);
         $admin=Admin::first();
         $admin->notify(new MahalisazCreated());
         if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach($files as $file){
                
                $name=time().$file ->getClientOriginalName();
                $file->move('photos/mahalisaz',$name);
                $photo=new MahalisazPhoto;
                $photo->mahalisaz_id=$mahalisaz->id;
                $photo->name=$name;
                $photo->save();
                //return $input;
            }
         }
         return redirect()->route('thankyou')->with(['thankyou'=>'
        از اینکه به عنوان محلی ساز ما ثبت نام کردید بسیار خرسندیم. به زودی با شما تماس گرفته خواهد شد.
         ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahalisaz  $mahalisaz
     * @return \Illuminate\Http\Response
     */
    public function show(Mahalisaz $mahalisaz)
    {
        return view('admin.partners.mahalisaz.show',compact('mahalisaz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahalisaz  $mahalisaz
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahalisaz $mahalisaz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahalisaz  $mahalisaz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahalisaz $mahalisaz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahalisaz  $mahalisaz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahalisaz $mahalisaz)
    {
        //
    }
}
