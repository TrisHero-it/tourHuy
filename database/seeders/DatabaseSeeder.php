<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BannerSeeder::class,
            LogoSeeder::class,
            GoogleMapSeeder::class,
            CategorySeeder::class,
            CategoryChildSeeder::class,
            TourSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
