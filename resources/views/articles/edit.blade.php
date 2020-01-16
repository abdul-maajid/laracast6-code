@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
@endsection

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<h1 class="heading has-text-weight-bold is-size-4">Uodate Article</h1>


		<!-- Browser only understands POST And GET thats why we will use post here and below we will use laravel method -->
		<form method="POST" action="/articles/{{ $article->id }}">
			@csrf
			@method('PUT')

			<div class="field">
				<label class="label" for="article">Title</label>

				<div class="control">
					<input type="text" class="input" name="title" id="title" value="{{ $article->title }}" />
				</div>
			</div>

			<div class="field">
				<label class="label" for="excerpt">Excerpt</label>
				
				<div class="control">
					<textarea class="textarea" name="excerpt" id="excerpt" >{{ $article->excerpt }}</textarea>
				</div>
			</div>

			<div class="field">
				<label class="label" for="body">Body</label>
				
				<div class="control">
					<textarea class="textarea" name="body" id="body" >{{ $article->body }}</textarea>
				</div>
			</div>

			<div class="field is-grouped">
				
				<div class="control">
					<button class="button is-link" type="Submit" >Submit</button>
				</div>
			</div>

		</form>
	</div>
</div>

@endsection