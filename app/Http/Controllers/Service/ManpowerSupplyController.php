<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class ManpowerSupplyController extends Controller
{
    public function bikeRiders()
    {
        $page = Page::findBySlugWithRelations('bike-riders');
        return view('front.manpower-supply.bike-riders', compact('page'));
    }

    public function hospitality()
    {
        $page = Page::findBySlugWithRelations('hospitality-staff');
        return view('front.manpower-supply.hospitality-staff', compact('page'));
    }

    public function security()
    {
        $page = Page::findBySlugWithRelations('security-staff');
        return view('front.manpower-supply.security-staff', compact('page'));
    }

    public function logistics()
    {
        $page = Page::findBySlugWithRelations('logistics-staff');
        return view('front.manpower-supply.logistics-staff', compact('page'));
    }

    public function construction()
    {
        $page = Page::findBySlugWithRelations('construction-staff');
        return view('front.manpower-supply.construction-staff', compact('page'));
    }
}
