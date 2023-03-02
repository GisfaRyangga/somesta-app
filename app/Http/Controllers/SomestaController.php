<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Confirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SomestaController extends Controller
{
    public function tampil_form(){
        if ($this->userCheck() == true){
            return view('form', [
                'title' => 'form'
            ]);
        }else if($this->userCheck() == false){
            return redirect('/login')->with('login-error',"Anda belum login.");
        }
    }

    public function tampil_csv(){
        if ($this->userCheck() == true){
            return view('upload', [
                'title' => 'uploadcsv'
            ]);
        }else if($this->userCheck() == false){
            return redirect('/login')->with('login-error',"Anda belum login.");
        }
    }

    public function tampil_login(){
            return view('login', [
                'title' => 'login'
            ]);
    }

    public function tampil_register(){
        if ($this->userCheck() == true && Session::get('thisUserRole') == 'super_admin'){
            return view('register', [
                'title' => 'register'
            ]);
        }else if($this->userCheck() == false){
            return redirect('/login')->with('login-error',"Anda belum login.");
        }else{
            return redirect('/form')->with('access_violation','Anda tidak memiliki hak akses fitur ini');
        }
    }

    // public function tampil_admin(){
    //     if ($this->userCheck() == true && Session::get('thisUserRole') == 'super_admin'){
    //         return view('register', [
    //             'title' => 'showadmin'
    //         ]);
    //     }else if($this->userCheck() == false){
    //         return redirect('/login')->with('login-error',"Anda belum login.");
    //     }else{
    //         return redirect('/form')->with('access_violation','Anda tidak memiliki hak akses fitur ini');
    //     }
    // }

    public function tampil_show(){
        if ($this->userCheck() == true){
            return view('show', [
                'title' => 'show'
            ]);
        }else if($this->userCheck() == false){
            return redirect('/login')->with('login-error',"Anda belum login.");
        }
    }

    public function userCheck(){
        if (Session::has('firebaseUserId') && Session::has('idToken')) {
            // dd("User masih login.");
            return true;
        } else {
            // dd("User sudah logout.");
            return false;
        }
    }

    // public function tampil_edit(){
    //     return view('edit', [
    //         'title' => 'show'
    //     ]);
    // }
}
