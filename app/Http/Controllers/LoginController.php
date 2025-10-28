<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){
        $credenciais = $request->validate([
            'email' => ['required','email'],
            'password'=> ['required'],
        ],[
            'email.required'=>'o campo email e obrigatoria!',
            'email.email'=>'O email nao e valido!',
            'password.required'=>'o campo senha e obrigatorio!'

        ]
    );

        if(auth::attempt($credenciais, $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
        else{
            return redirect()->back()->with('erro','Email ou Senha incorreto!');
        }

    
        
    }
    public function logout(Request $request){
        auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
         return redirect(route('site.index'));
}

public function create(){
    return view('login.create');
}
}