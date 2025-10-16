<?php

use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index'])->name('website.index');

Route::prefix('website')->name('website.')->group(function () {
    Route::get('/about-us', [WebsiteController::class, 'aboutUs'])->name('about');
    Route::get('/contact-us', [WebsiteController::class, 'contactUs'])->name('contactus');
    Route::post('/contact-us/store', [WebsiteController::class, 'contactUsStore'])->name('contactus.store');
    Route::get('/gallery', [WebsiteController::class, 'gallery'])->name('gallery');
    Route::get('/blogs', action: [WebsiteController::class, 'blogs'])->name('blogs');
    Route::get('/blog/{slug}', [WebsiteController::class, 'blogDetail'])->name('blog.detail');
    Route::get('/apply-now', [WebsiteController::class, 'applyNow'])->name('apply.now');
    Route::get('/courses', action: [WebsiteController::class, 'courses'])->name('courses');
    Route::get('/course/{slug}', [WebsiteController::class, 'courseDetail'])->name('course.detail');
    Route::get('/courses/{slug}', [WebsiteController::class, 'categoryWiseCourses'])->name('category.wise.courses');
    Route::get('/jobs', [WebsiteController::class, 'joblist'])->name('joblist');
    Route::get('/job/{slug}', [WebsiteController::class, 'jobDetail'])->name('job.detail');

    Route::get('/services', [WebsiteController::class, 'services'])->name('services');
    Route::get('/service/{slug}', [WebsiteController::class, 'serviceDetail'])->name('service.detail');
});
