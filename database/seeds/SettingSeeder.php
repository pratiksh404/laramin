<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Pratiksh\Laramin\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create();
    }
}
