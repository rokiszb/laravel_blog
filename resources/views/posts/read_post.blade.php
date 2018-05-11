@extends('layouts/main')

@section('contents')

    <div class="row blog-post-title-row">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <span class="subtitle col-md-12">BY {{ $post->author }} ON {{ \Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</span>
    </div>

    <div class="row image-row">
        <img class="post-picture" src="../images/{{ $post->thumbnail }}" alt="">
    </div>

    <div class="row post-text-row">
        <?php echo html_entity_decode($post->body); ?>
    </div>
@endsection