<?php

namespace App\Providers;

use App\Course;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('student', function () {
            return auth()->check() && auth()->user()->role === "student";
        });
        Blade::if('employer', function () {
            return auth()->check() && auth()->user()->role === "employer";
        });
        Blade::if('placement', function () {
            return auth()->check() && auth()->user()->role === "placement";
        });
        Blade::directive('continue', function($expression) {
            return "<?php continue; ?>";
        });
        Blade::if('checkCourses',function (){
           return Course::with('category','user','job')->get()->toArray() != null;
        });

    }
}
