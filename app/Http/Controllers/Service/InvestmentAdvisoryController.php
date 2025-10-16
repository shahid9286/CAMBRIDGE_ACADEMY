<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class InvestmentAdvisoryController extends Controller
{
    public function plans()
    {
        $page = Page::findBySlugWithRelations('investment-plans');
        return view('front.investment-advisory.investment-plans', compact('page'));
    }
}
