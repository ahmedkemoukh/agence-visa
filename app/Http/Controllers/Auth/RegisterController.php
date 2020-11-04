<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\agence;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:2'],

        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {


        $agence=agence::create([
        'nome'=>$data['nome'],
        'addresse'=>$data['addresse'],
        'email1'=>$data['email1'],
        'ville'=>$data['ville'],
        'codPosta'=>$data['codPosta'],
        'mobile1'=>$data['mobile1'],
        'telephone'=>$data['telephone']
        ]);

        $us=User::create([
            'agence'=>$agence->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'prenome' => $data['prenome'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ]);





 return $us;
    }


    public function register(Request $request)  {
        $validation = $this->validator($request->all());


        if ($validation->fails())  {
            return response()->json($validation->errors()->toArray());
        }
        else{
            $us=user::where("email",'=',$request->input('email'))->first();
            if($us!=null)
            {
                return response()->json(["email1"=>"exist"]);
            }
            else{


                  $user=$this->create($request->all());
                  if(Auth::user()!=null)
                  {
                    return response()->json(["agence"=>"exist"]);
                  }
                  else
                  {


                  Auth::login($user);
                    return response()->json(["create"=>"exist"]);
                  }
                }
            }

        // login user - how???
                // is this the way to go?
        }







}
