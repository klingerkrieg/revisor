<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblTurmaProfessor extends Model
{

    protected $table = "tbl_turmas_professores";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'professor_id', 'turma_id'
    ];

    
}
