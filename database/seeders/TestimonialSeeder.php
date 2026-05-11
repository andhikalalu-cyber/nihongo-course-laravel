<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Andi S.',
                'image_url' => 'https://randomuser.me/api/portraits/men/1.jpg',
                'review' => 'Kursus N5 sangat membantu! Sensei-nya sabar dan materi lengkap. Lulus JLPT N5 pertama kali!',
                'rating' => 5,
                'level' => 'N5',
            ],
            [
                'name' => 'Sari P.',
                'image_url' => 'https://randomuser.me/api/portraits/women/2.jpg',
                'review' => 'Metode interaktifnya bagus. Flashcard dan quiz bikin belajar seru. Recommended!',
                'rating' => 5,
                'level' => 'N4',
            ],
            [
                'name' => 'Budi K.',
                'image_url' => 'https://randomuser.me/api/portraits/men/3.jpg',
                'review' => 'Harga worth it untuk kualitasnya. Schedule fleksibel, cocok buat pekerja.',
                'rating' => 4,
                'level' => 'N3',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}

