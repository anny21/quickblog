<?php

namespace Devanny\QuickBlog;
// use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Devanny\QuickBlog\Middleware\Http\QuickAuth;
use Illuminate\Support\ServiceProvider;

class QuickBlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        $router = $this->app->make(Router::class);
              $router->aliasMiddleware('quickAuth', QuickAuth::class);
         if ($this->app->runningInConsole()) {
         
              $this->publishes([
                __DIR__.'/quickblog.php' => config_path('quickblog.php'),
                 __DIR__.'/resources/views' => resource_path('views/quickblog'),
                 __DIR__.'/resources/assets' => public_path('quickblog/assets'),
                 __DIR__.'/database/migrations' => database_path('migrations')
                // you can add any number of migrations here
              ], 'blog');

              
            }
    }
}
