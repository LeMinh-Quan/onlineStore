<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void 
    { 
        Schema::create('products', function (Blueprint $table) { 
            $table->id(); 
            // Cột liên kết danh mục
            $table->foreignId('category_id')->constrained()->cascadeOnDelete(); 
            
            // THÊM DÒNG NÀY: Cột liên kết người tạo sản phẩm (Lab 10 - Yêu cầu 4)
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
            
            $table->string('name');
            $table->decimal('price', 12, 2);
            $table->integer('stock_quantity')->default(0); 
            $table->text('description')->nullable(); 
            $table->string('image')->nullable(); 
            
            $table->timestamps();
        }); 
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};