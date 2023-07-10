<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        
        return view('login.index');
    }

    public function store(Request $request){
       if(!Auth::attempt($request->only(['email','password'])))
       {    

        return redirect()->back()->withErrors('usuario ou senha invalidos');
       }

       return to_route('series.index');

    }



    public function indexRegistro(){
        return view('login.registro');
    }
    public function destroy(){
        Auth::logout();

        return to_route('login');
    }
                       
    public function storeRegistro(Request $request){

        
        $data = $request->except(['_token']);

        
        //criptografa a senha;
        $data['password'] = Hash::make($data['password']);
        
        $user = User::create($data);
        
        // DB::insert([
        //     'name'=> $data['name'],
        //     'password'=> $data['password'],
        //     'email'=> $data['email']

        // ]);
 
        //loga o usuario apartir do registro
        Auth::login($user);


        return to_route('series.index');
    }
}
