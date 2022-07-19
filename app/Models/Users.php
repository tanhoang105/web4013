<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    // vì tên model không khớp với tên bảng nên cần cài đặt lại cho $table
    protected $table  = 'users';
}
