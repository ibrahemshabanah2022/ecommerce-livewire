<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $electronicCategories = [
            'Laptops',
            'Smartphones',
            'Cameras',
            'Headphones',
            'Wearable Technology',
            'Smart Home Devices',
            'Gaming Consoles',
            'Televisions'
        ];

        foreach ($electronicCategories as $category) {
            Category::factory()->create([
                'name' => $category,
            ]);
        }
    }
}
