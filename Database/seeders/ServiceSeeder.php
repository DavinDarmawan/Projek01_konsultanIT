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
                'title' => 'Software Development'
            ],

            [
                'title' => 'Website CMS'
            ],

            [
                'title' => 'E-Raport Sekolah'
            ],

            [
                'title' => 'Kehosting.in'
            ],

            [
                'title' => 'Legal Dari Kita'
            ],

            [
                'title' => 'Training'
            ],

            [
                'title' => 'Balanja.id'
            ]
        ];

        foreach ($services as $service) {

            Service::create([

                'title' => $service['title'],

                'description' => $service['title'].' Service',

                'status' => 'active',

                'created_by' => 1
            ]);
        }
    }
}