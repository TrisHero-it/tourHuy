@extends('client.layout.app')

@section('content')

<div class="row align-center">
	<div class="large-10 col">

<article id="post-1646" class="post-1646 post type-post status-publish format-standard has-post-thumbnail hentry category-blog-du-lich">
	<div class="article-inner ">
		<header class="entry-header">
	<div class="entry-header-text entry-header-text-top text-center" style="padding: 20px;">
		<h6 class="entry-category is-xsmall"><a href="https://dulichthesinh.vn/blog-du-lich/" rel="category tag">Blog du lịch</a></h6><h1 class="entry-title">{{ $blog->title ?? '' }}</h1><div class="entry-divider is-divider small"></div>
	</div>
						<div class="entry-image relative">
				<a href="{{ url()->current() }}">
    <img width="1020" height="680" src="{{ $blog->image ?? '' }}" class="attachment-large size-large wp-post-image" alt="{{ $blog->title ?? '' }}" decoding="async" fetchpriority="high" sizes="(max-width: 1020px) 100vw, 1020px" loading="eager" /></a>
							</div>
			</header>
		<div class="entry-content single-page">

	{!! $blog->content ?? '' !!}





	</div>


	</div>
</div>

@endsection

