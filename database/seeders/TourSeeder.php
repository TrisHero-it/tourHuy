<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tours = [
            // Ninh Bình 1 Ngày
            [
                'name' => 'CỐ ĐÔ HOA LƯ - TRÀNG AN 1 NGÀY',
                'slug' => 'co-do-hoa-lu-trang-an-1-ngay',
                'description' => 'Khám phá cố đô Hoa Lư và Tràng An - di sản thế giới với cảnh quan thiên nhiên tuyệt đẹp',
                'price' => 700000,
                'image' => 'tour/tai-xuong.jpg',
                'duration' => '1 ngày',
                'schedule' => 'Khởi hành hàng ngày lúc 7:00',
                'status' => 'active',
                'category_id' => 1,
                'category_child_id' => 1,
            ],
            [
                'name' => 'CHÙA BÁI ĐÍNH - TRÀNG AN 1 NGÀY',
                'slug' => 'chua-bai-dinh-trang-an-1-ngay',
                'description' => 'Tham quan chùa Bái Đính - ngôi chùa lớn nhất Đông Nam Á và Tràng An',
                'price' => 750000,
                'image' => 'tour/tai-xuong.jpg',
                'duration' => '1 ngày',
                'schedule' => 'Khởi hành hàng ngày lúc 7:30',
                'status' => 'active',
                'category_id' => 1,
                'category_child_id' => 1,
            ],
            [
                'name' => 'TAM CỐC - BÍCH ĐỘNG 1 NGÀY',
                'slug' => 'tam-coc-bich-dong-1-ngay',
                'description' => 'Du thuyền Tam Cốc và tham quan động Bích Động',
                'price' => 650000,
                'image' => 'tour/tai-xuong.jpg',
                'duration' => '1 ngày',
                'schedule' => 'Khởi hành hàng ngày lúc 8:00',
                'status' => 'active',
                'category_id' => 1,
                'category_child_id' => 1,
            ],

            // Ninh Bình 2 Ngày 1 Đêm
            [
                'name' => 'NINH BÌNH TRỌN GÓI 2 NGÀY 1 ĐÊM',
                'slug' => 'ninh-binh-tron-goi-2-ngay-1-dem',
                'description' => 'Tour trọn gói Ninh Bình bao gồm tất cả điểm tham quan nổi tiếng',
                'price' => 1200000,
                'image' => 'tour/tai-xuong.jpg',
                'duration' => '2 ngày 1 đêm',
                'schedule' => 'Khởi hành thứ 7 hàng tuần',
                'status' => 'active',
                'category_id' => 1,
                'category_child_id' => 2,
            ],

            // Hạ Long 1 Ngày
            [
                'name' => 'VỊNH HẠ LONG 1 NGÀY - DU THUYỀN CATAMARAN',
                'slug' => 'vinh-ha-long-1-ngay-du-thuyen-catamaran',
                'description' => 'Khám phá vịnh Hạ Long trên du thuyền Catamaran sang trọng',
                'price' => 850000,
                'image' => 'tour/tai-xuong.jpg',
                'duration' => '1 ngày',
                'schedule' => 'Khởi hành hàng ngày lúc 8:00',
                'status' => 'active',
                'category_id' => 2,
                'category_child_id' => 4,
            ],
            [
                'name' => 'VỊNH HẠ LONG - HANG SỬNG SỐT',
                'slug' => 'vinh-ha-long-hang-sung-sot',
                'description' => 'Tham quan hang Sửng Sốt và đảo Titop',
                'price' => 750000,
                'image' => 'tour/tai-xuong.jpg',
                'duration' => '1 ngày',
                'schedule' => 'Khởi hành hàng ngày lúc 7:30',
                'status' => 'active',
                'category_id' => 2,
                'category_child_id' => 4,
            ],

            // Hạ Long 2 Ngày 1 Đêm
            [
                'name' => 'HẠ LONG OVERNIGHT CRUISE 2 NGÀY 1 ĐÊM',
                'slug' => 'ha-long-overnight-cruise-2-ngay-1-dem',
                'description' => 'Nghỉ đêm trên du thuyền sang trọng tại vịnh Hạ Long',
                'price' => 1500000,
                'image' => 'tour/tai-xuong.jpg',
                'duration' => '2 ngày 1 đêm',
                'schedule' => 'Khởi hành thứ 6 hàng tuần',
                'status' => 'active',
                'category_id' => 2,
                'category_child_id' => 5,
            ],

            // Sa Pa 2 Ngày 1 Đêm
            [
                'name' => 'SA PA - FANSIPAN 2 NGÀY 1 ĐÊM',
                'slug' => 'sapa-fansipan-2-ngay-1-dem',
                'description' => 'Chinh phục đỉnh Fansipan và khám phá Sa Pa',
                'price' => 1800000,
                'image' => 'tour/tai-xuong.jpg',
                'duration' => '2 ngày 1 đêm',
                'schedule' => 'Khởi hành thứ 7 hàng tuần',
                'status' => 'active',
                'category_id' => 3,
                'category_child_id' => 7,
            ],
            [
                'name' => 'SA PA - RUỘNG BẬC THANG 2 NGÀY 1 ĐÊM',
                'slug' => 'sapa-ruong-bac-thang-2-ngay-1-dem',
                'description' => 'Khám phá ruộng bậc thang và văn hóa dân tộc tại Sa Pa',
                'price' => 1600000,
                'image' => 'tour/tai-xuong.jpg',
                'duration' => '2 ngày 1 đêm',
                'schedule' => 'Khởi hành thứ 7 hàng tuần',
                'status' => 'active',
                'category_id' => 3,
                'category_child_id' => 7,
            ],

            // Hà Giang 3 Ngày 2 Đêm
            [
                'name' => 'HÀ GIANG - CỰC BẮC 3 NGÀY 2 ĐÊM',
                'slug' => 'ha-giang-cuc-bac-3-ngay-2-dem',
                'description' => 'Hành trình đến cực Bắc với những con đường đèo hiểm trở',
                'price' => 2200000,
                'image' => 'tour/tai-xuong.jpg',
                'duration' => '3 ngày 2 đêm',
                'schedule' => 'Khởi hành thứ 6 hàng tuần',
                'status' => 'active',
                'category_id' => 4,
                'category_child_id' => 9,
            ],

            // Miền Trung
            [
                'name' => 'HUẾ - ĐÀ NẴNG - HỘI AN 4 NGÀY 3 ĐÊM',
                'slug' => 'hue-da-nang-hoi-an-4-ngay-3-dem',
                'description' => 'Khám phá miền Trung với những di tích lịch sử và phố cổ',
                'price' => 2800000,
                'image' => 'tour/tai-xuong.jpg',
                'duration' => '4 ngày 3 đêm',
                'schedule' => 'Khởi hành thứ 5 hàng tuần',
                'status' => 'active',
                'category_id' => 5,
                'category_child_id' => 11,
            ],
        ];

        foreach ($tours as $tourData) {
            Tour::create($tourData);
        }
    }
}