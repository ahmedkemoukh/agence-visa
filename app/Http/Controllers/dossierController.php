<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Demande;
use DB;
class dossierController extends Controller
{
public function index(){
    $user=User::find(Auth::user()->id);
     if(Auth::user()->type==1)
     {
        $data=demande::where('status','!=','en attente')->get();
     }
     else
     {
        $data=demande::where('nomA','=',$user->agence()[0]->id)->where('status','!=','en attente')->get();
     }


    return view('layout_agence.listDossier',compact('data'));
}

public function dossierecharche(Request $request)
{
    $rech=$request->input('search');
    $data=demande::join('voyageurs','voyageurs.id','demandes.NomV')
    ->join('visas','demandes.typeVisa','visas.id')
    ->where(DB::raw('CONCAT(voyageurs.nomeV," ",voyageurs.prenomeV)'),'=',$rech)
    ->orWhere('voyageurs.documentV',"=",$rech)
    ->orWhere('voyageurs.numeroV',"=",$rech)
    ->orWhere('voyageurs.emailV',"=",$rech)
    ->orWhere('voyageurs.numeroV',"=",$rech)
    ->orWhere('demandes.payeV',"=",$rech)
    ->orWhere('demandes.status',"=",$rech)
    ->orWhere('visas.typevisa','=',$rech)->get();
    /*$rech=$req->input('search');
    $data=demande::join('voyageurs','demandes.NomV','voyageurs.id')
    ->join('visas','demandes.typeVisa','visas.id')
    ->orWhere('demandes.payeV','=',$rech)
    ->orWhere('visas.typevisa','=',$rech)
    ->orWhere(DB::raw('CONCAT(voyageurs.nomeV," ",voyageurs.prenomeV)'),'=',$rech)
    ->orWhere('voyageurs.nomeV','=',$rech)
    ->orWhere('voyageurs.prenomeV','=',$rech)->get();
    return view('layout_agence.listVisaDemand',compact('data'));*/


    return view('layout_agence.listDossier',compact('data'));
}


}
