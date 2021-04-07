<?php

use App\Size;
use Illuminate\Database\Seeder;

class InitialSizeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'S'],
            ['id' => 2, 'name' => 'M'],
            ['id' => 3, 'name' => 'L'],
            ['id' => 4, 'name' => 'XL'],
            ['id' => 5, 'name' => 'XXL'],
            ['id' => 6, 'name' => 'XXXL'],
        ];

        Size::truncate();

        foreach ($items as $item) {
            $size = new Size();
            $size->name  = $item['name'];
            $size->save();
        }
    }
}
