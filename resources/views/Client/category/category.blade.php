@extends('client.layout.app')

@section('title', $category->name . ' - Du lịch Thế Sinh')

@section('content')
@if($category->image)
    <img class="product-category-banner" src="{{ asset('storage/' . $category->image) }}" alt"" width="1024" height="356" loading="lazy" fetchpriority="low">
@else
    <img class="product-category-banner" src="https://dulichthesinh.vn/wp-content/uploads/2505_ninh-binh.webp" alt="Tour du lịch {{ $category->name }}" width="1024" height="356" loading="lazy" fetchpriority="low">
@endif

<div class="shop-page-title category-page-title page-title">
    <div class="page-title-inner flex-row medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-medium">
                <nav class="rank-math-breadcrumb breadcrumbs uppercase">
                    <p>
                        <a href="{{ url('/') }}">The Sinh Tourist</a>
                        <span class="separator"> / </span>
                        <span class="last">{{ $category->name }}</span>
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
                <div class="term-description">
                    <h2>{{ $category->name }}</h2>
                    @if($category->description)
                        <p>{{ $category->description }}</p>
                    @endif
                </div>
                <div class="woocommerce-notices-wrapper"></div>
                <div class="products row row-small large-columns-4 medium-columns-3 small-columns-1 equalize-box">
                    @foreach($categoryChildren as $child)
                        <div class="product-category col product {{ $loop->first ? 'first' : '' }}">
                            <div class="col-inner">
                                <a aria-label="Truy cập danh mục sản phẩm {{ $child->name }}" href="{{ route('category.child.show', [$category->slug, $child->slug]) }}">
                                    <div class="box box-normal">
                                        <div class="box-image">
                                            @if($child->image)
                                                <img src="{{ asset('storage/' . $child->image) }}" alt="{{ $child->name }}" width="600" height="450" loading="lazy" fetchpriority="low"/>
                                            @else
                                                <img src="https://dulichthesinh.vn/wp-content/uploads/2504_680ef0e76d6a5-600x450.webp" alt="{{ $child->name }}" width="600" height="450" loading="lazy" fetchpriority="low"/>
                                            @endif
                                        </div>
                                        <div class="box-text text-center">
                                            <div class="box-text-inner">
                                                <h5 class="uppercase header-title">{{ $child->name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div><!-- row -->
            </div><!-- shop container -->
        </div>
    </div>
</main>
@endsection