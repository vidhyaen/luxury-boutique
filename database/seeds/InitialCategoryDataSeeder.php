<?php

use App\Category;
use Illuminate\Database\Seeder;

class InitialCategoryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'Saree'],
            ['id' => 2, 'name' => 'Kurti'],
            ['id' => 3, 'name' => 'Jewells']
        ];

        Category::truncate();

        foreach ($items as $item) {
            $category = new Category;
            $category->name  = $item['name'];
            $category->save();
        }
    }
}
