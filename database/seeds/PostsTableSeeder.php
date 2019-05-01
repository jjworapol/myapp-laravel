<?php

use Illuminate\Database\Seeder;
use App\Post;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class,30)->create([
            'title' => 'Welcome to My News'
        ]);
        factory(Post::class, 30)-> create();
//        $this->call(PostsTableSeeder::class);
    }
}
