<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('abouts')->insert([
            'title' => '{"en":"Stay informed about Cubaista"}',
            'body' => '{"en":"from company facts and news to our worldwide locations and more"}',
            'active' => 1,
            'created_at' => now(),
        ]);
    }
}
