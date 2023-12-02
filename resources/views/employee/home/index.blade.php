@extends('employee.layouts.app')

    <!-- Additional styles specific to the index page -->
    @section('css')
    <style>
        .big-button {
            font-size: 24px;
            padding: 15px 30px;
            margin: 10px;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .dashbord-submit-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .dashbord-submit-button .dashbordSubmitButton{
            padding: 10px 20px;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="personal-greeting-message">
        <h2>Hey There ! <b> {{ auth()->user()->name }}</b></h2>
        <p>Kindly complete the following details and hit 'Submit' to seamlessly embark on your jorney with us</p>
    </div>

    <div class="personal-center-buttons">
        <div class="button-row">
            <a href="/nobesityemployee/personalinfo"><button class="big-button" onclick="showForm()">Personal Info</button></a>
            <a href="/nobesityemployee/roles"><button class="big-button" onclick="showOtherForm()">Roles & Responsibilities</button></a>
        </div>
        
        <div class="button-row">
            <a href="/nobesityemployee/rules"><button class="big-button" onclick="showOtherForm()">Rules & Regulations</button></a>
            <a href="/nobesityemployee/reward"><button class="big-button" onclick="showOtherForm()">Rewards & Benefits</button></a>
        </div>
    </div>
    
    <form class="p-4 rounded" method="POST" action="{{ route('employee.submitdetails', ['id' => auth()->id()]) }}" enctype="multipart/form-data">
        @csrf
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="agree" value="1" id="">
        <label class="form-check-label" for="flexCheckDefault">
            confirm my acceptance of the roles, responsiblities and rules outlines on CertifyRecruit's website for promoting the nobesity Event.
        </label>
    </div>
        <div class="dashbord-submit-button">
            <button class="dashbordSubmitButton" onclick="submitForm()">Submit</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
        function showForm() {
            // Logic to show the form when the button is clicked
            console.log('Form is shown!');
        }

        function showOtherForm() {
            // Logic to show another form when the button is clicked
            console.log('Other form is shown!');
        }

        function submitForm() {
            // Logic to submit the form
            console.log('Form submitted!');
        }
    </script>
@endsection
