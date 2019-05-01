<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Post;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Post::class=>'App\Policies\Postpolicy', //ผูกกับ model
        Post::class=>'App\Policies\Commentpolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();



//        Gate::define('update-post','App\Policies\PostPolicy@update');
//
//        Gate::define('create-post','App\Policies\PostPolicy@create');
    }
}
