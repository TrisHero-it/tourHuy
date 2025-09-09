<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Ninh Bình',
                'slug' => 'ninh-binh',
                'description' => 'Khám phá vùng đất cố đô với những danh lam thắng cảnh nổi tiếng',
                'image' => 'tour/tai-xuong.jpg',
                'is_nav' => 1,
                'is_featured' => 1,
                'is_banner' => 1,
            ],
            [
                'name' => 'Hạ Long',
                'slug' => 'ha-long',
                'description' => 'Trải nghiệm vịnh biển đẹp nhất thế giới với những hòn đảo kỳ vĩ',
                'image' => 'tour/tai-xuong.jpg',
                'is_nav' => 1,
                'is_featured' => 1,
                'is_banner' => 1,
            ],
            [
                'name' => 'Sa Pa',
                'slug' => 'sa-pa',
                'description' => 'Khám phá vùng núi cao với ruộng bậc thang và văn hóa dân tộc',
                'image' => 'tour/tai-xuong.jpg',
                'is_nav' => 1,
                'is_featured' => 0,
                'is_banner' => 1,
            ],
            [
                'name' => 'Hà Giang',
                'slug' => 'ha-giang',
                'description' => 'Hành trình đến cực Bắc với những con đường đèo hiểm trở',
                'image' => 'tour/tai-xuong.jpg',
                'is_nav' => 1,
                'is_featured' => 0,
                'is_banner' => 1,
            ],
            [
                'name' => 'Miền Trung',
                'slug' => 'mien-trung',
                'description' => 'Khám phá vùng đất miền Trung với những di tích lịch sử',
                'image' => 'tour/tai-xuong.jpg',
                'is_nav' => 1,
                'is_featured' => 0,
                'is_banner' => 1,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}