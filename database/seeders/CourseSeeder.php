<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // ====== Course Categories ======
        
             $categories = [
            [
                'title' => 'ESOL Courses (Entry Level – Level 1)',
                'slug' => Str::slug('ESOL Courses (Entry Level – Level 1)'),
                'thumbnail' => 'esol-thumbnail.jpg',
                'description' => 'Courses designed to improve English language skills for learners at entry level through level 1.',
                'icon' => 'esol-icon.png',
                'order_no' => 1,
                'banner_image' => 'esol-banner.jpg',
                'status' => 'publish',
                'isfeature' => 'featured',
                'meta_title' => 'ESOL Courses Entry Level to Level 1',
                'meta_description' => 'Enhance your English skills with ESOL courses from entry level to level 1.',
                'font_awesome_icon' => 'fa-book-open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'GCSE English',
                'slug' => Str::slug('GCSE English'),
                'thumbnail' => 'gcse-thumbnail.jpg',
                'description' => 'Comprehensive GCSE English courses to help learners achieve academic success.',
                'icon' => 'gcse-icon.png',
                'order_no' => 2,
                'banner_image' => 'gcse-banner.jpg',
                'status' => 'publish',
                'isfeature' => 'featured',
                'meta_title' => 'GCSE English Courses',
                'meta_description' => 'Prepare for your exams with our expert-led GCSE English courses.',
                'font_awesome_icon' => 'fa-pencil-alt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Other English (EFL – English as a Foreign Language)',
                'slug' => Str::slug('Other English (EFL – English as a Foreign Language)'),
                'thumbnail' => 'efl-thumbnail.jpg',
                'description' => 'English courses for non-native speakers focusing on communication and fluency.',
                'icon' => 'efl-icon.png',
                'order_no' => 3,
                'banner_image' => 'efl-banner.jpg',
                'status' => 'publish',
                'isfeature' => 'featured',
                'meta_title' => 'EFL English as a Foreign Language',
                'meta_description' => 'Improve your English communication skills with our EFL courses.',
                'font_awesome_icon' => 'fa-language',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('course_categories')->insert($categories);



        // ====== Courses ======
        $courses = [
            // ✅ ESOL Courses
            [
                'course_category_id' => 1,
                'title' => 'Entry 1 Certificate in English Language Skills (ESOL)',
                'slug' => Str::slug('Entry 1 Certificate in English Language Skills (ESOL)'),
                'content' => 'This ESOL course is designed for beginners who are just starting to learn English.',
                'image' => 'entry1.jpg',
                'icon_font' => 'fa-book',
                'icon' => 'entry1-icon.png',
                'banner_image' => 'entry1-banner.jpg',
                'status' => 1,
                'meta_keywords' => 'ESOL, Entry 1, English basics',
                'meta_description' => 'Begin your English journey with the Entry 1 Certificate in ESOL.',
                'serial_number' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category_id' => 1,
                'title' => 'Entry 2 Certificate in English Language Skills (ESOL)',
                'slug' => Str::slug('Entry 2 Certificate in English Language Skills (ESOL)'),
                'content' => 'This course builds on Entry 1 to improve reading, writing, and speaking skills.',
                'image' => 'entry2.jpg',
                'icon_font' => 'fa-graduation-cap',
                'icon' => 'entry2-icon.png',
                'banner_image' => 'entry2-banner.jpg',
                'status' => 1,
                'meta_keywords' => 'ESOL, Entry 2, English learning',
                'meta_description' => 'Improve your English with the Entry 2 Certificate in ESOL.',
                'serial_number' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category_id' => 1,
                'title' => 'Entry 3 Certificate in English Language Skills (ESOL)',
                'slug' => Str::slug('Entry 3 Certificate in English Language Skills (ESOL)'),
                'content' => 'For learners progressing from Entry 2, focusing on grammar and vocabulary.',
                'image' => 'entry3.jpg',
                'icon_font' => 'fa-language',
                'icon' => 'entry3-icon.png',
                'banner_image' => 'entry3-banner.jpg',
                'status' => 1,
                'meta_keywords' => 'ESOL, Entry 3, English grammar',
                'meta_description' => 'Advance your English skills with the Entry 3 Certificate in ESOL.',
                'serial_number' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category_id' => 1,
                'title' => 'Level 1 Certificate in English Language Skills (ESOL)',
                'slug' => Str::slug('Level 1 Certificate in English Language Skills (ESOL)'),
                'content' => 'A higher-level ESOL qualification preparing students for academic and work contexts.',
                'image' => 'level1.jpg',
                'icon_font' => 'fa-book-reader',
                'icon' => 'level1-icon.png',
                'banner_image' => 'level1-banner.jpg',
                'status' => 1,
                'meta_keywords' => 'ESOL, Level 1, English qualification',
                'meta_description' => 'Prepare for work and study with the Level 1 Certificate in ESOL.',
                'serial_number' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ GCSE English
            [
                'course_category_id' => 2,
                'title' => 'GCSE English (General Certificate of Secondary Education – English)',
                'slug' => Str::slug('GCSE English General Certificate of Secondary Education – English'),
                'content' => 'GCSE English prepares students for exams with a focus on reading, writing, and literature.',
                'image' => 'gcse.jpg',
                'icon_font' => 'fa-pencil-alt',
                'icon' => 'gcse-icon.png',
                'banner_image' => 'gcse-banner.jpg',
                'status' => 1,
                'meta_keywords' => 'GCSE English, exams, school qualification',
                'meta_description' => 'Achieve success in your exams with our GCSE English course.',
                'serial_number' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ Other English (EFL)
            [
                'course_category_id' => 3,
                'title' => 'English as a Foreign Language – Elementary',
                'slug' => Str::slug('English as a Foreign Language – Elementary'),
                'content' => 'Elementary level course for non-native speakers focusing on everyday communication.',
                'image' => 'efl-elementary.jpg',
                'icon_font' => 'fa-comments',
                'icon' => 'efl-elementary-icon.png',
                'banner_image' => 'efl-elementary-banner.jpg',
                'status' => 1,
                'meta_keywords' => 'EFL, English, elementary level',
                'meta_description' => 'Start learning English with our EFL Elementary course.',
                'serial_number' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category_id' => 3,
                'title' => 'English as a Foreign Language – Intermediate',
                'slug' => Str::slug('English as a Foreign Language – Intermediate'),
                'content' => 'Intermediate course to strengthen grammar, vocabulary, and fluency.',
                'image' => 'efl-intermediate.jpg',
                'icon_font' => 'fa-chalkboard-teacher',
                'icon' => 'efl-intermediate-icon.png',
                'banner_image' => 'efl-intermediate-banner.jpg',
                'status' => 1,
                'meta_keywords' => 'EFL, English, intermediate level',
                'meta_description' => 'Boost your English with our EFL Intermediate course.',
                'serial_number' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category_id' => 3,
                'title' => 'English as a Foreign Language – Upper-Intermediate',
                'slug' => Str::slug('English as a Foreign Language – Upper-Intermediate'),
                'content' => 'Upper-intermediate course focusing on advanced communication and comprehension.',
                'image' => 'efl-upper-intermediate.jpg',
                'icon_font' => 'fa-headset',
                'icon' => 'efl-upper-intermediate-icon.png',
                'banner_image' => 'efl-upper-intermediate-banner.jpg',
                'status' => 1,
                'meta_keywords' => 'EFL, English, upper intermediate',
                'meta_description' => 'Advance your English to the next level with our EFL Upper-Intermediate course.',
                'serial_number' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category_id' => 3,
                'title' => 'English as a Foreign Language – Advanced (UCLES CAE, CELS or IELTS)',
                'slug' => Str::slug('English as a Foreign Language – Advanced (UCLES CAE, CELS or IELTS)'),
                'content' => 'Advanced EFL course preparing learners for international exams such as CAE, CELS, or IELTS.',
                'image' => 'efl-advanced.jpg',
                'icon_font' => 'fa-graduation-cap',
                'icon' => 'efl-advanced-icon.png',
                'banner_image' => 'efl-advanced-banner.jpg',
                'status' => 1,
                'meta_keywords' => 'EFL, English advanced, IELTS, CAE, CELS',
                'meta_description' => 'Prepare for international English exams with our EFL Advanced course.',
                'serial_number' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('courses')->insert($courses);
    }
}
