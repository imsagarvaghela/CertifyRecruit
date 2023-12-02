<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('selectExperience');
    }

    public function selectExperience($type)
    {
        $user = auth()->user();
        $payment = Payment::where('user_id', $user->id)
        ->latest('id')
        ->first(); // Replace with your logic
        $isPaymentSuccessful = false;
        if($payment && $payment->status === 'success'){
            $isPaymentSuccessful = true;
        } else {
            User::where('id', $user->id)->update([
                'recruiter_type' => $type
            ]);
        }
        
        return view('exam.index', compact('isPaymentSuccessful', 'user', 'type'));
    }

    public function paymentPage(){
        $user = auth()->user();
        $payment = Payment::where('user_id', $user->id)
        ->latest('id')
        ->first();
        $isPaymentSuccessful = false;
        if($payment && $payment->status === 'success'){
            $isPaymentSuccessful = true;
        }
        return view('pages.select-experience', compact('isPaymentSuccessful', 'user'));
    }
}
