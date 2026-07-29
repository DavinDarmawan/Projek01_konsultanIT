<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Benefit;

class BenefitSeeder extends Seeder
{
    public function run(): void
    {
        Benefit::insert([

            [
                'service_id' => 1,
                'title' => 'Custom Business Solution',
                'description' => 'Aplikasi sesuai kebutuhan bisnis'
            ],

            [
                'service_id' => 1,
                'title' => 'Scalable Architecture',
                'description' => 'Mudah dikembangkan dan scalable'
            ],

            [
                'service_id' => 2,
                'title' => 'SEO Friendly',
                'description' => 'Mudah ditemukan di mesin pencari'
            ],

            [
                'service_id' => 2,
                'title' => 'Responsive Design',
                'description' => 'Tampilan optimal di semua perangkat'
            ]

        ]);
    }
}
