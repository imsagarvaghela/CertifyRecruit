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

    .rolesBody{
        background:#000;
        border-radius: 20px;
    }
</style>
@endsection

@section('content')
<div class="rolesBody">
<div class="row">
    <h1 class="text-white mt-2" style="margin-left: 25px;"><b>Roles & Responsibilities</b></h1>
    <div class="col-sm-12">
        <pre class="text-white">
            firstly,congratulations on becoming a volunteer/intern for 
            India's largest health event. This is a noble cause, contributing to the effort to 
            make India a healthier and more prosperous nation.
            
            Obesity is a slowly advancing pandemic in India, becoming a root cause of various 
            lifestyle diseases among our youth, thereby reducing their efficiency. Our goal as
            volunteers is to comprehend how obesity is affecting and impeding the realization 
            of our honorable Prime Minister's vision of making India a prosperous country. 
            
            To achieve this, we will raise awareness among our immediate surroundings—friends, 
            family, colleagues, social media connections, and everyone within our reach—educating
            them on how to stay fit and contribute to India's prosperity through the NObesity 
            initiative, the fight against obesity.

            For a successful campaign, it's crucial to bring people onto a common platform.
            To effectively spread awareness about NObesity and India's fight against obesity, we 
            will encourage everyone to join the NObesity platform (website & app) and become a part
            of this significant health event.
            
            To kickstart this revolutionary movement, aimed at making the entire country fit, we 
            are launching a competition. All Indian youth are invited to participate on the app by
            entering their health details, following exercise and diet recommendations from their 
            doctors/dieticians/experts, updating their progress daily, and striving to be among the
            top performers in their respective groups. The top 20 candidates in each group stand a 
            chance to win a cash prize of 3 lakh rupees each.
            
            Upon entering health details, participants will be allocated to groups based on BMI: 
            
            BMI 25: Fit 
            BMI 26-30: Overweight 
            BMI 31-35: Obese 
            BMI 36-40: Severely Obese
            
            Candidates will compete within their own groups to secure a spot in the top 5. Those with
            a BMI of 25 will be categorized as Coaches of Nobesity; while they won't be eligible for 
            the cash prize, the first 200 registered coaches will receive free health insurance coverage
            of 3 lakhs for one year. This initiative aims to make a significant impact on the health and
            well-being of the youth of India.
        </pre>
    </div>
</div>
<form class="p-4 rounded" method="POST" action="{{ route('employee.form.submitdetails', ['id' => auth()->id()]) }}" enctype="multipart/form-data">
    @csrf
<div class="row mt-4">
    <div class="col-sm-12" style="display:flex; justify-content:space-between;">
        <div class="form-check" style="display:flex;">
            <input class="form-check-input" type="checkbox" name="roles" value="1" id="" required>
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