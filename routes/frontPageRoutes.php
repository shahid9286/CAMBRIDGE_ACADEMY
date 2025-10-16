<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Service\VisaImmigrationController;
use App\Http\Controllers\Service\BusinessSetupController;
use App\Http\Controllers\Service\ManpowerSupplyController;
use App\Http\Controllers\Service\StudyAbroadController;
use App\Http\Controllers\Service\RealEstateController;
use App\Http\Controllers\Service\InvestmentAdvisoryController;

// Frontend routes
Route::get('/sfdsdf', [FrontController::class, 'index'])->name('front.index');
Route::get('/about-us', [FrontController::class, 'aboutUs'])->name('front.about');
Route::get('/contact-us', [FrontController::class, 'contactUs'])->name('front.contactus');
Route::post('/contact-us-store', [FrontController::class, 'contactUsStore'])->name('front.contactus.store');
Route::get('/gallery', [FrontController::class, 'gallery'])->name('front.gallery');

Route::get('/our-companies', [FrontController::class, 'ourCompanies'])->name('front.companies');

Route::get('/blogs', [FrontController::class, 'blogs'])->name('front.blogs');
Route::get('/blog/{slug}', [FrontController::class, 'blogDetail'])->name('front.blog.detail');

Route::get('/jobs', [FrontController::class, 'joblist'])->name('front.joblist');
Route::get('/job/{slug}', [FrontController::class, 'jobDetail'])->name('front.job.detail2');

Route::get('/cravix-sections', [FrontController::class, 'sections'])->name('front.sections');
// Route::get('/{slug}', [FrontController::class, 'pageDetail'])->name('front.page-detail');

// Category Wise Pages
Route::get('/{slug}/services', [FrontController::class, 'categoryWisePages'])->name('front.category-wise-pages');

// VISA & IMMIGRATION
Route::get('/visa-immigration/employment-visa', [VisaImmigrationController::class, 'employmentVisa'])->name('front.visa.employment');
Route::get('/visa-immigration/family-dependent-visa', [VisaImmigrationController::class, 'familyVisa'])->name('front.visa.family');
Route::get('/visa-immigration/student-visa', [VisaImmigrationController::class, 'studentVisa'])->name('front.visa.student');
Route::get('/visa-immigration/tourist-visa', [VisaImmigrationController::class, 'touristVisa'])->name('front.visa.tourist');
Route::get('/visa-immigration/emirates-id', [VisaImmigrationController::class, 'emiratesId'])->name('front.visa.emirates-id');
Route::get('/visa-immigration/medical-insurance', [VisaImmigrationController::class, 'medicalInsurance'])->name('front.visa.medical-insurance');

// BUSINESS SETUP
Route::get('/business-setup/mainland-freezone', [BusinessSetupController::class, 'mainlandFreezone'])->name('front.business.mainland');
Route::get('/business-setup/moa-drafting', [BusinessSetupController::class, 'moaDrafting'])->name('front.business.moa');
Route::get('/business-setup/pro-services', [BusinessSetupController::class, 'proServices'])->name('front.business.pro');
Route::get('/business-setup/bank-account-assistance', [BusinessSetupController::class, 'bankAssistance'])->name('front.business.bank');
Route::get('/business-setup/compliance-advisory', [BusinessSetupController::class, 'compliance'])->name('front.business.compliance');

// MANPOWER SUPPLY
Route::get('/manpower-supply/bike-riders', [ManpowerSupplyController::class, 'bikeRiders'])->name('front.manpower.bike-riders');
Route::get('/manpower-supply/hospitality-staff', [ManpowerSupplyController::class, 'hospitality'])->name('front.manpower.hospitality');
Route::get('/manpower-supply/security-staff', [ManpowerSupplyController::class, 'security'])->name('front.manpower.security');
Route::get('/manpower-supply/logistics-staff', [ManpowerSupplyController::class, 'logistics'])->name('front.manpower.logistics');
Route::get('/manpower-supply/construction-staff', [ManpowerSupplyController::class, 'construction'])->name('front.manpower.construction');

// STUDY ABROAD
Route::get('/study-abroad/global-admissions', [StudyAbroadController::class, 'admissions'])->name('front.study.admissions');
Route::get('/study-abroad/sop-lor-assistance', [StudyAbroadController::class, 'sopLor'])->name('front.study.sop-lor');
Route::get('/study-abroad/visa-filing', [StudyAbroadController::class, 'visaFiling'])->name('front.study.visa-filing');
Route::get('/study-abroad/pre-departure-support', [StudyAbroadController::class, 'preDeparture'])->name('front.study.pre-departure');

// REAL ESTATE
Route::get('/real-estate/buy', [RealEstateController::class, 'buy'])->name('front.real-estate.buy');
Route::get('/real-estate/sell', [RealEstateController::class, 'sell'])->name('front.real-estate.sell');
Route::get('/real-estate/rent', [RealEstateController::class, 'rent'])->name('front.real-estate.rent');
Route::get('/real-estate/off-plan-investments', [RealEstateController::class, 'offPlan'])->name('front.real-estate.off-plan');
Route::get('/real-estate/roi-advisory', [RealEstateController::class, 'roiAdvisory'])->name('front.real-estate.roi');

// INVESTMENT ADVISORY
Route::get('/investment-advisory/plans', [InvestmentAdvisoryController::class, 'plans'])->name('front.investment.plans');
// Route::get('/{slug}', [FrontController::class, 'pageDetail'])->name('front.page-detail');
