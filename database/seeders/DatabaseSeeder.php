<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // viết seed : tạo ra bản dữ liệu mẫu cho bảng teachers
        $teacherSeed = 
        [
            [
                'nameTeaher' => 'Hoàng Nhật Tân',
                'address' => 'Hà Nội',
                'date' => '2022-07-01',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                
            ],
            [
                'nameTeacher' => 'Hoàng Nhật Tân 22',
                'address' => 'Hà Nội',
                'date' => '2022-07-01',
                'created_at' => date("Y-m-d H:i:s"),
                'update_at' => date("Y-m-d H:i:s"),
                
            ]
        ];
        $cates = [
            [
                'name' => 'danh mục mới',
                'desc' => 'mô tả danh mục',
                'created_at' => date('Y-m-d H:i:s')
            ]
            ];
        
        for ($i=0; $i < 10 ; $i++) { 
            $cates[] = [
                'name' => 'danh mục mới',
                'desc' => 'mô tả danh mục',
                'created_at' => date('Y-m-d H:i:s')
            ];
            $teacherSeed[] = 
                [
                    'nameTeacher' => 'Hoàng Nhật Tân '. $i,
                    'address' => 'Hà Nội',
                    'date' => '2022-07-01',
                    'created_at' => date("Y-m-d H:i:s"),
                    'update_at' => date("Y-m-d H:i:s"),
                    
                ];
            
        }
        DB::table('teachers')->insert($teacherSeed);
        // DB::table('cate')->insert($cates);

        // DB::table('users')->insert([
        //     'name' => "Poly",
        //     'email' => 'poly@gmail.com',
        //     'password' => Hash::make('123456'),
        // ]);

    }
}
