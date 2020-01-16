@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
@endsection

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

		<form method="POST" action="{{ route('articles.store') }}">
			@csrf
			<div class="field">
				<label class="label" for="article">Title</label>

				<div class="control">
					<input type="text" class="input @error('title') is-danger @enderror" name="title" id="title" value="{{ old('title') }}" />
					@error('title')
						<p class="help is-danger">{{ $message }}</p>
					@enderror
				</div>
			</div>

			<div class="field">
				<label class="label" for="excerpt">Excerpt</label>
				
				<div class="control">
					<textarea class="textarea @error('excerpt') is-danger @enderror " name="excerpt" id="excerpt" >{{ old('excerpt') }}</textarea>
					@error('excerpt')
						<p class="help is-danger">{{ $message }}</p>
					@enderror
				</div>
			</div>

			<div class="field">
				<label class="label" for="body">Body</label>
				
				<div class="control">
					<textarea class="textarea @error('body') is-danger @enderror " name="body" id="body" >{{ old('body') }}</textarea>
					@error('body')
						<p class="help is-danger">{{ $message }}</p>
					@enderror
				</div>
			</div>
			<div class="field">
				<label class="label" for="tags">Tags</label>
				<div class="select is-multiple control">
					<select name="tags[]" id="tags" multiple>
						@foreach($tags as $tag)
							<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
					</select>
				</div>

				@error('tags')
					<p class="help is-danger">{{ $message }}</p>
				@enderror
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