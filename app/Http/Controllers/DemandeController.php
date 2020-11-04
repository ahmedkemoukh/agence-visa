<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Voyageur;
use App\file_upload;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $request->session()->forget("demande");
        return view('layout_agence.ajouterDemand');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        $us=Auth::user();
        if($us->etat=='deblock' || $us->etat=='valider')
        {

       $dataVoyageur=$req->except('nationalite', 'payeV','typeVisa' ,'dateA','status' ,'NomV' ,'nomA');

      $voyageur=Voyageur::create($dataVoyageur);


      $datdemand=$req->only('nationalite', 'payeV','typeVisa' ,'dateA','status' ,'NomV' ,'nomA');
     $datdemand['NomV']=$voyageur->id;
     $user=User::find(Auth::User()->id);

     $datdemand['nomA']=$user->agence()[0]->id;
    $demande=Demande::create($datdemand);
    if($req->file("imageofficial")!=null)
    {
    $req->file("imageofficial")->move(public_path($demande->id),"imgpersonel");
$data['idFile']=$demande->id."/imgpersonel";
$data['visaDemand']=$demande->id;
$file1= file_upload::create($data);
    }

    if($req->file("filedocument")!=null)
    {
$req->file("filedocument")->move(public_path($demande->id),"filedocument");
$data['idFile']=$demande->id."/filedocument";
$data['visaDemand']=$demande->id;
$file1= file_upload::create($data);
    }
$req->session()->put('demande',$demande->id);
return response()->json(['id'=>$demande->id]);

}
else
{
    return response()->json(['etat'=>$us->etat]);
}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req ,$demande)
    {
       $demand=demande::find($demande);

       $req->session()->put('demande',$demande);
       return view('layout_agence.ajouterDemand',compact('demand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,$demande)
    {

        $us=Auth::user();
        if($us->etat=='deblock' || $us->etat=='valider')
        {

              $demande=demande::find($demande);
              $voyageur=$demande->voyageur()[0];
              $dataVoyageur=$req->except('nationalite', 'payeV','typeVisa' ,'dateA','status' ,'NomV' ,'nomA');
              $voyageur->update($dataVoyageur);
              $voyageur->save();

              $datdemand=$req->only('nationalite', 'payeV','typeVisa' ,'dateA','status' ,'NomV' ,'nomA');
              $demande->update($datdemand);
              $demande->save();
            //  File::delete(public_path($demande->id).'\imgpersonel');
            if($req->file("imageofficial")!=null)
            {
              $req->file("imageofficial")->move(public_path($demande->id),"imgpersonel");
            }
            if($req->file("filedocument")!=null)
            {
              $req->file("filedocument")->move(public_path($demande->id),"filedocument");
            }
              return response()->json(['id'=>$demande->id]);
        }
        else
{
    return response()->json(['etat'=>$us->etat]);
}
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {

    }

    public function status(Request $req)
    {


       $id=$req->session()->get("demande");
        $demand=demande::find($id);
        $paye=$demand->visa()[0]->tarifv;
        if($demand->visa()[0]->tarifvn!=null)
        {
$paye=$demand->visa()[0]->tarifvn;
        }
        $us=$demand->voyageur()[0];

        if($us->dateNV!=null
        &&  $us->lieuNV!=null
        && $us->documentV!=null
        && $us->numeroV!=null
        && $us->dateDV!=null
        && $us->dateEV!=null
        && $us->adressV!=null
        &&  $us->emailV!=null
        && $us->mobileV!=null

         && file_exists(public_path().'/'.$id.'/filedocument'))
        {
            $user=user::find(Auth::user()->id);
            if($user->agence()[0]->sold>=$paye)
            {
        $data['status']="en cour";

       $payeD['sold']=$user->agence()[0]->sold-$paye;
       $user->agence()[0]->update($payeD);

       $demand->update($data);

        return response()->json(["paye"=>$user->agence()[0]->sold]);
        }
        else
        {
            return response()->json(["error"=>'paye']);
        }
    }
        else
        {
            return response()->json(["error"=>'Remplissez tous les espaces']);
        }

}
}
