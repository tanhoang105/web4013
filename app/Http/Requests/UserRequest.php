<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // chuyển thành true để có thể chạy được file 
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $rules = [];
        $currentAction = $this->route()->getActionMethod(); // lấy ra phương thức đang thực hiện
        // dd($currentAction);
        switch ($this->method()) {
                // trả về post hay get
            case 'POST':
                switch ($currentAction) {
                    case 'add':
                        $rules = [
                            'email' =>  'required | email | unique:users', // duy nhất trong bảng users 
                            'password' => 'required | min:6',
                            'name' => 'required'
                        ];
                        break;

                    default:

                        break;
                }
                break;

            default:

                break;
        }

        return $rules;
    }


    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc',
            'email' => ':attribute phải là email',
            'unique' => ':attribute đã tồn tại',
            'min' => ':attribute ít nhất 6 ký tự',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'email',
            'password' => 'mật khẩu',
            'name' => 'tên đăng nhập',
        ];
    }

    
}
