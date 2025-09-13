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
                'image' => 'images/category-children/ninh-binh-1-ngay.jpg',
                'category_id' => 1,
            ],
            [
                'name' => 'Ninh Bình 2 Ngày 1 Đêm',
                'slug' => 'ninh-binh-2-ngay-1-dem',
                'image' => 'images/category-children/ninh-binh-2-ngay.jpg',
                'category_id' => 1,
            ],
            [
                'name' => 'Ninh Bình 3 Ngày 2 Đêm',
                'slug' => 'ninh-binh-3-ngay-2-dem',
                'image' => 'images/category-children/ninh-binh-3-ngay.jpg',
                'category_id' => 1,
            ],

            // Hạ Long
            [
                'name' => 'Hạ Long 1 Ngày',
                'slug' => 'ha-long-1-ngay',
                'image' => 'images/category-children/ha-long-1-ngay.jpg',
                'category_id' => 2,
            ],
            [
                'name' => 'Hạ Long 2 Ngày 1 Đêm',
                'slug' => 'ha-long-2-ngay-1-dem',
                'image' => 'images/category-children/ha-long-2-ngay.jpg',
                'category_id' => 2,
            ],
            [
                'name' => 'Hạ Long 3 Ngày 2 Đêm',
                'slug' => 'ha-long-3-ngay-2-dem',
                'image' => 'images/category-children/ha-long-3-ngay.jpg',
                'category_id' => 2,
            ],

            // Sa Pa
            [
                'name' => 'Sa Pa 2 Ngày 1 Đêm',
                'slug' => 'sapa-2-ngay-1-dem',
                'image' => 'images/category-children/sapa-2-ngay.jpg',
                'category_id' => 3,
            ],
            [
                'name' => 'Sa Pa 3 Ngày 2 Đêm',
                'slug' => 'sapa-3-ngay-2-dem',
                'image' => 'images/category-children/sapa-3-ngay.jpg',
                'category_id' => 3,
            ],

            // Hà Giang
            [
                'name' => 'Hà Giang 3 Ngày 2 Đêm',
                'slug' => 'ha-giang-3-ngay-2-dem',
                'image' => 'images/category-children/ha-giang-3-ngay.jpg',
                'category_id' => 4,
            ],
            [
                'name' => 'Hà Giang 4 Ngày 3 Đêm',
                'slug' => 'ha-giang-4-ngay-3-dem',
                'image' => 'images/category-children/ha-giang-4-ngay.jpg',
                'category_id' => 4,
            ],

            // Miền Trung
            [
                'name' => 'Huế - Đà Nẵng - Hội An',
                'slug' => 'hue-da-nang-hoi-an',
                'image' => 'images/category-children/mien-trung.jpg',
                'category_id' => 5,
            ],

            // Tây Bắc
            [
                'name' => 'Mù Cang Chải 2 Ngày 1 Đêm',
                'slug' => 'mu-cang-chai-2-ngay-1-dem',
                'image' => 'images/category-children/mu-cang-chai.jpg',
                'category_id' => 6,
            ],
            [
                'name' => 'Yên Bái - Mù Cang Chải 3 Ngày 2 Đêm',
                'slug' => 'yen-bai-mu-cang-chai-3-ngay-2-dem',
                'image' => 'images/category-children/yen-bai.jpg',
                'category_id' => 6,
            ],

            // Miền Nam
            [
                'name' => 'Sài Gòn - Mekong Delta',
                'slug' => 'sai-gon-mekong-delta',
                'image' => 'images/category-children/sai-gon.jpg',
                'category_id' => 7,
            ],
            [
                'name' => 'Cần Thơ - Cà Mau',
                'slug' => 'can-tho-ca-mau',
                'image' => 'images/category-children/can-tho.jpg',
                'category_id' => 7,
            ],

            // Du lịch Quốc tế
            [
                'name' => 'Thái Lan 4 Ngày 3 Đêm',
                'slug' => 'thai-lan-4-ngay-3-dem',
                'image' => 'images/category-children/thai-lan.jpg',
                'category_id' => 8,
            ],
            [
                'name' => 'Singapore - Malaysia',
                'slug' => 'singapore-malaysia',
                'image' => 'images/category-children/singapore.jpg',
                'category_id' => 8,
            ],
        ];

        foreach ($categoryChildren as $childData) {
            CategoryChild::create($childData);
        }
    }
}