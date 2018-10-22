<?php

namespace App\Http\Controllers;

use App\Mahalikhah;
use Illuminate\Http\Request;

class MahalikhahController extends Controller
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
        $mahalikhahs=Mahalikhah::all();
        return view('admin.partners.mahalikhah.index',compact('mahalikhahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partners.mahalikhah');
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
         Mahalikhah::create($input);
         return redirect()->route('thankyou')->with(['thankyou'=>'
        از اینکه به عنوان محلی خواه ما ثبت نام کردید بسیار خرسندیم. به زودی با شما تماس گرفته خواهد شد.
         ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahalikhah  $mahalikhah
     * @return \Illuminate\Http\Response
     */
    public function show(Mahalikhah $mahalikhah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahalikhah  $mahalikhah
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahalikhah $mahalikhah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahalikhah  $mahalikhah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahalikhah $mahalikhah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahalikhah  $mahalikhah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahalikhah $mahalikhah)
    {
        //
    }
}
