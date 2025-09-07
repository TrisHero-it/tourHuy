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
                                                    <a href="{{ route('tour.or.category-child', [$category->slug, $tour->categoryChild->slug]) }}">{{ $tour->categoryChild->name }}</a>
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
                                            <a href="{{ $tour->image ? asset('storage/' . $tour->image) : 'https://dulichthesinh.vn/wp-content/uploads/2506_anh-1.jpg' }}" class="baguetteBox-trigger">
                                                <img src="{{ $tour->image ? asset('storage/' . $tour->image) : 'https://dulichthesinh.vn/wp-content/uploads/2506_anh-1.jpg' }}" alt="{{ $tour->name }}" width="974" height="779" loading="lazy" fetchpriority="low">
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
                        <div class="row">
                            <div class="col small-12 large-8">
                                <div class="col-inner">
                                    <!-- Product Description -->
                                    @if($tour->description)
                                        <div class="product-description">
                                            <h3>Mô tả tour</h3>
                                            <p>{{ $tour->description }}</p>
                                        </div>
                                    @endif

                                    <!-- Tour Details -->
                                    <div class="tour-details">
                                        @if($tour->duration)
                                            <div class="tour-detail-item">
                                                <i class="fas fa-calendar-alt"></i>
                                                <strong>Thời gian:</strong> {{ $tour->duration }}
                                            </div>
                                        @endif
                                        
                                        @if($tour->schedule)
                                            <div class="tour-detail-item">
                                                <i class="far fa-clock"></i>
                                                <strong>Lịch trình:</strong> {{ $tour->schedule }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col small-12 large-4">
                                <div class="col-inner">
                                    <!-- Price and Booking -->
                                    <div class="product-summary">
                                        <div class="price-wrapper">
                                            <span class="price">
                                                <span class="price-prefix">Giá chỉ </span>
                                                <ins aria-hidden="true">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>{{ number_format($tour->price) }}<span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                                                    </span>
                                                </ins> 
                                                <span class="price-suffix">/khách</span>
                                            </span>
                                        </div>
                                        
                                        <div class="product-actions">
                                            <a href="tel:0849048888" class="button btn-tour">
                                                <i class="fas fa-phone"></i> Đặt tour ngay
                                            </a>
                                        </div>
                                        
                                        <!-- Contact Info -->
                                        <div class="contact-info">
                                            <h4>Thông tin liên hệ</h4>
                                            <p><i class="fas fa-phone"></i> Hotline: 0849048888</p>
                                            <p><i class="fas fa-envelope"></i> Email: info@dulichthesinh.vn</p>
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