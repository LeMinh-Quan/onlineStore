<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
     public function run(): void 
    { 
         
        // 1. Tạo 10 danh mục 
        Category::factory(10)->create(); 
        $this->command->info('Đã tạo 10 Danh mục!'); 
 
        // 2. Tạo 50 sản phẩm (Factory của Product sẽ tự bốc ngẫu nhiên ID của 10 danh mục trên) 
        Product::factory(50)->create(); 
        $this->command->info('Đã tạo 50 Sản phẩm!'); 
    } 
}
