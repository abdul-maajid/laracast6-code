<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function show($slug) {

    	$post = Post::where('slug', $slug)->firstorfail();

		return view('post', [ 
			'post'=> $post 
		]);
    }
}
