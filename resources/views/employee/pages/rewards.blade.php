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
    <h1 class="text-white mt-2" style="margin-left: 25px;"><b>Rewards / Benefits</b></h1>
    <div class="col-sm-12">
        <pre class="text-white">
            You will only be eligible to receive a stipend when you score 1200+ points.

            To be eligible for the leaderboard, you must score above 1200 points. The 
            top 10 individuals on the leaderboard will receive a 50k incentive.
            
            All interns/volunteers will receive a participation certification.
            
            The top 40 individuals on the leaderboard will receive a Nobisity India T-shirt and notepad.
            
            For the top 50 individuals, we will assist you in finding the next opportunity after completing
            a one-round interview with CertifyRecruit.
        </pre>
    </div>
</div>
<form class="p-4 rounded" method="POST" action="{{ route('employee.form.submitdetails', ['id' => auth()->id()]) }}" enctype="multipart/form-data">
    @csrf
<div class="row mt-4">
    <div class="col-sm-12" style="display:flex; justify-content:space-between;">
        <div class="form-check" style="display:flex;">
            <input class="form-check-input" type="checkbox" name="rewards" value="1" id="" required>
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