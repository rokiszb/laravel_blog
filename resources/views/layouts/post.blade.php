<div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="images/{{ $post->thumbnail }}" alt="...">
                <div class="caption">
                    <a href="post/{{ $post->id }}">
                        <h3 class="thumbnail-title">{{ $post->title }}</h3> 
                    </a>
                    <p class="thumbnail-paragraph">{{ $post->author }} / {{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y')}}</p>
                </div>
        </div>
</div>