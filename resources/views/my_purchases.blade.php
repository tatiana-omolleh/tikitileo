@extends('layout')

@section('content')
    <div class="container">
        <h1>My Purchases</h1>

        <h2>Previous Purchases</h2>
        @forelse ($previousPurchases as $purchase)
            <div class="card mb-3">
                <div class="card-body">
                    @if ($purchase->event)
                        <h5 class="card-title">{{ $purchase->event->name }}</h5>
                        <p class="card-text">Amount Paid: Ksh{{ $purchase->amount }}</p>
                    @else
                        <h5 class="card-title">Event not found</h5>
                    @endif
                </div>
            </div>
        @empty
            <p>No previous purchases found.</p>
        @endforelse

        <h2>Ongoing Payments</h2>
        @forelse ($ongoingPayments as $payment)
            <div class="card mb-3">
                <div class="card-body">
                    @if ($payment->event)
                        <h5 class="card-title">{{ $payment->event->name }}</h5>
                        <p class="card-text">Amount Paid: Ksh{{ $payment->amount }}</p>
                        <p class="card-text">Installments Left: {{ $payment->total_installments - $payment->paid_installments }}</p>
                        <a href="{{ route('complete.payment', ['transactionId' => $payment->id]) }}" class="btn btn-primary">Pay Now</a>
                    @else
                        <h5 class="card-title">Event not found</h5>
                    @endif
                </div>
            </div>
        @empty
            <p>No ongoing payments found.</p>
        @endforelse
    </div>
@endsection
