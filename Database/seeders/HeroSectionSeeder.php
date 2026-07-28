<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSection;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        HeroSection::create([
            'title' => 'Build Your Digital Solution',
            'subtitle' => 'Icommits IT Consultant Indonesia',
            'button_text' => 'Konsultasi Sekarang',
            'button_link' => '/contact',
            'image' => 'hero.jpg'
        ]);
    }
}