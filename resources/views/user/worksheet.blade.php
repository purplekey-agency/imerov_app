<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

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
                    <h1 class="text-uppercase font-weight-bold">Account</h1>
                </div>

            </div>
        </div>

        <div class="container">

            <div class="container row">

                <div class="col-2 col-md-offset-2">
                    <div class="hover-text">
                        <a href="/dashboard">
                            <p class="text-secondary">Dashboard</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/messages">
                            <p class="text-secondary">Inbox</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/questionarre">
                            <p class="text-secondary">Questionarre</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/worksheet">
                            <p class="strong">Worksheet</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/diet-plan">
                            <p class="text-secondary">Diet Plan</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/videos">
                            <p class="text-secondary">Exercises</p>
                        </a>
                    </div>
                </div>

                <div class="col-7 md-offset-2">
                    
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

</body>

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

</html>


