<?php

use App\OrderStatus;
use Illuminate\Database\Seeder;

class InitialStatusDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'created'],
            ['id' => 2, 'name' => 'pending'],
            ['id' => 3, 'name' => 'ondelivery'],
            ['id' => 4, 'name' => 'cancelled'],
            ['id' => 5, 'name' => 'delivered'],
        ];

        OrderStatus::truncate();

        foreach ($items as $item) {
            $OrderStatus = new OrderStatus;
            $OrderStatus->name  = $item['name'];
            $OrderStatus->save();
        }
    }
}
