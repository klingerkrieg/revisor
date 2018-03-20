<?php

namespace App\Http\Controllers;



use App\TblUsuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Usuarios extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function logar(Request $request) {

        
        //Localiza o usuário
        $data = $request->only('email', 'password');
        $data['password'] = sha1($data['password']);
        $usuario = TblUsuario::where('email',$data['email'])
                                ->where('password',$data['password'])
                                ->first();

        //Adiciona as informacoes na sessao
        foreach(['nome','id','professor'] as $key){
            session([$key => $usuario[$key]]);
        }
        

        return redirect('home');
    }

    public function cadastrar(Request $request){

        $data = $request->only('nome', 'email', 'password');
        $data['password'] = sha1($data['password']);
        $usuario = TblUsuario::create($data);

       
        return redirect('login');
    }
}