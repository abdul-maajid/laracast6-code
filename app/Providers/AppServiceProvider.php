<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // bind will create new instance of class every time
        // $this->app->bind('App\Example', function(){
        
        // this will create a single instance of class when called
        $this->app->singleton('App\Example', function(){
            $collaborator = new \App\Collaborator();
            $foo = 'foobar';
        
            return new \App\Example($collaborator, $foo);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
