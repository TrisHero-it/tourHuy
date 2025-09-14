<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'Top 10 điểm đến du lịch Việt Nam không thể bỏ qua',
                'slug' => 'top-10-diem-den-du-lich-viet-nam',
                'content' => '<p>Việt Nam là một đất nước có vẻ đẹp thiên nhiên tuyệt vời và văn hóa đa dạng. Dưới đây là top 10 điểm đến du lịch Việt Nam mà bạn không thể bỏ qua:</p>
                <h3>1. Vịnh Hạ Long</h3>
                <p>Vịnh Hạ Long là một trong những kỳ quan thiên nhiên thế giới, với hàng nghìn hòn đảo đá vôi kỳ vĩ.</p>
                <h3>2. Ninh Bình</h3>
                <p>Vùng đất cố đô với những danh lam thắng cảnh như Tràng An, Tam Cốc, Bích Động.</p>
                <h3>3. Sa Pa</h3>
                <p>Thị trấn miền núi với ruộng bậc thang tuyệt đẹp và văn hóa dân tộc đa dạng.</p>',
                'image' => 'images/blogs/blog-1.jpg',
                'meta' => 'Top 10 điểm đến du lịch Việt Nam, vịnh Hạ Long, Ninh Bình, Sa Pa',
                'status' => 'active',
            ],
            [
                'title' => 'Kinh nghiệm du lịch Ninh Bình 3 ngày 2 đêm',
                'slug' => 'kinh-nghiem-du-lich-ninh-binh-3-ngay-2-dem',
                'content' => '<p>Ninh Bình là một điểm đến lý tưởng cho những ai muốn khám phá vẻ đẹp thiên nhiên và lịch sử Việt Nam. Dưới đây là kinh nghiệm du lịch Ninh Bình 3 ngày 2 đêm:</p>
                <h3>Ngày 1: Tràng An - Tam Cốc</h3>
                <p>Bắt đầu hành trình tại Tràng An, di sản thế giới UNESCO với hệ thống hang động và đền chùa cổ kính.</p>
                <h3>Ngày 2: Bích Động - Hoa Lư</h3>
                <p>Khám phá Bích Động với 3 ngôi chùa trên núi và tham quan cố đô Hoa Lư.</p>
                <h3>Ngày 3: Vườn Quốc gia Cúc Phương</h3>
                <p>Trải nghiệm thiên nhiên hoang dã tại vườn quốc gia đầu tiên của Việt Nam.</p>',
                'image' => 'images/blogs/blog-2.jpg',
                'meta' => 'Kinh nghiệm du lịch Ninh Bình, Tràng An, Tam Cốc, Bích Động',
                'status' => 'active',
            ],
            [
                'title' => 'Hướng dẫn du lịch Hạ Long chi tiết từ A-Z',
                'slug' => 'huong-dan-du-lich-ha-long-chi-tiet',
                'content' => '<p>Vịnh Hạ Long là điểm đến du lịch nổi tiếng nhất Việt Nam. Dưới đây là hướng dẫn chi tiết để bạn có chuyến du lịch Hạ Long hoàn hảo:</p>
                <h3>Thời gian tốt nhất để đi</h3>
                <p>Tháng 10-12 và tháng 3-5 là thời gian lý tưởng nhất với thời tiết mát mẻ, ít mưa.</p>
                <h3>Phương tiện di chuyển</h3>
                <p>Từ Hà Nội, bạn có thể đi xe khách, tàu hỏa hoặc thuê xe riêng đến Hạ Long.</p>
                <h3>Hoạt động không thể bỏ qua</h3>
                <p>Du thuyền vịnh, tham quan hang động, chèo kayak, leo núi Bài Thơ.</p>',
                'image' => 'images/blogs/blog-3.jpg',
                'meta' => 'Hướng dẫn du lịch Hạ Long, vịnh Hạ Long, du thuyền, hang động',
                'status' => 'active',
            ],
        ];

        foreach ($blogs as $blogData) {
            Blog::create($blogData);
        }
    }
}
