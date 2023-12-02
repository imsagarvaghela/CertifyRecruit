@inject('payment', 'App\Models\Payment')

@php
    $user = auth()->user();
    $hasSuccessfulPayment = $payment->where('user_id', $user->id)
    ->where('status', 'success')
    ->exists();
@endphp

<li class="nav-item">
    <a href="{{ url('/dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>

@if($hasSuccessfulPayment)
    <li class="nav-item">
        <a href="{{ route('exam.view') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>Exam</p>
        </a>
    </li>
@endif

<li class="nav-item">
    <a href="#" class="nav-link" data-toggle="modal" data-target="#infoModal" style="cursor: pointer;">
        <i class="nav-icon fas fa-info-circle"></i>
        <p>Why We're Here</p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link" data-toggle="modal" data-target="#questionModal" style="cursor: pointer;">
        <i class="nav-icon fas fa-pencil-alt"></i>
        <p>Question Demo</p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link" data-toggle="modal" data-toggle="modal" data-target="#examinationModal">
        <i class="nav-icon fas fa-graduation-cap"></i>
        <p>Examination Rule</p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link" data-toggle="modal" data-target="#contactus" style="cursor: pointer;">
        <i class="nav-icon fas fa-phone"></i>
        <p>Reach Out to Us</p>
    </a>
</li>