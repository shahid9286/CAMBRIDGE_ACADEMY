<?php

use App\Http\Controllers\Admin\InfoSectionController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\TermsAndConditionController;
use App\Http\Controllers\Admin\TestimonialSectionController;
use App\Http\Controllers\Admin\WeServeController;
use App\Models\TestimonialSection;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// Middleware
use App\Http\Middleware\Localization;
use App\Http\Middleware\SetLocale;
// Models
use App\Models\Enquiry;
// Frontend Controllers
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\RealEstateController;
use App\Http\Controllers\Front\VATRegController;
use App\Http\Controllers\Front\TypingAttestationController;
use App\Http\Controllers\{
    DashboardController,
    ProfileController
};
use App\Http\Controllers\Admin\{
    SliderController,
    UserController,


    CourseCategoryController,
    CourseController,
    SeoGlobalController,
    CourseWhyChooseUsController,
    CourseFeatureController,
    CourseOutlineController,
    CourseBlockController,
    CourseCTAController,
    CourseSectionController,
    BcategoryController,
    BlogController,
    FaqSectionController,
    whyChooseUsSectionController,
    BlockController,
    BlogBlockController,
    BlogCTAController,
    BlogSectionController,
    TeamController,
    BulkDeleteController,
    CallToActionController,
    DocumentRequiredController,
    EnquiryController,
    FaqController,
    FeatureController,
    FeatureSectionController,
    FeatureImageController,
    GalleryController,
    SeoMetaController,
    GcategoryController,
    TempelateFileController,
    HeroSectionController,
    IntroSectionController,
    JcategoryController,
    JobController,
    JobCandidateController,
    NotificationController,
    PageController,
    BannerController,
    PageCategoryController,
    PartnerController,
    ProcedureController,
    SectionTitleController,
    ServiceCategoryController,
    ServiceController,
    ServiceProjectController,
    ServiceSectionController,
    SettingController,
    TestimonialController,
    WhyChooseUsController,
    WhyUsImageController,
    PageSectionController,
    ElementController,
    PackageController,
    PackageCategoryController,
    
    ClientController,
    CookiesController,
    InfoBlockController,
    ServiceFeatureController,
    SectionHeaderController,
    ServiceBlockController,

    ServiceElementController,

    CourseElementController
};
use App\Http\Controllers\Front\DHAController;
use App\Http\Controllers\Front\LegalServicesController;
use App\Http\Controllers\Website\HomeController;

Route::get('/pending-user', [UserController::class, 'pendingUser'])->name('pending.user');
Route::get('/blocked-user', [UserController::class, 'blockedUser'])->name('blocked.user');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("/slider", [SliderController::class, "index"])->name("admin.slider");
    Route::get("/slider/add", [SliderController::class, "add"])->name("admin.slider.add");
    Route::post("/slider/store", [SliderController::class, "store"])->name("admin.slider.store");
    Route::delete("/slider/delete/{id}/", [SliderController::class, "destroy"])->name("admin.slider.delete");
    Route::get("/slider/edit/{id}/", [SliderController::class, "edit"])->name("admin.slider.edit");
    Route::post("/slider/update/{id}/", [SliderController::class, "update"])->name("admin.slider.update");


    Route::get("/banners", [BannerController::class, "index"])->name("admin.banner.index");
    Route::get("/banner/add", [BannerController::class, "add"])->name("admin.banner.add");
    Route::post("/banner/store", [BannerController::class, "store"])->name("admin.banner.store");
    Route::get("/banner/edit/{id}/", [BannerController::class, "edit"])->name("admin.banner.edit");
    Route::post("/banner/update/{id}/", [BannerController::class, "update"])->name("admin.banner.update");
    Route::delete("/banner/delete/{id}/", [BannerController::class, "destroy"])->name("admin.banner.delete");


    // Home Clients Section
    Route::get('/client', [ClientController::class, 'index'])->name('admin.client.index');
    Route::get('/client/add', [ClientController::class, 'add'])->name('admin.client.add');
    Route::post('/client/store', [ClientController::class, 'store'])->name('admin.client.store');
    Route::post('/client/delete/{id}/', [ClientController::class, 'delete'])->name('admin.client.delete');
    Route::get('/client/edit/{id}/', [ClientController::class, 'edit'])->name('admin.client.edit');
    Route::post('/client/update/{id}/', [ClientController::class, 'update'])->name('admin.client.update');
    //teams route
    Route::get('/team', [TeamController::class, 'index'])->name('admin.teams.index');
    Route::get('/team/add', [TeamController::class, 'add'])->name('admin.teams.add');
    Route::post('/team/store', [TeamController::class, 'store'])->name('admin.teams.store');
    Route::post('/team/delete/{id}/', [TeamController::class, 'delete'])->name('admin.teams.delete');
    Route::get('/team/edit/{id}/', [TeamController::class, 'edit'])->name('admin.teams.edit');
    Route::post('/team/update/{id}/', [TeamController::class, 'update'])->name('admin.teams.update');
});


Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('user.profile.edit');
Route::post('/update-Profile', [ProfileController::class, 'updateProfile'])->name('user.profile.update');
Route::post('/update-
word', [ProfileController::class, 'updatePassword'])->name('user.password.update');

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'status'])->group(function () {
    Route::middleware(['auth', 'user'])->group(function () {
        Route::get('/user-dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    });
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin-dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
        // profile routes
        Route::get('/editProfile', [ProfileController::class, 'editProfile'])->name('admin.profile.edit');
        Route::post('/updateProfile', [ProfileController::class, 'updateProfile'])->name('admin.profile.update');
        Route::post('/updatePassword', [ProfileController::class, 'updatePassword'])->name('admin.password.update');














































        // user routes
        Route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/add-user', [UserController::class, 'add'])->name('admin.user.add');
        Route::post('/store-user', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/update-user/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::post('/delete-user/{id}', [UserController::class, 'delete'])->name('admin.user.delete');

        Route::post('/makependingUser/{id}', [UserController::class, 'makependingUser'])->name('admin.user.makependingUser');
        Route::post('/makeapprovedUser/{id}', [UserController::class, 'makeapprovedUser'])->name('admin.user.makeapprovedUser');
        Route::post('/makeblockedUser/{id}', [UserController::class, 'makeblockedUser'])->name('admin.user.makeblockedUser');

        Route::get('/pendingUsers', [UserController::class, 'pendingUsers'])->name('admin.user.pendingUsers');
        Route::get('/approvedUsers', [UserController::class, 'approvedUsers'])->name('admin.user.approvedUsers');
        Route::get('/blockedUsers', [UserController::class, 'blockedUsers'])->name('admin.user.blockedUsers');
        // Bulk Delete Routes:-
        Route::get('bulk/deletes', [BulkDeleteController::class, 'bulkDelete'])->name('back.bulk.delete');

        // Page Routes:-
        Route::get('/pages', [PageController::class, 'pagelist'])->name('admin.page.index');
        Route::get('/page-detail/{slug}', [PageController::class, 'detail'])->name('admin.page.detail');
        Route::get('/page/add', [PageController::class, 'add'])->name('admin.page.add');
        Route::post('/page/store', [PageController::class, 'store'])->name('admin.page.store');
        // Route::post('/page/store', [PageController::class, 'store'])->middleware(['auth', 'can:create-page']);
        Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('admin.page.edit');
        Route::put('/page/update/{id}', [PageController::class, 'update'])->name('admin.page.update');
        Route::post('/page/delete/{id}', [PageController::class, 'delete'])->name('admin.page.delete');


        // Page Category Routes:-
        Route::get('/page-categories', [PageCategoryController::class, 'pagelist'])->name('admin.page_category.index');
        Route::get('/page-category/add', [PageCategoryController::class, 'add'])->name('admin.page_category.add');
        Route::post('/page-category/store', [PageCategoryController::class, 'store'])->name('admin.page_category.store');
        Route::get('/page-category/edit/{id}', [PageCategoryController::class, 'edit'])->name('admin.page_category.edit');
        Route::put('/page-category/update/{id}', [PageCategoryController::class, 'update'])->name('admin.page_category.update');
        Route::post('/page-category/delete/{id}', [PageCategoryController::class, 'delete'])->name('admin.page_category.delete');


        Route::resource('admin/pages', PageController::class)->except(['show']);
        Route::delete('admin/pages/{page}', [PageController::class, 'destroy'])->name('admin.page.destroy');

        // Partner Routes:-
        Route::get('/partners', [PartnerController::class, 'index'])->name('admin.partner.index');
        Route::get('/partner/add', [PartnerController::class, 'add'])->name('admin.partner.add');
        Route::post('/partner/store', [PartnerController::class, 'store'])->name('admin.partner.store');
        Route::get('/partner/edit/{id}', [PartnerController::class, 'edit'])->name('admin.partner.edit');
        Route::post('/partner/update/{id}', [PartnerController::class, 'update'])->name('admin.partner.update');
        Route::post('/partner/delete/{id}', [PartnerController::class, 'delete'])->name('admin.partner.delete');

        // Gallery Category Routes:-
        Route::get('/gallery-categories', [GcategoryController::class, 'gcategory'])->name('admin.gcategory.index');
        Route::get('/gallery-category/add', [GcategoryController::class, 'add'])->name('admin.gcategory.add');
        Route::post('/gallery-category/store', [GcategoryController::class, 'store'])->name('admin.gcategory.store');
        Route::get('/gallery-category/edit/{id}', [GcategoryController::class, 'edit'])->name('admin.gcategory.edit');
        Route::post('/gallery-category/update/{id}', [GcategoryController::class, 'update'])->name('admin.gcategory.update');
        Route::get('/gallery-category/delete/{id}', action: [GcategoryController::class, 'delete'])->name('admin.gcategory.delete');


        // Gallery Routes:-
        Route::get('/galleries', [GalleryController::class, 'index'])->name('admin.gallery.index');
        Route::get('/gallery/add', [GalleryController::class, 'add'])->name('admin.gallery.add');
        Route::post('/gallery/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
        Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
        Route::post('/gallery/update/{id}', [GalleryController::class, 'update'])->name('admin.gallery.update');
        Route::get('/gallery/delete/{id}', action: [GalleryController::class, 'delete'])->name('admin.gallery.delete');


        // Blog Category Routes:-
        Route::get('/blog-categories', [BcategoryController::class, 'bcategory'])->name('admin.bcategory.index');
        Route::get('/blog-category/add', [BcategoryController::class, 'add'])->name('admin.bcategory.add');
        Route::post('/blog-category/store', [BcategoryController::class, 'store'])->name('admin.bcategory.store');
        Route::get('/blog-category/edit/{id}', [BcategoryController::class, 'edit'])->name('admin.bcategory.edit');
        Route::post('/blog-category/update/{id}', [BcategoryController::class, 'update'])->name('admin.bcategory.update');
        Route::get('/blog-category/delete/{id}', action: [BcategoryController::class, 'delete'])->name('admin.bcategory.delete');


        // Blog Routes:-
        Route::get('/admin/blogs', [BlogController::class, 'blog'])->name('admin.blog.index');
        Route::get('/admin/blog/add', [BlogController::class, 'add'])->name('admin.blog.add');
        Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/admin/blog/edit/{slug}', [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::post('/admin/blog/update/{slug}', [BlogController::class, 'update'])->name('admin.blog.update');
        Route::get('/admin/blog/delete/{id}', action: [BlogController::class, 'delete'])->name('admin.blog.delete');


        // Blocks  Routes
        Route::get('/blog/block/{slug}', [BlogBlockController::class, 'index'])->name('admin.blog.block.index');
        Route::get('/blog/block/add/{slug}', [BlogBlockController::class, 'add'])->name('admin.blog.block.add');
        Route::post('/blog/block/store/{slug}', [BlogBlockController::class, 'store'])->name('admin.blog.block.store');
        Route::get('/blog/block/edit/{id}', [BlogBlockController::class, 'edit'])->name('admin.blog.block.edit');
        Route::post('/blog/block/update/{id}', [BlogBlockController::class, 'update'])->name('admin.blog.block.update');
        Route::post('/blog/block/delete/{id}', [BlogBlockController::class, 'delete'])->name('admin.blog.block.delete');


        // Blocks  Routes
        Route::get('/blog/section/{slug}', [BlogSectionController::class, 'index'])->name('admin.blog.section.index');
        Route::get('/blog/section/add/{slug}', [BlogSectionController::class, 'add'])->name('admin.blog.section.add');
        Route::post('/blog/section/store/{slug}', [BlogSectionController::class, 'store'])->name('admin.blog.section.store');
        Route::get('/blog/section/edit/{id}', [BlogSectionController::class, 'edit'])->name('admin.blog.section.edit');
        Route::post('/blog/section/update/{id}', [BlogSectionController::class, 'update'])->name('admin.blog.section.update');
        Route::post('/blog/section/delete/{id}', [BlogSectionController::class, 'delete'])->name('admin.blog.section.delete');


        Route::get('/blog/setting/{slug}', [BlogController::class, 'setting'])->name('admin.blog.setting');
        Route::post('/blog/setting/update/{id}', [BlogController::class, 'updateSetting'])->name('admin.blog.setting.update');

        // Blocks  Routes
        Route::get('/blog/cta/{slug}', [BlogCTAController::class, 'index'])->name('admin.blog.cta.index');
        Route::get('/blog/cta/add/{slug}', [BlogCTAController::class, 'add'])->name('admin.blog.cta.add');
        Route::post('/blog/cta/store/{slug}', [BlogCTAController::class, 'store'])->name('admin.blog.cta.store');
        Route::get('/blog/cta/edit/{id}', [BlogCTAController::class, 'edit'])->name('admin.blog.cta.edit');
        Route::post('/blog/cta/update/{id}', [BlogCTAController::class, 'update'])->name('admin.blog.cta.update');
        Route::post('/blog/cta/delete/{id}', [BlogCTAController::class, 'delete'])->name('admin.blog.cta.delete');

        // Blog Category Routes:-
        Route::get('seo/meta', [SeoMetaController::class, 'index'])->name('admin.seo.meta.index');
        Route::get('seo/meta/add', [SeoMetaController::class, 'add'])->name('admin.seo.meta.add');
        Route::post('seo/meta', [SeoMetaController::class, 'store'])->name('admin.seo.meta.store');
        Route::get('seo/meta/{id}/edit', [SeoMetaController::class, 'edit'])->name('admin.seo.meta.edit');
        Route::put('seo/meta/{id}', [SeoMetaController::class, 'update'])->name('admin.seo.meta.update');
        Route::delete('seo/meta/{id}', [SeoMetaController::class, 'delete'])->name('admin.seo.meta.delete');


        // Blog Category Routes:-
        Route::get('/admin/course-categories', [CourseCategoryController::class, 'index'])->name('admin.course.category.index');
        Route::get('/admin/course-category/add', [CourseCategoryController::class, 'add'])->name('admin.course.category.add');
        Route::post('/admin/course-category/store', [CourseCategoryController::class, 'store'])->name('admin.course.category.store');
        Route::get('/admin/course-category/edit/{id}', [CourseCategoryController::class, 'edit'])->name('admin.course.category.edit');
        Route::post('/admin/course-category/update/{id}', [CourseCategoryController::class, 'update'])->name('admin.course.category.update');
        Route::post('/admin/course-category/delete/{id}', action: [CourseCategoryController::class, 'delete'])->name('admin.course.category.delete');


        // Blog Routes:-
        Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin.course.index');
        Route::get('/admin/course/add', [CourseController::class, 'add'])->name('admin.course.add');
        Route::post('/admin/course/store', [CourseController::class, 'store'])->name('admin.course.store');
        Route::get('/admin/course/edit/{slug}', [CourseController::class, 'edit'])->name('admin.course.edit');
        Route::post('/admin/course/update/{slug}', [CourseController::class, 'update'])->name('admin.course.update');
        Route::get('/admin/course/delete/{id}', action: [CourseController::class, 'delete'])->name('admin.course.delete');


        // Blocks  Routes
        Route::get('/course/block/{slug}', [CourseBlockController::class, 'index'])->name('admin.course.block.index');
        Route::get('/course/block/add/{slug}', [CourseBlockController::class, 'add'])->name('admin.course.block.add');
        Route::post('/course/block/store/{slug}', [CourseBlockController::class, 'store'])->name('admin.course.block.store');
        Route::get('/course/block/edit/{id}', [CourseBlockController::class, 'edit'])->name('admin.course.block.edit');
        Route::post('/course/block/update/{id}', [CourseBlockController::class, 'update'])->name('admin.course.block.update');
        Route::post('/course/block/delete/{id}', [CourseBlockController::class, 'delete'])->name('admin.course.block.delete');


        // Outline  Routes
        Route::get('/course/outline/{slug}', [CourseOutlineController::class, 'index'])->name('admin.course.outline.index');
        Route::get('/course/outline/add/{slug}', [CourseOutlineController::class, 'add'])->name('admin.course.outline.add');
        Route::post('/course/outline/store/{slug}', [CourseOutlineController::class, 'store'])->name('admin.course.outline.store');
        Route::get('/course/outline/edit/{id}', [CourseOutlineController::class, 'edit'])->name('admin.course.outline.edit');
        Route::post('/course/outline/update/{id}', [CourseOutlineController::class, 'update'])->name('admin.course.outline.update');
        Route::post('/course/outline/delete/{id}', [CourseOutlineController::class, 'delete'])->name('admin.course.outline.delete');

        // Blocks  Routes
        Route::get('/course/section/{slug}', [CourseSectionController::class, 'index'])->name('admin.course.section.index');
        Route::get('/course/section/add/{slug}', [CourseSectionController::class, 'add'])->name('admin.course.section.add');
        Route::post('/course/section/store/{slug}', [CourseSectionController::class, 'store'])->name('admin.course.section.store');
        Route::get('/course/section/edit/{id}', [CourseSectionController::class, 'edit'])->name('admin.course.section.edit');
        Route::post('/course/section/update/{id}', [CourseSectionController::class, 'update'])->name('admin.course.section.update');
        Route::post('/course/section/delete/{id}', [CourseSectionController::class, 'delete'])->name('admin.course.section.delete');


        Route::get('/course/setting/{slug}', [CourseController::class, 'setting'])->name('admin.course.setting');
        Route::post('/course/setting/update/{id}', [CourseController::class, 'updateSetting'])->name('admin.course.setting.update');

        // Blocks  Routes
        Route::get('/course/cta/{slug}', [CourseCTAController::class, 'index'])->name('admin.course.cta.index');
        Route::get('/course/cta/add/{slug}', [CourseCTAController::class, 'add'])->name('admin.course.cta.add');
        Route::post('/course/cta/store/{slug}', [CourseCTAController::class, 'store'])->name('admin.course.cta.store');
        Route::get('/course/cta/edit/{id}', [CourseCTAController::class, 'edit'])->name('admin.course.cta.edit');
        Route::post('/course/cta/update/{id}', [CourseCTAController::class, 'update'])->name('admin.course.cta.update');
        Route::post('/course/cta/delete/{id}', [CourseCTAController::class, 'delete'])->name('admin.course.cta.delete');

        // Elements Routes
        Route::get('/course/element/{slug}', [CourseElementController::class, 'index'])->name('admin.course.element.index');
        Route::get('/course/element/add/{slug}', [CourseElementController::class, 'add'])->name('admin.course.element.add');
        Route::post('/course/element/store/{slug}', [CourseElementController::class, 'store'])->name('admin.course.element.store');
        Route::get('/course/element/edit/{id}', [CourseElementController::class, 'edit'])->name('admin.course.element.edit');
        Route::post('/course/element/update/{id}', [CourseElementController::class, 'update'])->name('admin.course.element.update');
        Route::post('/course/element/delete/{id}', [CourseElementController::class, 'delete'])->name('admin.course.element.delete');

        // WhyCHooseUs Routes
        Route::get('/course/why-choose-us/{slug}', [CourseWhyChooseUsController::class, 'index'])->name('admin.course.why-choose-us.index');
        Route::get('/course/why-choose-us/add/{slug}', [CourseWhyChooseUsController::class, 'add'])->name('admin.course.why-choose-us.add');
        Route::post('/course/why-choose-us/store/{slug}', [CourseWhyChooseUsController::class, 'store'])->name('admin.course.why-choose-us.store');
        Route::get('/course/why-choose-us/edit/{id}', [CourseWhyChooseUsController::class, 'edit'])->name('admin.course.why-choose-us.edit');
        Route::post('/course/why-choose-us/update/{id}', [CourseWhyChooseUsController::class, 'update'])->name('admin.course.why-choose-us.update');
        Route::post('/course/why-choose-us/delete/{id}', [CourseWhyChooseUsController::class, 'delete'])->name('admin.course.why-choose-us.delete');

        // Feature Routes
        Route::get('/course/feature/{slug}', [CourseFeatureController::class, 'index'])->name('admin.course.feature.index');
        Route::get('/course/feature/add/{slug}', [CourseFeatureController::class, 'add'])->name('admin.course.feature.add');
        Route::post('/course/feature/store/{slug}', [CourseFeatureController::class, 'store'])->name('admin.course.feature.store');
        Route::get('/course/feature/edit/{id}', [CourseFeatureController::class, 'edit'])->name('admin.course.feature.edit');
        Route::post('/course/feature/update/{id}', [CourseFeatureController::class, 'update'])->name('admin.course.feature.update');
        Route::post('/course/feature/delete/{id}', [CourseFeatureController::class, 'delete'])->name('admin.course.feature.delete');

        Route::get('/we-serve', [WeServeController::class, 'index'])->name('admin.we-serve.index');
        Route::get('/we-serve/add', [WeServeController::class, 'add'])->name('admin.we-serve.add');
        Route::post('/we-serve/store', [WeServeController::class, 'store'])->name('admin.we-serve.store');
        Route::get('/we-serve/edit/{id}', [WeServeController::class, 'edit'])->name('admin.we-serve.edit');
        Route::put('/we-serve/update/{id}', [WeServeController::class, 'update'])->name('admin.we-serve.update');
        Route::post('/we-serve/delete/{id}', [WeServeController::class, 'delete'])->name('admin.we-serve.delete');

        Route::get('/testimonial-section', [TestimonialSectionController::class, 'index'])->name('admin.testimonial-section.index');
        Route::get('/testimonial-section/add', [TestimonialSectionController::class, 'add'])->name('admin.testimonial-section.add');
        Route::post('/testimonial-section/store', [TestimonialSectionController::class, 'store'])->name('admin.testimonial-section.store');
        Route::get('/testimonial-section/edit/{id}', [TestimonialSectionController::class, 'edit'])->name('admin.testimonial-section.edit');
        Route::put('/testimonial-section/update/{id}', [TestimonialSectionController::class, 'update'])->name('admin.testimonial-section.update');
        Route::post('/testimonial-section/delete/{id}', [TestimonialSectionController::class, 'delete'])->name('admin.testimonial-section.delete');

        Route::get('/why-choose-us-section', [whyChooseUsSectionController::class, 'index'])->name('admin.why.choose.us.section.index');
        Route::get('/why-choose-us-section/add', [whyChooseUsSectionController::class, 'add'])->name('admin.why.choose.us.section.add');
        Route::post('/why-choose-us-section/store', [whyChooseUsSectionController::class, 'store'])->name('admin.why.choose.us.section.store');
        Route::get('/why-choose-us-section/edit/{id}', [whyChooseUsSectionController::class, 'edit'])->name('admin.why.choose.us.section.edit');
        Route::post('/why-choose-us-section/update/{id}', [whyChooseUsSectionController::class, 'update'])->name('admin.why.choose.us.section.update');
        Route::post('/why-choose-us-section/delete/{id}', [whyChooseUsSectionController::class, 'delete'])->name('admin.why.choose.us.section.delete');

        Route::get('/feature-section', [FeatureSectionController::class, 'index'])->name('admin.feature.section.index');
        Route::get('/feature-section/add', [FeatureSectionController::class, 'add'])->name('admin.feature.section.add');
        Route::post('/feature-section/store', [FeatureSectionController::class, 'store'])->name('admin.feature.section.store');
        Route::get('/feature-section/edit/{id}', [FeatureSectionController::class, 'edit'])->name('admin.feature.section.edit');
        Route::post('/feature-section/update/{id}', [FeatureSectionController::class, 'update'])->name('admin.feature.section.update');
        Route::post('/feature-section/delete/{id}', [FeatureSectionController::class, 'delete'])->name('admin.feature.section.delete');



        Route::get('/faq-section', [FaqSectionController::class, 'index'])->name('admin.faq-section.index');
        Route::get('/faq-section/add', [FaqSectionController::class, 'add'])->name('admin.faq-section.add');
        Route::post('/faq-section/store', [FaqSectionController::class, 'store'])->name('admin.faq-section.store');
        Route::get('/faq-section/edit/{id}', [FaqSectionController::class, 'edit'])->name('admin.faq-section.edit');
        Route::put('/faq-section/update/{id}', [FaqSectionController::class, 'update'])->name('admin.faq-section.update');
        Route::post('/faq-section/delete/{id}', [FaqSectionController::class, 'delete'])->name('admin.faq-section.delete');



        // Job Routes:-
        Route::get('admin/jobs', [JobController::class, 'jobs'])->name('admin.job.index');
        Route::get('admin/job/add', [JobController::class, 'add'])->name('admin.job.add');
        Route::post('adminjob/store', [JobController::class, 'store'])->name('admin.job.store');
        Route::get('admin/job/edit/{id}', [JobController::class, 'edit'])->name('admin.job.edit');
        Route::post('admin/job/update/{id}', [JobController::class, 'update'])->name('admin.job.update');
        Route::get('admin/job/delete/{id}', [JobController::class, 'delete'])->name('admin.job.delete');

        // Job Category Routes:-
        Route::get('/job-categories', [JcategoryController::class, 'jcategory'])->name('admin.jcategory.index');
        Route::get('/job-category/add', [JcategoryController::class, 'add'])->name('admin.jcategory.add');
        Route::post('/job-category/store', [JcategoryController::class, 'store'])->name('admin.jcategory.store');
        Route::get('/job-category/edit/{id}', [JcategoryController::class, 'edit'])->name('admin.jcategory.edit');
        Route::post('/job-category/update/{id}', [JcategoryController::class, 'update'])->name('admin.jcategory.update');
        Route::get('/job-category/delete/{id}', [JcategoryController::class, 'delete'])->name('admin.jcategory.delete');

        // Job Candidate Routes:
        Route::get('job-candidates', [JobCandidateController::class, 'index'])->name('admin.job-candidate.index');
        Route::get('job-candidates/create', [JobCandidateController::class, 'create'])->name('admin.job-candidate.create');
        Route::post('job-candidates/store', [JobCandidateController::class, 'store'])->name('admin.job-candidate.store');
        Route::get('job-candidates/edit/{id}', [JobCandidateController::class, 'edit'])->name('admin.job-candidate.edit');
        Route::post('job-candidates/update/{id}', [JobCandidateController::class, 'update'])->name('admin.job-candidate.update');     
        Route::delete('job-candidates/{id}', [JobCandidateController::class, 'delete'])->name('admin.job-candidate.delete');

        Route::get('job-candidates/trashed', [JobCandidateController::class, 'trashed'])->name('admin.job-candidate.trashed');
        Route::post('job-candidates/restore/{id}', [JobCandidateController::class, 'restore'])->name('admin.job-candidate.restore');
        Route::delete('job-candidates/force-delete/{id}', [JobCandidateController::class, 'forceDelete'])->name('admin.job-candidate.force-delete');

        // Feature Routes:-
        // Route::get('/features', [FeatureController::class, 'index'])->name('admin.feature.index');
        Route::get('/feature/{pageId}', [FeatureController::class, 'getByPageId'])->name('admin.feature');
        Route::get('/features/{id}/list', [FeatureController::class, 'list'])->name('admin.feature.list');
        Route::get('/feature/{id}/add', [FeatureController::class, 'add'])->name('admin.feature.add');
        Route::post('/feature/store', [FeatureController::class, 'store'])->name('admin.feature.store');
        Route::get('/feature/edit/{id}', [FeatureController::class, 'edit'])->name('admin.feature.edit');
        Route::put('/feature/update/{id}', [FeatureController::class, 'update'])->name('admin.feature.update');
        Route::delete('/feature/delete/{id}', [FeatureController::class, 'delete'])->name('admin.feature.delete');

        // Feature images Routes
        Route::get('/feature-images/{slug}', [FeatureImageController::class, 'index'])->name('admin.feature_image.index');
        Route::get('/feature-image/{slug}/add', [FeatureImageController::class, 'add'])->name('admin.feature_image.add');
        Route::post('/feature-image/store/{slug}', [FeatureImageController::class, 'store'])->name('admin.feature_image.store');
        Route::get('/feature-image/edit/{id}', [FeatureImageController::class, 'edit'])->name('admin.feature_image.edit');
        Route::put('/feature-image/update/{id}', [FeatureImageController::class, 'update'])->name('admin.feature_image.update');
        Route::post('/feature-image/delete/{id}', [FeatureImageController::class, 'delete'])->name('admin.feature_image.delete');

        // Why Choose Us Routes
        Route::get('/why-choose-us/{slug}', [WhyChooseUsController::class, 'index'])->name('admin.why-choose-us.index');
        Route::get('/why-choose-us/{slug}/add', [WhyChooseUsController::class, 'add'])->name('admin.why-choose-us.add');
        Route::post('/why-choose-us/store/{slug}', [WhyChooseUsController::class, 'store'])->name('admin.why-choose-us.store');
        Route::get('/why-choose-us/edit/{id}', [WhyChooseUsController::class, 'edit'])->name('admin.why-choose-us.edit');
        Route::post('/why-choose-us/update/{id}', [WhyChooseUsController::class, 'update'])->name('admin.why-choose-us.update');
        Route::post('/why-choose-us/delete/{id}', [WhyChooseUsController::class, 'delete'])->name('admin.why-choose-us.delete');

        // Documents Required Routes:-
        // Route::get('/document-required', [DocumentRequiredController::class, 'index'])->name('admin.document-required.index');
        Route::get('/document-required/{slug}', [DocumentRequiredController::class, 'index'])->name('admin.document-required.index');
        Route::get('/document-required/{slug}/add', [DocumentRequiredController::class, 'add'])->name('admin.document-required.add');
        Route::post('/document-required/store/{slug}', [DocumentRequiredController::class, 'store'])->name('admin.document-required.store');
        Route::get('/document-required/edit/{id}', [DocumentRequiredController::class, 'edit'])->name('admin.document-required.edit');
        Route::post('/document-required/update/{id}', [DocumentRequiredController::class, 'update'])->name('admin.document-required.update');
        Route::post('/document-required/delete/{id}', [DocumentRequiredController::class, 'delete'])->name('admin.document-required.delete');

        // Documents Required Routes:-
        Route::get('/call-to-action/{slug}', [CallToActionController::class, 'index'])->name('admin.call-to-action.index');
        Route::get('/call-to-action/{slug}/add', [CallToActionController::class, 'add'])->name('admin.call-to-action.add');
        Route::post('/call-to-action/store/{slug}', [CallToActionController::class, 'store'])->name('admin.call-to-action.store');
        Route::get('/call-to-action/edit/{id}', [CallToActionController::class, 'edit'])->name('admin.call-to-action.edit');
        Route::post('/call-to-action/update/{id}', [CallToActionController::class, 'update'])->name('admin.call-to-action.update');
        Route::post('/call-to-action/delete/{id}', [CallToActionController::class, 'delete'])->name('admin.call-to-action.delete');

        // SectionTitle Routes
        Route::get('/section-titles/{slug}', [SectionTitleController::class, 'index'])->name('admin.section_title.index');
        Route::get('/section-titles/{slug}/list', [SectionTitleController::class, 'list'])->name('admin.section_title.list');
        Route::get('/section-title/{slug}/add', [SectionTitleController::class, 'add'])->name('admin.section_title.add');
        Route::post('/section-title/store/{slug}', [SectionTitleController::class, 'store'])->name('admin.section_title.store');
        Route::get('/section-title/edit/{id}', [SectionTitleController::class, 'edit'])->name('admin.section_title.edit');
        Route::post('/section-title/update/{id}', [SectionTitleController::class, 'update'])->name('admin.section_title.update');
        Route::post('/section-title/delete/{id}', [SectionTitleController::class, 'delete'])->name('admin.section_title.delete');


        Route::get('/page-section/{slug}', [PageSectionController::class, 'index'])->name('admin.page.section.index');
        Route::get('/page-section/add/{slug}', [PageSectionController::class, 'add'])->name('admin.page.section.add');
        Route::post('/page-section/store/{slug}', [PageSectionController::class, 'store'])->name('admin.page.section.store');
        Route::get('/page-section/edit/{id}', [PageSectionController::class, 'edit'])->name('admin.page.section.edit');
        Route::post('/page-section/update/{id}', [PageSectionController::class, 'update'])->name('admin.page.section.update');
        Route::post('/page-section/delete/{id}', [PageSectionController::class, 'delete'])->name('admin.page.section.delete');

        // Elements Routes
        Route::get('/element/{slug}', [ElementController::class, 'index'])->name('admin.element.index');
        Route::get('/element/add/{slug}', [ElementController::class, 'add'])->name('admin.element.add');
        Route::post('/element/store/{slug}', [ElementController::class, 'store'])->name('admin.element.store');
        Route::get('/element/edit/{id}', [ElementController::class, 'edit'])->name('admin.element.edit');
        Route::post('/element/update/{id}', [ElementController::class, 'update'])->name('admin.element.update');
        Route::post('/element/delete/{id}', [ElementController::class, 'delete'])->name('admin.element.delete');
        // End of Elements Routes

        // Info Section Routes
        Route::get('/info-section/{slug}', [InfoSectionController::class, 'index'])->name('admin.info-section.index');
        Route::get('/info-section/add/{slug}', [InfoSectionController::class, 'add'])->name('admin.info-section.add');
        Route::post('/info-section/store/{slug}', [InfoSectionController::class, 'store'])->name('admin.info-section.store');
        Route::get('/info-section/edit/{id}', [InfoSectionController::class, 'edit'])->name('admin.info-section.edit');
        Route::post('/info-section/update/{id}', [InfoSectionController::class, 'update'])->name('admin.info-section.update');
        Route::post('/info-section/delete/{id}', [InfoSectionController::class, 'delete'])->name('admin.info-section.delete');
        // End of Info Section Routes

        // Blocks  Routes
        Route::get('/block/{slug}', [BlockController::class, 'index'])->name('admin.block.index');
        Route::get('/block/add/{slug}', [BlockController::class, 'add'])->name('admin.block.add');
        Route::post('/block/store/{slug}', [BlockController::class, 'store'])->name('admin.block.store');
        Route::get('/block/edit/{id}', [BlockController::class, 'edit'])->name('admin.block.edit');
        Route::post('/block/update/{id}', [BlockController::class, 'update'])->name('admin.block.update');
        Route::post('/block/delete/{id}', [BlockController::class, 'delete'])->name('admin.block.delete');
        // End of Blocks Routes

        Route::get('/admin/testimonials/{slug}', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
        Route::get('admin/testimonials/add/{slug}', [TestimonialController::class, 'add'])->name('admin.testimonial.add');
        Route::post('/testimonials/store/{slug}', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
        Route::get('admin/testimonials/edit/{id}', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
        Route::post('/admin/testimonials/update/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
        Route::post('/admin/testimonials/delete/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonial.destroy');

        // Hero Sections Routes
        // Route::get('/hero-sections/{pageId}', [HeroSectionController::class, 'getByPageId'])->name('admin.hero_section.index');
        Route::get('/hero-sections/{slug}', [HeroSectionController::class, 'index'])->name('admin.hero_section.index');
        Route::get('/hero-section/{slug}/add', [HeroSectionController::class, 'add'])->name('admin.hero_section.add');
        Route::post('/hero-section/store/{slug}', [HeroSectionController::class, 'store'])->name('admin.hero_section.store');
        Route::get('/hero-section/edit/{id}', [HeroSectionController::class, 'edit'])->name('admin.hero_section.edit');
        Route::post('/hero-section/update/{id}', [HeroSectionController::class, 'update'])->name('admin.hero_section.update');
        Route::post('/hero-section/delete/{id}', [HeroSectionController::class, 'delete'])->name('admin.hero_section.delete');
        // Route::get('/hero-sections', [HeroSectionController::class, 'index'])->name('admin.hero_section.index');

        // Why Us Images Routes
        Route::get('/why-us-image/{slug}', [WhyUsImageController::class, 'index'])->name('admin.why-us-image.index');
        Route::get('/why-us-image/{slug}/add', [WhyUsImageController::class, 'add'])->name('admin.why-us-image.add');
        Route::post('/why-us-image/store/{slug}', [WhyUsImageController::class, 'store'])->name('admin.why-us-image.store');
        Route::get('/why-us-image/edit/{id}', [WhyUsImageController::class, 'edit'])->name('admin.why-us-image.edit');
        Route::post('/why-us-image/update/{id}', [WhyUsImageController::class, 'update'])->name('admin.why-us-image.update');
        Route::post('/why-us-image/delete/{id}', [WhyUsImageController::class, 'delete'])->name('admin.why-us-image.delete');
        // faqs Routes
        Route::get('/faqs/{slug}', [FaqController::class, 'index'])->name('admin.faq.index');
        Route::get('/faqs/{slug}/add', [FaqController::class, 'add'])->name('admin.faq.add');
        Route::post('/faqs/store/{slug}', [FaqController::class, 'store'])->name('admin.faq.store');
        Route::get('/faqs/edit/{id}', [FaqController::class, 'edit'])->name('admin.faq.edit');
        Route::put('/faqs/update/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
        Route::delete('/faqs/delete/{id}', [FaqController::class, 'delete'])->name('admin.faq.delete');


        // Route::get('/admin/procedures/{pageId}', [ProcedureController::class, 'getByPageId'])->name('admin.procedures');
        Route::get('/admin/procedures/{slug}', [ProcedureController::class, 'index'])->name('admin.procedures.index');
        Route::get('/admin/procedures/add/{slug}', [ProcedureController::class, 'add'])->name('admin.procedures.add');
        Route::post('/procedures/store/{slug}', [ProcedureController::class, 'store'])->name('admin.procedures.store');
        Route::get('/admin/procedures/{id}/edit', [ProcedureController::class, 'edit'])->name('admin.procedures.edit');
        Route::post('/admin/procedures/update/{id}', [ProcedureController::class, 'update'])->name('admin.procedures.update');
        Route::post('/admin/procedures/{id}', [ProcedureController::class, 'delete'])->name('admin.procedures.delete');


        // Feature Routes:-
        // Route::get('/features', [FeatureController::class, 'index'])->name('admin.feature.index');
        Route::get('/features/{slug}', [FeatureController::class, 'index'])->name('admin.feature.index');
        Route::get('/feature/{slug}/add', [FeatureController::class, 'add'])->name('admin.feature.add');
        Route::post('/feature/store/{slug}', [FeatureController::class, 'store'])->name('admin.feature.store');
        Route::get('/feature/edit/{id}', [FeatureController::class, 'edit'])->name('admin.feature.edit');
        Route::post('/feature/update/{id}', [FeatureController::class, 'update'])->name('admin.feature.update');
        Route::post('/feature/delete/{id}', [FeatureController::class, 'delete'])->name('admin.feature.delete');



        // introduction Routes
        Route::get('/introduction-sections/{slug}', [IntroSectionController::class, 'index'])->name('admin.introduction_section.index');
        // Route::get('/introduction-sections/{id}/list', [IntroSectionController::class, 'list'])->name('admin.introduction_section.list');
        Route::get('/introduction-section/{slug}/add', [IntroSectionController::class, 'add'])->name('admin.introduction_section.add');
        Route::post('/introduction-section/store/{slug}', [IntroSectionController::class, 'store'])->name('admin.introduction_section.store');
        Route::get('/introduction-section/edit/{id}', [IntroSectionController::class, 'edit'])->name('admin.introduction_section.edit');
        Route::post('/introduction-section/update/{id}', [IntroSectionController::class, 'update'])->name('admin.introduction_section.update');
        Route::post('/introduction-section/delete/{id}', [IntroSectionController::class, 'delete'])->name('admin.introduction_section.delete');


        // Service Category Routes
        Route::get('/service-category', [ServiceCategoryController::class, 'index'])->name('admin.service.category.index');
        Route::get('/service-category/add', [ServiceCategoryController::class, 'add'])->name('admin.service.category.add');
        Route::post('/service-category/store', [ServiceCategoryController::class, 'store'])->name('admin.service.category.store');
        Route::get('/service-category/edit/{id}', [ServiceCategoryController::class, 'edit'])->name('admin.service.category.edit');
        Route::put('/service-category/update/{id}', [ServiceCategoryController::class, 'update'])->name('admin.service.category.update');
        Route::post('/service-category/delete/{id}', [ServiceCategoryController::class, 'delete'])->name('admin.service.category.delete');
        // End of Service Category Routes

        // Service Routes
        Route::get('/service', [ServiceController::class, 'index'])->name('admin.service.index');
        Route::get('/service/add', [ServiceController::class, 'add'])->name('admin.service.add');
        Route::post('/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
        Route::get('/service/edit/{slug}', [ServiceController::class, 'edit'])->name('admin.service.edit');
        Route::post('/service/update/{slug}', [ServiceController::class, 'update'])->name('admin.service.update');
        Route::post('/service/delete/{id}', [ServiceController::class, 'delete'])->name('admin.service.delete');

        // Blocks  Routes
        Route::get('/service/block/{slug}', [ServiceBlockController::class, 'index'])->name('admin.service.block.index');
        Route::get('/service/block/add/{slug}', [ServiceBlockController::class, 'add'])->name('admin.service.block.add');
        Route::post('/service/block/store/{slug}', [ServiceBlockController::class, 'store'])->name('admin.service.block.store');
        Route::get('/service/block/edit/{id}', [ServiceBlockController::class, 'edit'])->name('admin.service.block.edit');
        Route::post('/service/block/update/{id}', [ServiceBlockController::class, 'update'])->name('admin.service.block.update');
        Route::post('/service/block/delete/{id}', [ServiceBlockController::class, 'delete'])->name('admin.service.block.delete');


        // Blocks  Routes
        Route::get('/admin/service/section/{slug}', [ServiceSectionController::class, 'index'])->name('admin.service.section.index');
        Route::get('/admin/service/section/add/{slug}', [ServiceSectionController::class, 'add'])->name('admin.service.section.add');
        Route::post('/admin/service/section/store/{slug}', [ServiceSectionController::class, 'store'])->name('admin.service.section.store');
        Route::get('/admin/service/section/edit/{id}', [ServiceSectionController::class, 'edit'])->name('admin.service.section.edit');
        Route::post('/admin/service/section/update/{id}', [ServiceSectionController::class, 'update'])->name('admin.service.section.update');
        Route::post('/admin/service/section/delete/{id}', [ServiceSectionController::class, 'delete'])->name('admin.service.section.delete');


        Route::get('/service/setting/{slug}', [ServiceController::class, 'setting'])->name('admin.service.setting');
        Route::post('/service/setting/update/{id}', [ServiceController::class, 'updateSetting'])->name('admin.service.setting.update');

        // Elements Routes
        Route::get('/service/element/{slug}', [ServiceElementController::class, 'index'])->name('admin.service.element.index');
        Route::get('/service/element/add/{slug}', [ServiceElementController::class, 'add'])->name('admin.service.element.add');
        Route::post('/service/element/store/{slug}', [ServiceElementController::class, 'store'])->name('admin.service.element.store');
        Route::get('/service/element/edit/{id}', [ServiceElementController::class, 'edit'])->name('admin.service.element.edit');
        Route::post('/service/element/update/{id}', [ServiceElementController::class, 'update'])->name('admin.service.element.update');
        Route::post('/service/element/delete/{id}', [ServiceElementController::class, 'delete'])->name('admin.service.element.delete');

        // Feature Routes
        Route::get('/service/feature/{slug}', [ServiceFeatureController::class, 'index'])->name('admin.service.feature.index');
        Route::get('/service/feature/add/{slug}', [ServiceFeatureController::class, 'add'])->name('admin.service.feature.add');
        Route::post('/service/feature/store/{slug}', [ServiceFeatureController::class, 'store'])->name('admin.service.feature.store');
        Route::get('/service/feature/edit/{id}', [ServiceFeatureController::class, 'edit'])->name('admin.service.feature.edit');
        Route::post('/service/feature/update/{id}', [ServiceFeatureController::class, 'update'])->name('admin.service.feature.update');
        Route::post('/service/feature/delete/{id}', [ServiceFeatureController::class, 'delete'])->name('admin.service.feature.delete');

        // End of Service Routes
        Route::get("/service-project/add/{id}", [ServiceProjectController::class, "add"])->name("admin.service.project.add");
        Route::post("/service-project/store", [ServiceProjectController::class, "store"])->name("admin.service.project.store");
        Route::get("/service-project/edit/{id}/", [ServiceProjectController::class, "edit"])->name("admin.service.project.edit");
        Route::put("/service-project/update/{id}/", [ServiceProjectController::class, "update"])->name("admin.service.project.update");
        Route::post("/service-project/delete/{id}/", [ServiceProjectController::class, "delete"])->name("admin.service.project.delete");


        //start package route
        Route::get('/package', [PackageController::class, 'index'])->name('admin.package.index');
        Route::get('/package/add', [PackageController::class, 'add'])->name('admin.package.add');
        Route::post('/package/store', [PackageController::class, 'store'])->name('admin.package.store');
        Route::get('/package/edit/{id}', [PackageController::class, 'edit'])->name('admin.package.edit');
        Route::put('/package/update/{id}', [PackageController::class, 'update'])->name('admin.package.update');
        Route::delete('/package/delete/{id}', [PackageController::class, 'delete'])->name('admin.package.delete');
        // End of package Routes
        //start package categories route
        Route::get('/package-category', [PackageCategoryController::class, 'index'])->name('admin.package-category.index');
        Route::get('/package-category/add', [PackageCategoryController::class, 'add'])->name('admin.package-category.add');
        Route::post('/package-category/store', [PackageCategoryController::class, 'store'])->name('admin.package-category.store');
        Route::get('/package-category/edit/{id}', [PackageCategoryController::class, 'edit'])->name('admin.package-category.edit');
        Route::put('/package-category/update/{id}', [PackageCategoryController::class, 'update'])->name('admin.package-category.update');
        Route::delete('/package-category/delete/{id}', [PackageCategoryController::class, 'delete'])->name('admin.package-category.delete');
        // End of package categories Routes


        //start tempelate-file route
        Route::get('/tempelate-file', [TempelateFileController::class, 'index'])->name('admin.tempelate-file.index');
        Route::get('/tempelate-file/add', [TempelateFileController::class, 'add'])->name('admin.tempelate-file.add');
        Route::post('/tempelate-file/store', [TempelateFileController::class, 'store'])->name('admin.tempelate-file.store');
        Route::get('/tempelate-file/edit/{id}', [TempelateFileController::class, 'edit'])->name('admin.tempelate-file.edit');
        Route::put('/tempelate-file/update/{id}', [TempelateFileController::class, 'update'])->name('admin.tempelate-file.update');
        Route::post('/tempelate-file/delete/{id}', [TempelateFileController::class, 'delete'])->name('admin.tempelate-file.delete');
        // End of tempelate-file Routes

        // Info block Routes
        Route::get('/info-block', action: [InfoBlockController::class, 'index'])->name('admin.info-block.index');
        Route::get('/info-block/add', [InfoBlockController::class, 'add'])->name('admin.info-block.add');
        Route::post('/info-block/store', [InfoBlockController::class, 'store'])->name('admin.info-block.store');
        Route::get('/info-block/edit/{id}', [InfoBlockController::class, 'edit'])->name('admin.info-block.edit');
        Route::post('/info-block/update/{id}', [InfoBlockController::class, 'update'])->name('admin.info-block.update');
        Route::post('/info-block/delete/{id}', [InfoBlockController::class, 'delete'])->name('admin.info-block.delete');
        // End of Info block Routes


        // start of section header Routes

        Route::get('/section-header', action: [SectionHeaderController::class, 'index'])->name('admin.section-header.index');
        Route::get('/section-header/add', [SectionHeaderController::class, 'add'])->name('admin.section-header.add');
        Route::post('/section-header/store', [SectionHeaderController::class, 'store'])->name('admin.section-header.store');
        Route::get('/section-header/edit/{id}', [SectionHeaderController::class, 'edit'])->name('admin.section-header.edit');
        Route::put('/section-header/update/{id}', [SectionHeaderController::class, 'update'])->name('admin.section-header.update');
        Route::delete('/section-header/delete/{id}', [SectionHeaderController::class, 'delete'])->name('admin.section-header.delete');
        // End of section header Routes


        // Enquiry Routes
        Route::get('/enquiry', [EnquiryController::class, 'index'])->name('admin.enquiry.index');
        Route::get('/enquiry/add', [EnquiryController::class, 'add'])->name('admin.enquiry.add');
        Route::post('/enquiry/store', [EnquiryController::class, 'store'])->name('admin.enquiry.store');
        Route::get('enquiry/restore', [EnquiryController::class, 'restorePage'])->name('admin.enquiry.restore.page');
        Route::get('/enquiry/edit/{id}', [EnquiryController::class, 'edit'])->name('admin.enquiry.edit');
        Route::post('/enquiry/update/{id}', [EnquiryController::class, 'update'])->name('admin.enquiry.update');
        Route::post('/enquiry/delete/{id}', [EnquiryController::class, 'delete'])->name('admin.enquiry.delete');
        Route::get('/enquiry/detail/{id}', [EnquiryController::class, 'detail'])->name('admin.enquiry.detail');
        Route::post('/enquiry/comment/{id}', [EnquiryController::class, 'comment'])->name('admin.enquiry.comment.store');
        Route::get('/enquiry/comment/delete/{id}', [EnquiryController::class, 'deleteComment'])->name('admin.enquiry.comment.delete');
        Route::get('enquiry/restore/{id}', [EnquiryController::class, 'restore'])->name('admin.enquiry.restore');
        Route::post('enquiry/force_delete/{id}', [EnquiryController::class, 'forceDelete'])->name('admin.enquiry.force.delete');
        // End of Enquiry

        // Setting Routes
        Route::get('/setting', [SettingController::class, 'edit'])->name('admin.setting.edit');
        Route::post('/setting/update', [SettingController::class, 'update'])->name('admin.setting.update');
        // End of Setting Routes

        // SeoGlobal Routes
        Route::get('/seoglobal/edit', [SeoGlobalController::class, 'edit'])->name('admin.seoglobal.edit');
        Route::post('/seoglobal/update', [SeoGlobalController::class, 'update'])->name('admin.seoglobal.update');
        //End of SeoGlobal Routes
    });


    Route::get('admin-notification', [NotificationController::class, 'adminNotification'])->name('admin.notifications');
    Route::get('admin-notify/{id}', [NotificationController::class, 'adminNotifyDetail'])->name('admin.notify.detail');
    Route::post('admin-mark-as-read', [NotificationController::class, 'admin_Notify_MarkRead'])->name('admin.mark.read');
    Route::get('admin-all-read', [NotificationController::class, 'adminNotify_Mark_all_Read'])->name('admin.all.read');

    // Testimonial routes start

    Route::get('/admin/testimonials/{pageId}', [TestimonialController::class, 'getByPageId'])->name('admin.testimonials');
    Route::get('/admin/testimonials', [TestimonialController::class, 'list'])->name('admin.testimonials');
    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials/store', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('admin/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
    Route::get('admin/testimonials/{id}/list', [TestimonialController::class, 'list'])->name('admin.testimonial.list');

    Route::get('admin/privary-policy', [PrivacyPolicyController::class, 'edit'])->name('admin.privacy.policy');
    Route::post('admin/privary-policy/update', [PrivacyPolicyController::class, 'update'])->name('admin.privacy.policy.update');

    Route::get('admin/terms-and-conditions', [TermsAndConditionController::class, 'edit'])->name('admin.terms_and_condition.edit');
    Route::post('admin/terms-and-conditions/update', [TermsAndConditionController::class, 'update'])->name('admin.terms_and_condition.update');

    Route::get('admin/cookies', [CookiesController::class, 'edit'])->name('admin.cookies.edit');
    Route::post('admin/cookies/update', [CookiesController::class, 'update'])->name('admin.cookies.update');

    Route::get('/admin/call-to-actions/page/{pageId}', [CallToActionController::class, 'getByPageId'])->name('call-to-actions.byPage');
    Route::resource('admin/call-to-actions', CallToActionController::class);

    Route::get('/test', [FrontController::class, 'test'])->name('front.test')->middleware(Localization::class);;
});
