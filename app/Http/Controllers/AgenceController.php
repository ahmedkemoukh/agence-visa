<?php

namespace App\Http\Controllers;

use App\agence;
use App\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->type==1)
        {
        $data=user::where('type','!=',1)->where('etat','!=','invalid')->get();
        return view('layout_agence.listagent',compact('data'));
        }
        $data=user::where('id','=',Auth::user()->id)->get();
        return view('layout_agence.listagent',compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function show(agence $agence)
    {
        $data=user::where('id','=',Auth::user()->id)->get();
        $data['show']='true';
        return view('layout_agence.listagent',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function edit(agence $agence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $user=user::find($id);
     if($request->input('etat')=='delete')
     {
        $user->delete();
     }
     else
     {
        $user->update($request->all());

        $user->save();
     }

        return response()->json(['etat'=>$request->input('etat')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function destroy(agence $agence)
    {
        //
    }


    public function agencecharche(Request $req)
{

    $rech=$req->input('search');

    $data=user::join('agences','users.agence','agences.id')->where('users.type','!=',1)
    ->where(function($data) use ($rech){
    $data->Where('agences.nome','=',$rech)
    ->orWhere('agences.addresse','=',$rech)
    ->orWhere('agences.email1','=',$rech)
    ->orWhere(DB::raw('CONCAT(users.name," ",users.prenome)'),'=',$rech)
    ->orWhere('users.email','=',$rech)
    ->orWhere('users.name','=',$rech)
    ->orWhere('users.prenome','=',$rech);})->get();


    return view('layout_agence.listagent',compact('data'));
    /*$rech=$req->input('search');
    $data=demande::join('voyageurs','demandes.NomV','voyageurs.id')
    ->join('visas','demandes.typeVisa','visas.id')
    ->orWhere('demandes.payeV','=',$rech)
    ->orWhere('visas.typevisa','=',$rech)
    ->orWhere(DB::raw('CONCAT(voyageurs.nomeV," ",voyageurs.prenomeV)'),'=',$rech)
    ->orWhere('voyageurs.nomeV','=',$rech)
    ->orWhere('voyageurs.prenomeV','=',$rech)->get();
    return view('layout_agence.listVisaDemand',compact('data'));*/

}


public function ajouterAgence()
{
   return view('layout_agence.ajouteragence');
}
}
