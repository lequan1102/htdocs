<?php

namespace App\Providers;
use App\Tutorial;
//Fields
use TCG\Voyager\Facades\Voyager;
use App\FormFields\CkeditorFormField;
use App\Posts;
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
        view()->composer('*', function ($view) {
            $data = Tutorial::orderBy('id', 'DESC')->get();
            $view->with('tutorial', $data);
        });

        view()->composer('*', function ($view) {
            //Bài viết gần đây
            $data = Posts::orderBy('id','DESC')->where('status','PUBLISHED')->limit(2)->get();
            $view->with('posts_new', $data);
        });
        
        Voyager::addFormField(CkeditorFormField::class);
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
