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
                'image' => 'images/categories/ninh-binh.jpg',
                'banner' => 'images/categories/ninh-binh-banner.jpg',
                'meta' => 'Du lịch Ninh Bình - Cố đô Hoa Lư, Tràng An, Tam Cốc',
                'order' => 1,
                'is_nav' => 1,
                'is_featured' => 1,
                'is_banner' => 1,
            ],
            [
                'name' => 'Hạ Long',
                'slug' => 'ha-long',
                'description' => 'Trải nghiệm vịnh biển đẹp nhất thế giới với những hòn đảo kỳ vĩ',
                'image' => 'images/categories/ha-long.jpg',
                'banner' => 'images/categories/ha-long-banner.jpg',
                'meta' => 'Du lịch Hạ Long - Vịnh di sản thế giới UNESCO',
                'order' => 2,
                'is_nav' => 1,
                'is_featured' => 1,
                'is_banner' => 1,
            ],
            [
                'name' => 'Sa Pa',
                'slug' => 'sa-pa',
                'description' => 'Khám phá vùng núi cao với ruộng bậc thang và văn hóa dân tộc',
                'image' => 'images/categories/sa-pa.jpg',
                'banner' => 'images/categories/sa-pa-banner.jpg',
                'meta' => 'Du lịch Sa Pa - Ruộng bậc thang và văn hóa dân tộc',
                'order' => 3,
                'is_nav' => 1,
                'is_featured' => 0,
                'is_banner' => 1,
            ],
            [
                'name' => 'Hà Giang',
                'slug' => 'ha-giang',
                'description' => 'Hành trình đến cực Bắc với những con đường đèo hiểm trở',
                'image' => 'images/categories/ha-giang.jpg',
                'banner' => 'images/categories/ha-giang-banner.jpg',
                'meta' => 'Du lịch Hà Giang - Cực Bắc Việt Nam, đèo Mã Pí Lèng',
                'order' => 4,
                'is_nav' => 1,
                'is_featured' => 0,
                'is_banner' => 1,
            ],
            [
                'name' => 'Miền Trung',
                'slug' => 'mien-trung',
                'description' => 'Khám phá vùng đất miền Trung với những di tích lịch sử',
                'image' => 'images/categories/mien-trung.jpg',
                'banner' => 'images/categories/mien-trung-banner.jpg',
                'meta' => 'Du lịch Miền Trung - Huế, Hội An, Đà Nẵng',
                'order' => 5,
                'is_nav' => 1,
                'is_featured' => 0,
                'is_banner' => 1,
            ],
            [
                'name' => 'Tây Bắc',
                'slug' => 'tay-bac',
                'description' => 'Khám phá vùng Tây Bắc với những cảnh đẹp hoang sơ',
                'image' => 'images/categories/tay-bac.jpg',
                'banner' => 'images/categories/tay-bac-banner.jpg',
                'meta' => 'Du lịch Tây Bắc - Mù Cang Chải, Yên Bái',
                'order' => 6,
                'is_nav' => 1,
                'is_featured' => 0,
                'is_banner' => 0,
            ],
            [
                'name' => 'Miền Nam',
                'slug' => 'mien-nam',
                'description' => 'Trải nghiệm vùng đất miền Nam với sông nước miệt vườn',
                'image' => 'images/categories/mien-nam.jpg',
                'banner' => 'images/categories/mien-nam-banner.jpg',
                'meta' => 'Du lịch Miền Nam - Sài Gòn, Mekong Delta',
                'order' => 7,
                'is_nav' => 1,
                'is_featured' => 0,
                'is_banner' => 0,
            ],
            [
                'name' => 'Du lịch Quốc tế',
                'slug' => 'du-lich-quoc-te',
                'description' => 'Khám phá những điểm đến quốc tế hấp dẫn',
                'image' => 'images/categories/quoc-te.jpg',
                'banner' => 'images/categories/quoc-te-banner.jpg',
                'meta' => 'Du lịch Quốc tế - Thái Lan, Singapore, Malaysia',
                'order' => 8,
                'is_nav' => 1,
                'is_featured' => 0,
                'is_banner' => 0,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}