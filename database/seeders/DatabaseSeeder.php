<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //create topics
        $this->call(TopicsSeeder::class);

        // create user with community
        $users = User::factory(4)->create()->each(
            function ($u) {
                Community::factory(2)->create(['user_id' => $u->id]);
            }
        );

        // get random topics
        $topics = Topic::inRandomOrder()->take(3)->get();

        $t = array();
        foreach ($topics as $topic) {
            $t[] = $topic->id;
        }

        // get community
        $communities = Community::all();

        foreach ($communities as $community) {
            $community->topics()->attach($t);
        }

        //create post
        // User::all()->each(
        //     function ($com) use ($communities) {
        //         Post::factory(3)->create([
        //             'community_id' => $com->get()->random()->id,

        //         ]);
        //     }
        // );
        foreach ($users as $user) {
            Post::factory(3)->create([
                'user_id' => $user->id,
                'community_id' => $communities->random()->id
            ]);
        }
    }
}
