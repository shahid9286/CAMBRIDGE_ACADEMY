<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    public function buy()
    {
        $page = Page::findBySlugWithRelations('buy');
        return view('front.real-estate.buy', compact('page'));
    }

    public function sell()
    {
        $page = Page::findBySlugWithRelations('sell');
        return view('front.real-estate.sell', compact('page'));
    }

    public function rent()
    {
        $page = Page::findBySlugWithRelations('rent');
        return view('front.real-estate.rent', compact('page'));
    }

    public function offPlan()
    {
        $page = Page::findBySlugWithRelations('off-plan-investments');
        return view('front.real-estate.off-plan-investments', compact('page'));
    }

    public function roiAdvisory()
    {
        $page = Page::findBySlugWithRelations('roi-advisory');
        return view('front.real-estate.roi-advisory', compact('page'));
    }
}
