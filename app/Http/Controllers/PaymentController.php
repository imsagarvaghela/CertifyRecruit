<?php

namespace App\Http\Controllers;

use App\Mail\PaymentConfirmationEmail;
use App\Mail\VerificationEmail;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Cookie;

use Stripe\Stripe;
use Stripe\Webhook;

class PaymentController extends Controller
{
    // public function createOrder(Request $request)
    // {
    //     $amount = 200; // Set your desired amount
    //     $user = auth()->user();

    //     // Set your Stripe API key
    //     Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

    //     // Create a Payment record (optional)
        

    //     // Create a Stripe Checkout Session
    //     $session = \Stripe\Checkout\Session::create([
    //         'payment_method_types' => ['card'], // Add the desired payment methods
    //         'line_items' => [
    //             [
    //                 'price_data' => [
    //                     'currency' => 'INR',
    //                     'product_data' => [
    //                         'name' => 'CertifyRecruit Assessment ',
    //                     ],
    //                     'unit_amount' => $amount * 100, // Amount in cents
    //                 ],
    //                 'quantity' => 1,
    //             ],
    //         ],
    //         'mode' => 'payment',
    //         'success_url' => route('exam.view'),
    //         'cancel_url' => route('payment.cancel'),
    //         'customer_email' => $request->email, // Pass email to Stripe
    //     ]);

    //     $payment = new Payment([
    //         'user_id' => $user->id,
    //         'amount' => $amount,
    //         'payment_id' => $session->id,
    //         'status' => 'pending',
    //     ]);
    //     $payment->save();

    //     return response()->json(['sessionId' => $session->id]);
    // }
    
    // public function processPayment(Request $request)
    // {
    //     return view('payment-success');
    // }

    // public function handlePaymentSuccess(Request $request)
    // {
    //     // Handle the successful payment, e.g., update payment status
    //     $sessionId = $request->query('session_id');

    //     // Find the related payment record and update its status to 'success'
    //     $payment = Payment::where('session_id', $sessionId)->first();
    //     if ($payment) {
    //         $payment->status = 'success';
    //         $payment->save();
    //     }

    //     return view('payment-success');
    // }

    // public function handleWebhook(Request $request)
    // {
    //     Log::info('Stripe webhook called');

    //     $payload = json_decode($request->getContent(), true);

    //     // Verify the webhook signature
    //     $webhookSecret = env('STRIPE_WEBHOOK_SECRET');

    //     try {
    //         $event = Webhook::constructEvent($request->getContent(), $request->header('stripe-signature'), $webhookSecret);
    //     } catch (\Exception $e) {
    //         Log::error('Invalid Stripe webhook signature');
    //         return response()->json(['error' => 'Invalid signature'], 400);
    //     }

    //     // Handle different webhook events
    //     switch ($event->type) {
    //         case 'checkout.session.completed':
    //             $checkoutSession = $event->data->object;
    //             $paymentIntentId = $checkoutSession->id;
    //             $this->updatePaymentStatus($paymentIntentId, 'success');
    //             $customerEmail = $checkoutSession->customer_email;
    //             $customerName = $checkoutSession->customer_details->name;
    //             Mail::to($customerEmail)->queue(new PaymentConfirmationEmail($customerName));
    //             // Perform other necessary actions for successful checkout
    //             break;

    //         case 'checkout.session.async_payment_failed':
    //             $checkoutSession = $event->data->object;
    //             $paymentIntentId = $checkoutSession->id;
    //             $this->updatePaymentStatus($paymentIntentId, 'failed');
    //             // Perform other necessary actions for failed payment
    //             break;

    //         default:
    //             // Handle unknown event
    //             break;
    //     }

    //     return response()->json(['status' => 'success']);
    // }
    
    // public function updatePaymentStatus($paymentId, $status)
    // {
    //     $payment = Payment::where('payment_id', $paymentId)
    //     ->latest() // Get the latest record based on the default 'created_at' timestamp
    //     ->first();

    //     if ($payment) {
    //         $payment->status = $status;
    //         $payment->save();
    //     }
    // }

    // public function handlePaymentCancel()
    // {
    //     // Handle payment cancellation logic if needed
    //     $user = auth()->user();
    //     return view('payment-cancel', compact('user')); // Return the payment cancel view
    // }
    
    // public function phonePe()
    // {
    //     $user = auth()->user();
    //     Session::put('user', $user);
    //     dd(Session::get('user'));
    //     $data = array (
    //       'merchantId' => 'CERTIFYONLINE',
    //       'merchantTransactionId' => uniqid(),
    //       'merchantUserId' => uniqid(),
    //       'amount' => 20000,
    //       'redirectUrl' => route('response'),
    //       'redirectMode' => 'POST',
    //       'callbackUrl' => route('response'),
    //       'mobileNumber' => '9999999999',
    //       'paymentInstrument' => 
    //       array (
    //         'type' => 'PAY_PAGE',
    //         'integrationPlatform' => 'SDK',
    //       ),
    //     );

    //     $encode = base64_encode(json_encode($data));

    //     $saltKey = 'cf7402d1-c806-4601-b4a5-6d28bc18028a';
    //     $saltIndex = 1;

    //     $string = $encode.'/pg/v1/pay'.$saltKey;
    //     $sha256 = hash('sha256',$string);

    //     $finalXHeader = $sha256.'###'.$saltIndex;

    //     $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/pay')
    //             ->withHeader('Content-Type:application/json')
    //             ->withHeader('X-VERIFY:'.$finalXHeader)
    //             ->withData(json_encode(['request' => $encode]))
    //             ->post();

    //     $rData = json_decode($response);

    //     return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);

    // }

    // public function response(Request $request)
    // {
    //     $input = $request->all();
    //     $user = Session::get('user');
    //     dd($user);
    //     $saltKey = 'cf7402d1-c806-4601-b4a5-6d28bc18028a';
    //     $saltIndex = 1;

    //     $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;

    //     $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
    //             ->withHeader('Content-Type:application/json')
    //             ->withHeader('X-VERIFY:'.$finalXHeader)
    //             ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
    //             ->get();

    //     if($input['code'] === "PAYMENT_SUCCESS") {
    //         $payment = new Payment([
    //             'user_id' => $user->id,
    //             'amount' => 200,
    //             'payment_id' => $input['transactionId'],
    //             'status' => "success",
    //         ]);
    //         $payment->save();
    //         Mail::to($user->email)->queue(new PaymentConfirmationEmail($user));
    //     } else {
    //         $payment = new Payment([
    //             'user_id' => $user->id,
    //             'amount' => 200,
    //             'payment_id' => $input['transactionId'],
    //             'status' => "pending",
    //         ]);
    //         $payment->save();
    //     }
    //     return redirect()->route('exam.view');
    // }
    
    public function phonePe()
    {
        $user = auth()->user();
        $data = array (
          'merchantId' => 'CERTIFYONLINE',
          'merchantTransactionId' => uniqid(),
          'merchantUserId' => $user->id,
          'amount' => 20000,
          'redirectUrl' => route('response'),
          'redirectMode' => 'POST',
          'callbackUrl' => route('response'),
          'mobileNumber' => '9999999999',
          'paymentInstrument' => 
          array (
            'type' => 'PAY_PAGE',
            'integrationPlatform' => 'SDKLess',
          ),
          'session_id' => session()->getId(),
        );

        $encode = base64_encode(json_encode($data));

        $saltKey = 'cf7402d1-c806-4601-b4a5-6d28bc18028a';
        $saltIndex = 1;

        $string = $encode.'/pg/v1/pay'.$saltKey;
        $sha256 = hash('sha256',$string);

        $finalXHeader = $sha256.'###'.$saltIndex;

        $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/pay')
                ->withHeader('Content-Type:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withData(json_encode(['request' => $encode]))
                ->post();

        $rData = json_decode($response);

        return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);

    }

    public function response(Request $request)
    {
        Log::info($request);
        $user = request()->user();
        Log::info($user);
        $input = $request->all();
        $saltKey = 'cf7402d1-c806-4601-b4a5-6d28bc18028a';
        $saltIndex = 1;

        $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;

        $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
                ->withHeader('Content-Type:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
                ->get();
        
        if($input['code'] === "PAYMENT_SUCCESS") {
            $payment = Payment::updateOrCreate([
                'payment_id' => $input['transactionId'],
            ], [
                'user_id' => $user->id,
                'amount' => 200,
                'status' => "success",
            ]);
            Mail::to($user->email)->queue(new PaymentConfirmationEmail($user));
        } else {
            $payment = Payment::updateOrCreate([
                'payment_id' => $input['transactionId'],
            ], [
                'user_id' => $user->id,
                'amount' => 200,
                'status' => "pending",
            ]);
        }
        return redirect()->route('exam.view');
        
    }
}
