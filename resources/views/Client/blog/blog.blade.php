@extends('client.layout.app')

@section('content')

<div id="content" role="main" class="content-area">
	<div class="row" id="row-blog-detail">
		<div class="col small-12 large-12">
			<div class="col-inner">
				<h1 class="entry-title">{{ $blog->title }}</h1>
				<div class="entry-content">
					{!! $blog->content !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

