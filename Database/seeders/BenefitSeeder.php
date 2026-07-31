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
        'icon' => 'bi-gear-fill',
        'description' => 'Aplikasi sesuai kebutuhan bisnis'
    ],

    [
        'service_id' => 1,
        'title' => 'Maintenance Support',
        'icon' => 'bi-tools',
        'description' => 'Maintenance berkelanjutan'
    ],

    [
        'service_id' => 2,
        'title' => 'SEO Friendly',
        'icon' => 'bi-search',
        'description' => 'Mudah ditemukan di mesin pencari'
    ],

    [
        'service_id' => 2,
        'title' => 'Responsive Design',
        'icon' => 'bi-phone',
        'description' => 'Tampilan optimal di semua perangkat'
    ]

]);
    }
}
