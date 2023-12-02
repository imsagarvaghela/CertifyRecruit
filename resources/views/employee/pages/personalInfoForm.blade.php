@extends('employee.home.index')

@section('css')
<style>
    .personalbody {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        color: #fff; /* Text color */
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        overflow: hidden;
        position: relative;
    }

    .personalInfo-form {
        position: relative;
        background-color: #000; /* Black background color */
        padding: 70px;
        border-radius: 20px; /* Rounded corners */
        overflow: hidden;
    }

    .commonInput {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        color: black;
    }

    .personalSubmitInfo {
        width: 100%;
        padding: 10px;
        background: #3e8b4f;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

</style>
@endsection

@section('content')
<div class="personalbody">
    <div class="personalInfo-form">
        <form class="p-4 rounded" method="POST" action="{{ route('employee.personalinfosubmit', ['id' => auth()->id()]) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <input class="commonInput" type="number" id="phone" name="phone" placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <input class="commonInput" type="date" id="dob" name="dob" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea row="3" class="commonInput" type="text" id="address" name="address" placeholder="Address" required></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input class="commonInput" type="number" id="aadhar" name="aadhar" placeholder="Aadhar Number" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <select class="commonInput" id="qualification" name="qualification" required>
                            <option value="" selected disabled>Qualification</option>
                            @foreach ($qualifications as $key => $item)
                            <option value="{{$key}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <button class="personalSubmitInfo" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection