<?php

namespace App\Providers;

use App\Models\CourseCategory;
use App\Models\PackageCategory;
use App\Models\ServiceCategory;
use App\Models\Course;
use App\Models\Setting;
use App\Models\Page;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // You can bind services or repositories here if needed
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share settings
        if (Schema::hasTable('settings')) {
            $setting = Setting::first();
            View::share('setting', $setting);
        }

        if (Schema::hasTable('course_categories')) {
            $categories = CourseCategory::where('status', 'publish')->orderBy('order_no')->get();
            View::share('categories', $categories);
        }



        if (Schema::hasTable('service_categories')) {
            //    $serviceCategories = ServiceCategory::where('status', 'publish')->orderBy('order_no', 'asc')
            //     ->get(['title', 'slug']);

            $serviceCategories = ServiceCategory::all();

            View::share('serviceCategories', $serviceCategories);
        }

        Blade::directive('banners', function ($position) {
            return "<?php echo view('front.partials.banner', [
        'bannerList' => \App\Models\Banner::where('status', 'active')
            ->where('type', $position)
            ->orderBy('order_no', 'ASC')
            ->get()
    ])->render(); ?>";
        });



        // // Share pages
        // if (Schema::hasTable('pages')) {
        //     $pages = Page::select('id', 'title', 'slug')
        //         ->where('status', 'published')
        //         ->get();
        //     View::share('service_list', $pages);
        // }

        // // Share package categories
        // if (Schema::hasTable('package_categories')) {
        //     $package_categories = PackageCategory::where('status', 'active')
        //         ->orderBy('order_no', 'ASC')
        //         ->get();
        //     View::share('package_categories', $package_categories);
        // }
    }
}
