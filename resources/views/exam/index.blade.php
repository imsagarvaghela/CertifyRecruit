@extends('layouts.app')

@section('content-body')
<div class="container">
    <div class="card p-4">
        <p class="text-muted">Instructions for the Online Exam:</p>
        <ul class="text-muted">
            <li>You are permitted a maximum of two exam attempts.</li>
            <li>The exam consists of 30 multiple-choice questions, each with four options.</li>
            <li>You will have 15 minutes to complete the assessment.</li>
            <li>Throughout the test, we kindly request that you avoid refreshing the page or navigating away from it. If you do so, you will receive a warning Pop up. If this is done three times, it will result in your removal from the assessment.</li>
            <li>You will only receive certification if your score is above 75%.</li>
            <li>You will only be able to download the certificate in which you had the highest marks obtained.</li>
            <li><b>Once you have completed the exam, please click the 'Finish' button.</b></li>
        </ul>
        <p style="font-weight: 600;">Thank you for your attention to these important guidelines.</p>
        <p style="color: red;">Note: If you encounter any difficulties with payment or assessments, don't hesitate to contact us at <a href="#" data-toggle="modal" class="text-primary" data-target="#contactus" style="cursor: pointer;">support@certifyrecruit.com</a>. Our support team will get in touch with you within the next 4 hours.</p>
        @php
            $max_attempts = 2;
            $disabled = false;
            $resultPassed = false;
            $certificateSent = false;
            $resultStatus = '';

            if (Auth::check()) {
                $user = Auth::user();
                $examstart = \App\Models\ExamStart::where('user_id', $user->id)->where('exam_id', 1)->first();
                $lastPayment = \App\Models\Payment::where('user_id', $user->id)
                ->latest('id')
                ->first();
                if ($examstart) {
                    if ($examstart->attempts >= $max_attempts) {
                        $disabled = true;
                        $message = "You have already used your two attempts for this exam.";
                    } 
                    $result = \App\Models\Result::where('user_id', $user->id)->where('exam_id', 1)->first();
                    if ($result) {
                        if ($result->result_status === 'Pass') {
                            $resultPassed = true;
                            $certificateSent = true;
                        }
                        $resultStatus = $result->result_status;
                    }
                }
            }
        @endphp

        @if ($certificateSent)
            <p class="text-success">Congratulations! You have passed the exam.</p>
            <p class="text-primary">Your certificate has been sent to your email. Please check your inbox.</p>
        @endif

        @if ($resultStatus === 'Failed' && $examstart->attempts > 0)
            <p class="text-danger">Unfortunately, you have not passed the exam this time.</p>
        @endif

        @if($lastPayment)
            @if ($lastPayment->status !== 'success')
                <p class="text-danger">Your payment was not successful. Please complete the payment to start the exam.</p>
                <button class="btn btn-primary disabled">Start Exam</button>
            @elseif ($disabled)
                <p class="text-danger">{{ $message }}</p>
                <button class="btn btn-primary disabled">Start Exam</button>
            @else
                <button class="btn btn-primary" onclick="startExam()">Start Exam</button>
            @endif
        @else
            <a href="{{ route('phonePe') }}" class="btn btn-primary">Proceed to Payment</a>
        @endif
    </div>
</div>
@endsection

@section('footer_script')
<script>
    function openFullscreenWindow(url) {
        const width = screen.width;
        const height = screen.height;
        const features = `height=${height},width=${width},resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no`;
        window.open(url, "_blank", features);
    }

    function startExam() {
        openFullscreenWindow("{{url('exam-start')}}/{{encrypt(1)}}");
    }
</script>
@if(session('error'))
    <script>
        toastr.error("{{ session('error') }}", 'Error');

        // Show Toastr messages after loader closed
        $(window).on('load', function() {
            setTimeout(function() {
                $('.toast').fadeOut(1000); // Fade out over 1 second
            }, 10000); // 10000 milliseconds = 10 seconds
        });
    </script>
@endif

@if(session('success'))
    <script>
        toastr.success("{{ session('success') }}", 'Success');

        // Show Toastr messages after loader closed
        $(window).on('load', function() {
            setTimeout(function() {
                $('.toast').fadeOut(1000); // Fade out over 1 second
            }, 10000); // 10000 milliseconds = 10 seconds
        });
    </script>
@endif


@endsection
