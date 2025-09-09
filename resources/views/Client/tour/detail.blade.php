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
                                        
                                        <!-- Booking Form -->
                                        <div class="product-actions" style="margin-bottom: 25px;">
                                            <form id="bookingForm" style="background: #f8f9fa; padding: 20px; border-radius: 8px; border: 1px solid #e0e0e0;">
                                                <div style="margin-bottom: 15px;">
                                                    <label for="customer_name" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">Họ và tên *</label>
                                                    <input type="text" id="customer_name" name="name" required 
                                                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;"
                                                           placeholder="Nhập họ và tên của bạn">
                                                </div>
                                                <div style="margin-bottom: 20px;">
                                                    <label for="customer_phone" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">Số điện thoại *</label>
                                                    <input type="tel" id="customer_phone" name="phone" required 
                                                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;"
                                                           placeholder="Nhập số điện thoại của bạn">
                                                </div>
                                                <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                                <button type="submit" style="background: linear-gradient(135deg, #ff6600, #ff8533); color: white; padding: 15px 30px; border: none; border-radius: 8px; width: 100%; font-weight: bold; font-size: 16px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(255, 102, 0, 0.3);">
                                                    <i class="fas fa-calendar-check" style="margin-right: 8px;"></i> Đặt tour ngay
                                                </button>
                                            </form>
                                            
                                            <!-- Success Message -->
                                            <div id="successMessage" style="display: none; background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-top: 15px; text-align: center; font-weight: bold;">
                                                <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                                                <span id="successText"></span>
                                            </div>
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
                                        {{-- <div class="special-offers" style="margin-top: 20px; padding: 15px; background: linear-gradient(135deg, #ff6600, #ff8533); color: white; border-radius: 8px; text-align: center;">
                                            <div style="font-weight: bold; margin-bottom: 8px;">🎁 Ưu đãi đặc biệt</div>
                                            <div style="font-size: 14px; line-height: 1.4;">
                                                • Nhóm từ 5 người: giảm 50.000đ/người<br>
                                                • Đặt sớm >7 ngày: giảm thêm 50.000đ/người<br>
                                                • Khách cũ: giảm 3-5% giá tour
                                            </div>
                                        </div> --}}
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
        <p style="color: #666; margin-bottom: 20px; font-size: 14px; line-height: 1.4;">Cảm ơn bạn! Chúng tôi sẽ liên hệ với bạn sớm nhất.</p>
        
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