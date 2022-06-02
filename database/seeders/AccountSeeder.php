<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            [
                'name' => 'Kas',
                'code' => '1100-00-020'
            ],
            [
                'name' => 'Bank BRI',
                'code' => '1200-00-010'
            ]
        ];
        foreach ($accounts as $account) {
            Account::create($account);
        }
    }
}
