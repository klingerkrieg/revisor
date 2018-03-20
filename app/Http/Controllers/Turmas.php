<?php

namespace App\Http\Controllers;

use DB; 
use App\TblTurma;
use App\TblTurmaProfessor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Turmas extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function salvar(Request $request) {

        $data = $request->only('nomeTurma');
        $data['chave'] = substr(md5(uniqid(mt_rand(), true)) , 0, 8);
        
        $turma = TblTurma::create($data);
        

        $data = array("professor_id"=>session('id'), 'turma_id'=>$turma->id);
        TblTurmaProfessor::create($data);

        return view('turmas',['turmas'=>$this->queryTurmas()]);
        
    }

    public function queryTurmas(){
        return DB::select("select tbl_turmas.id, tbl_turmas.nomeTurma, "
        ." (select count(*) from tbl_turmas_alunos where tbl_turmas_alunos.turma_id = tbl_turmas.id ) as qtd_alunos "
        ." from tbl_turmas inner join "
        ." tbl_turmas_professores on "
        ." tbl_turmas_professores.turma_id = tbl_turmas.id and "
        ." tbl_turmas_professores.professor_id = ". session('id'));
    }

    public function listar(){
        return view('turmas',['turmas'=>$this->queryTurmas()]);
    }
}