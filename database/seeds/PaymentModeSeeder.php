<?php

use App\PaymentMode;
use Faker\Provider\ar_SA\Payment;
use Illuminate\Database\Seeder;

class PaymentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'COD'],
            ['id' => 2, 'name' => 'Online'],

        ];

        PaymentMode::truncate();

        foreach ($items as $item) {
            $Payment = new PaymentMode();
            $Payment->name  = $item['name'];
            $Payment->save();
        }
    }
}
