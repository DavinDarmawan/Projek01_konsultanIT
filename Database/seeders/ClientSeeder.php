<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        Client::insert([

            [
                'company_name' => 'Pertamina',
                'logo' => 'clients/pertamina.png',
                'website' => 'https://pertamina.com',
                'description' => 'Client sektor energi nasional'
            ],

            [
                'company_name' => 'BPBD Bandung',
                'logo' => 'clients/bpbd.png',
                'website' => null,
                'description' => 'Client sektor pemerintahan'
            ],

            [
                'company_name' => 'AKMI Karya Global',
                'logo' => 'clients/akmi.png',
                'website' => null,
                'description' => 'Mitra strategis dan legal partner'
            ]

        ]);
    }
}