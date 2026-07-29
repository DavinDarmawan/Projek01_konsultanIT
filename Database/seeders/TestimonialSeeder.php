<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::insert([

            [
                'name' => 'Budi Santoso',
                'position' => 'IT Manager',
                'company' => 'PT Pertamina',
                'photo' => 'testimonials/budi.jpg',
                'rating' => 5,
                'review' => 'Icommits membantu transformasi digital perusahaan kami dengan sangat baik.'
            ],

            [
                'name' => 'Siti Rahma',
                'position' => 'Kepala Sekolah',
                'company' => 'SMA Negeri Bandung',
                'photo' => 'testimonials/siti.jpg',
                'rating' => 5,
                'review' => 'Implementasi E-Raport berjalan lancar dan sangat membantu administrasi sekolah.'
            ],

            [
                'name' => 'Dedi Kurniawan',
                'position' => 'Owner',
                'company' => 'CV Digital Jaya',
                'photo' => 'testimonials/dedi.jpg',
                'rating' => 5,
                'review' => 'Website company profile yang dibuat sangat profesional dan mudah digunakan.'
            ]

        ]);
    }
}