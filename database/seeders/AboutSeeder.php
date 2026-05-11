<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('about_pages')->insert([
            [
                'title' => 'Tanaka-sensei',
                'content' => 'Lulus Universitas Tokyo. Guru native dengan metode immersion yang terbukti efektif.',
                'image' => 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=300&h=300&fit=crop&round',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Yamamoto-sensei',
                'content' => 'Ahli kanji dengan 20 tahun pengajaran. 98% siswa hafal 1000 kanji.',
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop&round',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sato-sensei',
                'content' => 'Fokus percakapan natural. Siswa bisa ngobrol lancar dalam 3 bulan.',
                'image' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w=300&h=300&fit=crop&round',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
};

