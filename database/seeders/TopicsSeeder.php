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

        Topic::create(['name' => 'Mobil']);
        Topic::create(['name' => 'Motor']);
        Topic::create(['name' => 'Design']);
        Topic::create(['name' => 'Mobil listrik']);
        Topic::create(['name' => 'Roket']);
        Topic::create(['name' => 'Programming']);
    }
}
