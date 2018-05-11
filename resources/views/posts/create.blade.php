@extends ('layouts/main')

@section ('contents')
	<h3 class="row justify-content-center">New blog post</h3>
	<div class="row justify-content-center create-post-row">
		<form class="col-6" method="POST" action="{{ action('PostsController@store_post') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="postTitle">Post title</label>
				<input name="title" type="text" class="form-control" id="postTitle" aria-describedby="postTitle" required>
			</div>
			<div class="form-group">
				<label for="postTitle">Image upload</label>
				<input type="file" name="post_image" id="image_input">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Post body</label>
				<textarea name="body" class="form-control" id="summernote" rows="3" data-provide="markdown"></textarea>
				<br>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>

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