<?php

use App\Color;
use Illuminate\Database\Seeder;

class InitialColorDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'Light pink'],
            ['id' => 2, 'name' => 'Red'],
            ['id' => 3, 'name' => 'Dark green'],
            ['id' => 4, 'name' => 'Light green'],
            ['id' => 5, 'name' => 'Dark blue'],
            ['id' => 6, 'name' => 'Violet'],
            ['id' => 7, 'name' => 'Dark pink'],
            ['id' => 8, 'name' => 'Peech'],
            ['id' => 9, 'name' => 'Yellow'],
        ];

        Color::truncate();

        foreach ($items as $item) {
            $color = new Color;
            $color->name  = $item['name'];
            $color->save();
        }
    }
}
