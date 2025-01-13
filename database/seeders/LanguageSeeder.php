<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            [
                'abbr' => 'en',
                'local' => 'en_US',
                'name' => 'English',
                'native' => 'English',
                'flag' => 'us_flag.png',
                'direction' => 'ltr',
                'active' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'abbr' => 'ar',
                'local' => 'ar_EG',
                'name' => 'Arabic',
                'native' => 'العربية',
                'flag' => 'eg_flag.png',
                'direction' => 'rtl',
                'active' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],[

                'abbr' => 'fr',
                'local' => 'fr_FR',
                'name' => 'French',
                'native' => 'Français',
                'flag' => 'fr_flag.png',
                'direction' => 'ltr',
                'active' => '0',
                'created_at' => now(),
                'updated_at' => now(),
                ],

            ]
        );
    }
}
