<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(User::class)->create([
//            'name' => 'Adminstrator',
//            'password' => bcrypt('PasswordForAdmin')
//        ]);
//        factory(User::class,10)->create();

        $admin = factory(User::class)->states('admin')->create();
        $admin->posts()->saveMany(
            factory(Post::class, 5)->make()
        );
        factory(User::class, 10)->states('creator')->create()
            ->each(function ($user){
                $user->posts()->saveMany(
                    factory(Post::class, 3)->make()
                );
            });
        factory(User::class, 10)->state('viewer')->create();


    }
}
