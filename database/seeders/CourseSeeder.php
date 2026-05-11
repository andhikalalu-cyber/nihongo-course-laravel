<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'level' => 'N5',
                'title' => 'JLPT N5 - Pemula',
                'description' => 'Dasar hiragana, katakana, kosakata dasar, grammar sederhana.',
                'duration_months' => 3,
                'price' => 1500000,
                'features' => '50 jam live, materi PDF, flashcards',
            ],
            [
                'level' => 'N4',
                'title' => 'JLPT N4 - Dasar',
                'description' => 'Perluas kosakata 800 kata, grammar level N4, latihan listening.',
                'duration_months' => 4,
                'price' => 2000000,
                'features' => '80 jam live, video lesson, mock test',
            ],
            [
                'level' => 'N3',
                'title' => 'JLPT N3 - Menengah',
                'description' => 'Kosakata 1500 kata, kanji 650, grammar kompleks.',
                'duration_months' => 5,
                'price' => 2800000,
                'features' => '100 jam live, speaking practice, JLPT simulation',
            ],
            [
                'level' => 'N2',
                'title' => 'JLPT N2 - Mahir',
                'description' => 'Kosakata 6000 kata, kanji tingkat tinggi, reading news.',
                'duration_months' => 6,
                'price' => 3800000,
                'features' => '120 jam live, business Japanese intro',
            ],
            [
                'level' => 'N1',
                'title' => 'JLPT N1 - Expert',
                'description' => 'Fluent Japanese, advanced kanji 2000+, native conversation.',
                'duration_months' => 8,
                'price' => 5000000,
                'features' => '160 jam live, JLPT N1 intensive, certificate',
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}

