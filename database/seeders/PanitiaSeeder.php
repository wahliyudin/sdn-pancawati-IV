<?php

namespace Database\Seeders;

use App\Models\Panitia;
use Illuminate\Database\Seeder;

class PanitiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Panitia::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => '123456789',
        ]);
    }
}
