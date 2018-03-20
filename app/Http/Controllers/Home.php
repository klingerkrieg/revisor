<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Home extends Controller
{
    
    public function index() {
        if (session('professor') == 1){
            return view('homeProfessor');
        } else {
            return view('homeAluno');
        }
    }

}