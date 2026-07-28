<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        Portfolio::insert([

            [
                'title' => 'WorkTrack',
                'client' => 'PT ABC',
                'description' => 'Monitoring System',
                'created_by' => 1
            ],

            [
                'title' => 'E-Raport',
                'client' => 'SMA Negeri',
                'description' => 'Digital Report System',
                'created_by' => 1
            ],

            [
                'title' => 'Company Profile',
                'client' => 'PT XYZ',
                'description' => 'Corporate Website',
                'created_by' => 1
            ],

            [
                'title' => 'Inventory System',
                'client' => 'Warehouse',
                'description' => 'Inventory Management',
                'created_by' => 1
            ],

            [
                'title' => 'POS System',
                'client' => 'Retail Store',
                'description' => 'Point Of Sale',
                'created_by' => 1
            ]
        ]);
    }
}