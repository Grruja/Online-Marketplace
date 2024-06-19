<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (config('listing.category') as $category => $subcategories) {
            $category = Category::create(['name' => $category]);

            foreach ($subcategories as $subcategory) {
                Subcategory::create([
                    'category_id' => $category->id,
                    'name' => $subcategory
                ]);
            }
        }
    }
}
