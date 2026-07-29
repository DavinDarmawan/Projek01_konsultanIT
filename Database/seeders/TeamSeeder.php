<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        Team::insert([

            [
                'name' => 'Ahmad Kurnia',
                'position' => 'CEO & Founder',
                'description' => '10+ tahun pengalaman di bidang software development.',
                'image' => 'team/andi.jpg',
                'icon' => 'bi-person-circle',
                'linkedin' => 'https://linkedin.com/in/andi',
                'instagram' => 'https://instagram.com/andi',
                'github' => 'https://github.com/andi',
            ],

            [
                'name' => 'Davin Darmawangsa',
                'position' => 'CTO & Co-Founder',
                'description' => 'Ahli arsitektur sistem dan keamanan informasi.',
                'image' => 'team/budi.jpg',
                'icon' => 'bi-person-circle',
                'linkedin' => null,
                'instagram' => null,
                'github' => null,
            ]

        ]);
    }
}