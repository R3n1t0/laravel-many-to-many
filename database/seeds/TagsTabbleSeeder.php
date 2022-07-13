<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTabbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'FrontEnd', 'BackEnd', 'Laravel', 'Angular', 'React', 'FullStack'
        ];

        foreach ($tags as $tag) {

            $new_tag = new Tag();
            $new_tag->name= $tag;
            $new_tag->slug= Str::slug('slug', '-');
            $new_tag->save();

        }
    }
}
