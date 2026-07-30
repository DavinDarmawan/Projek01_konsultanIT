<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceArticle;

class ServiceArticleSeeder extends Seeder
{
    public function run(): void
    {
        ServiceArticle::insert([

            [
                'service_id' => 1,
                'title' => 'Software Development Services',
                'slug' => 'software-development-services',
                'content' => 'Icommits menyediakan layanan pengembangan aplikasi web, mobile, desktop, dan sistem custom sesuai kebutuhan bisnis.',
                'featured_image' => 'services/software-development.jpg',
                'meta_title' => 'Software Development Services',
                'meta_description' => 'Layanan pengembangan software dan aplikasi profesional.',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'service_id' => 2,
                'title' => 'Website CMS Services',
                'slug' => 'website-cms-services',
                'content' => 'Website CMS modern dengan fitur SEO, responsive design dan kemudahan pengelolaan konten.',
                'featured_image' => 'services/cms.jpg',
                'meta_title' => 'Website CMS Services',
                'meta_description' => 'Website CMS modern dan mudah dikelola.',
                'status' => 'published',
                                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'service_id' => 3,
                'title' => 'E-Raport Sekolah',
                'slug' => 'e-raport-sekolah',
                'content' => 'Sistem digital untuk pengelolaan rapor sekolah yang terintegrasi dan mudah digunakan.',
                'featured_image' => 'services/e-raport.jpg',
                'meta_title' => 'E-Raport Sekolah',
                'meta_description' => 'Sistem rapor digital sekolah.',
                'status' => 'published',
                                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}