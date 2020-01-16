@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
@endsection

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

		<form method="POST" action="{{ route('payment.store') }}">
			@csrf
            @if ( session('message') )
                <p> {{ session('message') }} </p>
            @endif
			<div class="field is-grouped">				
				<div class="control">
					<button class="button is-link" type="Submit" >Send Payment</button>
				</div>
			</div>

		</form>
	</div>
</div>

@endsection