<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class MeController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index(){
        $this->v['name'] = 'Hoàng Nhật Tân - PH17797';
        return view('client.showme' , $this->v );
    }
}
