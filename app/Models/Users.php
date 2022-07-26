<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class Users extends Model
{
    use HasFactory;
    // vì tên model không khớp với tên bảng nên cần cài đặt lại cho $table
    protected $table  = 'users';
    protected $fillable = ['id' , 'name' , 'email' , 'password'];


    public function loadListWithPager($param =  []){
        $query = DB::table($this->table)
                ->select($this->fillable);

                // hiển thị 10 bản ghi trong 1 trang 
        $list = $query->paginate(10);
        return $list;        
    }

    public function saveNew($param){
        $data = array_merge($param['cols'] , [
            // đây là mảng bổ sung
            // ví dụ ở đây chúng ta mã hóa mật khẩu nên cần ghi đề lại mật khẩu cũ bằng mật khẩu mã hóa
            'password' => Hash::make($param['cols']['password']) // mx hóa mk
        ]);
        $res = DB::table($this->table)->insertGetId($data);
        /// insertGetId sẽ trả về id của bản ghi vừa mới đc insert
        return $res ;
    }

    public function loadOne($id , $param = null){
        $query = DB::table($this->table)->where('id' , '=' , $id);
        $obj = $query->first();

        return $obj;
    }
}
