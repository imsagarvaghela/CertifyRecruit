<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ResetPasswordController;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::middleware(['ip.filter'])->group(function () {
    // Add the routes you want to restrict here
    Route::middleware(['auth', 'verified'])->group(function () {
        // Your protected routes go here
        Route::get('/dashboard', function () {
            $user = Auth::user(); // Get the currently logged-in user
            $result = Result::where('user_id', $user->id)
                    ->where('result_status', 'Pass')
                    ->first();
            View::share('user', $user);
            View::share('passedResult', $result); // Share the user data with all views
            return view('layouts.app');
        })->name('home');
        
        Route::get('payment/{type}', [ExperienceController::class, 'selectExperience'])->name('select.experience');
        Route::get('/payment', [ExperienceController::class, 'paymentPage'])->name('page.payment');
        Route::post('/create-order', [PaymentController::class, 'createOrder'])->name('create.order');
        Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');
        Route::get('/payment/success', [PaymentController::class, 'handlePaymentSuccess'])->name('payment.success');
        Route::get('/exam-start/{id}', [ExamController::class, 'examStart'])->name('exam.start');
        Route::get('/get-exam-question/{id}',[ExamController::class, 'getExamQuestion'])->name('exam.question');
        Route::post('save/{exam_id}',[ExamController::class,'saveExam'])->name('save');
        Route::get('download-certificate', [ExamController::class,'downloadCertificate'])->name('download.certificate');
        Route::get('/payment-cancel', [PaymentController::class, 'handlePaymentCancel'])->name('payment.cancel');
        Route::get('/exam', [ExamController::class, 'viewExam'])->name('exam.view');
        
        Route::get('phonepe',[PaymentController::class,'phonePe'])->name('phonePe');
    
        //Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
    Route::post('phonepe-response',[PaymentController::class,'response'])->name('response');
    
    
    Route::get('/certificates/{filename}', [ExamController::class, 'openInNewTab'])->name('certificates.show');
    
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'update'])->name('password.update');
    
    Route::post('/contact/store', [ContactUsController::class, 'store'])->name('contact.store');
    
    Route::get('/', [AuthController::class, 'homePage'])->name('home.page');
        
    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // Registration
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);




    //Employee Login
    Route::get('/nobesityemployee/login', [EmployeeController::class, 'showLoginForm'])->name('employee.login');
    Route::post('/nobesityemployee/login', [EmployeeController::class, 'login']);
    
    //Employee Registration
    Route::get('/nobesityemployee/register', [EmployeeController::class, 'showRegistrationForm'])->name('employee.register');
    Route::post('/nobesityemployee/register', [EmployeeController::class, 'register']);
    Route::middleware('auth:employee')->group(function () {
        // Employee Dashboard
        Route::get('/nobesityemployee/dashboard',[EmployeeController::class, 'dashboard'])->name('employee.home');
        Route::get('/nobesityemployee/personalinfo', [EmployeeController::class, 'prsonalinfoform'])->name('employee.personalinfo');
        Route::post('/nobesityemployee/personalinfo/submit/{id}', [EmployeeController::class, 'personalinfo'])->name('employee.personalinfosubmit');
        Route::get('/nobesityemployee/roles',function (){return view('employee.pages.roles');});
        Route::get('/nobesityemployee/rules',function (){return view('employee.pages.rules');});
        Route::get('/nobesityemployee/reward',function (){return view('employee.pages.rewards');});
        Route::get('/nobesityemployee/details',function (){return view('employee.pages.details');})->name('employee.details');
        Route::get('/nobesityemployee/details/{id}', [EmployeeController::class, 'submitotherdetails'])->name('employee.submitdetails');
        Route::get('/nobesityemployee/form/details/{id}', [EmployeeController::class, 'submitform'])->name('employee.form.submitdetails');
        Route::get('/nobesityemployee/team/{id}', [EmployeeController::class, 'teamRecord']);
    });

    Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify.email');
// });

Route::get('/coming-soon', function () {
    return view('pages.coming-soon'); // You need to create a 'coming_soon.blade.php' view for this.
})->name('coming_soon');

    //Webhook
    Route::post('/webhook', [PaymentController::class, 'handleWebhook']);