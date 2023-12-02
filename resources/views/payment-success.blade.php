@extends('layouts.app')

@section('content-body')
<div class="container">
    <h2>Payment Successful!</h2>
    <p>Thank you for making the payment. Your payment was successful.</p>

    <!-- You can add more content here to show the payment details or any other relevant information -->
    <div>
        <h3>Payment Details:</h3>
        <p>Payment ID: {{ $payment->payment_id }}</p>
        <p>Amount: ${{ $payment->amount }}</p>
        <p>Status: {{ $payment->status }}</p>
        <!-- Add other payment details you want to display -->
    </div>

    <p>You can now access the exam module or any other relevant features on the platform.</p>
</div>
@endsection
