<?php

namespace Database\Seeders;

use App\Models\CategoryChild;
use Illuminate\Database\Seeder;

class CategoryChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryChildren = [
            // Ninh Bình
            [
                'name' => 'Ninh Bình 1 Ngày',
                'slug' => 'ninh-binh-1-ngay',
                'image' => 'tour/tai-xuong.jpg',
                'category_id' => 1,
            ],
            [
                'name' => 'Ninh Bình 2 Ngày 1 Đêm',
                'slug' => 'ninh-binh-2-ngay-1-dem',
                'image' => 'tour/tai-xuong.jpg',
                'category_id' => 1,
            ],
            [
                'name' => 'Ninh Bình 3 Ngày 2 Đêm',
                'slug' => 'ninh-binh-3-ngay-2-dem',
                'image' => 'tour/tai-xuong.jpg',
                'category_id' => 1,
            ],

            // Hạ Long
            [
                'name' => 'Hạ Long 1 Ngày',
                'slug' => 'ha-long-1-ngay',
                'image' => 'tour/tai-xuong.jpg',
                'category_id' => 2,
            ],
            [
                'name' => 'Hạ Long 2 Ngày 1 Đêm',
                'slug' => 'ha-long-2-ngay-1-dem',
                'image' => 'tour/tai-xuong.jpg',
                'category_id' => 2,
            ],
            [
                'name' => 'Hạ Long 3 Ngày 2 Đêm',
                'slug' => 'ha-long-3-ngay-2-dem',
                'image' => 'tour/tai-xuong.jpg',
                'category_id' => 2,
            ],

            // Sa Pa
            [
                'name' => 'Sa Pa 2 Ngày 1 Đêm',
                'slug' => 'sapa-2-ngay-1-dem',
                'image' => 'tour/tai-xuong.jpg',
                'category_id' => 3,
            ],
            [
                'name' => 'Sa Pa 3 Ngày 2 Đêm',
                'slug' => 'sapa-3-ngay-2-dem',
                'image' => 'tour/tai-xuong.jpg',
                'category_id' => 3,
            ],

            // Hà Giang
            [
                'name' => 'Hà Giang 3 Ngày 2 Đêm',
                'slug' => 'ha-giang-3-ngay-2-dem',
                'image' => 'tour/tai-xuong.jpg',
                'category_id' => 4,
            ],
            [
                'name' => 'Hà Giang 4 Ngày 3 Đêm',
                'slug' => 'ha-giang-4-ngay-3-dem',
                'image' => 'tour/tai-xuong.jpg',
                'category_id' => 4,
            ],

            // Miền Trung
            [
                'name' => 'Huế - Đà Nẵng - Hội An',
                'slug' => 'hue-da-nang-hoi-an',
                'image' => 'tour/tai-xuong.jpg',
                'category_id' => 5,
            ],
        ];

        foreach ($categoryChildren as $childData) {
            CategoryChild::create($childData);
        }
    }
}