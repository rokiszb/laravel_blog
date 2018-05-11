<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use Intervention\Image\Facades\Image;
use Validator;
use Storage;

class PostsController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->orderBy('created_at', 'desc')->paginate(6);
    	return view('posts/index', compact('posts'));
    }

    public function create()
    {
    	return view('posts/create');
    }

    public function post($id)
    {
    	$post = Post::find($id);
    	return view('posts/read_post', ['post' => $post]);
    }

    public function my_posts()
    {
        $posts = DB::table('posts')->where('user_id', '=', Auth::user()->id )->get();
    	return view('posts/my_posts', compact('posts'));
    }

    public function edit_post($id)
    {
    	$post = Post::find($id);
    	return view('posts/edit_post', ['post' => $post]);
    }
    
    public function store_post(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:60',
            'body' => 'required|min:5|max:3000',
            'post_image' => 'sometimes|image'
        ));
    	$post = new Post;    
    	$post->title = request('title');
    	$post->body = request('body');
    	$post->author = Auth::user()->name;
    	$post->user_id = Auth::user()->id;
        $post->thumbnail = 'blog_pic.png';

        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename); 
            Image::make($image)->save($location);
            $post->thumbnail = $filename;
        }

    	$post->save();

    	//redirect
    	return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required|max:60',
            'body' => 'required|min:5|max:3000',
            'post_image' => 'sometimes|image'
        ));
    	$post = Post::find($id);    
    	$post->title = request('title');
    	$post->body = request('body');

        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename); 
            Image::make($image)->save($location);
            $oldFilename = $post->thumbnail;
            Storage::delete($oldFilename);
            $post->thumbnail = $filename;
        }

    	$post->save();

    	//redirect
    	return back()->withInput();
    }
}
