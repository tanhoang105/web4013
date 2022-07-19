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

    public function loadList($param =  [] , $keyword = null){
        $query = DB::table($this->table)
                ->select($this->fillable);

        if(!empty($param) ){
            $list = $query->where(function($q) use ($keyword){
                $q->orWhere('nameTeaher' , 'like' , '%'.$keyword.'%');
                $q->orWhere('address' , 'like' , '%'.$keyword.'%');
            });
        }
        return $list = $query->get();        

    }
}
