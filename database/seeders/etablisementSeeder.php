<?php

namespace Database\Seeders;

use App\Models\Etablissement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class etablisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $etabs = [];
        foreach(range(0,20) as $db){
            $one = [
                "Code_etab" => rand(1,5000),
                "nom" => fake()->name(),
                "Division" => fake()->name(),
                "Service" => fake()->name(),
                "Cycle" => fake()->name(),
                "db_id" => rand(200,207),
            ];
            $etabs[] = $one;
        }
        Etablissement::create($etabs);
    }
}
