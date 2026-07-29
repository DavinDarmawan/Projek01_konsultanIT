<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyInfo;

class CompanyInfoSeeder extends Seeder
{
    public function run(): void
    {
        CompanyInfo::create([

            'company_name' => 'Icommits IT Consultant Indonesia',

            'about' => 'Icommits membantu perusahaan, UMKM, startup, sekolah dan instansi pemerintahan membangun solusi digital modern.',

            'vision' => 'Menjadi perusahaan konsultan teknologi informasi terpercaya di Indonesia.',

            'mission' => 'Menyediakan solusi digital inovatif, meningkatkan efisiensi bisnis klien dan memberikan layanan teknologi berkualitas.',

            'logo' => 'logos/icommits.png',

            'address' => 'Jl. Pasir Subur No.10, Ancol, Kec. Regol, Kota Bandung',

            'email' => 'info@icommits.co.id',

            'phone' => '+62 819 9030 0100',

            'whatsapp' => '6281990300100',

            'map_embed' => 'https://www.google.com/maps/embed?pb=...',

            'social_media' => json_encode([
                [
                    'platform' => 'Instagram',
                    'url' => '#',
                    'icon' => 'bi-instagram'
                ],
                [
                    'platform' => 'LinkedIn',
                    'url' => '#',
                    'icon' => 'bi-linkedin'
                ],
                [
                    'platform' => 'YouTube',
                    'url' => '#',
                    'icon' => 'bi-youtube'
                ],
                [
                    'platform' => 'Facebook',
                    'url' => '#',
                    'icon' => 'bi-facebook'
                ]
            ])

        ]);
    }
}