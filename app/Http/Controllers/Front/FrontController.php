<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Enquiry,
    Gallery,
    Page,
    PageCategory,
    Slider,
    Team , Job
};

class FrontController extends Controller
{
    protected function getPageBySlug($slug)
    {
        try {
            return Page::with([
                'whyUsImages',
                'elements',
                'blocks',
                'sections',
                'callToActions',
                'sectionTitles',
                'faqs',
                'testimonials'
            ])->where('slug', $slug)->firstOrFail();
        } catch (\Exception $e) {
            dd('Page not found:', $e->getMessage());
        }
    }

    public function index()
    {
        $team = Team::where('status', 'active')->orderBy('order_no', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('serial_no', 'ASC')->get();
        $page_categories = PageCategory::where('status', 'published')->orderBy('order_no', 'ASC')->get();
        $visa_services = Page::where('page_category_id', 1)->orderBy('order_no', 'ASC')->get();
        $business_services = Page::where('page_category_id', 2)->orderBy('order_no', 'ASC')->get();
        $manpower_services = Page::where('page_category_id', 3)->orderBy('order_no', 'ASC')->get();
        return view('front.index', compact('sliders', 'team', 'page_categories', 'visa_services', 'business_services', 'manpower_services'));
    }

    public function aboutUs()
    {
        $team = Team::where('status', 'active')->orderBy('order_no', 'ASC')->get();
        return view('front.pages.about-us', compact('team'));
    }

    public function contactUs()
    {
        return view('front.pages.contact-us');
    }

    public function contactUsStore(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone_no' => 'required|max:255',
            'service' => 'required|max:255',
            'message' => 'required'
        ]);

        $enquiry = new Enquiry();
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone_no = $request->phone_no;
        $enquiry->subject = $request->service;
        $enquiry->enquiry_message = $request->message;
        $enquiry->save();

        return redirect()->back()->with('success', 'Appointment Submitted Successfully!');
    }

    public function gallery()
    {
        $galleries = Gallery::where('status', 1)->where("category_id", '!=', 2)->orderBy('serial_number', 'asc')->get();
        return view('front.pages.gallery', compact('galleries'));
    }

    public function sections()
    {
        return view('front.sections');
    }

    public function pageDetail($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('front.pages.page-detail', compact('page'));
    }

    public function categoryWisePages($slug)
    {
        $page_category = PageCategory::where('slug', $slug)
        ->where('status', 'published')
        ->first();
        $pages = Page::where('page_category_id', $page_category->id)
        ->where('status', 'published')
        ->orderBy('order_no', 'ASC')
        ->get();

        return view('front.pages.category-wise-pages', compact('pages', 'page_category'));
    }
    
    
    public function ourCompanies(){
        return view('front.pages.our-companies');
    }
    public function joblist()
    {
        $jobs = Job::all();

        return view('front.jobs', compact('jobs'));
    }

    public function jobDetail($slug)
    {
        $job = Job::where('slug', $slug)->firstOrFail();

        // return $job;

        return view('front.job-detail', compact('job'));
    }
    
    

}
