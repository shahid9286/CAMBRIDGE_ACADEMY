<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class BusinessSetupController extends Controller
{
    public function mainlandFreezone()
    {
        $page = Page::findBySlugWithRelations('mainland-freezone');
        return view('front.business-setup.mainland-freezone', compact('page'));
    }

    public function moaDrafting()
    {
        $page = Page::findBySlugWithRelations('moa-drafting');
        return view('front.business-setup.moa-drafting', compact('page'));
    }

    public function proServices()
    {
        $page = Page::findBySlugWithRelations('pro-services');
        return view('front.business-setup.pro-services', compact('page'));
    }

    public function bankAssistance()
    {
        $page = Page::findBySlugWithRelations('bank-account-assistance');
        return view('front.business-setup.bank-account-assistance', compact('page'));
    }

    public function compliance()
    {
        $page = Page::findBySlugWithRelations('compliance-advisory');
        return view('front.business-setup.compliance-advisory', compact('page'));
    }
}
