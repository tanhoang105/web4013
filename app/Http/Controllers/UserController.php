<?php

namespace App\Http\Controllers;

use App\Models\teachers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $table = 'teachers';
    protected $v;
    protected $teacher;
    public function __construct()
    {
        $this->v = []; 
        $this->teacher = new teachers(); 
        
        
        
    }
    //
    // public function index(){
        
    //     $title = 'Trang chủ client';
    //     $users =  Users::all();
    //     return view('client.index' , compact('title' , 'users'));
    // }

    // query buillder

    public function index(){
        $teachers = $this->teacher->loadList();
        $this->v['teachers'] = $teachers;
        // $this->v['users'] =  DB::table($this->table)->where('status' , 1)->get();
        return view('user.index' , $this->v);


    }   


    public  function update(){
        $title = 'Trang update';
        return view('user.index');
    }
}
