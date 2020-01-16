@extends('layout')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		@forelse($articles as $article)
			<div id="content">
				<div class="title">
					<h2><a href="{{ route('articles.show' , $article->id) }}">{{ $article->title }}</a></h2>
					<span class="byline">Mauris vulputate dolor sit amet nibh</span> 
				</div>
				<p><img src="{{ asset('images/banner.jpg') }}" alt="" class="image image-full" /> </p>
				<p>{{ $article->excerpt }}</p>
			</div>
			@empty
				<p>No Relevent Articles</p>
		@endforelse
	</div>
</div>

@endsection