<?php

namespace App\Http\Controllers;
use App\Models\User;

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
            'esqueceuSenha'=>'required',],[
            'esqueceuSenha.required'=>'O campo E-mail é obrigatorio',        
            ]);
         $entidadeAtualizarSenha=$entidade->name;
         $entidadeAtualizarSenha=$entidade->email;
         $entidadeAtualizarSenha=$entidade->matricula;
         $entidadeAtualizarSenha=$request->esqueceuSenha;
         if(!empty(User::where('id', 'like', '%'.$entidade->id.'%')->first())){
             User::findOrFail($id)->update($entidadeAtualizarSenha);
             return view('Geral.recSenhaAffter',['user'=>$entidades]);
         }else{
            return redirect()->back()->with('danger','Email invalido!');
         }
     }
}
