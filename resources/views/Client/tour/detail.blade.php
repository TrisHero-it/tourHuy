{{-- @extends('client.layout.app')

@section('title', $tour->name . ' - Du lịch Thế Sinh')

@section('content')
<div class="shop-page-title category-page-title page-title">
    <div class="page-title-inner flex-row medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-medium">
                <nav class="rank-math-breadcrumb breadcrumbs uppercase">
                    <p>
                        <a href="{{ url('/') }}">The Sinh Tourist</a>
                        <span class="separator"> / </span>
                        <a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                        @if($tour->categoryChild)
                            <span class="separator"> / </span>
                            <a href="{{ route('tours.category-child', [$category->slug, $tour->categoryChild->slug]) }}">{{ $tour->categoryChild->name }}</a>
                        @endif
                        <span class="separator"> / </span>
                        <span class="last">{{ $tour->name }}</span>
                    </p>
                </nav>
            </div>
        </div>
        <div class="flex-col medium-text-center">
        </div>
    </div>
</div>

<main id="main" class="">
    <div class="row">
        <div class="col large-12">
            <div class="shop-container">
                <div class="woocommerce-notices-wrapper"></div>
                
                <!-- Tour Detail Content -->
                <div class="product-single">
                    <div class="row">
                        <div class="col large-6">
                            <div class="product-images">
                                @if($tour->image)
                                    <img src="{{ asset('storage/' . $tour->image) }}" alt="{{ $tour->name }}" class="product-image" />
                                @else
                                    <img src="https://dulichthesinh.vn/wp-content/uploads/2506_anh-1-600x450.jpg" alt="{{ $tour->name }}" class="product-image" />
                                @endif
                            </div>
                        </div>
                        
                        <div class="col large-6">
                            <div class="product-summary">
                                <h1 class="product-title">{{ $tour->name }}</h1>
                                
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
                                
                                <div class="tour-details">
                                    @if($tour->duration)
                                        <p class="tour-duration">
                                            <i class="fas fa-calendar-alt" aria-hidden="true"></i> 
                                            <strong>Thời gian:</strong> {{ $tour->duration }}
                                        </p>
                                    @endif
                                    
                                    @if($tour->schedule)
                                        <p class="tour-schedule">
                                            <i class="far fa-clock" aria-hidden="true"></i> 
                                            <strong>Lịch trình:</strong> {{ $tour->schedule }}
                                        </p>
                                    @endif
                                </div>
                                
                                @if($tour->description)
                                    <div class="product-description">
                                        <h3>Mô tả tour</h3>
                                        <p>{{ $tour->description }}</p>
                                    </div>
                                @endif
                                
                                <div class="product-actions">
                                    <a href="tel:0849048888" class="button btn-tour">
                                        <i class="fas fa-phone"></i> Đặt tour ngay
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection --}}
