
@if (Route::currentRouteName() === 'home')
                    <div class="mx-1" style="position: absolute; bottom: 5px;">
                        <p>Note: If you encounter any difficulties with payment or assessments, don't hesitate to contact us at <a href="#" data-toggle="modal" class="text-primary" data-target="#contactus" style="cursor: pointer;">support@certifyrecruit.com</a>. Our support team will get in touch with you within the next 4 hours.</p>
                    </div>
                @endif<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CertifyRecruit') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css" integrity="sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ==" crossorigin="anonymous" />
    <link rel="icon" href="{{ asset('storage/images/logo2.jpg') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    @yield('css')
    <style>
        /* ... Your existing styles ... */

        /* Loader */
        @if (Route::currentRouteName() === 'home')
                    <div class="mx-1" style="position: absolute; bottom: 5px;">
                        <p>Note: If you encounter any difficulties with payment or assessments, don't hesitate to contact us at <a href="#" data-toggle="modal" class="text-primary" data-target="#contactus" style="cursor: pointer;">support@certifyrecruit.com</a>. Our support team will get in touch with you within the next 4 hours.</p>
                    </div>
                @endif
        .loading-spinner {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            /* Semi-transparent white overlay */
            z-index: 9999;
            /* Place the loader above everything */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader {
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 80px;
            height: 80px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .colorful-section {
            background-color: #f7f7f7;
            padding: 40px 0;
        }

        .colorful-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .colorful-card:hover {
            transform: scale(1.05);
        }

        .heading {
            font-size: 2.5rem;
            font-weight: 900;
        }

        .form-control {
            border: none;
            border-bottom: 1px solid #ccc;
            padding-left: 0;
            padding-right: 0;
            border-radius: 0;
            background: none;
        }

        .form-control:active,
        .form-control:focus {
            outline: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-color: #000;
        }

        .col-form-label {
            color: #000;
            font-size: 13px;
        }

        .modal-footer .btn,
        .form-control,
        .custom-select {
            height: 45px;
        }

        .custom-select:active,
        .custom-select:focus {
            outline: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-color: #000;
        }

        .modal-footer .btn {
            border: none;
            border-radius: 0;
            font-size: 12px;
            letter-spacing: .2rem;
            text-transform: uppercase;
        }

        .modal-footer .btn.btn-primary {
            background: #35477d;
            color: #fff;
            padding: 15px 20px;
        }

        .modal-footer .btn:hover {
            color: #fff;
        }

        .modal-footer .btn:active,
        .btn:focus {
            outline: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .contact-wrap {
            -webkit-box-shadow: 0 0px 20px 0 rgba(0, 0, 0, 0.2);
            box-shadow: 0 0px 20px 0 rgba(0, 0, 0, 0.2);
        }

        .contact-wrap .col-form-label {
            font-size: 14px;
            color: #b3b3b3;
            margin: 0 0 10px 0;
            display: inline-block;
            padding: 0;
        }

        .contact-wrap .form,
        .contact-wrap .contact-info {
            padding: 40px;
        }

        .contact-wrap .contact-info {
            color: rgba(255, 255, 255, 1);
        }

        .contact-wrap .contact-info ul li {
            margin-bottom: 15px;
            color: rgba(255, 255, 255, 1);
        }

        .contact-wrap .contact-info ul li .wrap-icon {
            font-size: 20px;
            color: #fff;
            margin-top: 5px;
        }

        .contact-wrap .form {
            background: #fff;
        }

        .contact-wrap .form h3 {
            color: #35477d;
            font-size: 20px;
            margin-bottom: 30px;
        }

        .contact-wrap .contact-info {
            background: #007bff;
        }

        .contact-wrap .contact-info h3 {
            color: #fff;
            font-size: 20px;
            margin-bottom: 30px;
        }

        label.error {
            font-size: 12px;
            color: red;
        }

        #message {
            resize: vertical;
        }

        #form-message-warning,
        #form-message-success {
            display: none;
        }

        #form-message-warning {
            color: #B90B0B;
        }

        #form-message-success {
            color: #55A44E;
            font-size: 18px;
            font-weight: bold;
        }

        .submitting {
            float: left;
            width: 100%;
            padding: 10px 0;
            display: none;
            font-weight: bold;
            font-size: 12px;
            color: #000;
        }

        /* Add hover effect to the card */
        .dashboard .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Set the cursor to a hand pointer on hover */
        .card:hover {
            cursor: pointer;
        }


        @import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400);

        .fsModal .font-roboto {
            font-family: 'roboto condensed';
        }

        .fsModal * {
            box-sizing: border-box;
        }

        .fsModal .modal {
            position: relative;
            overflow: hidden;
        }

        .fsModal .modal-dialog {
            position: initial;
            margin: 0;
            width: 100%;
            height: 100%;
            padding: 0;
        }

        .fsModal .modal-content {
            position: absolute;
            top: 5%;
            right: 10%;
            bottom: 5%;
            left: 10%;
            width: 80%;
            border-radius: 1;
        }

        .fsModal .modal-header {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            height: 50px;
            padding: 10px;
            background: #6598d9;
            border: 0;
        }

        .fsModal .modal-title {
            font-weight: 600;
            font-size: 2em;
            color: #fff;
            line-height: 30px;
        }

        #questionModal .modal-title {
            font-weight: 600;
            font-size: 2em;
            color: #fff;
            line-height: 30px;
        }

        .fsModal .modal-body {
            position: absolute;
            top: 50px;
            bottom: 60px;
            width: 100%;
            font-weight: 300;
            overflow: auto;
        }

        .fsModal .modal-footer {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            height: 60px;
            padding: 10px;
            background: #f1f3f5;
        }

        .fsModal .btn {
            height: 40px;
            border-radius: 0;
        }

        .fsModal .btn-modal {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -20px;
            margin-left: -100px;
            width: 200px;
        }

        .fsModal .btn-secondary,
        .fsModal .btn-secondary:hover,
        .fsModal .btn-secondary:focus,
        .fsModal .btn-secondary:active {
            color: #cc7272;
            background: transparent;
            border: 0;
        }

        
        .fsModal h2,
        .fsModal h3 {
            color: #3498db;
            font-size: 1.5em;
            line-height: 1.5em;
        }

        
        #questionModal h2,
        #questionModal h3 {
            color: #3498db;
            font-size: 1.5em;
            line-height: 1.5em;
        }

        .fsModal h1,
        #questionModal h1{
            color: #f7f7f7;
            font-size: 1.5em;
            line-height: 1.5em;
        }

        .fsModal p {
            font-size: 1em;
            line-height: 1.2;
            color: lighten(#5f6377, 20%);
        }

        .fsModal ::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 10px;
            background: #f1f3f5;
            border-left: 1px solid darken(#f1f3f5, 10%);
        }

        .fsModal ::-webkit-scrollbar-thumb {
            background: darken(#f1f3f5, 20%);
        }
    </style>
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .border-gray-200 {
            --tw-border-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity))
        }

        .text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        .text-gray-400 {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --tw-bg-opacity: 1;
                background-color: rgb(31 41 55 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:border-gray-700 {
                --tw-border-opacity: 1;
                border-color: rgb(55 65 81 / var(--tw-border-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: rgb(107 114 128 / var(--tw-text-opacity))
            }
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="loading-spinner" class="loading-spinner">
        <div class="loader"></div>
    </div>
    <div class="wrapper">
        @include('layouts.header')

        @include('layouts.sidebar')
        @inject('payment', 'App\Models\Payment')

        @php
            $user = auth()->user();
            $hasSuccessfulPayment = $payment->where('user_id', $user->id)
            ->where('status', 'success')
            ->exists();
        @endphp

        <div class="content-wrapper">
            <section class="content">
                <section class="content-header">
                    @yield('content-header')
                </section>

                <section class="content px-3">
                    @if (Session::has('message'))
                    <div class="alert {{ Session::get('type') }} alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ Session::get('message') }}</strong>
                    </div>
                    @endif

                    @yield('content-body')
                    @if (Route::currentRouteName() === 'home')
                    <div class="row row-cols-1 row-cols-md-4 g-4 dashboard">
                        @if($hasSuccessfulPayment)
                            <div class="col mb-3">
                                <a href="{{ route('exam.view') }}">
                                    <div class="card h-100 text-white" style="background:#002B88">
                                        <div class="card-body pb-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <i class="fas fa-graduation-cap fa-3x"></i>
                                                <h5 class="card-title ml-3">Assessment</h5>
                                            </div>
                                            <button class="btn mt-3 mb-0 btn-block" style="background:#002B88; color: #fff; border:1px solid #fff">
                                                Give Assessment
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @else
                            <div class="col mb-3">
                                <a href="{{ route('select.experience', ['type' => 'us_recruiter']) }}">
                                    <div class="card h-100 text-white" style="background:#002B88">
                                        <div class="card-body pb-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <i class="fas fa-award fa-3x"></i>
                                                <h5 class="card-title ml-3">US Recruitment Assessment</h5>
                                            </div>
                                            <button class="btn mt-3 mb-0 btn-block" style="background:#002B88; color: #fff; border:1px solid #fff">
                                                Proceed for Assessment
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col mb-3">
                                <a href="{{ route('select.experience', ['type' => 'domestic']) }}">
                                    <div class="card h-100 text-white" style="background: linear-gradient(#07E2FA, #3650F1);">
                                        <div class="card-body pb-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <i class="fas fa-award fa-3x"></i>
                                                <h5 class="card-title ml-2">Domestic Recruitment Assessment</h5>
                                            </div>
                                            <button class="btn mt-3 mb-0 btn-block" style="background: linear-gradient(#07E2FA, #3650F1); color: #fff; border: 1px solid #fff;">
                                                Proceed for Assessment
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($passedResult)
                        <div class="col mb-3">
                            <a href="{{ route('download.certificate') }}">
                                <div class="card h-100 text-white" style="background: linear-gradient(#07E2FA, #3650F1);">
                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <i class="fas fa-file-alt fa-3x"></i>
                                            <h5 class="card-title">{{$passedResult->total_marks}} Marks Obtained</h5>
                                        </div>
                                        <button class="btn mt-3 mb-0 btn-block" style="background: linear-gradient(#07E2FA, #3650F1); color: #fff; border: 1px solid #fff;">
                                            Download Certificate
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                    </div>
                    @endif
                </section>
                @if (Route::currentRouteName() === 'home')
                    <div class="mx-1" style="position: absolute; bottom: 5px;">
                        <p>Note: If you encounter any difficulties with payment or assessments, don't hesitate to contact us at <a href="#" data-toggle="modal" class="text-primary" data-target="#contactus" style="cursor: pointer;">support@certifyrecruit.com</a>. Our support team will get in touch with you within the next 4 hours.</p>
                    </div>
                @endif
            </section>
        </div>

        <div class="modal fade" id="contactus" tabindex="-1" aria-labelledby="contactModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="content">
                        <div class="row align-items-stretch no-gutters contact-wrap">
                            <div class="col-md-7">
                                <button type="button" class="close close-icon mr-3 mt-2" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="form h-100">
                                    <h3>Send us a message</h3>
                                    <form class="mb-5" method="post" action="{{ url('/contact/store') }}" id="contactForm" name="contactForm" onsubmit="return validateForm()">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group mb-5">
                                                <label for="name" class="col-form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Your name" required>
                                                <div class="invalid-feedback" id="name-error"></div>
                                            </div>
                                            <div class="col-md-6 form-group mb-5">
                                                <label for="email" class="col-form-label">Email *</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Your email" required>
                                                <div class="invalid-feedback" id="email-error"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 form-group mb-5">
                                                <label for="phone" class="col-form-label">Phone</label>
                                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone #" pattern="[0-9]{10}">
                                                <div class="invalid-feedback" id="phone-error"></div>
                                            </div>
                                            <div class="col-md-6 form-group mb-5">
                                                <label for="company" class="col-form-label">Company</label>
                                                <input type="text" class="form-control" name="company" id="company" placeholder="Company name">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group mb-5">
                                                <label for="message" class="col-form-label">Message *</label>
                                                <textarea class="form-control" name="message" id="message" cols="30" rows="4" placeholder="Write your message" required></textarea>
                                                <div class="invalid-feedback" id="message-error"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                                                <span class="submitting"></span>
                                            </div>
                                        </div>
                                    </form>
                                    <div id="form-message-warning mt-4"></div>
                                    <div id="form-message-success">
                                        Your message was sent, thank you!
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="contact-info h-100">
                                    <h3>Contact Information</h3>
                                    <ul class="list-unstyled">
                                        <li class="d-flex">
                                            <span class="wrap-icon icon-phone mr-3"><i class="fas fa-phone"></i></span>
                                            <span class="text mt-1">+91 2657964176</span>
                                        </li>
                                        <li class="d-flex">
                                            <span class="wrap-icon icon-envelope mr-3"><i class="fas fa-envelope"></i></span>
                                            <span class="text mt-1">support@certifyrecruit.com</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="infoModal" class="modal animated bounceIn fsModal" tabindex="-1" role="dialog" aria-labelledby="infoModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 id="myModalLabel" class="modal-title">
                            Why We're Here
                        </h1>
                    </div>
                    <div class="modal-body">
                        <h3>Recruiter Assessment: </h3>
                        <p>We have developed a comprehensive assessment tool designed to evaluate the skills and competencies of recruiters. This tool aims to enhance recruiters' abilities and promote self-evaluation within the recruiting field. Are you ready to evaluate yourself and stand out from the crowd?</p>
                        <p>Are you prepared to assess yourself and distinguish your abilities from the rest?</p>
                        
                        <p>We are excited to present our cutting-edge Comprehensive Assessment Tool meticulously crafted to evaluate and elevate the skills and competencies of recruiters. In a dynamic job market where talent acquisition plays a pivotal role, staying ahead demands a keen understanding of one's abilities. Our tool is designed with this principle in mind – empowering recruiters to excel and fostering self-evaluation within the recruitment sphere.</p>

                        <h3>Key Features:</h3>
                        <p>Holistic Evaluation: Our assessment tool considers a wide spectrum of skills and competencies crucial for successful recruitment. From communication prowess and interpersonal skills to data analysis and decision-making abilities, every facet is meticulously assessed.</p>
                        <p>Personalized Enhancement: The tool doesn't stop at evaluation; it offers valuable insights to aid recruiters in honing their strengths and addressing areas that need improvement. This personalized approach ensures that each recruiter's journey is tailored to their growth.</p>
                        <p>Industry Relevance: We recognize that the recruiting landscape is ever-evolving. Our assessment tool is aligned with current industry trends and best practices, providing recruiters with the most relevant evaluation metrics.</p>
                        <p>Promotion of Self-Evaluation: The tool's primary goal is to encourage recruiters to take an introspective look at their abilities. By promoting self-assessment, recruiters can proactively identify areas for growth and development, leading to a continuous cycle of improvement.</p>
                        <p>Stand Out in the Field: In a competitive job market, setting oneself apart is vital. Our assessment tool empowers recruiters to gauge their capabilities comprehensively, allowing them to distinguish themselves from the crowd with confidence.</p>
                        <p>Progressive Learning: The assessment tool is not a one-time affair; it can be utilized at various stages of a recruiter's career. This enables professionals to track their progress over time and adapt to the changing demands of the industry.
                            Are you ready to embrace the future of recruitment? Are you prepared to assess yourself, refine your skills, and emerge as a standout recruiter? With our Comprehensive Assessment Tool, you have the means to evaluate your abilities systematically and pave your way to success in the dynamic world of talent acquisition. Elevate your skills, empower your career – take the plunge today!</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">
                            close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="examinationModal" class="modal animated bounceIn fsModal" tabindex="-1" role="dialog" aria-labelledby="infoModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 id="myModalLabel" class="modal-title">
                            Examination Rule
                        </h1>
                    </div>
                    <div class="modal-body">
                        <h3>Instructions for the Online Exam: </h3>
                            <li>You are permitted a maximum of two exam attempts.</li>
                            <li>Throughout the test, we kindly request that you avoid refreshing the page or navigating away from it.</li>
                            <li>Kindly ensure that you respond to all questions within the designated time.</li>
                            <li>Once you have completed the exam, please click the 'Finish' button.</li>
                            <li>We ask that you keep your mobile phone and other electronic devices away from your workspace during the exam.</li>
                            <li>Please refrain from communicating with others while the exam is in progress.</li>
                            <li>Prior to submission, we recommend that you thoroughly review both the questions and your answers.</li>
                            <li>The registration fee for the assignment amounts to INR 200.</li>
                            <li>The exam consists of 30 multiple-choice questions, each with four options.</li>
                            <li>Thank you for your attention to these important guidelines.</li>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">
                            close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="privacyModal" class="modal animated bounceIn fsModal" tabindex="-1" role="dialog" aria-labelledby="infoModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 id="myModalLabel" class="modal-title">
                            Privacy Policy
                        </h1>
                    </div>
                    <div class="modal-body">
                        <p>This Privacy Policy describes how CLUSTER CERTIFY RECRUIT PRIVATE LIMITED collects, uses, and protects your personal information when you visit and use the website <a href="https://certifyrecruit.com" class="text-primary">www.certifyrecruit.com</a>. By accessing and using the Site, you agree to the terms of this Privacy Policy. If you do not agree to these terms, please do not use the Site.</p>
                        <h3>1. Information We Collect</h3>
                        <p><b>a. Personal Information:</b> : We may collect personal information, such as your name, email address, phone number, and other contact details when you register for an account, make payments, or contact us.</p>
                        <p><b>b. Usage Information:</b> : We may collect personal information, such as your name, email address, phone number, and other contact details when you register for an account, make payments, or contact us.</p>
                        <h3>2. How We Use Your Information</h3>
                        <p>a. We use your personal information to:</p>
                        <li>Process payments and provide the services you request.</li>
                        <li>Send you important information, updates, and newsletters.</li>
                        <p>b. We may use usage information for:</p>
                        <li>Improving the Site's performance and functionality.</li>
                        <li>Analyzing user behavior and trends to enhance user experience.</li>
                        <h3>3. Sharing of Information</h3>
                        <p>We do not sell, trade, or transfer your personal information to third parties. However, we may share your information with trusted service providers, partners, and affiliates who assist us in operating the Site, conducting our business, or servicing you. We will ensure that they maintain the confidentiality of your information.</p>
                        <h3>4. Cookies and Tracking Technologies</h3>
                        <p>We may use cookies and similar tracking technologies to enhance your user experience. You can set your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of the Site.</p>
                        <h3>5. Security</h3>
                        <p>We take reasonable measures to protect your personal information from unauthorized access, disclosure, alteration, or destruction. However, please be aware that no method of transmission over the internet, or method of electronic storage, is entirely secure.</p>
                        <h3>6. Links to Other Websites</h3>
                        <p>The Site may contain links to external websites that are not operated by us. We have no control over the content and practices of these websites and cannot be responsible for their privacy policies.</p>
                        <h3>7. Changes to the Privacy Policy</h3>
                        <p>The Company reserves the right to modify this Privacy Policy at any time. We will notify you of any changes by posting the updated Privacy Policy on the Site. It is your responsibility to review this policy regularly.</p>
                        <h3>8. Contact Information</h3>
                        <p>If you have questions or concerns about this Privacy Policy, please contact us at:</p>
                        <p>CLUSTER CERTIFY RECRUIT PRIVATE LIMITED Office No. 29, 3rd Floor, Opp. Voltamp, Makarpura, Vadodara – 390013, Gujarat, India Email: info@certifyrecruit.com Phone: +91 2657966889</p>
                        <p>By using this Site, you acknowledge that you have read, understood, and agreed to this Privacy Policy.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">
                            close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="termsModal" class="modal animated bounceIn fsModal" tabindex="-1" role="dialog" aria-labelledby="infoModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 id="myModalLabel" class="modal-title">
                            Terms and Conditions
                        </h1>
                    </div>
                    <div class="modal-body">
                        <p>Welcome to <a href="https://certifyrecruit.com" class="text-primary">www.certifyrecruit.com</a>. The website <a href="https://certifyrecruit.com" class="text-primary">www.certifyrecruit.com</a> is owned and operated by CLUSTER CERTIFY RECRUIT PRIVATE LIMITED , a company incorporated under the provisions of the Companies Act, 2013 (18 of 2013), with its registered office at Office No. 29, 3rd Floor, Opp. Voltamp, Makarpura, Vadodara – 390013, Gujarat, India.</p>
                        <p>Please read these Terms and Conditions carefully before using <a href="https://certifyrecruit.com" class="text-primary">www.certifyrecruit.com</a> operated by CLUSTER CERTIFY RECRUIT PRIVATE LIMITED. By accessing or using the Site, you agree to comply with and be bound by these Terms. If you do not agree to these Terms, please do not use the Site.</p>
                        <h3>1. Acceptance of Terms </h3>
                        <p>By using the Site, you agree to be bound by these Terms, our Privacy Policy, and all applicable laws and regulations. If you do not agree to these Terms, please refrain from using the Site.</p>
                        <h3>2. Modification of Terms </h3>
                        <p>The Company reserves the right to modify or revise these Terms at any time, with or without prior notice. It is your responsibility to review these Terms regularly. Continued use of the Site after any changes constitutes your acceptance of the modified Terms.</p>
                        <h3>3. User Eligibility </h3>
                        <p>You must be at least 18 years old to use this Site. By using the Site, you represent and warrant that you are of legal age.</p>
                        <h3>4. Registration and Account </h3>
                        <p>You may be required to create an account to access certain features of the Site. You are responsible for maintaining the confidentiality of your account information and for all activities that occur under your account.</p>
                        <h3>5. User Content </h3>
                        <p>Users may post, upload, or submit content on the Site. By doing so, you grant the Company a non-exclusive, royalty-free, worldwide, transferable, and sublicensable right to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, and display such content on the Site and in connection with the Company's business.</p>
                        <h3>6. Prohibited Activities </h3>
                        <p>When using the Site, you agree not to: a. Violate any applicable laws or regulations. b. Infringe on the rights of others. c. Use the Site for any unauthorized or illegal purpose. d. Transmit or post harmful content, including but not limited to viruses, malware, or any material that may disrupt the Site's operation. e. Engage in any fraudulent activity.</p>
                        <h3>7. Intellectual Property </h3>
                        <p>The Site and its original content, features, and functionality are owned by the Company and are protected by international copyright, trademark, patent, trade secret, and other intellectual property or proprietary rights laws.</p>
                        <h3>8. Termination </h3>
                        <p>The Company reserves the right to terminate or suspend your account and access to the Site, with or without notice, for any reason, including if you violate these Terms.</p>
                        <h3>9. Limitation of Liability </h3>
                        <p>The Company shall not be liable for any direct, indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly, arising from your use of the Site or any content or materials provided through the Site.</p>
                        <h3>10. Governing Law </h3>
                        <p>These Terms are governed by and construed in accordance with the laws of India. Any disputes or claims arising from these Terms will be subject to the exclusive jurisdiction of the courts in Vadodara, Gujarat.</p>
                        <h3>11. Contact Information </h3>
                        <p>If you have any questions about these Terms, please contact us at:</p>
                        <p>CLUSTER CERTIFY RECRUIT PRIVATE LIMITED Office No. 29, 3rd Floor, Opp. Voltamp, Makarpura, Vadodara – 390013, Gujarat, India Email: info@certifyrecruit.com Phone: +91 2657966889</p>
                        <p>By using this Site, you acknowledge that you have read, understood, and agreed to these Terms and Conditions.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">
                            close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="refundModal" class="modal animated bounceIn fsModal" tabindex="-1" role="dialog" aria-labelledby="infoModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 id="myModalLabel" class="modal-title">
                            Refund Policy
                        </h1>
                    </div>
                    <div class="modal-body">
                        <p>We are dedicated to providing high-quality assessment and certification services to our customers. We aim to ensure your satisfaction with our services. However, we understand that there may be situations where you need to request a refund. This Refund Policy outlines our procedures for processing refund requests related to our assessment and certification services.</p>
                        <h3>1. Eligibility for Refund: </h3>
                        <p>-  We offer refunds for the following situations: </p>
                        <p>a. Duplicate Charges: If you were charged for the same assessment or certification multiple times due to a technical error, you may be eligible for a refund.</p>
                        <p>b. Service Errors: If you encounter errors or issues on our platform that prevent you from completing an assessment or certification, and these issues are on our end, you may be eligible for a refund.</p>
                        <p>c. Service Non-Delivery: In cases where we are unable to provide the assessment or certification services you purchased, you may be eligible for a refund.</p>
                        <h3>2. Refund Request Process: </h3>
                        <p>To request a refund, please follow these steps:</p>
                        <p>a. Contact our customer support team through our contact page or by emailing info@certifyrecruit.com.</p>
                        <p>b. Provide your account details, order number, and a clear description of the issue.</p>
                        <p>c. We may require additional information, such as screenshots, error messages, or any other relevant documents.</p>
                        <p>d. Once we receive your request, we will review it and notify you of the decision.</p>
                        <h3>3. Refund Approval: </h3>
                        <p>- If your refund request is approved, we will process the refund in the following manner:</p>
                        <p>a. The refund amount will be credited to the original payment method used for the purchase.</p>
                        <p>b. The time it takes for the refund to appear in your account may vary based on your financial institution.</p>
                        <h3>4. Non-Refundable Items:</h3>
                        <p>- Some aspects of our assessment and certification services may be non-refundable. This will be clearly stated in the terms and conditions associated with each specific assessment or certification.</p>
                        <h3>5. Exemptions </h3>
                        <p>- Refunds will not be provided in the following cases:</p>
                        <p>a. Change of Mind: We do not offer refunds for assessments or certifications due to a change of mind.</p>
                        <p>b. Failed Assessments: Failing an assessment does not qualify for a refund.</p>
                        <p>c. Non-compliance with Terms: If the refund request is a result of non-compliance with our terms and policies, it may not be approved.</p>
                        <h3>6. Contact Information: </h3>
                        <p>- If you have any questions or concerns regarding our refund policy, please contact us at info@certifyrecruit.com.</p>
                        <h3>7. Amendment of Policy: </h3>
                        <p> - We reserve the right to amend or update this refund policy at any time. Any changes will be posted on our website.</p>
                        <p><a href="https://certifyrecruit.com" class="text-primary">www.certifyrecruit.com</a> is committed to providing accurate and reliable assessment and certification services. We will handle refund requests professionally and fairly to ensure your satisfaction.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">
                            close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="questionModal" class="modal animated bounceIn fsModal" tabindex="-1" role="dialog" aria-labelledby="infoModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 id="myModalLabel" class="modal-title">
                            Question Demo
                        </h1>
                    </div>
                    <div class="modal-body">
                        <h3>1. What does "IRS" stand for in the context of US taxes?</h3>
                        <p>a) Option 1 b) Option 2 c) Option 3 d) Option 4</p>
                        <h3>2. Which step in the recruitment process involves reviewing applications to select candidates for interviews?</h3>
                        <p>a) Option 1 b) Option 2 c) Option 3 d) Option 4</p>
                        <h3>3. Which type of visa is commonly used by foreign students to study in the United States?</h3>
                        <p>a) Option 1 b) Option 2 c) Option 3 d) Option 4</p>
                        <h3>4. What is the tax status for a worker who is considered an independent contractor and receives a Form 1099?</h3>
                        <p>a) Option 1 b) Option 2 c) Option 3 d) Option 4</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">
                            close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @extends('layouts.footer')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js" integrity="sha512-++c7zGcm18AhH83pOIETVReg0dr1Yn8XTRw+0bWSIWAVCAwz1s2PwnSj4z/OOyKlwSXc4RLg3nnjR22q0dhEyA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        // Function to hide the loader
        function hideLoader() {
            document.getElementById('loading-spinner').style.display = 'none';
        }

        // Attach the hideLoader function to the window's load event
        window.onload = hideLoader;

        function validateForm() {
            let isValid = true;
            const form = document.getElementById('contactForm');

            form.querySelectorAll('.invalid-feedback').forEach((feedback) => {
                feedback.textContent = '';
            });

            const nameInput = form.querySelector('#name');
            const emailInput = form.querySelector('#email');
            const phoneInput = form.querySelector('#phone');
            const messageInput = form.querySelector('#message');

            if (!nameInput.checkValidity()) {
                document.getElementById('name-error').textContent = 'Please enter a valid name.';
                isValid = false;
            }

            if (!emailInput.checkValidity()) {
                document.getElementById('email-error').textContent = 'Please enter a valid email address.';
                isValid = false;
            }

            if (!phoneInput.checkValidity()) {
                document.getElementById('phone-error').textContent = 'Please enter a valid 10-digit phone number.';
                isValid = false;
            }

            if (!messageInput.checkValidity()) {
                document.getElementById('message-error').textContent = 'Please enter a message.';
                isValid = false;
            }

            return isValid;
        }
    </script>
    @if(session('success'))
    <script>
        toastr.options.timeOut = 10000;
        toastr.success("{{ session('success') }}", 'Success');
    </script>
    @endif

    @if(session('error'))
    <script>
        toastr.options.timeOut = 10000;
        toastr.error("{{ session('error') }}", 'Error');
    </script>
    @endif

    @yield('footer_script')

</body>

</html>