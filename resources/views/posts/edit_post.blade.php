@extends('layouts/main')

@section ('contents')
	<h3 class="row justify-content-center">Edit blog post</h3>
	<div class="row justify-content-center create-post-row">
		<form class="col-6" method="POST" action="{{ action('PostsController@update', [ 'id' => $post->id] )  }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
				<label for="postTitle">Post title</label>
				<input name="title" type="text" class="form-control" id="postTitle" aria-describedby="postTitle" required value="{{ $post->title }}">
			</div>
			<div class="form-group image-form-group">
                <div class="col-md-6">
                    <label for="postTitle">Image upload</label>
                    <input type="file" name="post_image" id="image_input">
                </div>
                <div class="col-md-6">
                    <label for="postTitle">Current image</label>
                    <img class="small-img" src="../images/{{ $post->thumbnail }}" alt="">
                </div>
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Post body</label>
				<textarea name="body" class="form-control" id="summernote" rows="3" data-provide="markdown">{{ $post->body }}</textarea>
				<br>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
    </div>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
    <script>
		$('#summernote').summernote({
			tabsize: 2,
			height: 100,
			toolbar: [
						// [groupName, [list of button]]
						['style', ['bold', 'italic', 'underline', 'clear']],
						['font', ['strikethrough', 'superscript', 'subscript']],
						['fontsize', ['fontsize']],
						['color', ['color']],
						['para', ['ul', 'ol', 'paragraph']],
						['height', ['height']]
					]
		});

    </script>

@endsection