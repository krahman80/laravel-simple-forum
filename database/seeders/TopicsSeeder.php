<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create(['name' => 'Car']);
        Topic::create(['name' => 'Motor']);
        Topic::create(['name' => 'Car Home']);
        Topic::create(['name' => 'RV']);
        Topic::create(['name' => 'EV']);
        Topic::create(['name' => 'Hybrid Car']);
        Topic::create(['name' => 'Misc']);
    }
}
