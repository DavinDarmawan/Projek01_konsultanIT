<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cta;

class CtaSeeder extends Seeder
{
    public function run(): void
    {
        Cta::create([
            'title' => 'Siap Membangun Solusi Digital Anda?',
            'subtitle' => 'Diskusikan kebutuhan bisnis bersama tim Icommits.',
            'button_text' => 'Konsultasi Gratis',
            'button_link' => '/contact',
            'background_color' => '#0F172A',
            'button_color' => '#22C55E',
        ]);
    }
}