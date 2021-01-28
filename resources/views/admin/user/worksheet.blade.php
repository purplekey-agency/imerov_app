<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <title>Console Imerov</title>
</head>

<body>

    @include('layouts.header')

    <main>
    
        <div class="w-100 p-3 d-flex justify-content-center" style="background:rgba(123,123,123, 0.11);">
            <div class="app-container">
                
                <div class="title-container">
                    <h1 class="text-uppercase font-weight-bold">ADMINISTRATOR ACCOUNT</h1>
                </div>

            </div>
        </div>

        <div class="container">

            <div class="container row">

                <div class="col-2 col-md-offset-2">
                    <div class="hover-text">
                        <a href="/admin/dashboard">
                            <p class="text-secondary">Dashboard</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/admin/users">
                            <p class="strong">Users</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/admin/messages">
                            <p class="text-secondary">Messages ({!!Auth::user()->getMessageCount()!!})</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/admin/upload">
                            <p class="text-secondary">Upload</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/admin/videos">
                            <p class="text-secondary">Videos</p>
                        </a>
                    </div>
                </div>

                <div class="col-7 col-md-offset-2">
                    
                    <div class="">
                    
                        <p class="strong">{{$user->username}}</p>
                    
                    </div>

                    <div class="row col-12 col-md-offset-2">
                        <div class="hover-text mx-3">
                            <a href="/admin/users/{{$user->id}}">
                                <p class="text-secondary">Dashboard</p>
                            </a>
                        </div>
    
                        <div class="hover-text mx-3">
                            <a href="/admin/users/{{$user->id}}/questionarre">
                                <p class="text-secondary">Questionarre</p>
                            </a>
                        </div>

                    </div>
    
                    <div class="row">

                        <div class="mx-2">

                            <a onclick="changestate('body_measurements')" class="" id="body-measurements-btn">Body Measurements</a>

                        </div>

                        <div class="mx-2">

                            <a onclick="changestate('exercises')" class="" id="exercises-btn">Exercises</a>

                        </div>

                    </div>


                    <div class="w-100 bodyinactive" id="body-measurments">
                    @include('user.worksheet.bodymeasurments')
                    </div>

                    <div class="w-100 bodyinactive" id="excercises">
                    @include('user.worksheet.exercises')
                    </div>

    

                </div>

            </div>

        </div>


    </main>

    <script>

    $(document).ready(function(){

        $('#body-measurements-btn').addClass('active');
        $('#body-measurments').removeClass('bodyinactive').addClass('bodyactive');

    })

    function changestate(button){
        if(button == 'body_measurements'){
            if(!$('#body-measurements-btn').hasClass('active')){
                $('#body-measurements-btn').addClass('active');
                $('#body-measurments').removeClass('bodyinactive').addClass('bodyactive');

                $('#exercises-btn').removeClass('active');
                $('#excercises').removeClass('bodyactive').addClass('bodyinactive');
            }
        }

        if(button == 'exercises'){
            if(!$('#exercises-btn').hasClass('active')){
                $('#exercises-btn').addClass('active');
                $('#excercises').removeClass('bodyinactive').addClass('bodyactive');

                $('#body-measurements-btn').removeClass('active');
                $('#body-measurments').removeClass('bodyactive').addClass('bodyinactive');
            }
        }
    }

    </script>

</body>


</html>