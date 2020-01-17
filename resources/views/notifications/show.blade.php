@extends('layouts.app')

@section('content')

<div class="container">
    <ul>
        @forelse($notifications as $notif)
        
            @if($notif->type === 'App\Notifications\PaymentReceived')
                <li>We have received a payment of ${{ $notif->data['amount'] }} from you.</li>
            @endif

            @empty
                <li>You dont have any notification at the moment</li>

        @endforelse
    </ul>
</div>

@endsection
