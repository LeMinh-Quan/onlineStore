<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Tên sản phẩm dài khoảng 3 từ
            'name' => fake()->sentence(3),
            // Giá ngẫu nhiên từ 100 - 5000
            'price' => fake()->randomFloat(2, 100, 5000),
            // Tồn kho 1 - 100
            'stock_quantity' => fake()->numberBetween(1, 100),
            // 1 đoạn văn mô tả
            'description' => fake()->paragraph(),
            // Random lấy ID của một danh mục đã tồn tại trong bảng categories
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
        ];
    }
}
