@extends('layouts/main')

@section('contents')
    <div class="container">
        <div class="row justify-content-md-center">
            <h3>My Blog Posts</h3>
        </div>
        <div class="row col-md-8 col-md-offset-2">
            <table class="table table-sm"> 
                <thead>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Publish date</th>
                    <th scope="col">#</th>
                    <!-- <th title="Not implemented yet" scope="col">Delete</th> -->
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>     
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td><a class="btn btn-primary" href="{{ action('PostsController@edit_post', [ 'id' => $post->id] )  }}">Edit</a></td>
                            <!-- <td>
                                <div class="checkbox disabled">
                                    <label>
                                    <input type="checkbox" value="" disabled>
                                    </label>
                                </div>    
                            </td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        </div>    
    </div>        
@endsection