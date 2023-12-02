@extends('layouts.app')

@section('content-body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Payment</h2>
                </div>
                <div class="card-body">
                    <form method="POST" id="payment-form">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                            <small class="text-danger" id="name-error" style="display: none;">Please enter your name.</small>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                            <small class="text-danger" id="email-error" style="display: none;">Please enter your email.</small>
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" required>
                            <small class="text-danger" id="contact-error" style="display: none;">Please enter your contact number.</small>
                        </div>
                        <!-- Paddle Checkout anchor tag -->
                        @if($isPaymentSuccessful === true)
                            <button class="btn btn-primary disabled">Proceed to Payment</button>
                        @else
                            <a href="#" class="btn btn-primary" id="proceed-button">Proceed to Payment</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const proceedButton = document.getElementById('proceed-button');
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const contactInput = document.getElementById('contact');
        const nameError = document.getElementById('name-error');
        const emailError = document.getElementById('email-error');
        const contactError = document.getElementById('contact-error');

        proceedButton.addEventListener('click', function(event) {
            let valid = true;

            if (nameInput.value === "") {
                valid = false;
                nameError.style.display = 'block';
            } else {
                nameError.style.display = 'none';
            }

            if (emailInput.value === "") {
                valid = false;
                emailError.style.display = 'block';
            } else {
                emailError.style.display = 'none';
            }

            if (contactInput.value === "") {
                valid = false;
                contactError.style.display = 'block';
            } else {
                contactError.style.display = 'none';
            }

            if (valid) {
                // All fields are filled, so you can redirect to the phonePe route
                window.location.href = "{{ route('phonePe') }}";
            }
        });
    });
</script>
@endsection
