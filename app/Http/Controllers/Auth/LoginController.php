<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator ;

class LoginController extends Controller
{
    public function getLogin(){


        return view('auth.login');
    }


    public function postLogin(Request $request){
        // kiểm tra dữ liệu đầu vào
        $rules = [
            'email' =>  'required | email',
            'password' => 'required | min:6',
            'name' => 'required'
        ];
        $message = [
            'required' => ':attribute bắt buộc phải nhập',
            'email' => ':attribute không hợp lệ',
            'min' => ':attribute bắt buộc phải nhập lớn hơn 6 ký tự'
        ];

        $attribute = [
            'email' => 'email của bạn',
            'password' => 'mật khẩu',
            'name'=> 'tên của bạn'
        ];

        $validator = Validator::make($request->all() , $rules , $message , $attribute);
        // dd($validator);
        if($validator->fails()){
            // khi người dùng điền không đùng thì hiển thị errors
            return redirect('login')->withErrors($validator)->withInput();
        }else{
            // đón dữ liệu từ bên trang login gửi sang
            $email = $request->input('email');
            $password = $request->input('password');
            $name = $request->input('name');
            // kiểm tra đăng nhập
            // mặc định auth sẽ kiểm tra email và password nếu cần kiểm tra thêm trường dữ liệu nào thì bổ sung thêm vào mảng
            if(Auth::attempt(['email' => $email, 'password' => $password , 'name' => $name] )){
                // nếu đăng nhập thành công
                 return redirect('user/');
            }else{
                // ngược lại nếu đăng nhập không thành công 
                // dữ liệu sẽ đc lưu vào Session::falsh có thể là hiển thị ra thông báo lỗi nhưng cũng có thể hiển thị ra thông báo thành công
                Session::flash('error' , 'Thông tin đăng nhập không đúng');
                return redirect('login');
            }
        }
    }


    // hàm đăng xuất 
    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
