<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Post::truncate();
        \App\Models\Category::truncate();

        $category = new \App\Models\Category;
        $category->name = 'Categoría 1';
        $category->save();

        $post = new \App\Models\Post;
        $post->title = 'Mi Primer Post';
        $post->body = 'Cuerpo de mi primer Post';
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(\App\Models\Tag::create(['name'=>'Tag 1']));
    }
}
