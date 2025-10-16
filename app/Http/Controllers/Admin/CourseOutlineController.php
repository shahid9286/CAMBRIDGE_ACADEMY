<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseOutline;
use App\Models\CourseOutlineUnit;
use App\Models\CourseOutlineUnitTopic;
use App\Models\CourseSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CourseOutlineController extends Controller
{
    public function index($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $outlines = CourseOutline::where('course_id', $course->id)->get();
        return view('admin.course.partials.outline_list', compact('outlines', 'slug'));
    }

    public function add($slug)
    {
        return view('admin.course.partials.outline_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],

            'units' => ['required', 'array', 'min:1'],
            'units.*.title' => ['required', 'string', 'max:255'],

            'units.*.topics' => ['nullable', 'array'],
            'units.*.topics.*.title' => ['required_with:units.*.topics', 'string', 'max:255'],
        ]);

        DB::transaction(function () use ($validated, $slug) {
            $course = Course::where('slug', $slug)->first();
            $outline = CourseOutline::create([
                'course_id' => $course->id,
                'title' => $validated['title'],
                'subtitle' => $validated['subtitle'] ?? null,
                'description' => $validated['description'] ?? null,
            ]);

            foreach ($validated['units'] as $unitData) {
                $unit = $outline->units()->create([
                    'title' => $unitData['title'],
                ]);

                if (!empty($unitData['topics'])) {
                    foreach ($unitData['topics'] as $topicData) {
                        $unit->topics()->create([
                            'title' => $topicData['title'],
                        ]);
                    }
                }
            }
            $lastOrder = CourseSetting::where('course_id', $course->id)->max('order_no');
            $orderNo   = $lastOrder ? $lastOrder + 1 : 1;

            CourseSetting::create([
                'course_id'      => $course->id,
                'reference_id'   => $outline->id,
                'reference_type' => CourseOutline::class,
                'order_no'       => $orderNo,
            ]);
        });

        return redirect()->route('admin.course.outline.index', ['slug' => $slug])->with('notification', [
            'message' => 'Course Outline Added Successfully!',
            'alert' => 'success',
        ]);
    }

    public function edit($id)
    {
        $courseOutline = CourseOutline::findOrFail($id);
        $slug = $courseOutline->course->slug;
        return view('admin.course.partials.outline_edit', compact('courseOutline', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],

            'units' => ['required', 'array', 'min:1'],
            'units.*.id' => ['nullable', Rule::exists('course_outline_units', 'id')],
            'units.*.title' => ['required', 'string', 'max:255'],

            'units.*.topics' => ['nullable', 'array'],
            'units.*.topics.*.id' => ['nullable', Rule::exists('course_outline_unit_topics', 'id')],
            'units.*.topics.*.title' => ['required_with:units.*.topics', 'string', 'max:255'],
        ]);

        $courseOutline = CourseOutline::findOrFail($id);
        DB::transaction(function () use ($validated, $courseOutline) {
            $courseOutline->update([
                'title' => $validated['title'],
                'subtitle' => $validated['subtitle'] ?? null,
                'description' => $validated['description'] ?? null,
            ]);

            $existingUnitIds = $courseOutline->units()->pluck('id')->toArray();
            $submittedUnitIds = collect($validated['units'])->pluck('id')->filter()->toArray();

            $unitsToDelete = array_diff($existingUnitIds, $submittedUnitIds);
            CourseOutlineUnit::whereIn('id', $unitsToDelete)->delete();

            foreach ($validated['units'] as $unitData) {
                $unit = isset($unitData['id'])
                    ? CourseOutlineUnit::find($unitData['id'])
                    : $courseOutline->units()->create(['title' => $unitData['title']]);

                if (isset($unitData['id'])) {
                    $unit->update(['title' => $unitData['title']]);
                }

                $existingTopicIds = $unit->topics()->pluck('id')->toArray();
                $submittedTopicIds = collect($unitData['topics'] ?? [])->pluck('id')->filter()->toArray();

                $topicsToDelete = array_diff($existingTopicIds, $submittedTopicIds);
                CourseOutlineUnitTopic::whereIn('id', $topicsToDelete)->delete();

                foreach ($unitData['topics'] ?? [] as $topicData) {
                    if (isset($topicData['id'])) {
                        $topic = CourseOutlineUnitTopic::find($topicData['id']);
                        $topic->update(['title' => $topicData['title']]);
                    } else {
                        $unit->topics()->create(['title' => $topicData['title']]);
                    }
                }
            }
        });

        return redirect()->route('admin.course.outline.index', ['slug' => $courseOutline->course->slug])->with('notification', [
            'message' => 'Course Outline Updated Successfully!',
            'alert' => 'success',
        ]);
    }

    public function delete($id)
    {
        $courseOutline = CourseOutline::findOrFail($id);
        CourseSetting::where('reference_id', $courseOutline->id)
            ->where('reference_type', CourseOutline::class)
            ->delete();

        $settings = CourseSetting::where('course_id', $courseOutline->course_id)
            ->orderBy('order_no')
            ->get();

        $order = 1;
        foreach ($settings as $setting) {
            $setting->update(['order_no' => $order++]);
        }

        $courseOutline->delete();
        
        return redirect()->back()->with('notification', [
            'message' => 'Course Outline Deleted Successfully!',
            'alert' => 'success',
        ]);
    }
}
