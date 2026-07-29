<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::insert([

            [
                'question' => 'Apa layanan utama Icommits?',
                'answer' => 'Software Development, Website CMS, E-Raport, Hosting, Training dan solusi digital lainnya.',
                'is_active' => true
            ],

            [
                'question' => 'Apakah menerima project custom?',
                'answer' => 'Ya, kami menerima project dan sistem yang disesuaikan dengan kebutuhan bisnis klien.',
                'is_active' => true
            ],

            [
                'question' => 'Apakah tersedia layanan maintenance?',
                'answer' => 'Ya, kami menyediakan support dan maintenance setelah implementasi sistem.',
                'is_active' => true
            ]

        ]);
    }
}