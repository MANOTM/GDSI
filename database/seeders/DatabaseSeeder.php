<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\marche;
use App\Models\Etablissement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        marche::factory(10)->create();
 
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'Admin@admin.com',
            'password'=> Hash::make('Admin')
        ]);  
        \App\Models\Db::factory()->create([
            'id' => 201,
            'Désignation' => 'Rabat',
            'Désignation_ar'=> 'المديرية الإقليمية الرباط'
        ]); 
        \App\Models\Db::factory()->create([
            'id' => 202,
            'Désignation' => 'Salé',
            'Désignation_ar'=> 'المديرية الإقليمية سلا'
        ]); 
        
        \App\Models\Db::factory()->create([
            'id' => 203,
            'Désignation' => 'Skhirate témara',
            'Désignation_ar'=> 'المديرية الإقليمية الصخيرات تمارة'
        ]); 
        
        \App\Models\Db::factory()->create([
            'id' => 204,
            'Désignation' => 'kénitra',
            'Désignation_ar'=>'المديرية الإقليمية القنيطرة'
        ]); 
        
        \App\Models\Db::factory()->create([
            'id' => 205,
            'Désignation' => 'Khémisset',
            'Désignation_ar'=> 'المديرية الإقليمية الخميسات'
        ]); 
        
        \App\Models\Db::factory()->create([
            'id' => 206,
            'Désignation' => 'SidiKacem',
            'Désignation_ar'=> 'المديرية الإقليمية سيدي قاسم'
        ]); 
        
        \App\Models\Db::factory()->create([
            'id' => 207,
            'Désignation' => 'SidiSliman',
            'Désignation_ar'=> 'المديرية الإقليمية سيدي سليمان'
        ]);  
    }
}
