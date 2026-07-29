<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        Partner::insert([

            [
                'company_name' => 'Pertamina',
                'project_name' => 'Starsite Project',
                'image' => 'partner/pertamina.png',
                'website' => 'https://pertamina.com',
                'icon' => 'bi-building'
            ],

            [
                'company_name' => 'BPBD Bandung',
                'project_name' => 'E-Dala System',
                'image' => 'partner/bpbd.png',
                'website' => null,
                'icon' => 'bi-building'
            ]

        ]);
    }
}