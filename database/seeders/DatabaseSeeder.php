<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       $this->call([
    UserSeeder::class,
    HeroSectionSeeder::class,
    ServiceSeeder::class,
    PortfolioSeeder::class,
    BenefitSeeder::class,
    TeamSeeder::class,
    PartnerSeeder::class,
]);
    }
}