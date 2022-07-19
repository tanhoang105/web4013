<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class cates extends Model
{
    use HasFactory;
    protected $table = 'cate';
    protected $fillable  = ['id' , 'name' , 'desc' , 'trash' , 'created_at' , 'updated_at'];

    public function getAll($keyword = null){
        $query = DB::table($this->table)
                ->select($this->fillable)
                ->where('trash' , 0);
        if(!empty($keyword)){
            $query = $query->where(function($q) use ($keyword){
                $q->orWhere('name' , 'like' , '%'.$keyword.'%');
            });
        }
        return $list = $query->get();
    }
}
