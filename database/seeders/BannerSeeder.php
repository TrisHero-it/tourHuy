<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'image' => 'images/banners/banner-1.jpg',
                'status' => 'active',
            ],
            [
                'image' => 'images/banners/banner-2.jpg',
                'status' => 'active',
            ],
            [
                'image' => 'images/banners/banner-3.jpg',
                'status' => 'active',
            ],
        ];

        foreach ($banners as $bannerData) {
            Banner::create($bannerData);
        }
    }
}
