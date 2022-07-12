<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Posts;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) {
            $new_post = new Posts();
            $new_post -> title = $faker -> sentence();
            $new_post -> slug = Posts::generateSlug($new_post->title);
            $new_post -> content = $faker -> text(500);
            $new_post->save();
        }
    }
}
