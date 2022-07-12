<?php

use App\Category;
use Illuminate\Database\Seeder;
use App\Posts;

class UpdatePostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Posts::all();
        foreach ($posts as $post) {
            $category_id = Category::inRandomOrder()->first()->id;

            $post->category_id = $category_id;
            $post->update();
        }
    }
}
