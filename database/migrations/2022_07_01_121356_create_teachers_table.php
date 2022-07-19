<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nameTeaher',255); // nếu cần set độ dài thì thêm tham số thứ 2 
            $table->string('address')->nullable(); 
            $table->integer('status')->default(1); // gán giá trị mặc đinh
            $table->date('date'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
