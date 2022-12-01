<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Geral extends Controller
{
    public function indexSenha()
    {
         return view('Geral.recSenha');            
    }
    public function esqueceuSenhaFormsEmail(Request $request)
    {
        $email=$request->email;
        $entidade=User::where('email', 'like', '%'.$email.'%')->first();
            if(empty($entidade)){
                return redirect('/')->with('msg','Esse usuario não existe!');
            }
            return view('Geral.recSenhaEntidade',['entidade'=>$entidade]);
        
    }
    public function esqueceuSenhaForms (Request $request)
    {
        $this->validate($request,[
            'senhaAtualizada'=>'required',],[
            'senhaAtualizada.required'=>'O campo confirmar senha é obrigatorio',        
            ]);
            User::findOrFail($request->entidade)->update([
                'password'=>Hash::make($request->senhaAtualizada),
           ]);            
           return redirect('/');
     }
}
