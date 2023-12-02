<?php

namespace App\Http\Controllers;

use App\Mail\VerificationEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Events\EmailVerified;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/dashboard';

    protected function guard()
    {
        return Auth::guard();
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showForgotPassword()
    {
        return view('auth.reset');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the user's email is verified
        $user = User::where('email', $request->email)->first();
        if($user){
            if ($user->hasVerifiedEmail()) {
                // Attempt to authenticate the user
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                    // Authentication passed
                    return redirect()->intended($this->redirectTo)->with('success', 'Login successful!');
                } else {
                    // Authentication failed
                    return redirect()->route('login')->with('error', 'Invalid credentials.');
                }
            } else {
                // Email not verified, show error message
                return redirect()->route('login')->with('error', 'Please verify your email before logging in.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials.');
        }
    }

    // Show registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle registration form submission
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'mobile_number' => 'required|string|regex:/^[0-9]{10}$/|unique:users',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'password' => Hash::make($request->password),
            'recruiter_type' => $request->recruiter_type,
            'email_verification_token' => Str::random(60), // Generate a unique verification token
        ]);

        // Send verification email (the email sending will be queued)
        Mail::to($user->email)->queue(new VerificationEmail($user->name, $user->email_verification_token));

        return redirect()->route('login')->with('success', 'Registration successful! Please check your email to verify your account.');
    }

    // Logout the user
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Password reset link request form
    public function showResetLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Verify email
    public function verifyEmail(Request $request, $token)
    {
        $user = User::where('email_verification_token', $token)->first();

        if ($user) {
            $user->email_verified_at = now();
            $user->email_verification_token = null;
            $user->save();

            event(new EmailVerified($user)); // Dispatch the EmailVerified event

            return redirect()->route('login')->with('success', 'Email verification successful. You can now log in.');
        } else {
            return redirect()->route('login')->with('error', 'Invalid verification token.');
        }
    }

    public function homePage(Request $request){
        return view('home.index');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'));

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return back()->with('success', 'We have emailed you a reset link!');
            case Password::INVALID_USER:
                return back()->withErrors(['email' => trans($response)]);
        }
    }

    public function showResetForm(Request $request, $token)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}