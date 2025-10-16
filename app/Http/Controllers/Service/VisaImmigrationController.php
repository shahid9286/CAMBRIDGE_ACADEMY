<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Procedure;
use Illuminate\Http\Request;

class VisaImmigrationController extends Controller
{
    public function employmentVisa()
    {
        $page = Page::findBySlugWithRelations('employment-visa');
        return view('front.visa-immigration.employment-visa', compact('page'));
    }

    public function familyVisa()
    {
        $page = Page::findBySlugWithRelations('family-dependent-visa');
        return view('front.visa-immigration.family-dependent-visa', compact('page'));
    }

    public function studentVisa()
    {
        $page = Page::findBySlugWithRelations('student-visa');
        return view('front.visa-immigration.student-visa', compact('page'));
    }

    public function touristVisa()
    {
        $page = Page::findBySlugWithRelations('tourist-visa');
        return view('front.visa-immigration.tourist-visa', compact('page'));
    }

    public function emiratesId()
    {
        $page = Page::findBySlugWithRelations('emirates-id');
        return view('front.visa-immigration.emirates-id', compact('page'));
    }

    public function medicalInsurance()
    {
        $page = Page::findBySlugWithRelations('medical-insurance');
        return view('front.visa-immigration.medical-insurance', compact('page'));
    }
}
