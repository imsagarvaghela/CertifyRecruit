<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReffralBokking;
use App\Models\Teams;

class EmployeeApiController extends Controller
{
    public function registerApi(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|min:10|unique:users,phone',
            'email' => 'required|string|email|max:255|unique:users',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'password' => 'required|string|min:8',
            'reffral_code' => 'required',
        ]);

        $employee = ReffralBokking::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'reffral_code' => $request->reffral_code,
            'email_verification_token' => Str::random(60), // Generate a unique verification token
        ]);

        $teamId = $this->calculateTeamId($employee->id);
        if($teamId){
            $employee->team_id = $teamId;
            $employee->save();
        }
        $teams = Teams::pluck('name','id');
        // Send verification email (the email sending will be queued)
        Mail::to($employee->email)->queue(new VerificationEmail($employee->name, $employee->email_verification_token));

        $responseArray = [
            'status' => 'success',
            'message' => 'Employee Details added successfully',
            'employee' => $employee,
            'teams' => $teams
        ];
        return response()->json($responseArray, 200);
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
