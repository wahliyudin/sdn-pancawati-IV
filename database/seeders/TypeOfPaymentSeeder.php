<?php

namespace Database\Seeders;

use App\Models\TypeOfPayment;
use Illuminate\Database\Seeder;

class TypeOfPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_of_payments = [
            [
                'name' => 'Biaya Seragam',
                'description' => 'Untuk membayar seragam'
            ],
            [
                'name' => 'Biaya Buku',
                'description' => 'Untuk membayar Buku'
            ],
        ];

        foreach ($type_of_payments as $item) {
            TypeOfPayment::create($item);
        }
    }
}
