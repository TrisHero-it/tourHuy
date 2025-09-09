@extends('client.layout.app')

@section('title', $tour->name . ' - Du lịch Thế Sinh')

@section('content')
<main id="main" class="">
    <div class="shop-container">
        <div class="container">
            <div class="woocommerce-notices-wrapper"></div>
        </div>
        
        <div id="product-{{ $tour->id }}" class="product type-product status-publish instock product_cat-{{ $category->slug }} has-post-thumbnail sale shipping-taxable product-type-simple">
            <div class="custom-product-page ux-layout-1521 ux-layout-scope-global">
                
                <section class="section" id="section_1798940098">
                    <div class="section-bg fill"></div>
                    <div class="section-content relative">
                        <div class="row" id="row-1709981266">
                            <div id="col-625647073" class="col small-12 large-12">
                                <div class="col-inner">
                                    
                                    <!-- Breadcrumb -->
                                    <div class="product-breadcrumb-container is-small">
                                        <nav class="rank-math-breadcrumb breadcrumbs uppercase">
                                            <p>
                                                <a href="{{ url('/') }}">The Sinh Tourist</a>
                                                <span class="separator"> / </span>
                                                <a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                                                @if($tour->categoryChild)
                                                    <span class="separator"> / </span>
                                                    <a href="{{ route('category.child.show', [$category->slug, $tour->categoryChild->slug]) }}">{{ $tour->categoryChild->name }}</a>
                                                @endif
                                                <span class="separator"> / </span>
                                                <span class="last">{{ $tour->name }}</span>
                                            </p>
                                        </nav>
                                    </div>

                                    <div id="gap-466773964" class="gap-element clearfix" style="display:block; height:auto;">
                                        <style>#gap-466773964 { padding-top: 10px; }</style>
                                    </div>
                                    
                                    <!-- Product Title -->
                                    <div class="product-title-container is-large">
                                        <h1 class="product-title product_title entry-title">{{ $tour->name }}</h1>
                                    </div>

                                    <!-- Rating -->
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating star-rating--inline" role="img" aria-label="Được xếp hạng 5.00 5 sao">
                                            <span style="width:100%">
                                                <strong class="rating">5.00</strong> trên 5 dựa trên <span class="rating">1</span> đánh giá
                                            </span>
                                        </div>
                                        <a href="#reviews" class="woocommerce-review-link" rel="nofollow">
                                            (<span class="count">1</span> đánh giá của khách hàng)
                                        </a>
                                    </div>

                                    <div id="gap-241161837" class="gap-element clearfix" style="display:block; height:auto;">
                                        <style>#gap-241161837 { padding-top: 10px; }</style>
                                    </div>

                                    <!-- Gallery -->
                                    <style>
                                        .dlts-gallery-wrapper {
                                            margin-left: -5px !important;
                                            margin-right: -5px !important;
                                            display: grid;
                                            grid-template-columns: 2fr 1fr;
                                            gap: 5px;
                                            border-radius: 10px;
                                            overflow: hidden;
                                            position: relative;
                                        }
                                        .dlts-gallery-wrapper a img {
                                            width: 100%;
                                            height: 100%;
                                            object-fit: cover;
                                            display: block;
                                        }
                                        .dlts-gallery-sub {
                                            display: flex;
                                            flex-direction: column;
                                            gap: 5px;
                                        }
                                        .dlts-gallery-sub a {
                                            flex: 1;
                                        }
                                        .dlts-gallery-readmore {
                                            position: absolute;
                                            bottom: 10px;
                                            right: 10px;
                                            background: white;
                                            padding: 6px 14px;
                                            border-radius: 999px;
                                            font-weight: 600;
                                            font-size: 14px;
                                            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                                            z-index: 10;
                                            cursor: pointer;
                                            transition: 0.2s;
                                        }
                                        .dlts-gallery-readmore:hover {
                                            background: #f1f1f1;
                                        }
                                        @media (max-width: 768px) {
                                            .dlts-gallery-wrapper {
                                                display: block;
                                            }
                                            .dlts-gallery-sub {
                                                flex-direction: row;
                                                gap: 5px;
                                                margin-top: 5px;
                                            }
                                            .dlts-gallery-sub a {
                                                width: 50%;
                                                height: auto;
                                            }
                                            .dlts-gallery-sub img {
                                                height: auto;
                                            }
                                        }
                                    </style>

                                    <div class="dlts-gallery-wrapper gallery">
                                        <div class="dlts-gallery-main">
                                            <a href="{{ $tour->image ? asset($tour->image) : 'https://dulichthesinh.vn/wp-content/uploads/2506_anh-1.jpg' }}" class="baguetteBox-trigger">
                                                <img src="{{ $tour->image ? asset($tour->image) : 'https://dulichthesinh.vn/wp-content/uploads/2506_anh-1.jpg' }}" alt="{{ $tour->name }}" width="974" height="779" loading="lazy" fetchpriority="low">
                                            </a>
                                        </div>
                                        <div class="dlts-gallery-sub">
                                            <a href="https://dulichthesinh.vn/wp-content/uploads/2506_nb4-1024x576.jpeg" class="baguetteBox-trigger">
                                                <img src="https://dulichthesinh.vn/wp-content/uploads/2506_nb4-1024x576.jpeg" alt="Sub Image 1" width="1024" height="576" loading="lazy" fetchpriority="low">
                                            </a>
                                            <a href="https://dulichthesinh.vn/wp-content/uploads/2506_n3.jpg" class="baguetteBox-trigger">
                                                <img src="https://dulichthesinh.vn/wp-content/uploads/2506_n3.jpg" alt="Sub Image 2" width="720" height="453" loading="lazy" fetchpriority="low">
                                            </a>
                                        </div>
                                        <div class="dlts-gallery-readmore" onclick="document.querySelector('.dlts-gallery-wrapper a.baguetteBox-trigger').click()">Xem thêm hình</div>
                                    </div>

                                    <!-- Hidden gallery for preload -->
                                    <div class="gallery" style="display:none">
                                        <a href="https://dulichthesinh.vn/wp-content/uploads/2504_680ef10220506.webp" class="baguetteBox-trigger"></a>
                                        <a href="https://dulichthesinh.vn/wp-content/uploads/2504_680ef1061cf4b.webp" class="baguetteBox-trigger"></a>
                                    </div>

                                </div>
                                <style>#col-625647073 > .col-inner { padding: 20px 0px 0px 0px; }</style>
                            </div>
                        </div>
                    </div>
                    <style>#section_1798940098 { padding-top: 0px; padding-bottom: 0px; }</style>
                </section>

                <!-- Product Info Section -->
                <section class="section" id="section_420521782">
                    <div class="section-bg fill"></div>
                    <div class="section-content relative">
                        <div class="row" id="row-2019871826">
                            <div id="col-189991246" class="col medium-8 small-12 large-8">
                                <div class="col-inner">
                                    
                                    <!-- Tour Description -->
                                    <div class="custom-full-description">
                                        @if($tour->description)
                                            {!! $tour->description !!}
                                        @else
                                            <p style="text-align: center"><span style="font-size: 110%;color: #ff6600"><strong>KÍNH CHÀO QUÝ KHÁCH ĐÃ ĐẾN CÔNG TY </strong></span></p>
                                            <p style="text-align: center"><span style="font-size: 110%;color: #ff6600"><strong>DU LỊCH THE SINH TOURIST 22 BÁT ĐÀN – HOÀN KIẾM – HÀ NỘI</strong></span></p>
                                        @endif
                                        
                                        {{-- <!-- Tour Highlights -->
                                        <p style="text-align: center"><span style="color: #ff6600"><strong>CHUYẾN ĐI SẼ GIÚP BẠN KHÁM PHÁ CÁC ĐIỂM ĐẸP SAU</strong></span></p>
                                        
                                        <!-- Highlights Grid -->
                                        <div class="row" id="row-526454788">
                                            <div id="col-480945136" class="col medium-6 small-12 large-6">
                                                <div class="col-inner">
                                                    <div class="box has-hover has-hover box-text-bottom">
                                                        <div class="box-image">
                                                            <div class="image-cover" style="padding-top:75%;">
                                                                <img decoding="async" width="870" height="489" src="https://dulichthesinh.vn/wp-content/uploads/2506_nb2.webp" class="attachment- size-" alt="" srcset="https://dulichthesinh.vn/wp-content/uploads/2506_nb2.webp 870w, https://dulichthesinh.vn/wp-content/uploads/2506_nb2-600x337.webp 600w, https://dulichthesinh.vn/wp-content/uploads/2506_nb2-300x169.webp 300w" sizes="(max-width: 870px) 100vw, 870px" loading="eager" fetchpriority="high"/>
                                                            </div>
                                                        </div>
                                                        <div class="box-text text-center">
                                                            <div class="box-text-inner">
                                                                <p style="text-align: center"><span style="color: #ff6600">CỐ ĐÔ HOA LƯ</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div id="col-1159978302" class="col medium-6 small-12 large-6">
                                                <div class="col-inner">
                                                    <div class="box has-hover has-hover box-text-bottom">
                                                        <div class="box-image">
                                                            <div class="image-cover" style="padding-top:75%;">
                                                                <img decoding="async" width="800" height="500" src="https://dulichthesinh.vn/wp-content/uploads/2506_nb6.jpg" class="attachment- size-" alt="" srcset="https://dulichthesinh.vn/wp-content/uploads/2506_nb6.jpg 800w, https://dulichthesinh.vn/wp-content/uploads/2506_nb6-600x375.jpg 600w, https://dulichthesinh.vn/wp-content/uploads/2506_nb6-300x188.jpg 300w" sizes="(max-width: 800px) 100vw, 800px" loading="eager" fetchpriority="high"/>
                                                            </div>
                                                        </div>
                                                        <div class="box-text text-center">
                                                            <div class="box-text-inner">
                                                                <p style="text-align: center"><span style="color: #ff6600">ĐỀN THỜ VUA ĐINH – VUA LÊ</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        
                                        <!-- Tour Details -->
                                        {{-- @if($tour->duration || $tour->schedule)
                                            <p><span style="font-size: 110%;color: #000080"><em>Dưới đây là chương trình <strong>{{ $tour->name }}</strong>, một hành trình kinh điển và phù hợp cho du khách lần đầu đến với {{ $category->name }}. Tour kết hợp hài hòa giữa <strong>giá trị văn hóa – lịch sử</strong> và <strong>vẻ đẹp thiên nhiên non nước hữu tình</strong>, lý tưởng cho <strong>du khách mọi lứa tuổi</strong>.</em></span></p>
                                            
                                            @if($tour->duration)
                                                <p style="text-align: center"><span style="font-size: 110%;color: #ff6600"><strong>⏱ Thời gian: {{ $tour->duration }}</strong></span></p>
                                            @endif
                                            
                                            @if($tour->schedule)
                                                <p><span style="font-size: 110%;color: #000080"><strong>✅ LỊCH TRÌNH CHI TIẾT:</strong></span></p>
                                                <p><span style="font-size: 110%;color: #000080">{{ $tour->schedule }}</span></p>
                                            @endif
                                        @endif --}}
                                        
                                        <!-- Price Information -->
                                        {{-- <p><span style="font-size: 110%;color: #ff6600"><strong>🎁 GIÁ TOUR BAO GỒM:</strong></span></p>
                                        <ul>
                                            <li><span style="font-size: 110%;color: #000080">Xe du lịch đời mới điều hòa đưa đón theo chương trình</span></li>
                                            <li><span style="font-size: 110%;color: #000080">Vé tham quan các điểm du lịch</span></li>
                                            <li><span style="font-size: 110%;color: #000080">Ăn trưa buffet tại nhà hàng</span></li>
                                            <li><span style="font-size: 110%;color: #000080">Hướng dẫn viên chuyên nghiệp</span></li>
                                            <li><span style="font-size: 110%;color: #000080">Nước uống, bảo hiểm du lịch</span></li>
                                        </ul>
                                        
                                        <!-- Booking Information -->
                                        <div class="text custom-huong-dan-dat-tour">
                                            <p><strong style="color: #000080;">✅ </strong><span style="color: #ff6600;"><strong>PHƯƠNG THỨC ĐĂNG KÝ ĐẶT TOUR</strong></span></p>
                                            <div>
                                                <p><span style="color: #000080;"><strong>1.Khách hàng ở Hà Nội</strong> :Công ty sẽ có nhân viên trực tiếp đến tận nơi tư vấn đưa lịch trình chi tiết và làm thủ tục đăng ký , giao vé trực tiếp cho Qúy khách.</span></p>
                                                <p><span style="color: #000080;"><strong>2. Khách hàng đến trực tiếp công ty</strong> : Địa chỉ văn phòng tại: 22 Bát Đàn – Hoàn Kiếm – Hà Nội . Tư vấn lịch trình chi tiết & thanh toán trực tiếp (tiền mặt/chuyển khoản) . Nhận vé xác nhận & lịch trình chính thức.</span></p>
                                                <p><span style="color: #000080;"><strong>3.Khách hàng ở xa</strong> : (không ở Hà Nội hoặc không thể đến trực tiếp văn phòng) : Công ty sẽ hỗ trợ tư vấn Miễn phí và đặt vé Online , Có vé xác nhận điện tử – VÉ XÁC NHẬN CÓ DẤU ĐỎ CỦA CÔNG TY – đảm bảo đầy đủ cho Qúy khách hàng.Trước ngày khởi hành Nhân viên của công ty sẽ liên hệ nhắc lịch khách đi tour lần nữa.</span></p>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            
                            <div id="col-189991247" class="col medium-4 small-12 large-4">
                                <div class="col-inner">
                                    <!-- Price and Booking Card -->
                                    <div class="product-summary" style="background: #fff; border: 1px solid #e0e0e0; border-radius: 10px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); position: sticky; top: 20px;">
                                        
                                        <!-- Price Section -->
                                        <div class="price-wrapper" style="text-align: center; margin-bottom: 25px; padding-bottom: 20px; border-bottom: 2px solid #f0f0f0;">
                                            <div style="color: #666; font-size: 14px; margin-bottom: 8px;">Giá tour</div>
                                            <div class="price" style="font-size: 32px; font-weight: bold; color: #ff6600;">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>{{ number_format($tour->price) }}<span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                                                </span>
                                            </div>
                                            <div style="color: #666; font-size: 14px; margin-top: 5px;">/khách</div>
                                        </div>
                                        
                                        <!-- Booking Actions -->
                                        <div class="product-actions" style="margin-bottom: 25px;">
                                            <a href="tel:{{ $account->phone ?? '0849048888' }}" class="button" style="background: linear-gradient(135deg, #ff6600, #ff8533); color: white; padding: 15px 30px; border-radius: 8px; text-decoration: none; display: block; text-align: center; font-weight: bold; font-size: 16px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(255, 102, 0, 0.3);">
                                                <i class="fas fa-phone" style="margin-right: 8px;"></i> Đặt tour ngay
                                            </a>
                                        </div>
                                        
                                        <!-- Tour Info -->
                                        <div class="tour-info" style="margin-bottom: 25px;">
                                            @if($tour->duration)
                                                <div style="display: flex; align-items: center; margin-bottom: 12px; padding: 10px; background: #f8f9fa; border-radius: 6px;">
                                                    <i class="fas fa-calendar-alt" style="color: #ff6600; margin-right: 10px; width: 20px;"></i>
                                                    <div>
                                                        <div style="font-weight: bold; color: #333;">Thời gian</div>
                                                        <div style="color: #666; font-size: 14px;">{{ $tour->duration }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            
                                            @if($tour->schedule)
                                                <div style="display: flex; align-items: center; margin-bottom: 12px; padding: 10px; background: #f8f9fa; border-radius: 6px;">
                                                    <i class="far fa-clock" style="color: #ff6600; margin-right: 10px; width: 20px;"></i>
                                                    <div>
                                                        <div style="font-weight: bold; color: #333;">Lịch trình</div>
                                                        <div style="color: #666; font-size: 14px;">{{ Str::limit($tour->schedule, 50) }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <!-- Contact Info -->
                                        <div class="contact-info" style="background: #f8f9fa; padding: 20px; border-radius: 8px; border-left: 4px solid #ff6600;">
                                            <h4 style="color: #333; margin-bottom: 15px; font-size: 18px; text-align: center;">Thông tin liên hệ</h4>
                                            
                                            @if($account)
                                                <div style="display: flex; align-items: center; margin-bottom: 12px;">
                                                    <i class="fas fa-phone" style="color: #ff6600; margin-right: 10px; width: 20px;"></i>
                                                    <div>
                                                        <div style="font-weight: bold; color: #333;">Hotline</div>
                                                        <div style="color: #666; font-size: 14px;">{{ $account->phone ?? '0849048888' }}</div>
                                                    </div>
                                                </div>
                                                
                                                <div style="display: flex; align-items: center; margin-bottom: 12px;">
                                                    <i class="fas fa-envelope" style="color: #ff6600; margin-right: 10px; width: 20px;"></i>
                                                    <div>
                                                        <div style="font-weight: bold; color: #333;">Email</div>
                                                        <div style="color: #666; font-size: 14px;">{{ $account->email ?? 'info@dulichthesinh.vn' }}</div>
                                                    </div>
                                                </div>
                                                
                                                <div style="display: flex; align-items: center;">
                                                    <i class="fas fa-map-marker-alt" style="color: #ff6600; margin-right: 10px; width: 20px;"></i>
                                                    <div>
                                                        <div style="font-weight: bold; color: #333;">Địa chỉ</div>
                                                        <div style="color: #666; font-size: 14px;">{{ $account->address ?? '22 Bát Đàn - Hoàn Kiếm - Hà Nội' }}</div>
                                                    </div>
                                                </div>
                                            @else
                                                <div style="display: flex; align-items: center; margin-bottom: 12px;">
                                                    <i class="fas fa-phone" style="color: #ff6600; margin-right: 10px; width: 20px;"></i>
                                                    <div>
                                                        <div style="font-weight: bold; color: #333;">Hotline</div>
                                                        <div style="color: #666; font-size: 14px;">0849048888</div>
                                                    </div>
                                                </div>
                                                
                                                <div style="display: flex; align-items: center; margin-bottom: 12px;">
                                                    <i class="fas fa-envelope" style="color: #ff6600; margin-right: 10px; width: 20px;"></i>
                                                    <div>
                                                        <div style="font-weight: bold; color: #333;">Email</div>
                                                        <div style="color: #666; font-size: 14px;">info@dulichthesinh.vn</div>
                                                    </div>
                                                </div>
                                                
                                                <div style="display: flex; align-items: center;">
                                                    <i class="fas fa-map-marker-alt" style="color: #ff6600; margin-right: 10px; width: 20px;"></i>
                                                    <div>
                                                        <div style="font-weight: bold; color: #333;">Địa chỉ</div>
                                                        <div style="color: #666; font-size: 14px;">22 Bát Đàn - Hoàn Kiếm - Hà Nội</div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <!-- Special Offers -->
                                        <div class="special-offers" style="margin-top: 20px; padding: 15px; background: linear-gradient(135deg, #ff6600, #ff8533); color: white; border-radius: 8px; text-align: center;">
                                            <div style="font-weight: bold; margin-bottom: 8px;">🎁 Ưu đãi đặc biệt</div>
                                            <div style="font-size: 14px; line-height: 1.4;">
                                                • Nhóm từ 5 người: giảm 50.000đ/người<br>
                                                • Đặt sớm >7 ngày: giảm thêm 50.000đ/người<br>
                                                • Khách cũ: giảm 3-5% giá tour
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</main>
@endsection