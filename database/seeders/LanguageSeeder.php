<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'code' => 'en',
            'english_name' => 'English',
            'directionality' => 'ltr',
            'local_name' => 'English',
            'url_wiki' => 'https://en.wikipedia.org/wiki/English_language',
            'created_at' => now(),
        ]);
        DB::table('languages')->insert([
            'code' => 'es',
            'english_name' => 'Spanish',
            'directionality' => 'ltr',
            'local_name' => 'Español',
            'url_wiki' => 'https://es.wikipedia.org/wiki/Idioma_espa%C3%B1ol',
            'created_at' => now(),
        ]);

    }
}
