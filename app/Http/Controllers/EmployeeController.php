<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\ReffralBooking;
use App\Models\Qualification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Events\EmailVerified;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    protected $redirectTo = '/nobesityemployee/dashboard';
   
    public function showLoginForm()
    {
        return view('employee.auth.login');
    }
    public function login(Request $request)
    {
        $credentialsByEmail = [];
        $credentialsByEmployeeId = [];

        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required',
        ]);

        // Check if the user's email is verified
        $employee = Employee::where(function ($query) use ($request) {
            $query->where('email', $request->login)
                ->orWhere('employee_id', $request->login);
        })->first();
        if($employee){
            if (filter_var($request->login, FILTER_VALIDATE_EMAIL)) {
                $credentialsByEmail = ['email' => $request->login, 'password' => $request->password];
            } elseif (preg_match('/^[A-Z0-9]{16}$/', $request->login)) {
                $credentialsByEmployeeId = ['employee_id' => $request->login, 'password' => $request->password];
            }

            if (Auth::guard('employee')->attempt($credentialsByEmail, $request->remember)) {
                // Authentication based on email successful
                return redirect()->intended($this->redirectTo)->with('success', 'Login successful!');
            } elseif ($request->login == $employee->employee_id && Auth::guard('employee')->attempt($credentialsByEmployeeId, $request->remember)) {
                // Authentication based on employee_id successful
                return redirect()->intended($this->redirectTo)->with('success', 'Login successful!');
            }
            else {
                // Email not verified, show error message
                return redirect()->route('employee.login')->with('error', 'Please verify your email or employee Id before logging in.');
            }
        } else {
            return redirect()->route('employee.login')->with('error', 'Invalid credentials.');
        }
    }

    // Show registration form
    public function showRegistrationForm()
    {
        return view('employee.auth.register');
    }

    // Handle registration form submission
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'resume' => 'required|mimes:pdf,doc,docx'
            ]);
            $path = $request->file('resume')->store('public/resume');
            $randomString = Str::random(16);
            $uppercaseString = strtoupper($randomString);

            $employee = Employee::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'employee_id' => $uppercaseString,
                'resume' => $path,
                'email_verification_token' => Str::random(60), // Generate a unique verification token
            ]);

            $teamId = $this->calculateTeamId($employee->id);
            if($teamId){
                $employee->team_id = $teamId;
                $employee->save();
            }

            // Send verification email (the email sending will be queued)
            Mail::to($employee->email)->queue(new VerificationEmail($employee->name, $employee->email_verification_token));

            return redirect()->route('employee.login')->with('success', 'Registration successful! Please check your email to verify your account.');
        } catch (\Throwable $th) {
            abort(500);
            throw $th;
        }
    }

    public function dashboard(){
        return view('employee.home.index');
    }

    //Personal info form with qualification
    public function prsonalinfoform(){
        $qualifications = Qualification::pluck('name','id');
        return view('employee.pages.personalInfoForm',compact('qualifications'));
    }

    //save personal info to employee table
    public function personalinfo(Request $request,$id){
        $request->validate([
            'phone' => 'required|numeric|min:10',
            'dob' => 'required|date',
            'address' => 'required',
            'aadhar' => 'required|numeric',
            'qualification' => 'required|numeric',
            // 'profilepic' => 'required'
        ]);        

        // $path = $request->file('profilepic')->store('public/profile-image');

        $employee = Employee::where('id',$id)->first();
            $employee->mobile_number = $request->phone;
            $employee->dob = $request->dob;
            $employee->address = $request->address;
            $employee->aadhar_no = $request->aadhar;
            $employee->qualification_id = $request->qualification;
            // $employee->profile_path = $path;
            $employee->save();
        return redirect()->route('employee.home');
    }

    // save other form details
    public function submitotherdetails(Request $request,$id){
        $employee = Employee::where('id',$id)->first();
        if($employee){
            if($request->agree == 1){
                if($employee->mobile_number !== null && $employee->rules !== null && $employee->roles !== null && $employee->rewards !== null){
                    return redirect()->route('employee.details');
                }else{
                    return redirect()->route('employee.home')->with('error', 'Please fill all the form.');
                }
            }else{
                return redirect()->route('employee.home')->with('error', 'Please agree on terms & condition.');
            }
        }
    }

    //check all details is submitted
    public function submitform(Request $request, $id){
        $employee = Employee::where('id',$id)->first();
        if($employee){
            if($request->roles){
                $employee->roles = $request->roles;
            }else if($request->rules){
                $employee->rules = $request->rules;
            }else if($request->rewards){
                $employee->rewards = $request->rewards;
            }else{
                return redirect()->route('employee.home')->with('error', 'Please fill the form.');
            }
            $employee->save();
            return redirect()->route('employee.home')->with('success', 'Your Detail submitted!.');
        }else{
            return redirect()->route('employee.home')->with('error', 'Something Went Wrong!!.');
        }
    }

    public function teamRecord($id){
        $teamName = '';
        $teams = ReffralBooking::select('name','reffral_code', DB::raw('COUNT(*) as rank'))
                    ->with('teams')
                    ->where('team_id',$id)
                    ->groupBy('reffral_code','name','team_id')
                    ->orderByDesc('rank') // Sort by count in descending order
                    ->orderBy('reffral_code') // Sort by reffral_code in ascending order (for ties)
                    ->get();
        if($id == 1){
            $teamName = "Aloha";
        }else if($id == 2){
            $teamName = "Bloha";
        }if($id == 3){
            $teamName = "Cloha";
        }
        if($teams){
            return view('employee.pages.team',compact('teams','teamName'));
        }else{
            return redirect()->route('employee.home')->with('error', 'Something Went Wrong!!.');
        }

    }

    // Function to calculate team ID based on employee ID
    function calculateTeamId($employeeId) {
        if ($employeeId >= 1 && $employeeId <= 1000) {
            return 1;
        } elseif ($employeeId >= 1001 && $employeeId <= 2000) {
            return 2;
        } elseif ($employeeId >= 2001 && $employeeId <= 3000) {
            return 3;
        }
        // Add more conditions as needed for additional ranges
    
        // Default case: return a default team ID or handle it as needed
        return 1; // Change this to the default team ID if none of the conditions match
    }
}