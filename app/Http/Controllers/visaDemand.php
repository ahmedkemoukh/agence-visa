<?php

namespace App\Http\Controllers;
use App\demande;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\file_upload;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Laravel\Ui\Presets\React;

class visaDemand extends Controller
{
   public function index()
   {
       if(Auth::user()->id==1)
       {
        $data=demande::where('status','=','en attente')->get();
       }
else
{
   $user=User::find(Auth::user()->id);

    $data=demande::where('nomA','=',$user->agence()[0]->id)->where('status','=','en attente')->get();

   }
   return view('layout_agence.listVisaDemand',compact('data'));
   }

public function show($id)
   {
    $visa=demande::find($id);

    return view('layout_agence.informationVisa',compact('visa'));
   }

   public function uploadEvisa(Request $req,$id)
   {
    if($req->file("evisa")!=null)
    {
    $req->file("evisa")->move(public_path($id),"evisa");
    $data['idFile']=$id."/evisa";
    $data['visaDemand']=$id;
    $file1= file_upload::create($data);
    $demand=demande::find($id);

    $data['status']="accorder";
    $demand->update($data);
    $demand->save();
    return response()->json(['success'=>"success"]);
   }
   else{
    return response()->json(['error'=>"error"]);
   }
}

public function refuse(Request $req,$id)
{
    $demand=demande::find($id);
    $remb=$demand->visa()[0]->remboursablev;
    if($remb=='oui')
    {
        $user=user::find(Auth::user()->id);
        $paye=$demand->visa()[0]->tarifv;
        if($demand->visa()[0]->tarifvn!=null)
        {
       $paye=$demand->visa()[0]->tarifvn;
        }
        $payeD['paye']=$user->agence()[0]->sold+$paye;
        $user->agence()[0]->update($payeD);
    }

    $data=$req->all();
    $data['status']="rejeter";
    $demand->update($data);
    $demand->save();
    return response()->json(['success'=>"success"]);
}

public function demandrecharche(Request $req)
{
    $rech=$req->input('search');
    $data=demande::join('voyageurs','demandes.NomV','voyageurs.id')
    ->join('visas','demandes.typeVisa','visas.id')
    ->orWhere('demandes.payeV','=',$rech)
    ->orWhere('visas.typevisa','=',$rech)
    ->orWhere(DB::raw('CONCAT(voyageurs.nomeV," ",voyageurs.prenomeV)'),'=',$rech)
    ->orWhere('voyageurs.nomeV','=',$rech)
    ->orWhere('voyageurs.prenomeV','=',$rech)->get();
    return view('layout_agence.listVisaDemand',compact('data'));

}


public function destroy($id)
{
    $demand=demande::find($id);
    $demand->delete();
    return response()->json(['succes'=>"success"]);
}
}
