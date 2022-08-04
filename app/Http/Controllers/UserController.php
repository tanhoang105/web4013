<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\teachers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $table = 'teachers';
    protected $v;
    protected $teacher;
    protected $user;
    public function __construct()
    {
        $this->v = [];
        $this->teacher = new teachers();
        $this->user = new Users();
    }
    //
    // public function index(){

    //     $title = 'Trang chủ client';
    //     $users =  Users::all();
    //     return view('client.index' , compact('title' , 'users'));
    // }

    // query buillder

    public function index(Request $request)
    {
        // $teachers = $this->teacher->loadList();
        // $this->v['teachers'] = $teachers;
        $this->v['extParams']  = $request->all(); // phục vụ cho việc lấy tham số để thực hiện việc lọc 
        $this->v['list'] = $this->user->loadListWithPager($this->v['extParams']);
        // $this->v['list'] = $this->teacher->loadListWithPager($this->v['extParams']);
        // $this->v['users'] =  DB::table($this->table)->where('status' , 1)->get();
        return view('user.index', $this->v);
    }

    // thêm user
    public function add(UserRequest $request)
    {
        $title = 'trang add';
        $this->v['_title'] = $title;


        $method_route = 'route_BackEnd_Users_Add';
        if ($request->isMethod('post')) {

            // $rules = [
            //     'email' =>  'required | email',
            //     'password' => 'required | min:6',
            //     'name' => 'required'
            // ];
            // $message = [
            //     'required' => ':attribute bắt buộc phải nhập',
            //     'email' => ':attribute không hợp lệ',
            //     'min' => ':attribute bắt buộc phải nhập lớn hơn 6 ký tự'
            // ];

            // $attribute = [
            //     'email' => 'email của bạn',
            //     'password' => 'mật khẩu',
            //     'name' => 'tên của bạn'
            // ];
            // $validator = Validator::make($request->post(), $rules, $message, $attribute);
            // // dd($validator);

            // if ($validator->fails()) {
            //     // return redirect($method_route)->withErrors($validator)->withInput();
            //      return redirect()->route($method_route)->withErrors($validator)->withInput();
            // } else {

            $params = [];
            // dd($request->post());
            $params['cols'] = array_map(function ($item) {
                // lọc sạch dữ liệu không có cx đc
                if ($item == '') {
                    $item = null;
                }
                if (is_string($item)) {
                    $item = trim($item);
                }
                return $item;
            }, $request->post());
            unset($params['cols']['_token']);

            //  dd($request->file());
            if($request->file('cmt_mat_truoc')){
                $params['cols']['hinh'] = $this->uploadFile($request->file('cmt_mat_truoc'));
                //  dd($params['cols']['hinh']);
            }
            $res = $this->user->saveNew($params);

            if ($res == null) {
                return redirect($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới thành công người dùng');
            } else {
                Session::flash('error', 'Thêm mới thành công người dùng');
                return redirect($method_route);
            }
            // }
        }

        return view('user.add', $this->v);
    }

    public function detail($id, Request $request)
    {
        $this->v['_title'] =  'Chi tiết người dùng';
        $objItem = $this->user->loadOne($id);
        // dd($objItem);
        $this->v['objItem'] = $objItem;
        return view('user.detail', $this->v);
    }


    public function update_User($id, Request  $request)
    {
        $method  =  'route_BackEnd_Users_Detail';
        $params  = [];
        $params['cols'] = array_map(function ($item) {
            if ($item == '') {
                $item = null;
            }

            if (is_string($item)) {
                $item = trim($item);
            }
            return $item;
        }, $request->post());
        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;
        $params['cols']['password'] = Hash::make($params['cols']['password']);
        $res = $this->user->saveUpdate($params);
        if ($res ==  null) {
            return redirect()->route($method, ['id' => $id]);
        } else if ($res ==  1) {
            return redirect()->route($method, ['id' => $id]);
            Session::flash('success', 'Cập nhập bản ghi thành công');
        } else {
            Session::flash('error', "Lỗi cập nhập bản ghi");
            return redirect()->route($method, ['id' => $id]);
        }
    }


    public function uploadFile($file)
    {
        $filename =  time(). '_' . $file->getClientOriginalName();
        return $file->storeAs('anh_cmnn' , $filename ,  'public');

    
    }
}
