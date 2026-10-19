<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuario')->insert([
            ['nome'=> 'Penelope', 'email'=>'penelope20@gmail.com', 'senha' => Hash::make('Odisseu20'), 'created_at' => now(), 'updated_at' => now()],
            ['nome'=> 'Taylor Swift', 'email'=>'swift1989@gmail.com', 'senha'=> Hash::make('Sh4k31t0ff'), 'created_at' => now(), 'updated_at' => now()],
            ['nome'=> 'Harry Styles', 'email'=>'harryzinho@gmail.com', 'senha'=> Hash::make('StylesHarry'), 'created_at' => now(), 'updated_at' => now()], 
        ]);
    }
}
