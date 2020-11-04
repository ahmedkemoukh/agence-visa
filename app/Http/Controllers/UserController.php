<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{

    protected function validator(array $data)
    {

        return Validator::make($data, [

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3'],

        ],[
            'email.unique' => 'Le couriel a déja été pris en compte.',

        ]);

    }

    protected function validator1(array $data)
    {

        return Validator::make($data, [

            'email' => ['required', 'string', 'email', 'max:255'],


        ],[
            'email.unique' => 'Le couriel a déja été pris en compte.',

        ]);

    }
    public function update(Request $request,$id)
    {

        $validation = $this->validator1($request->all());
        if ($validation->fails())  {
            return response()->json($validation->errors()->toArray());
        }
        else{
            $us=user::where("email",'=',$request->input('email'))->where("id","!=",$id)->first();
            if($us!=null)
            {
                return response()->json(["email1"=>"exist"]);
            }
            else{
               $user=user::find($id);
               $data=$request->only('name','email', 'prenome','mobile');

               $user->update($data);

               $user->save();
               $agence=$user->agence()[0];
               $data=$request->except('name','email', 'prenome','mobile');
               $agence->update($data);
               return response()->json(["update"=>"update"]);



            }


        }
    }

    public function store(Request $req)
    {
        $us=user::find(Auth::user()->id);
         $agence=$us->agence()[0];

         $req['agence']=$agence->id;
         $validation = $this->validator($req->all());


        if ($validation->fails())  {
            return back()->withErrors($validation)->withInput();
        }
         $req['password']= Hash::make($req->input('password'));
         $user=user::create($req->all());

         return redirect()->back()->withInput();
    }

    public function index()
    {
        return view('layout_agence.ajouterUser');
    }

    public function edit($id)
    {
        $data=user::where('id','=',$id)->get();
        $data['show']='true';
        return view('layout_agence.listagent',compact('data'));
    }

}
