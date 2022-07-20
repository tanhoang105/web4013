<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class teachers extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = ['id' , 'nameTeaher' , 'address' , 'status' , 'date' , 'created_at' , 'updated_at'];

    // public function loadList($param =  [] , $keyword = null){
    //     $query = DB::table($this->table)
    //             ->select($this->fillable);

    //     if(!empty($keyword) ){
    //       $query =  $query->where(function($q) use ($keyword){
    //             $q->orWhere('nameTeaher' , 'like' , '%'.$keyword.'%');
    //             $q->orWhere('address' , 'like' , '%'.$keyword.'%');
    //         });
    //     }
    //     return $list = $query->get();        

    // }



    public function loadListWithPager($param =  []){
        $query = DB::table($this->table)
                ->select($this->fillable);

                // hiển thị 10 bản ghi trong 1 trang 
        $list = $query->paginate(10);
        return $list;        
    }
}
