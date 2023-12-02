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

    .user-details {
        color: #fff;
        margin-bottom: 20px;
    }
    .pdetails{
        font-size: 21px;
        color: white;
    }
    .title{
        color: white !important;
        text-align: -webkit-center;
        font-weight: 700;
        font-size: 40px;
    }
</style>
@endsection

@section('content')
<div class="personalbody">
    <div class="personalInfo-form">
        <h1 class="title">Team {{$teamName}}</h1>
        <div class="user-details">
            <table class="table">
                <thead>
                    <tr style="color:white;">
                        <th>Rank</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody style="color:white;">
                    @foreach ($teams as $item)
                        <tr>
                            <td>{{ $item->rank }}</td>
                            <td>{{ $item->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
