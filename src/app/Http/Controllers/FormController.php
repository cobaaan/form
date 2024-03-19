<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function contact(){
        return view('admin');
    }
    
    public function confirm(){
        return view('confirm');
    }

    public function thanks(){
        return view('thanks');
    }
        
    public function admin(){
        return view('admin');
    }

    public function register(){
        return view('register');
    }
        
    public function login(){
        return view('login');
    }
}
