<?php

namespace App\Http\Controllers;

use App\visa;
use App\Distination;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=visa::all();
        return view('layout_agence.listVisa',compact('data'));
    }


    public function promotion()
    {
        $data=visa::all();
        return view('layout_agence.promition',compact('data'));
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
        $dist=distination::where('paye','=',$request->input('payev'))->first();
        if($dist!=null)
        {
            $visa=$dist->evisa()->where("typevisa","=",$request->input('typevisa'))->first();
            if($visa==null)
             {
        $visa=visa::create($request->all());
        return response()->json(['id'=>$visa->id]);
            }
            else
            {
                return response()->json(['error'=>"type de visa exist déjà"]);
            }
        }
        else{
            return response()->json(['error'=>"paye n'exist pas"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function show(visa $visa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function edit(visa $visa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        if($req->input('tarifvn')!=null)
        {
     $visa=visa::find($id);
        $visa->update($req->all());
        $visa->save();
        return response()->json(['id'=>$visa->id]);
        }
        else{
        $dist=Distination::where('paye','=',$req->input('payev'))->first();
        if($dist!=null)
        {
            $visa=$dist->evisa()->where("typevisa","=",$req->input('typevisa'))->where('id','!=',$id)->first();
            if($visa==null)
            {
        $visa=visa::find($id);
        $visa->update($req->all());
        $visa->save();
        return response()->json(['id'=>$visa->id]);
            }
            else
            {
                return response()->json(['error'=>"type de visa exist déjà"]);
            }
        }
        else
        {

            return response()->json(['error'=>"pays n'exist pas"]);
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function destroy($visa)
    {
        $visa=visa::find($visa);
        $visa->delete();
        return response()->json(['id'=>"ss"]);
    }

    public function listitem(Request $request)
    {
       $data=visa::where('payev','=',$request->input('payeV'))->get();

       return response()->json(['listItem'=>$data]);

    }

    public function visarecharche(Request $request)
    {
        $search=$request->input('search');

        $data=visa::where('payev','=',$search)->orWhere('typevisa','=',$search)->get();
        return view('layout_agence.listVisa',compact('data'));
    }

    public function promotionrecharch(Request $request)
    {
        $search=$request->input('search');
        $data=visa::where('payev','=',$search)->orWhere('typevisa','=',$search)->get();
        return view('layout_agence.promition',compact('data'));
    }


}
