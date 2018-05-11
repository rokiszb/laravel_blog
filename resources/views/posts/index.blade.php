@extends('layouts/main')

@section('contents')
    <div class="row blog-title-row">
        <h1 class="blog-title">What's new?</h1>
    </div>

	<div class="row">    
		@foreach ($posts as $post)
			@include('layouts/post')
		@endforeach
	</div>  

    <div class="row pagination-row">
		{{ $posts->links() }}
    </div>
@endsection