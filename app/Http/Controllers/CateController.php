<?php

namespace App\Http\Controllers;

use App\Models\cates;
use Illuminate\Http\Request;

class CateController extends Controller
{
    protected $v;
    protected $cate;
    public function __construct()
    {
        $this->v = [];
        $this->cate = new cates();
        
    }
    public function index(Request $request){
        $keyword = $request->key;
        $listCate = $this->cate->getAll($keyword);
        $this->v['cates'] = $listCate;
        // dd($listCate);
        return view('client.listCate' , $this->v);

    }
}
