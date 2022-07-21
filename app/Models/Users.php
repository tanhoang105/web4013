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
            'password' => Hash::make($param['cols']['password'])
        ]);
        $res = DB::table($this->table)->insertGetId($data);
        return $res ;
    }
}
