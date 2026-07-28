<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyInfo;

class CompanyInfoSeeder extends Seeder
{
    public function run()
    {
        CompanyInfo::create([
            'address' => 'Jl. Pasir Subur No.10, Ancol, Kec. Regol, Kota Bandung',
            'email' => 'info@icommits.co.id',
            'phone' => '+62 819 9030 0100',
            'whatsapp' => '6281990300100',
            'map_embed' => 'https://www.google.com/maps/embed?pb=...',
            'social_media' => [
                ['platform' => 'Instagram', 'url' => '#', 'icon' => 'bi-instagram'],
                ['platform' => 'LinkedIn', 'url' => '#', 'icon' => 'bi-linkedin'],
                ['platform' => 'YouTube', 'url' => '#', 'icon' => 'bi-youtube'],
                ['platform' => 'Facebook', 'url' => '#', 'icon' => 'bi-facebook'],
            ],
        ]);
    }
}