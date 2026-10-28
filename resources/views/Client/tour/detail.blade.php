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
                                                <a href="{{ url('/') }}">Sinh Travel</a>
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
                                        <style>
                                            #gap-466773964 {
                                                padding-top: 10px;
                                            }
                                        </style>
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
                                        <style>
                                            #gap-241161837 {
                                                padding-top: 10px;
                                            }
                                        </style>
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
                                            @php($firstImage = is_array($tour->image) ? ($tour->image[0] ?? null) : $tour->image)
                                            @if($firstImage)
                                            <a href="{{ asset($firstImage) }}" class="baguetteBox-trigger">
                                                <img src="{{ asset($firstImage) }}" alt="{{ $tour->name }}" width="974" height="779" loading="lazy" fetchpriority="low">
                                            </a>
                                            @endif
                                        </div>
                                        <div class="dlts-gallery-sub">
                                            @if(is_array($tour->image) && count($tour->image) > 1)
                                            @for($i = 1; $i < min(3, count($tour->image)); $i++)
                                                <a href="{{ asset($tour->image[$i]) }}" class="baguetteBox-trigger">
                                                    <img src="{{ asset($tour->image[$i]) }}" alt="Sub Image {{ $i }}" width="1024" height="576" loading="lazy" fetchpriority="low">
                                                </a>
                                                @endfor
                                                @endif
                                        </div>
                                        <div class="dlts-gallery-readmore" onclick="document.querySelector('.dlts-gallery-wrapper a.baguetteBox-trigger').click()">Xem thêm hình</div>
                                    </div>

                                    <!-- Hidden gallery for preload -->
                                    <div class="gallery" style="display:none">
                                        @if(is_array($tour->image) && count($tour->image) > 3)
                                        @for($i = 3; $i < count($tour->image); $i++)
                                            <a href="{{ asset($tour->image[$i]) }}" class="baguetteBox-trigger"></a>
                                            @endfor
                                            @endif
                                    </div>

                                </div>
                                <style>
                                    #col-625647073>.col-inner {
                                        padding: 20px 0px 0px 0px;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                    <style>
                        #section_1798940098 {
                            padding-top: 0px;
                            padding-bottom: 0px;
                        }
                    </style>
                </section>

                <!-- Product Info Section -->
                <section class="section" id="section_420521782">
                    <div class="section-bg fill"></div>
                    <div class="section-content relative">
                        <div class="row" id="row-2019871826">
                            <div id="col-189991246" class="col medium-8 small-12 large-8">
                                <div class="col-inner">

                                    <!-- Tour Description -->
                                    @php($ttIntro = trim((string) $tour->description))
                                    @php($ttTabs = [
                                        ['key' => 'gioi-thieu', 'label' => 'Giới thiệu', 'icon' => 'fas fa-info-circle', 'content' => $ttIntro],
                                        ['key' => 'lich-trinh', 'label' => 'Lịch trình', 'icon' => 'fas fa-route', 'content' => trim((string) $tour->itinerary)],
                                        ['key' => 'bang-gia', 'label' => 'Bảng giá', 'icon' => 'fas fa-tags', 'content' => trim((string) $tour->price_table)],
                                        ['key' => 'faq', 'label' => 'Câu hỏi thường gặp', 'icon' => 'far fa-question-circle', 'content' => trim((string) $tour->faq)],
                                    ])
                                    @php($ttTabs = array_values(array_filter($ttTabs, fn($t) => $t['content'] !== '')))

                                    <style>
                                        .tt-tabs {
                                            margin-bottom: 24px;
                                        }

                                        .tt-tabs__nav {
                                            display: flex;
                                            gap: 6px;
                                            overflow-x: auto;
                                            border-bottom: 2px solid #ececec;
                                            margin-bottom: 20px;
                                            -webkit-overflow-scrolling: touch;
                                            scrollbar-width: none;
                                        }

                                        .tt-tabs__nav::-webkit-scrollbar {
                                            display: none;
                                        }

                                        .tt-tabs__btn {
                                            flex: 0 0 auto;
                                            display: inline-flex;
                                            align-items: center;
                                            gap: 8px;
                                            padding: 12px 18px;
                                            border: 0;
                                            background: none;
                                            font-size: 15px;
                                            font-weight: 600;
                                            color: #6b7280;
                                            white-space: nowrap;
                                            cursor: pointer;
                                            border-bottom: 3px solid transparent;
                                            margin-bottom: -2px;
                                            border-radius: 8px 8px 0 0;
                                            transition: color .2s ease, background .2s ease, border-color .2s ease;
                                        }

                                        .tt-tabs__btn i {
                                            font-size: 15px;
                                        }

                                        .tt-tabs__btn:hover {
                                            color: #ff6600;
                                            background: rgba(255, 102, 0, .06);
                                        }

                                        .tt-tabs__btn.is-active {
                                            color: #ff6600;
                                            border-bottom-color: #ff6600;
                                        }

                                        .tt-tabs__panel {
                                            animation: ttTabFade .25s ease;
                                        }

                                        @keyframes ttTabFade {
                                            from {
                                                opacity: 0;
                                                transform: translateY(6px);
                                            }

                                            to {
                                                opacity: 1;
                                                transform: translateY(0);
                                            }
                                        }

                                        .tt-tabs__panel table {
                                            width: 100%;
                                            border-collapse: collapse;
                                            margin-bottom: 16px;
                                        }

                                        .tt-tabs__panel table td,
                                        .tt-tabs__panel table th {
                                            border: 1px solid #e5e7eb;
                                            padding: 10px 12px;
                                        }

                                        .tt-tabs__panel table th {
                                            background: #fcf6f2;
                                        }

                                        .tt-tabs__scroll {
                                            overflow-x: auto;
                                        }

                                        @media (max-width: 767px) {
                                            .tt-tabs__btn {
                                                padding: 11px 13px;
                                                font-size: 14px;
                                            }
                                        }
                                    </style>

                                    <div class="custom-full-description">
                                        @if(count($ttTabs))
                                        <div class="tt-tabs" id="ttTourTabs">
                                            <div class="tt-tabs__nav" role="tablist">
                                                @foreach($ttTabs as $ttTab)
                                                <button type="button" class="tt-tabs__btn {{ $loop->first ? 'is-active' : '' }}" role="tab" aria-controls="tt-panel-{{ $ttTab['key'] }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" data-tab="{{ $ttTab['key'] }}">
                                                    <i class="{{ $ttTab['icon'] }}" aria-hidden="true"></i>
                                                    <span>{{ $ttTab['label'] }}</span>
                                                </button>
                                                @endforeach
                                            </div>

                                            @foreach($ttTabs as $ttTab)
                                            <div class="tt-tabs__panel tt-tabs__scroll" id="tt-panel-{{ $ttTab['key'] }}" role="tabpanel" data-panel="{{ $ttTab['key'] }}" {{ $loop->first ? '' : 'hidden' }}>
                                                {!! $ttTab['content'] !!}
                                            </div>
                                            @endforeach
                                        </div>

                                        <script>
                                            (function() {
                                                var root = document.getElementById('ttTourTabs');
                                                if (!root) return;

                                                var buttons = root.querySelectorAll('.tt-tabs__btn');
                                                var panels = root.querySelectorAll('.tt-tabs__panel');

                                                buttons.forEach(function(btn) {
                                                    btn.addEventListener('click', function() {
                                                        var key = btn.getAttribute('data-tab');

                                                        buttons.forEach(function(b) {
                                                            var on = b === btn;
                                                            b.classList.toggle('is-active', on);
                                                            b.setAttribute('aria-selected', on ? 'true' : 'false');
                                                        });

                                                        panels.forEach(function(p) {
                                                            p.hidden = p.getAttribute('data-panel') !== key;
                                                        });
                                                    });
                                                });
                                            })();
                                        </script>
                                        @else
                                        <p style="text-align: center"><span style="font-size: 110%;color: #ff6600"><strong>KÍNH CHÀO QUÝ KHÁCH ĐÃ ĐẾN CÔNG TY </strong></span></p>
                                        <p style="text-align: center"><span style="font-size: 110%;color: #ff6600"><strong>DU LỊCH SINH TRAVEL 22 BÁT ĐÀN – HOÀN KIẾM – HÀ NỘI</strong></span></p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="col-220379884" class="col medium-4 small-12 large-4 small-col-first">
                                <div class="is-sticky-column">
                                    <div class="is-sticky-column__inner">
                                        <div class="col-inner text-left" style="background-color:rgb(252, 246, 242);">

                                            <div class="is-border" style="border-color:rgb(255, 238, 238);border-radius:16px;border-width:1px 1px 1px 1px;">
                                            </div>


                                            <div class="product-title-container is-smaller">
                                                <h1 class="product-title product_title entry-title">
                                                    {{ $tour->name }}.
                                                </h1>

                                            </div>


                                            <div class="woocommerce-product-rating">
                                                <a href="#reviews" class="woocommerce-review-link" rel="nofollow">
                                                    <div class="star-rating tooltip" role="img" aria-label="Được xếp hạng 5.00 5 sao" title="1 đánh giá của khách hàng"><span style="width:100%"><strong class="rating">5.00</strong> trên 5 dựa trên <span class="rating">1</span> đánh giá</span></div>
                                                </a>
                                            </div>

                                            <div class="is-divider divider clearfix" style="margin-top:1em;margin-bottom:1em;max-width:20%;"></div>

                                            <div class="product-price-container is-larger">
                                                <div class="price-wrapper">
                                                    <p class="price product-page-price price-on-sale">
                                                        <span class="price-prefix">Giá từ </span><ins aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi class="tt-price" data-amount-vnd="{{ $tour->price ?? '' }}" data-amount-usd="{{ $tour->price_usd ?? '' }}">≈ {{ $tour->price ? number_format((float)$tour->price, 0, ',', '.') . '₫' : ((float)$tour->price_usd . '$') }}</bdi></span></ins> <span class="price-suffix">/khách</span>
                                                    </p>
                                                </div>
                                            </div>


                                            <style>
                                                .tt-tour-wrapper {
                                                    display: grid;
                                                    grid-template-columns: 1fr;
                                                    gap: 10px;
                                                    padding: 0px;
                                                    background: none;
                                                    font-size: 15px;
                                                    color: #2d4271;
                                                    margin-top: 0px;
                                                    margin-bottom: 10px;
                                                }

                                                .tt-tour-item {
                                                    display: flex;
                                                    align-items: flex-start;
                                                    gap: 10px;
                                                    line-height: 1.6;
                                                }

                                                .tt-tour-item i.far,
                                                i.fas,
                                                i.fa {
                                                    display: inline-flex;
                                                    justify-content: center;
                                                    margin-right: 5px;
                                                    width: 16px !important;
                                                }

                                                .tt-tour-item span.label {
                                                    font-weight: 600;
                                                    white-space: nowrap;
                                                    min-width: 130px;
                                                }
                                            </style>

                                            <div class="tt-tour-wrapper">
                                                <div class="tt-tour-item">
                                                    <span class="label"><i class="far fa-calendar-alt"></i>Thời gian:</span>
                                                    <span class="value">@if ($tour->category_child_id != null)
                                                        {{ $tour->categoryChild->name }}
                                                        @else
                                                        {{ $tour->duration }}
                                                        @endif

                                                    </span>
                                                </div>
                                                <div class="tt-tour-item">
                                                    <span class="label"><i class="fas fa-plane"></i>Phương tiện:</span>
                                                    <span class="value">{{ $tour->transportation ?: 'Liên hệ' }}</span>
                                                </div>
                                                <div class="tt-tour-item">
                                                    <span class="label"><i class="fas fa-map-marker-alt"></i>Nơi khởi hành:</span>
                                                    <span class="value">{{ $tour->departure_place ?: 'Liên hệ' }}</span>
                                                </div>
                                                <div class="tt-tour-item">
                                                    <span class="label"><i class="far fa-clock"></i>Lịch khởi hành:</span>
                                                    <span class="value">{{ $tour->schedule ?: 'Khởi hành vào buổi sáng' }}</span>
                                                </div>

                                            </div>

                                            <p style="text-align: center;">Đặt giữ chỗ giá tốt - Thanh toán sau.</p>

                                            <div class="fluentform ff-default fluentform_wrapper_1 ffs_default_wrap">
                                                <style>
                                                    .tt-contact-actions {
                                                        display: flex;
                                                        flex-direction: column;
                                                        gap: 10px;
                                                    }

                                                    .tt-facebook-btn,
                                                    .tt-zalo-btn,
                                                    .tt-whatsapp-btn {
                                                        display: inline-flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        gap: 10px;
                                                        width: 100%;
                                                        padding: 12px 14px;
                                                        border-radius: 10px;
                                                        color: #fff;
                                                        font-weight: 700;
                                                        text-decoration: none;
                                                        border: 1px solid rgba(0, 0, 0, .05);
                                                        transition: transform .08s ease, filter .2s ease;
                                                    }

                                                    .tt-facebook-btn {
                                                        background: #1877f2;
                                                    }

                                                    .tt-zalo-btn {
                                                        background: #0068ff;
                                                    }

                                                    .tt-whatsapp-btn {
                                                        background: #25d366;
                                                    }

                                                    .tt-facebook-btn:hover,
                                                    .tt-zalo-btn:hover,
                                                    .tt-whatsapp-btn:hover {
                                                        color: #fff;
                                                        filter: brightness(1.05);
                                                        text-decoration: none;
                                                    }

                                                    .tt-facebook-btn:active,
                                                    .tt-zalo-btn:active,
                                                    .tt-whatsapp-btn:active {
                                                        transform: translateY(1px);
                                                    }

                                                    .tt-facebook-btn i,
                                                    .tt-whatsapp-btn i {
                                                        font-size: 18px;
                                                        line-height: 1;
                                                    }

                                                    .tt-zalo-logo {
                                                        width: 26px;
                                                        height: 26px;
                                                        display: inline-flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        flex: 0 0 26px;
                                                    }

                                                    .tt-zalo-logo svg {
                                                        width: 26px;
                                                        height: 26px;
                                                        display: block;
                                                    }

                                                    /* CTA đặt tour */
                                                    .tt-cta-book {
                                                        position: relative;
                                                        overflow: hidden;
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        gap: 12px;
                                                        width: 100%;
                                                        margin: 0 0 14px;
                                                        padding: 14px 18px;
                                                        border-radius: 999px;
                                                        color: #fff !important;
                                                        text-decoration: none;
                                                        background: linear-gradient(110deg, #ff8a1f, #ff5a00 40%, #ffab3d 65%, #ff6600);
                                                        background-size: 220% 100%;
                                                        box-shadow: 0 8px 20px rgba(255, 102, 0, .35);
                                                        animation: ttCtaGradient 6s ease-in-out infinite, ttCtaPulse 2.4s ease-in-out infinite;
                                                        transition: transform .2s ease, box-shadow .2s ease;
                                                    }

                                                    .tt-cta-book::after {
                                                        content: "";
                                                        position: absolute;
                                                        top: 0;
                                                        left: -60%;
                                                        width: 40%;
                                                        height: 100%;
                                                        background: linear-gradient(100deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .45) 50%, rgba(255, 255, 255, 0) 100%);
                                                        transform: skewX(-20deg);
                                                        animation: ttCtaShine 3.2s ease-in-out infinite;
                                                        pointer-events: none;
                                                    }

                                                    .tt-cta-book:hover,
                                                    .tt-cta-book:focus {
                                                        color: #fff !important;
                                                        transform: translateY(-2px);
                                                        box-shadow: 0 12px 26px rgba(255, 102, 0, .45);
                                                    }

                                                    .tt-cta-book:active {
                                                        transform: translateY(0);
                                                    }

                                                    .tt-cta-book .tt-cta-text {
                                                        display: flex;
                                                        flex-direction: column;
                                                        align-items: flex-start;
                                                        line-height: 1.25;
                                                    }

                                                    .tt-cta-book .tt-cta-title {
                                                        font-size: 17px;
                                                        font-weight: 700;
                                                        letter-spacing: .2px;
                                                        text-transform: uppercase;
                                                    }

                                                    .tt-cta-book .tt-cta-sub {
                                                        font-size: 12px;
                                                        font-weight: 500;
                                                        opacity: .92;
                                                    }

                                                    .tt-cta-book .tt-cta-phone-icon {
                                                        font-size: 18px;
                                                        animation: ttCtaRing 2s ease-in-out infinite;
                                                        transform-origin: 50% 60%;
                                                    }

                                                    .tt-cta-book .tt-cta-arrow {
                                                        font-size: 14px;
                                                        margin-left: auto;
                                                        animation: ttCtaNudge 1.4s ease-in-out infinite;
                                                    }

                                                    @keyframes ttCtaGradient {

                                                        0%,
                                                        100% {
                                                            background-position: 0% 50%;
                                                        }

                                                        50% {
                                                            background-position: 100% 50%;
                                                        }
                                                    }

                                                    @keyframes ttCtaPulse {

                                                        0%,
                                                        100% {
                                                            box-shadow: 0 8px 20px rgba(255, 102, 0, .35), 0 0 0 0 rgba(255, 102, 0, .45);
                                                        }

                                                        70% {
                                                            box-shadow: 0 8px 20px rgba(255, 102, 0, .35), 0 0 0 12px rgba(255, 102, 0, 0);
                                                        }
                                                    }

                                                    @keyframes ttCtaShine {

                                                        0%,
                                                        55% {
                                                            left: -60%;
                                                        }

                                                        100% {
                                                            left: 130%;
                                                        }
                                                    }

                                                    @keyframes ttCtaRing {

                                                        0%,
                                                        60%,
                                                        100% {
                                                            transform: rotate(0deg);
                                                        }

                                                        65% {
                                                            transform: rotate(-14deg);
                                                        }

                                                        72% {
                                                            transform: rotate(12deg);
                                                        }

                                                        80% {
                                                            transform: rotate(-8deg);
                                                        }

                                                        88% {
                                                            transform: rotate(6deg);
                                                        }
                                                    }

                                                    @keyframes ttCtaNudge {

                                                        0%,
                                                        100% {
                                                            transform: translateX(0);
                                                        }

                                                        50% {
                                                            transform: translateX(5px);
                                                        }
                                                    }

                                                    @media (prefers-reduced-motion: reduce) {

                                                        .tt-cta-book,
                                                        .tt-cta-book::after,
                                                        .tt-cta-book .tt-cta-phone-icon,
                                                        .tt-cta-book .tt-cta-arrow {
                                                            animation: none !important;
                                                        }
                                                    }
                                                </style>

                                                <a class="tt-cta-book" href="https://zalo.me/0879998230" target="_blank" rel="noopener noreferrer" aria-label="Đặt tour ngay qua Zalo 0879 998 230">
                                                    <i class="fas fa-comment-dots tt-cta-phone-icon" aria-hidden="true"></i>
                                                    <span class="tt-cta-text">
                                                        <span class="tt-cta-title">Đặt tour ngay</span>
                                                        <span class="tt-cta-sub">Nhắn Zalo tư vấn miễn phí 24/7</span>
                                                    </span>
                                                    <i class="fas fa-arrow-right tt-cta-arrow" aria-hidden="true"></i>
                                                </a>

                                                <div class="tt-contact-actions">
                                                    <a class="tt-facebook-btn" href="https://m.me/61579608994747" target="_blank" rel="noopener noreferrer" aria-label="Chat Facebook Messenger">
                                                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                                        <span>Chat Facebook</span>
                                                    </a>

                                                    <a class="tt-zalo-btn" href="https://zalo.me/0879998230" target="_blank" rel="noopener noreferrer" aria-label="Chat Zalo">
                                                        <span class="tt-zalo-logo" aria-hidden="true">
                                                            <svg viewBox="0 0 64 64" role="img" focusable="false" aria-hidden="true">
                                                                <rect x="6" y="10" width="52" height="40" rx="14" fill="rgba(255,255,255,.96)" />
                                                                <path d="M22 50 L19 56 C18.3 57.5 19.9 58.9 21.3 58.1 L32 52.5" fill="rgba(255,255,255,.96)" />
                                                                <text x="32" y="37" text-anchor="middle" font-size="18" font-weight="900" font-family="Arial, Helvetica, sans-serif" fill="#0068ff">Zalo</text>
                                                            </svg>
                                                        </span>
                                                        <span>Chat Zalo</span>
                                                    </a>

                                                    <a class="tt-whatsapp-btn" href="https://wa.me/84123456789" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp">
                                                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                                        <span>Chat WhatsApp</span>
                                                    </a>
                                                </div>

                                                <div id="fluentform_1_errors" class="ff-errors-in-stack ff_form_instance_1_1 ff-form-loading_errors ff_form_instance_1_1_errors"></div>
                                            </div>
                                            <script type="text/javascript" defer="" src="data:text/javascript,window.fluent_form_ff_form_instance_1_1%20%3D%20%7B%22id%22%3A%221%22%2C%22settings%22%3A%7B%22layout%22%3A%7B%22labelPlacement%22%3A%22top%22%2C%22helpMessagePlacement%22%3A%22with_label%22%2C%22errorMessagePlacement%22%3A%22inline%22%2C%22cssClassName%22%3A%22%22%2C%22asteriskPlacement%22%3A%22asterisk-right%22%7D%2C%22restrictions%22%3A%7B%22denyEmptySubmission%22%3A%7B%22enabled%22%3Afalse%7D%7D%7D%2C%22form_instance%22%3A%22ff_form_instance_1_1%22%2C%22form_id_selector%22%3A%22fluentform_1%22%2C%22rules%22%3A%7B%22phone%22%3A%7B%22required%22%3A%7B%22value%22%3Atrue%2C%22global%22%3Atrue%2C%22message%22%3A%22Tr%5Cu01b0%5Cu1eddng%20n%5Cu00e0y%20l%5Cu00e0%20b%5Cu1eaft%20bu%5Cu1ed9c%22%2C%22global_message%22%3A%22Tr%5Cu01b0%5Cu1eddng%20n%5Cu00e0y%20l%5Cu00e0%20b%5Cu1eaft%20bu%5Cu1ed9c%22%7D%2C%22valid_phone_number%22%3A%7B%22value%22%3Atrue%2C%22global%22%3Atrue%2C%22message%22%3A%22S%5Cu1ed1%20%5Cu0111i%5Cu1ec7n%20tho%5Cu1ea1i%20kh%5Cu00f4ng%20h%5Cu1ee3p%20l%5Cu1ec7%22%2C%22global_message%22%3A%22S%5Cu1ed1%20%5Cu0111i%5Cu1ec7n%20tho%5Cu1ea1i%20kh%5Cu00f4ng%20h%5Cu1ee3p%20l%5Cu1ec7%22%7D%7D%7D%2C%22debounce_time%22%3A300%7D%3B"></script>



                                        </div>
                                    </div>
                                </div>
                                <style>
                                    #col-220379884>.is-sticky-column>.is-sticky-column__inner>.col-inner {
                                        padding: 30px 20px 0px 20px;
                                        margin: 0px 0px -20px 0px;
                                        border-radius: 16px;
                                    }

                                    @media (min-width:550px) {
                                        #col-220379884>.is-sticky-column>.is-sticky-column__inner>.col-inner {
                                            padding: 30px 30px 10px 30px;
                                        }
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Tour tương tự -->
                @if($relatedTours->isNotEmpty())
                <section class="section" id="section_related_tours">
                    <div class="section-content relative">
                        <div class="row">
                            <div class="col small-12 large-12">
                                <div class="col-inner">
                                    <style>
                                        .tt-related {
                                            margin: 10px 0 40px;
                                        }

                                        .tt-related-head {
                                            display: flex;
                                            align-items: center;
                                            justify-content: space-between;
                                            gap: 16px;
                                            flex-wrap: wrap;
                                            margin-bottom: 18px;
                                        }

                                        .tt-related-title {
                                            margin: 0;
                                            font-size: 22px;
                                            font-weight: 700;
                                            text-transform: uppercase;
                                            color: #2d4271;
                                            position: relative;
                                            padding-bottom: 8px;
                                        }

                                        .tt-related-title::after {
                                            content: "";
                                            position: absolute;
                                            left: 0;
                                            bottom: 0;
                                            width: 52px;
                                            height: 3px;
                                            border-radius: 3px;
                                            background: #ff6600;
                                        }

                                        .tt-related-more {
                                            font-size: 14px;
                                            font-weight: 600;
                                            color: #ff6600 !important;
                                            text-decoration: none;
                                            white-space: nowrap;
                                        }

                                        .tt-related-more:hover {
                                            text-decoration: underline;
                                        }

                                        .tt-related-grid {
                                            display: grid;
                                            grid-template-columns: repeat(4, minmax(0, 1fr));
                                            gap: 20px;
                                        }

                                        .tt-related-card {
                                            display: flex;
                                            flex-direction: column;
                                            height: 100%;
                                            background: #fff;
                                            border: 1px solid #ececec;
                                            border-radius: 14px;
                                            overflow: hidden;
                                            text-decoration: none;
                                            color: inherit;
                                            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
                                        }

                                        .tt-related-card:hover {
                                            transform: translateY(-5px);
                                            border-color: rgba(255, 102, 0, .35);
                                            box-shadow: 0 12px 26px rgba(45, 66, 113, .14);
                                        }

                                        .tt-related-thumb {
                                            position: relative;
                                            aspect-ratio: 4 / 3;
                                            overflow: hidden;
                                            background: #f3f4f6;
                                        }

                                        .tt-related-thumb img {
                                            width: 100%;
                                            height: 100%;
                                            object-fit: cover;
                                            display: block;
                                            transition: transform .45s ease;
                                        }

                                        .tt-related-card:hover .tt-related-thumb img {
                                            transform: scale(1.07);
                                        }

                                        .tt-related-badge {
                                            position: absolute;
                                            left: 10px;
                                            top: 10px;
                                            padding: 5px 10px;
                                            border-radius: 999px;
                                            background: rgba(255, 102, 0, .95);
                                            color: #fff;
                                            font-size: 12px;
                                            font-weight: 600;
                                            line-height: 1;
                                        }

                                        .tt-related-body {
                                            display: flex;
                                            flex-direction: column;
                                            flex: 1 1 auto;
                                            gap: 8px;
                                            padding: 14px 14px 16px;
                                        }

                                        .tt-related-name {
                                            margin: 0;
                                            font-size: 15px;
                                            font-weight: 600;
                                            line-height: 1.45;
                                            color: #2d4271;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 2;
                                            -webkit-box-orient: vertical;
                                            overflow: hidden;
                                            min-height: 43px;
                                        }

                                        .tt-related-card:hover .tt-related-name {
                                            color: #ff6600;
                                        }

                                        .tt-related-meta {
                                            font-size: 13px;
                                            color: #6b7280;
                                            line-height: 1.6;
                                        }

                                        .tt-related-meta i {
                                            color: #ff6600;
                                        }

                                        .tt-related-price {
                                            margin-top: auto;
                                            padding-top: 10px;
                                            border-top: 1px dashed #ececec;
                                            font-size: 13px;
                                            color: #6b7280;
                                        }

                                        .tt-related-price strong {
                                            display: block;
                                            font-size: 18px;
                                            font-weight: 700;
                                            color: #ff6600;
                                            line-height: 1.3;
                                        }

                                        @media (max-width: 1024px) {
                                            .tt-related-grid {
                                                grid-template-columns: repeat(3, minmax(0, 1fr));
                                            }
                                        }

                                        @media (max-width: 767px) {
                                            .tt-related-grid {
                                                grid-template-columns: repeat(2, minmax(0, 1fr));
                                                gap: 14px;
                                            }

                                            .tt-related-title {
                                                font-size: 19px;
                                            }

                                            .tt-related-name {
                                                font-size: 14px;
                                                min-height: 40px;
                                            }

                                            .tt-related-price strong {
                                                font-size: 16px;
                                            }
                                        }

                                        @media (max-width: 420px) {
                                            .tt-related-grid {
                                                grid-template-columns: minmax(0, 1fr);
                                            }
                                        }
                                    </style>

                                    <div class="tt-related">
                                        <div class="tt-related-head">
                                            <h2 class="tt-related-title">Tour tương tự</h2>
                                            <a class="tt-related-more" href="{{ route('category.child.show', [$category->slug, $categoryChild->slug]) }}">
                                                Xem tất cả <i class="fas fa-angle-right" aria-hidden="true"></i>
                                            </a>
                                        </div>

                                        <div class="tt-related-grid">
                                            @foreach($relatedTours as $related)
                                            @php($relatedImage = is_array($related->image) ? ($related->image[0] ?? null) : $related->image)
                                            @php($relatedUrl = route('tour.detail', [optional($related->category)->slug, optional($related->categoryChild)->slug, $related->slug]))
                                            <a class="tt-related-card" href="{{ $relatedUrl }}" aria-label="{{ $related->name }}">
                                                <div class="tt-related-thumb">
                                                    @if($relatedImage)
                                                    <img src="{{ asset($relatedImage) }}" alt="{{ $related->name }}" width="450" height="338" loading="lazy">
                                                    @endif
                                                    @if(optional($related->categoryChild)->name)
                                                    <span class="tt-related-badge">{{ $related->categoryChild->name }}</span>
                                                    @endif
                                                </div>
                                                <div class="tt-related-body">
                                                    <h3 class="tt-related-name">{{ $related->name }}</h3>

                                                    <div class="tt-related-meta">
                                                        <i class="far fa-clock" aria-hidden="true"></i>
                                                        {{ $related->schedule ?: 'Khởi hành vào buổi sáng' }}
                                                    </div>

                                                    @if($related->departure_place)
                                                    <div class="tt-related-meta">
                                                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                                        {{ $related->departure_place }}
                                                    </div>
                                                    @endif

                                                    @if(optional($related->categoryChild)->hidden_money == 0)
                                                    <div class="tt-related-price">
                                                        Giá từ
                                                        <strong>
                                                            <bdi class="tt-price" data-amount-vnd="{{ $related->price ?? '' }}" data-amount-usd="{{ $related->price_usd ?? '' }}">{{ $related->price ? number_format((float) $related->price, 0, ',', '.') . '₫' : ((float) $related->price_usd . '$') }}</bdi>
                                                        </strong>
                                                    </div>
                                                    @else
                                                    <div class="tt-related-price">
                                                        <strong>Liên hệ</strong>
                                                    </div>
                                                    @endif
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @endif

            </div>
        </div>
    </div>
</main>

<!-- Success Popup Modal -->
<div id="successModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: 9999;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border-radius: 12px; padding: 30px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
        <!-- Close button -->
        <button onclick="closeSuccessModal()" style="position: absolute; top: 10px; right: 15px; background: none; border: none; font-size: 24px; color: #999; cursor: pointer; padding: 0; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">&times;</button>

        <!-- Success icon -->
        <div style="width: 60px; height: 60px; background: #28a745; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
            <i class="fas fa-check" style="color: white; font-size: 24px;"></i>
        </div>

        <!-- Title -->
        <h3 style="color: #333; margin-bottom: 15px; font-size: 20px; font-weight: bold;">Đặt tour thành công!</h3>

        <!-- Message -->
        <p id="successMessage" style="color: #666; margin-bottom: 20px; font-size: 14px; line-height: 1.4;">Cảm ơn bạn! Chúng tôi sẽ liên hệ với bạn sớm nhất.</p>

        <!-- Close button -->
        <button onclick="closeSuccessModal()" style="background: #ff6600; color: white; border: none; padding: 10px 25px; border-radius: 6px; font-size: 14px; font-weight: bold; cursor: pointer; width: 100%;">
            Đóng
        </button>
    </div>
</div>

<!-- Error Popup Modal -->
<div id="errorModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: 9999;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border-radius: 12px; padding: 30px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
        <!-- Close button -->
        <button onclick="closeErrorModal()" style="position: absolute; top: 10px; right: 15px; background: none; border: none; font-size: 24px; color: #999; cursor: pointer; padding: 0; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">&times;</button>

        <!-- Error icon -->
        <div style="width: 60px; height: 60px; background: #dc3545; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
            <i class="fas fa-exclamation-triangle" style="color: white; font-size: 24px;"></i>
        </div>

        <!-- Title -->
        <h3 style="color: #333; margin-bottom: 15px; font-size: 20px; font-weight: bold;">Có lỗi xảy ra!</h3>

        <!-- Error message -->
        <div style="background: #f8d7da; padding: 12px; border-radius: 6px; margin-bottom: 20px; border-left: 4px solid #dc3545;">
            <p style="margin: 0; color: #721c24; font-size: 14px; line-height: 1.4;" id="errorMessage">Vui lòng kiểm tra lại thông tin</p>
        </div>

        <!-- Error details -->
        <div id="errorDetails" style="display: none; background: #fff3cd; padding: 10px; border-radius: 6px; margin-bottom: 20px; border-left: 4px solid #ffc107;">
            <p style="margin: 0; color: #856404; font-size: 12px; font-weight: bold;">Chi tiết lỗi:</p>
            <p style="margin: 5px 0 0 0; color: #856404; font-size: 12px; font-family: monospace;" id="errorDetailsText"></p>
        </div>

        <!-- Close button -->
        <button onclick="closeErrorModal()" style="background: #dc3545; color: white; border: none; padding: 10px 25px; border-radius: 6px; font-size: 14px; font-weight: bold; cursor: pointer; width: 100%;">
            Đóng
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bookingForm = document.getElementById('bookingForm');
        const successMessage = document.getElementById('successMessage');
        const successText = document.getElementById('successText');

        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(bookingForm);
            const submitButton = bookingForm.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;

            // Show loading state
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 8px;"></i> Đang xử lý...';
            submitButton.disabled = true;

            fetch('{{ route("tour.booking") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Show success popup modal
                        showSuccessModal(data.message);
                        bookingForm.reset();
                    } else {
                        // Show error popup modal with details
                        const errorDetails = data.errors ? JSON.stringify(data.errors, null, 2) : data.error;
                        showErrorModal(data.message || 'Có lỗi xảy ra. Vui lòng thử lại.', errorDetails);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorModal('Có lỗi xảy ra. Vui lòng kiểm tra kết nối và thử lại.', error.message);
                })
                .finally(() => {
                    // Reset button state
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                });
        });
    });

    // Function to show success modal
    function showSuccessModal(message, orderId) {
        const modal = document.getElementById('successModal');
        const successMessage = document.getElementById('successMessage');
        if (message && successMessage) {
            successMessage.textContent = message;
        }
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    // Function to close success modal
    function closeSuccessModal() {
        const modal = document.getElementById('successModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Function to show error modal
    function showErrorModal(message, details = null) {
        const modal = document.getElementById('errorModal');
        const errorMessage = document.getElementById('errorMessage');
        const errorDetails = document.getElementById('errorDetails');
        const errorDetailsText = document.getElementById('errorDetailsText');

        errorMessage.textContent = message;

        // Show detailed error if available
        if (details) {
            errorDetailsText.textContent = details;
            errorDetails.style.display = 'block';
        } else {
            errorDetails.style.display = 'none';
        }

        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    // Function to close error modal
    function closeErrorModal() {
        const modal = document.getElementById('errorModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Close modals when clicking outside
    document.getElementById('successModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeSuccessModal();
        }
    });

    document.getElementById('errorModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeErrorModal();
        }
    });

    // Close modals with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSuccessModal();
            closeErrorModal();
        }
    });
</script>
@endsection