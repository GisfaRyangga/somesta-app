<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SomestaController extends Controller
{
    public function tampil_form(){
        return view('form', [
            'title' => 'form'
        ]);
    }

    public function tampil_csv(){
        return view('upload', [
            'title' => 'upload'
        ]);
    }

    public function tampil_login(){
        return view('login', [
            'title' => 'login'
        ]);
    }

    public function tampil_register(){
        return view('register', [
            'title' => 'register'
        ]);
    }

    public function tampil_show(){
        return view('show', [
            'title' => 'show'
        ]);
    }

    public function tampil_edit(){
        return view('edit', [
            'title' => 'show'
        ]);
    }
}
