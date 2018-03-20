<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblTurmaAluno extends Model
{

    protected $table = "tbl_turmas_alunos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'aluno_id', 'turma_id'
    ];

    
}
