@extends('employee.home.index')

@section('css')
<style>
    .submitInfo {
        width: 100%;
        padding: 10px;
        background: #3e8b4f;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .rulesBody{
        background:#000;
        border-radius: 20px;
    }
</style>
@endsection

@section('content')
<div class="rulesBody">
<div class="row">
    <h1 class="text-white mt-2"style="margin-left: 25px;"><b>Rules & Regulations</b></h1>
    <div class="col-sm-12">
        <pre class="text-white">
            Each intern is tasked with the minimum responsibility of scoring 1200 points 
            within 60 days. Registering each candidate at NoBesity earns you 10 points.
            It's essential to emphasize that this effort is dedicated to a great cause, 
            requiring a high level of dedication and discipline. We are building the Fit
            Youth Army of India, and this army is expected to contribute significantly to
            the prosperity of the nation if its members are fit.
            
            Code of Conduct: Interns must strictly adhere to ethical standards. Any violation
            or suspicious activity will result in immediate removal from the project.

            Performance Metrics: Failure to achieve the required number of registrations within 
            60 days may lead to removal without a stipend.
            
            All interns will receive a certification of their participation.

            As candidates cross the 1200-point milestone, they will move to the next level—Leadership
            Board. Interns/volunteers on the Leadership Board will receive special benefits:
            
            The first 40 will receive FREE merchandise from NoBesity.
            
            The first 10 will be awarded a prize money of 25k.
            
            For the first 50 individuals, Certify Recruit will assist in finding a good job after 
            completing a one-round interview with Certify.
            This initiative aims to create a Fit Youth Army for India, and your commitment and hard 
            work will contribute to the success of this noble cause.
            
            Fraud Prevention: Any intern or individual engaged in fraud, offline money collection, or
            illegal activities will face strict legal actions.
            
            Code of Conduct: Interns must adhere to ethical standards; any violation or suspicious activity
            will result in immediate removal from the project.            
            Performance Metrics: Failure to achieve registrations within the month may lead to removal without
            certification or stipend.
            
            INTERN WILL NOT BE PAID AT THE END OF THE MONTH IF HE/SHE IS NOT ABLE TO BRING 120 REGISTRATIONS
            IN THE MONTH.Interns will be paid 2 months of stipend together with their incentive if they are 
            able to achieve the target.
            
            Every registration you make will earn you 10 points.
        </pre>
    </div>
</div>
<form class="p-4 rounded" method="POST" action="{{ route('employee.form.submitdetails', ['id' => auth()->id()]) }}" enctype="multipart/form-data">
    @csrf
<div class="row mt-4">
    <div class="col-sm-12" style="display:flex; justify-content:space-between;">
        <div class="form-check" style="display:flex;">
            <input class="form-check-input" type="checkbox" name="rules" value="1" id="" required>
            <label class="form-check-label" for="flexCheckDefault">
                I agree
            </label>
        </div>
        <div>
            <button class="submitInfo" type="submit">Submit</button>
        </div>
    </div>
</div>
</form>
</div>
@endsection