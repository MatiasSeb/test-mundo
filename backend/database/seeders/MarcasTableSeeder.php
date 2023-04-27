<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marcas')->insert([
            ['id' => '1','nombre' => 'Apple'],
            ['id' => '2','nombre' => 'Samsung'],
            ['id' => '3','nombre' => 'Huawei'],
            ['id' => '4','nombre' => 'Xiaomi']
        ]);
    }
}
