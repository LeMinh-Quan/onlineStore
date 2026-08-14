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
            $table->foreignId('category_id')->constrained()->cascadeOnDelete(); 
            
            $table->string('name');
            $table->decimal('price', 12, 2);
            $table->integer('stock_quantity')->default(0); // Số lượng tồn kho 
            $table->text('description')->nullable(); // Mô tả (có thể để trống) 
            $table->string('image')->nullable(); // Hình ảnh sản phẩm-> ko lỗi khi chạy gộp lab1-6
            
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
