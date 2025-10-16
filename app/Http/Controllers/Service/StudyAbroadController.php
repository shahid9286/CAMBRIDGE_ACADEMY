<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class StudyAbroadController extends Controller
{
    public function admissions()
    {
        $page = Page::findBySlugWithRelations('global-admissions');
        return view('front.study-abroad.global-admissions', compact('page'));
    }

    public function sopLor()
    {
        $page = Page::findBySlugWithRelations('sop-lor-assistance');
        return view('front.study-abroad.sop-lor-assistance', compact('page'));
    }

    public function visaFiling()
    {
        $page = Page::findBySlugWithRelations('visa-filing');
        return view('front.study-abroad.visa-filing', compact('page'));
    }

    public function preDeparture()
    {
        $page = Page::findBySlugWithRelations('pre-departure-support');
        return view('front.study-abroad.pre-departure-support', compact('page'));
    }
}
