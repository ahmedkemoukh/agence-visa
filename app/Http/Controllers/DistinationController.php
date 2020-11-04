<?php

namespace App\Http\Controllers;

use App\distination;
use Illuminate\Http\Request;

class DistinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Distination::all();
        return view('layout_agence.listDistination',compact('data'));
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
        $dist=distination::where('paye','=',$request->input('paye'))->first();
        if($dist==null)
        {
        $dist=distination::create($request->all());
        return response()->json(['id'=>$dist->id]);
        }
        else{
            return response()->json(['error'=>"paye est exist"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\distination  $distination
     * @return \Illuminate\Http\Response
     */
    public function show(distination $distination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\distination  $distination
     * @return \Illuminate\Http\Response
     */
    public function edit(distination $distination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\distination  $distination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,$id)
    {
        $dist=distination::where('paye','=',$req->input('paye'))->where('id','!=',$id)->first();
        if($dist==null)
        {
        $dist=Distination::find($id);
        $dist->update($req->all());
        $dist->save();
        return response()->json(['id'=>$dist->id]);
        }
        else
        {
            return response()->json(['error'=>"paye est exist"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\distination  $distination
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $visa=Distination::find($id);
            $visa->delete();
            return response()->json(['id'=>"ss"]);

    }


    public function listitem(Request $request)
    {

       $data=distination::where('paye','like',$request->input('payeV').'%')->get();

       return response()->json(['listItem'=>$data]);

    }

    public function dossierrecharche(Request $request)
    {

        $rech=$request->input('search');

        $data=distination::where('paye','=',$rech)->get();
        return view('layout_agence.listDistination',compact('data'));
    }
}
