@extends('client.layout.app')

@section('content')


<div id="content" role="main" class="content-area">

	<div class="img has-hover x md-x lg-x y md-y lg-y" id="image_566051371">
		<div class="img-inner dark">
			<img width="600" height="168"
				src="{{ asset('storage/uploads/2505_banner-du-lich-mien-bac-viet-nam-600x168.jpg') }}"
				class="attachment-medium size-medium" />
		</div>

		<style>
			#image_566051371 {
				width: 100%;
			}
		</style>
	</div>
	<!-- danh mục -->
	<div class="row danh-muc-tour large-columns-7 medium-columns-3 small-columns-4 row-small">
		@foreach ($categoriesBanner as $category)
		<div class="product-category col">
			<div class="col-inner">
				<a aria-label="{{ $category->name }}"
					href="/{{ $category->slug }}">
					<div class="box box-category has-hover box-normal ">
						<div class="box-image">
							<div class="image-cover" style="padding-top:100%;">
								<img decoding="async"
									src="{{ asset($category->image) }}"
									alt="" width="300" height="300" loading="lazy" />
							</div>
						</div>
						<div class="box-text text-center">
							<div class="box-text-inner">
								<h5 class="uppercase header-title">
									{{ $category->name }} </h5>
								<p class="is-xsmall uppercase count ">
									{{ $category->countTour }} Sản phẩm
								</p>

							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
		@endforeach
	</div>

	<div id="gap-325424257" class="gap-element clearfix" style="display:block; height:auto;">
		<style>
			#gap-325424257 {
				padding-top: 45px;
			}

			@media (min-width:550px) {
				#gap-325424257 {
					padding-top: 30px;
				}
			}
		</style>
	</div>

	<div class="row row-small danh-sach-tour" id="row-640812212">
		<div id="col-1090092751" class="col small-12 large-12">
			<div class="col-inner">
				<div id="text-1379572598" class="text blog-header">


					<h2>Khám phá các tour du lịch cùng<br />The Sinh Tourist</h2>
					<p><span style="font-size: 80%;">Đơn vị tổ chức tour du lịch miền Bắc hàng đầu Việt
							Nam!</span></p>

					<style>
						#text-1379572598 {
							font-size: 1.1rem;
							line-height: 0.75;
							text-align: center;
						}

						@media (min-width:550px) {
							#text-1379572598 {
								font-size: 1.2rem;
							}
						}
					</style>
				</div>


			</div>

			<style>
				#col-1090092751>.col-inner {
					margin: 0px 0px -20px 0px;
				}

				@media (min-width:550px) {
					#col-1090092751>.col-inner {
						margin: 0px 0px -10px 0px;
					}
				}
			</style>
		</div>


		<!-- Danh mục to -->
		@foreach ($categoriesFeature as $category)
		@if ($loop->index == 0)
		<div id="col-1078270613" class="col trang-chu-san-pham-column small-12 large-12">
			<div class="col-inner text-left" style="background-color:rgb(229, 246, 255);">



				<div id="text-3984494503" class="text category-header">


					<table>
						<tbody>
							<tr>
								<td>
									<h2 style="text-align: left;">{{ mb_strtoupper($category->name, 'UTF-8') }}</h2>
								</td>
								<td style="text-align: right;"><a
										href="/{{ $category->slug }}">Xem tất cả →</a></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div id="text-3075179566" class="text">


					<p>{{ $category->description }}</p>

					<style>
						#text-3075179566 {
							font-size: 0.9rem;
						}
					</style>
				</div>
				<div class="row trang-chu-san-pham equalize-box large-columns-4 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-outside slider-nav-push"
					data-flickity-options='{&quot;imagesLoaded&quot;: true, &quot;groupCells&quot;: &quot;100%&quot;, &quot;dragThreshold&quot; : 5, &quot;cellAlign&quot;: &quot;left&quot;,&quot;wrapAround&quot;: true,&quot;prevNextButtons&quot;: true,&quot;percentPosition&quot;: true,&quot;pageDots&quot;: false, &quot;rightToLeft&quot;: false, &quot;autoPlay&quot; : false}'>
					<!-- Tour -->
					@foreach ($category->tours as $tour)
					<div
						class="product-small col has-hover product type-product post-2144 status-publish first instock product_cat-ha-long product_cat-ha-long-1-ngay has-post-thumbnail sale shipping-taxable product-type-simple">
						<div class="col-inner">

							<div class="badge-container absolute left top z-1">

							</div>
							<div class="product-small box ">
								<div class="box-image">
									<div class="image-none">
										<a href="/{{ $category->slug }}/{{ $tour->slug }}"
											aria-label="{{ $tour->name }}">
											<img decoding="async" width="600" height="450"
												src="{{ $tour->image }}"
												class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
												alt="{{ $tour->name }}"
												loading="eager" fetchpriority="high" /> </a>
									</div>
									<div class="image-tools is-small top right show-on-hover">
									</div>
									<div
										class="image-tools is-small hide-for-small bottom left show-on-hover">
									</div>
									<div
										class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
									</div>
								</div>

								<div class="box-text box-text-products">
									<div class="title-wrapper">
										<p class="name product-title woocommerce-loop-product__title"><a
												href="/{{ $category->slug }}/{{ $tour->slug }}"
												class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $tour->name }}</a></p>
									</div>
									<div class="price-wrapper">
										<span class="price"><span class="price-prefix">Giá chỉ </span><ins
												aria-hidden="true"><span
													class="woocommerce-Price-amount amount"><bdi>{{ number_format($tour->price, 0, ',', '.') }}<span
															class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></ins>
											<span class="price-suffix">/khách</span></span>
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
					@endforeach
				</div>

			</div>

			<style>
				#col-1078270613>.col-inner {
					padding: 20px 10px 10px 20px;
					border-radius: 20px;
				}

				@media (min-width:550px) {
					#col-1078270613>.col-inner {
						padding: 30px 30px 20px 30px;
					}
				}
			</style>
		</div>

		@elseif ($loop->index == 1)
		<div id="col-437558140" class="col trang-chu-san-pham-column small-12 large-12">
			<div class="col-inner" style="background-color:rgb(241, 238, 250);">



				<div id="text-3143364609" class="text category-header">


					<table>
						<tbody>
							<tr>
								<td>
									<h2 style="text-align: left;">{{ $category->name }}</h2>
								</td>
								<td style="text-align: right;"><a href="/{{ $category->slug }}">Xem
										tất cả →</a></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div id="text-646834923" class="text">

					<p>{{ $category->description }}</p>

					<style>
						#text-646834923 {
							font-size: 0.9rem;
						}
					</style>
				</div>

				<div class="row trang-chu-san-pham equalize-box large-columns-4 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-outside slider-nav-push"
					data-flickity-options='{&quot;imagesLoaded&quot;: true, &quot;groupCells&quot;: &quot;100%&quot;, &quot;dragThreshold&quot; : 5, &quot;cellAlign&quot;: &quot;left&quot;,&quot;wrapAround&quot;: true,&quot;prevNextButtons&quot;: true,&quot;percentPosition&quot;: true,&quot;pageDots&quot;: false, &quot;rightToLeft&quot;: false, &quot;autoPlay&quot; : false}'>
					@foreach ($category->tours as $tour)

					<div
						class="product-small col has-hover product type-product post-1924 status-publish first instock product_cat-ha-giang product_cat-ninh-binh product_cat-ninh-binh-lien-tuyen product_cat-sa-pa product_cat-sapa-lien-tuyen-tour has-post-thumbnail sale shipping-taxable product-type-simple">
						<div class="col-inner">

							<div class="badge-container absolute left top z-1">

							</div>
							<div class="product-small box ">
								<div class="box-image">
									<div class="image-none">
										<a href="/{{ $category->slug }}/{{ $tour->slug }}"
											aria-label="NINH BÌNH - SAPA FANXIPAN - HÀ GIANG - 5 NGÀY 5 ĐÊM.">
											<img decoding="async" width="600" height="450"
												src="https://dulichthesinh.vn/wp-content/uploads/2508_nui-doi-co-tien-600x450.jpg"
												class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
												alt="NINH BÌNH - SAPA FANXIPAN - HÀ GIANG - 5 NGÀY 5 ĐÊM."
												loading="eager" fetchpriority="high" /> </a>
									</div>
									<div class="image-tools is-small top right show-on-hover">
									</div>
									<div
										class="image-tools is-small hide-for-small bottom left show-on-hover">
									</div>
									<div
										class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
									</div>
								</div>

								<div class="box-text box-text-products">
									<div class="title-wrapper">
										<p class="name product-title woocommerce-loop-product__title"><a
												href="/{{ $category->slug }}/{{ $tour->slug }}"
												class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $tour->name }}.</a></p>
									</div>
									<div class="price-wrapper">
										<span class="price"><span class="price-prefix">Giá chỉ </span><ins
												aria-hidden="true"><span
													class="woocommerce-Price-amount amount"><bdi>{{ number_format($tour->price, 0, ',', '.') }}<span
															class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></ins>
											<span class="price-suffix">/khách</span></span>
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
													class="far fa-clock" aria-hidden="true"></i> Đi buổi sáng hàng ngày</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					@endforeach


				</div>


			</div>

			<style>
				#col-437558140>.col-inner {
					padding: 20px 10px 10px 20px;
					border-radius: 20px;
				}

				@media (min-width:550px) {
					#col-437558140>.col-inner {
						padding: 30px 30px 20px 30px;
					}
				}
			</style>
		</div>

		@elseif ($loop->index == 2)
		<div id="col-363990575" class="col trang-chu-san-pham-column small-12 large-12">
			<div class="col-inner" style="background-color:rgb(255, 240, 229);">

				<div id="text-2743900152" class="text category-header">


					<table>
						<tbody>
							<tr>
								<td>
									<h2 style="text-align: left;">{{ $category->name }}</h2>
								</td>
								<td style="text-align: right;"><a
										href="/{{ $category->slug }}">Xem tất cả →</a></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div id="text-1206134298" class="text">


					<p>{{ $category->description }}</p>


					<style>
						#text-1206134298 {
							font-size: 0.9rem;
						}
					</style>
				</div>



				<div class="row trang-chu-san-pham equalize-box large-columns-4 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-outside slider-nav-push"
					data-flickity-options='{&quot;imagesLoaded&quot;: true, &quot;groupCells&quot;: &quot;100%&quot;, &quot;dragThreshold&quot; : 5, &quot;cellAlign&quot;: &quot;left&quot;,&quot;wrapAround&quot;: true,&quot;prevNextButtons&quot;: true,&quot;percentPosition&quot;: true,&quot;pageDots&quot;: false, &quot;rightToLeft&quot;: false, &quot;autoPlay&quot; : false}'>


					@foreach ($category->tours as $tour)
					<div
						class="product-small col has-hover product type-product post-1924 status-publish first instock product_cat-ha-giang product_cat-ninh-binh product_cat-ninh-binh-lien-tuyen product_cat-sa-pa product_cat-sapa-lien-tuyen-tour has-post-thumbnail sale shipping-taxable product-type-simple">
						<div class="col-inner">

							<div class="badge-container absolute left top z-1">

							</div>
							<div class="product-small box ">
								<div class="box-image">
									<div class="image-none">
										<a href="/{{ $category->slug }}/{{ $tour->slug }}"
											aria-label="{{ $tour->name }}">
											<img decoding="async" width="600" height="450"
												src="https://dulichthesinh.vn/wp-content/uploads/2508_nui-doi-co-tien-600x450.jpg"
												class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
												alt="{{ $tour->name }}"
												loading="eager" fetchpriority="high" /> </a>
									</div>
									<div class="image-tools is-small top right show-on-hover">
									</div>
									<div
										class="image-tools is-small hide-for-small bottom left show-on-hover">
									</div>
									<div
										class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
									</div>
								</div>

								<div class="box-text box-text-products">
									<div class="title-wrapper">
										<p class="name product-title woocommerce-loop-product__title"><a
												href="/{{ $category->slug }}/{{ $tour->slug }}"
												class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $tour->name }}</a></p>
									</div>
									<div class="price-wrapper">
										<span class="price"><span class="price-prefix">Giá chỉ </span><ins
												aria-hidden="true"><span
													class="woocommerce-Price-amount amount"><bdi>{{ number_format($tour->price, 0, ',', '.') }}<span
															class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></ins>
											<span class="price-suffix">/khách</span></span>
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
					@endforeach


				</div>


			</div>

			<style>
				#col-363990575>.col-inner {
					padding: 20px 10px 10px 20px;
					border-radius: 20px;
				}

				@media (min-width:550px) {
					#col-363990575>.col-inner {
						padding: 30px 30px 20px 30px;
					}
				}
			</style>
		</div>

		@elseif ($loop->index == 3)
		<div id="col-160116169" class="col trang-chu-san-pham-column small-12 large-12">
			<div class="col-inner" style="background-color:rgb(230, 247, 242);">


				<div id="text-3593028798" class="text category-header">


					<table>
						<tbody>
							<tr>
								<td>
									<h2 style="text-align: left;">{{ $category->name }}</h2>
								</td>
								<td style="text-align: right;"><a
										href="/{{ $category->slug }}">Xem tất cả →</a></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div id="text-1169398156" class="text">


					<p>{{ $category->description }}</p>

					<style>
						#text-1169398156 {
							font-size: 0.9rem;
						}
					</style>
				</div>



				<div class="row trang-chu-san-pham equalize-box large-columns-4 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-outside slider-nav-push"
					data-flickity-options='{&quot;imagesLoaded&quot;: true, &quot;groupCells&quot;: &quot;100%&quot;, &quot;dragThreshold&quot; : 5, &quot;cellAlign&quot;: &quot;left&quot;,&quot;wrapAround&quot;: true,&quot;prevNextButtons&quot;: true,&quot;percentPosition&quot;: true,&quot;pageDots&quot;: false, &quot;rightToLeft&quot;: false, &quot;autoPlay&quot; : false}'>


					@foreach ($category->tours as $tour)
					<div
						class="product-small col has-hover product type-product post-1924 status-publish first instock product_cat-ha-giang product_cat-ninh-binh product_cat-ninh-binh-lien-tuyen product_cat-sa-pa product_cat-sapa-lien-tuyen-tour has-post-thumbnail sale shipping-taxable product-type-simple">
						<div class="col-inner">

							<div class="badge-container absolute left top z-1">

							</div>
							<div class="product-small box ">
								<div class="box-image">
									<div class="image-none">
										<a href="/{{ $category->slug }}/{{ $tour->slug }}"
											aria-label="{{ $tour->name }}">
											<img decoding="async" width="600" height="450"
												src="https://dulichthesinh.vn/wp-content/uploads/2508_nui-doi-co-tien-600x450.jpg"
												class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
												alt="{{ $tour->name }}"
												loading="eager" fetchpriority="high" /> </a>
									</div>
									<div class="image-tools is-small top right show-on-hover">
									</div>
									<div
										class="image-tools is-small hide-for-small bottom left show-on-hover">
									</div>
									<div
										class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
									</div>
								</div>

								<div class="box-text box-text-products">
									<div class="title-wrapper">
										<p class="name product-title woocommerce-loop-product__title"><a
												href="/{{ $category->slug }}/{{ $tour->slug }}"
												class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $tour->name }}</a></p>
									</div>
									<div class="price-wrapper">
										<span class="price"><span class="price-prefix">Giá chỉ </span><ins
												aria-hidden="true"><span
													class="woocommerce-Price-amount amount"><bdi>{{ number_format($tour->price, 0, ',', '.') }}<span
															class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></ins>
											<span class="price-suffix">/khách</span></span>
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
					@endforeach


				</div>


			</div>

			<style>
				#col-160116169>.col-inner {
					padding: 20px 10px 10px 20px;
					border-radius: 20px;
				}

				@media (min-width:550px) {
					#col-160116169>.col-inner {
						padding: 30px 30px 20px 30px;
					}
				}
			</style>
		</div>
		@elseif ($loop->index == 4)
		<div id="col-1327465078" class="col trang-chu-san-pham-column small-12 large-12">
			<div class="col-inner" style="background-color:rgb(241, 238, 250);">



				<div id="text-686750720" class="text category-header">


					<table>
						<tbody>
							<tr>
								<td>
									<h2 style="text-align: left;">{{ $category->name }}</h2>
								</td>
								<td style="text-align: right;"><a
										href="/{{ $category->slug }}">Xem tất cả →</a></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div id="text-3099693880" class="text">


					<p>{{ $category->description }}</p>

					<style>
						#text-3099693880 {
							font-size: 0.9rem;
						}
					</style>
				</div>



				<div class="row trang-chu-san-pham equalize-box large-columns-4 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-outside slider-nav-push"
					data-flickity-options='{&quot;imagesLoaded&quot;: true, &quot;groupCells&quot;: &quot;100%&quot;, &quot;dragThreshold&quot; : 5, &quot;cellAlign&quot;: &quot;left&quot;,&quot;wrapAround&quot;: true,&quot;prevNextButtons&quot;: true,&quot;percentPosition&quot;: true,&quot;pageDots&quot;: false, &quot;rightToLeft&quot;: false, &quot;autoPlay&quot; : false}'>


					@foreach ($category->tours as $tour)
					<div
						class="product-small col has-hover product type-product post-1888 status-publish first instock product_cat-dong-tay-bac has-post-thumbnail sale shipping-taxable product-type-simple">
						<div class="col-inner">

							<div class="badge-container absolute left top z-1">

							</div>
							<div class="product-small box ">
								<div class="box-image">
									<div class="image-none">
										<a href="/{{ $category->slug }}/{{ $tour->slug }}"
											aria-label="{{ $tour->name }}">
											<img decoding="async" width="600" height="450"
												src="https://dulichthesinh.vn/wp-content/uploads/2505_anh-dep-cat.webp"
												class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
												alt="{{ $tour->name }}"
												loading="eager" fetchpriority="high" /> </a>
									</div>
									<div class="image-tools is-small top right show-on-hover">
									</div>
									<div
										class="image-tools is-small hide-for-small bottom left show-on-hover">
									</div>
									<div
										class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
									</div>
								</div>

								<div class="box-text box-text-products">
									<div class="title-wrapper">
										<p class="name product-title woocommerce-loop-product__title"><a
												href="/{{ $category->slug }}/{{ $tour->slug }}"
												class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $tour->name }}</a></p>
									</div>
									<div class="price-wrapper">
										<span class="price"><span class="price-prefix">Giá chỉ </span><ins
												aria-hidden="true"><span
													class="woocommerce-Price-amount amount"><bdi>{{ number_format($tour->price, 0, ',', '.') }}<span
															class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></ins>
											<span class="price-suffix">/khách</span></span>
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
					@endforeach

				</div>


			</div>

			<style>
				#col-1327465078>.col-inner {
					padding: 20px 10px 10px 20px;
					border-radius: 20px;
				}

				@media (min-width:550px) {
					#col-1327465078>.col-inner {
						padding: 30px 30px 20px 30px;
					}
				}
			</style>
		</div>
		@endif


		@endforeach


		<!-- Trang tin tức -->
	</div>
	<div class="row" id="row-2022656090">


		<div id="col-387215458" class="col small-12 large-12">
			<div class="col-inner">



				<div id="text-1033887356" class="text blog-header">


					<h2>Cẩm nang du lịch</h2>

					<style>
						#text-1033887356 {
							font-size: 1.2rem;
							text-align: center;
						}
					</style>
				</div>



				<div class="row large-columns-3 medium-columns-1 small-columns-1">
					<div class="col post-item">
						<div class="col-inner">
							<div class="box box-default box-text-bottom box-blog-post has-hover">
								<div class="box-image">
									<div class="image-cover" style="padding-top:56.25%;">
										<a href="https://dulichthesinh.vn/6-dia-diem-du-lich-tam-linh-o-ninh-binh-giup-ban-tim-kiem-su-binh-an/"
											class="plain"
											aria-label="6 địa điểm du lịch tâm linh ở Ninh Bình giúp bạn tìm kiếm sự bình an">
											<img decoding="async" width="600" height="400"
												src="https://dulichthesinh.vn/wp-content/uploads/2505_ninh-binh-1-600x400.jpg"
												class="attachment-medium size-medium wp-post-image" alt=""
												srcset="https://dulichthesinh.vn/wp-content/uploads/2505_ninh-binh-1-600x400.jpg 600w, https://dulichthesinh.vn/wp-content/uploads/2505_ninh-binh-1-300x200.jpg 300w, https://dulichthesinh.vn/wp-content/uploads/2505_ninh-binh-1.jpg 1024w"
												sizes="(max-width: 600px) 100vw, 600px" loading="eager"
												fetchpriority="high" /> </a>
									</div>
								</div>
								<div class="box-text text-left"
									style="background-color:rgb(245, 245, 245);padding:10px 10px 10px 10px;">
									<div class="box-text-inner blog-post-inner">


										<p class="cat-label  is-xxsmall op-7 uppercase">
											Blog du lịch </p>
										<h5 class="post-title is-large ">
											<a href="https://dulichthesinh.vn/6-dia-diem-du-lich-tam-linh-o-ninh-binh-giup-ban-tim-kiem-su-binh-an/"
												class="plain">6 địa điểm du lịch tâm linh ở Ninh Bình giúp
												bạn tìm kiếm sự bình an</a>
										</h5>
										<div class="is-divider"></div>
										<p class="from_the_blog_excerpt ">
											Được mệnh danh là vùng đất Cố Đô, không bất ngờ khi Ninh Bình là
											một trong những nơi[...đọc tiếp] </p>



									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col post-item">
						<div class="col-inner">
							<div class="box box-default box-text-bottom box-blog-post has-hover">
								<div class="box-image">
									<div class="image-cover" style="padding-top:56.25%;">
										<a href="https://dulichthesinh.vn/tron-bo-kinh-nghiem-du-lich-sapa-tu-tuc/"
											class="plain"
											aria-label="Trọn bộ kinh nghiệm du lịch Sapa tự túc">
											<img decoding="async" width="600" height="284"
												src="https://dulichthesinh.vn/wp-content/uploads/2505_banner-tay-bac-600x284.jpg"
												class="attachment-medium size-medium wp-post-image" alt=""
												srcset="https://dulichthesinh.vn/wp-content/uploads/2505_banner-tay-bac-600x284.jpg 600w, https://dulichthesinh.vn/wp-content/uploads/2505_banner-tay-bac-1024x485.jpg 1024w, https://dulichthesinh.vn/wp-content/uploads/2505_banner-tay-bac-300x142.jpg 300w, https://dulichthesinh.vn/wp-content/uploads/2505_banner-tay-bac.jpg 1600w"
												sizes="(max-width: 600px) 100vw, 600px" loading="eager"
												fetchpriority="high" /> </a>
									</div>
								</div>
								<div class="box-text text-left"
									style="background-color:rgb(245, 245, 245);padding:10px 10px 10px 10px;">
									<div class="box-text-inner blog-post-inner">


										<p class="cat-label  is-xxsmall op-7 uppercase">
											Blog du lịch </p>
										<h5 class="post-title is-large ">
											<a href="https://dulichthesinh.vn/tron-bo-kinh-nghiem-du-lich-sapa-tu-tuc/"
												class="plain">Trọn bộ kinh nghiệm du lịch Sapa tự túc</a>
										</h5>
										<div class="is-divider"></div>
										<p class="from_the_blog_excerpt ">
											Trải nghiệm vùng Tây Bắc hùng vĩ, nên thơ với kinh nghiệm du
											lịch Sapa tự túc cùng MoMo,[...đọc tiếp] </p>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col post-item">
						<div class="col-inner">
							<div class="box box-default box-text-bottom box-blog-post has-hover">
								<div class="box-image">
									<div class="image-cover" style="padding-top:56.25%;">
										<a href="https://dulichthesinh.vn/12-mon-ngon-ha-giang-lam-say-long-du-khach/"
											class="plain"
											aria-label="12 món ngon Hà Giang làm say lòng du khách">
											<img decoding="async" width="600" height="301"
												src="https://dulichthesinh.vn/wp-content/uploads/2505_momo-upload-api-210629113522-637605633229550674-600x301.jpg"
												class="attachment-medium size-medium wp-post-image" alt=""
												srcset="https://dulichthesinh.vn/wp-content/uploads/2505_momo-upload-api-210629113522-637605633229550674-600x301.jpg 600w, https://dulichthesinh.vn/wp-content/uploads/2505_momo-upload-api-210629113522-637605633229550674-300x150.jpg 300w, https://dulichthesinh.vn/wp-content/uploads/2505_momo-upload-api-210629113522-637605633229550674.jpg 800w"
												sizes="(max-width: 600px) 100vw, 600px" loading="eager"
												fetchpriority="high" /> </a>
									</div>
								</div>
								<div class="box-text text-left"
									style="background-color:rgb(245, 245, 245);padding:10px 10px 10px 10px;">
									<div class="box-text-inner blog-post-inner">


										<p class="cat-label  is-xxsmall op-7 uppercase">
											Blog du lịch </p>
										<h5 class="post-title is-large ">
											<a href="https://dulichthesinh.vn/12-mon-ngon-ha-giang-lam-say-long-du-khach/"
												class="plain">12 món ngon Hà Giang làm say lòng du khách</a>
										</h5>
										<div class="is-divider"></div>
										<p class="from_the_blog_excerpt ">
											Cùng khám phá bức tranh ẩm thực phố núi phong phú cùng những món
											ngon Hà Giang nhất định[...đọc tiếp] </p>



									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>

			<style>
				#col-387215458>.col-inner {
					padding: 0px 0px 0px 0px;
					margin: 30px 0px 0px 0px;
				}
			</style>
		</div>




		<style>
			#row-2022656090>.col>.col-inner {
				border-radius: 53px;
			}
		</style>
	</div>




</div>

@endsection