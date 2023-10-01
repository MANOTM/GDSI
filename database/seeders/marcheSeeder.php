<?php

namespace Database\Seeders;

use App\Models\marche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class marcheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        marche::factory(10)->create();
    }
}
