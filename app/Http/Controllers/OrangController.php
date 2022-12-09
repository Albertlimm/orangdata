<?php

namespace App\Http\Controllers;

use App\Models\Orang;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class OrangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orang = Orang::paginate(10);
        return response()-> json([
            'data' =>$orang
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orang = Orang::create ([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'nohp' =>$request->nohp,
            'otp'=>$request->otp,
            'email2'=>$request->email2
        ]);
        return response()->json([
            'data' =>$orang
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orang  $orang
     * @return \Illuminate\Http\Response
     */
    public function show(Orang $orang)
    {
        return response()->json([
            'data' => $orang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orang  $orang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orang $orang)
    {
        $orang->name=$request->name;
        $orang->email=$request->orang;
        $orang->password=$request->password;
        $orang->nohp=$request->nohp;
        $orang->otp=$request->otp;
        $orang->email2=$request->email2;
        $orang->save();

        return response()->json([
            'data' =>$orang 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orang  $orang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orang $orang)
    {
        $orang->delete();
        return response()->json([
            'message' => 'DATA HAS BEEN DELETED'
        ],200);
    }
}


