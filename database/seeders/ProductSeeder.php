<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'product1',
            'description' => 'Descript1',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'title' => 'product2',
            'description' => 'Descript2',
            'created_at' => now(),
        ]);
    }
}
