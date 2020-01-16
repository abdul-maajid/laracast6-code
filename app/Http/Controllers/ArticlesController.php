<?php

namespace App\Http\Controllers;

use App\Articles as Article;
use App\Tags;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
	// The 7 restful controller actions

	public function index() {

		if(request('tag')){
			$articles = Tags::where('name', request('tag'))->firstOrFail()->articles;
		} else {
			$articles = Article::latest()->get();
		}

		return view('articles.index', ['articles' => $articles]);
	}

    public function show(Article $article) {

    	return view('articles.show', ['article' => $article]);
    }

    public function create() {
    	// shows a view to create a new resource

    	return view('articles.create', [
    		'tags' => Tags::all()
    	]);
    }

    public function store() {
    	// persist the new resource
    	
    	$article = new Article($this->validateArticle());
    	$article->user_id = 1;
    	$article->save();

    	$article->tags()->attach(request('tags'));
    	
    	return redirect(route('articles.index'));
    }

    public function edit(Article $article) {
    	// shows a view edit an existing resource

    	return view('articles.edit', ['article' => $article]);
    }

    public function update(Article $article) {
    	// persist the edited resource
    	$article->update($this->validateArticle());

    	return redirect('/articles/'.$article->id);
    }

    public function destroy(Article $article) {
    	// Delete the resource.
    }

    protected function validateArticle() {
    	return request()->validate([
    		'title' 	=> 'required',
    		'excerpt' 	=> 'required',
    		'body'		=> 'required',
    		'tags'		=> 'exists:tags,id'
    	]);
    }
}
