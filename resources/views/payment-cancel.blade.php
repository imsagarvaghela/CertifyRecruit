@extends('layouts.app')

@section('content-body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Payment Cancelled</h2>
                    </div>
                    <div class="card-body">
                        <p>Your payment has been cancelled. If you have any questions or need assistance, please contact our support team.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Return to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
