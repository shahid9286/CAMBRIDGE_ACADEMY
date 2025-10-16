@foreach ($course->settings as $setting)
    @php
        $type = class_basename($setting->reference_type);
    @endphp

    @switch($type)
        @case('CourseBlock')
            @include('website.course.partials.block', ['block' => $setting->reference])
        @break

        @case('CourseCTA')
            @include('website.course.partials.cta', ['cta' => $setting->reference])
        @break

        @case('CourseSection')
            @include('website.course.partials.section', ['section' => $setting->reference])
        @break

        @case('CourseOutline')
            @include('website.course.partials.outline', ['outline' => $setting->reference])
        @break

        @case('CourseFeature')
            @include('website.course.partials.features', ['feature' => $setting->reference])
        @break

        @case('CourseWhyChooseUs')
            @include('website.course.partials.why_choose_us', ['why_choose_us' => $setting->reference])
        @break

        @case('CourseElement')
            @include('website.course.partials.element', ['element' => $setting->reference])
        @break
    @endswitch
@endforeach
