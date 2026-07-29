<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [

            [
                'title' => 'Software Development',
                'slug' => 'software-development'
            ],

            [
                'title' => 'Website CMS',
                'slug' => 'website-cms'
            ],

            [
                'title' => 'E-Raport Sekolah',
                'slug' => 'e-raport'
            ],

            [
                'title' => 'Kehosting.in',
                'slug' => 'kehosting'
            ],

            [
                'title' => 'Legal Dari Kita',
                'slug' => 'legal-dari-kita'
            ],

            [
                'title' => 'Training',
                'slug' => 'training'
            ],

            [
                'title' => 'Balanja.id',
                'slug' => 'balanja-id'
            ]
        ];

        foreach ($services as $service) {

            Service::create([
                'title' => $service['title'],
                'slug' => $service['slug'],
                'description' => $service['title'].' Service',
                'status' => 'active',
                'created_by' => 1
            ]);
        }
    }
}