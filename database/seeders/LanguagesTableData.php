<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguagesTableData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('languages')->insert(['name' => 'English', 'code' => 'en']);       
        \DB::table('languages')->insert(['name' => 'French', 'code' => 'fr']);
        \DB::table('languages')->insert(['name' => 'Spanish', 'code' => 'es']);
    }
}
