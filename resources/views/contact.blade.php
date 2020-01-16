@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
@endsection

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<h1 class="heading has-text-weight-bold is-size-4">Send Mail</h1>

		<form method="POST" action="{{ route('mail.sendmarkdownmail') }}">
			@csrf
			<div class="field">
				<label class="label" for="article">Email</label>

				<div class="control">
					<input type="text" class="input @error('email') is-danger @enderror" name="email" id="email" value="{{ old('email') }}" />
					@error('email')
						<p class="help is-danger">{{ $message }}</p>
					@enderror
				</div>
			</div>

			<div class="field is-grouped">
				
				<div class="control">
					<button class="button is-link" type="Submit" >Send</button>
				</div>
            </div>
            @if ( session('message') )

                <div>{{ session('message') }}</div>
                
            @endif

		</form>
	</div>
</div>

@endsection