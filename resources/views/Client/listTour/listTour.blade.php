@extends('client.layout.app')

@section('title', $categoryChild->name . ' - Sinh Travel')

@section('content')
<div class="shop-page-title category-page-title page-title">
    <div class="page-title-inner flex-row medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-medium">
                <nav class="rank-math-breadcrumb breadcrumbs uppercase">
                    <p>
                        <a href="{{ url('/') }}">Sinh Travel</a>
                        <span class="separator"> / </span>
                        <a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                        <span class="separator"> / </span>
                        <span class="last">{{ $categoryChild->name }}</span>
                    </p>
                </nav>
            </div>
        </div>
        <div class="flex-col medium-text-center">
        </div>
    </div>
</div>

<main id="main" class="">
    <div class="row category-page-row">
        <div class="col large-12">
            <div class="shop-container">
                <div class="woocommerce-notices-wrapper"></div>
                <div class="products row row-small large-columns-4 medium-columns-3 small-columns-1 equalize-box">
                    @forelse($tours as $tour)
                    <div class="product-small col has-hover product type-product status-publish {{ $loop->first ? 'first' : '' }} {{ $loop->last ? 'last' : '' }} instock product_cat-{{ $category->slug }} product_cat-{{ $categoryChild->slug }} has-post-thumbnail sale shipping-taxable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box">
                                <div class="box-image">
                                    <div class="image-none">
                                        <a href="{{ route('tour.detail', [$category->slug, $categoryChild->slug, $tour->slug]) }}" aria-label="{{ $tour->name }}">
                                            @php($firstImage = is_array($tour->image) ? ($tour->image[0] ?? null) : $tour->image)
                                            @if($firstImage)
                                            <img src="{{ asset($firstImage) }}" alt="" height="600" width="450" style="width: 265.72px; height: 199.28px;">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>

                                <div class="box-text box-text-products">
                                    <div class="title-wrapper">
                                        <p class="name product-title woocommerce-loop-product__title">
                                            <a href="{{ route('tour.detail', [$category->slug, $categoryChild->slug, $tour->slug]) }}" style="height: 38.59px;" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $tour->name }}</a>
                                        </p>
                                    </div>
                                    <div class="price-wrapper">
                                        @if($tour->category_child_id != null)
                                        @if($tour->hidden_money == 1)
                                        <span class="price"><span class="price-prefix">Giá từ </span><ins
                                                aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount"><bdi class="tt-price" data-amount-vnd="{{ $tour->price ?? '' }}" data-amount-usd="{{ $tour->price_usd ?? '' }}">{{ $tour->price ? number_format((float)$tour->price, 0, ',', '.') . '₫' : ((float)$tour->price_usd . '$') }}</bdi></span></ins>
                                            <span class="price-suffix">/khách</span></span>
                                        @endif
                                        @else

                                        <span class="price"><span class="price-prefix">Giá từ </span><ins
                                                aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount"><bdi class="tt-price" data-amount-vnd="{{ $tour->price ?? '' }}" data-amount-usd="{{ $tour->price_usd ?? '' }}">{{ $tour->price ? number_format((float)$tour->price, 0, ',', '.') . '₫' : ((float)$tour->price_usd . '$') }}</bdi></span></ins>
                                            <span class="price-suffix">/khách</span></span>
                                        @endif
                                        <div class="tour-custom-fields"
                                            style="margin-top:8px;font-size:0.9em;">
                                            <p class="tour-duration" style="margin:0;"><i
                                                    class="fas fa-calendar-alt" aria-hidden="true"></i>
                                                @if ($tour->category_child_id != null)
                                                {{ $tour->categoryChild->name }}
                                                @else
                                                {{ $tour->schedule }}
                                                @endif
                                            </p>
                                            <p class="tour-schedule" style="margin:0;"><i
                                                    class="far fa-clock" aria-hidden="true"></i> Đi buổi
                                                sáng hàng ngày</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col large-12">
                        <div class="text-center">
                            <p>Không có tour nào trong danh mục này.</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($tours->hasPages())
                <div class="pagination-wrapper">
                    {{ $tours->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection