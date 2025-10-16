<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Enquiry;
use App\Models\FeatureSection;
use App\Models\Gallery;
use App\Models\InfoBlock;
use App\Models\Job;
use App\Models\Partner;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Slider;
use App\Models\Team;
use App\Models\TestimonialSection;
use App\Models\WhyChooseUsSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('serial_no', 'ASC')->get();
        $partners = Partner::where('status', 'published')->orderBy('order_no', 'ASC')->get();
   
        return view('website.index', compact('sliders', 'partners'));
    }

    public function aboutUs()
    {
        $team = Team::where('status', 'active')->orderBy('order_no', 'ASC')->get();

        return view('website.pages.about-us', compact('team'));
    }

    public function contactUs()
    {
        return view('website.pages.contact-us');
    }

    public function contactUsStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'enquiry_message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $enquiry = new Enquiry;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone_no = $request->phone_no;
        $enquiry->subject = $request->subject;
        $enquiry->enquiry_message = $request->enquiry_message;
        $enquiry->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Enquiry Submitted Successfully!',
        ]);
    }

    public function gallery()
    {
        $galleries = Gallery::where('status', 1)->get();

        return view('website.gallery', compact('galleries'));
    }

    public function blogs()
    {
        $blogs = Blog::where('status', 1)->orderBy('serial_number', 'ASC')->get();

        return view('website.blog.index', compact('blogs'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->with(['settings.reference'])
            ->firstOrFail();

        return view('website.blog.detail', compact('blog'));
    }

    public function courses()
    {
        return view('website.course.index');
    }

    public function courseDetail($slug)
    {
        $course = Course::where('slug', $slug)
            ->with(['settings.reference'])
            ->firstOrFail();

        return view('website.course.detail', compact('course'));
    }

    public function applyNow()
    {
        return view('website.pages.applynow');
    }

    public function categoryWiseCourses($category_slug)
    {
        $category = CourseCategory::where('slug', $category_slug)->firstOrFail();
        $category_wise_courses = Course::where('course_category_id', $category->id)
            ->where('status', 1)
            ->orderBy('serial_number', 'ASC')
            ->get();

        return view('website.course.category-wise-courses', compact('category', 'category_wise_courses'));
    }

    public function joblist()
    {
        $jobs = Job::all();

        return view('website.jobs', compact('jobs'));
    }

    public function jobDetail($slug)
    {
        $job = Job::where('slug', $slug)->firstOrFail();

        return view('website.job-detail', compact('job'));
    }

    public function services()
    {
        $jobs = Job::all();

        return view('website.jobs', compact('jobs'));
    }

    public function serviceDetail($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $services = Service::where('service_category_id', $service->service_category_id)
            ->where('id', '!=', $service->id)
            ->get();

        return view('website.service-detail', compact('service', 'services'));
    }

    public function serviceCategory()
    {
        $serviceCategories = ServiceCategory::where('status', 'publish')->orderBy('order_no', 'ASC')->get();

        return view('website.sevice_category_detail', compact('serviceCategories'));
    }

    public function allServices($slug)
    {
        $serviceCategory = ServiceCategory::where('slug', $slug)->firstOrFail();
        $services = Service::where('status', 'publish')->where('service_category_id', $serviceCategory->id)->orderBy('order_no', 'ASC')->get();

        return view('website.service', compact('services'));
    }
}
