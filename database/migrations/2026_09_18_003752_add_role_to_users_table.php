<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //0306241143-Lê Minh Quân
    public function up(): void 
    { 
        Schema::table('users', function (Blueprint $table) { 
            // Mặc định mọi tài khoản tạo mới đều là 'user' (người dùng thường) 
            // Đặt sau cột email cho dễ nhìn trong DB 
            $table->string('role')->default('user')->after('email'); 
        }); 
    } 
    //0306241143-Lê Minh Quân
    public function down(): void 
    { 
        Schema::table('users', function (Blueprint $table) { 
            $table->dropColumn('role'); 
        }); 
    }
};
