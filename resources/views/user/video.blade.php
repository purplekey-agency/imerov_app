<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
                            <p class="text-secondary">Inbox ({!!Auth::user()->getMessageCount()!!})</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/questionarre">
                            <p class="text-secondary">Questionarre</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/worksheet">
                            <p class="text-secondary">Worksheet</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/diet-plan">
                            <p class="text-secondary">Diet Plan</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/videos">
                            <p class="strong">Exercises</p>
                        </a>
                    </div>
                </div>

                <div class="col-7 md-offset-2 mb-5">
                    
                    @if($gender !== null)
                        @if($gender === "M")
                            <div class="d-flex flex-wrap">
                                <video width="100%" class="col-12 my-3" controls>
                                    <source src="/storage/videos/{{$video->video_path_m}}" type="video/mp4">
                                </video>
                            </div>
                        @endif

                        @if($gender === "F")
                            <div class="d-flex flex-wrap">
                                <video width="100%" class="col-12 my-3" controls>
                                    <source src="/storage/videos/{{$video->video_path_f}}" type="video/mp4">
                                </video>
                            </div>
                        @endif

                        <a href="">
                            <div class="row">
                                <div class="col-8">
                                    <p class="strong text-large">{{$video->exercise_name}}</p>
                                    <p class="font-secondary">
                                        {{$video->exercise_description}}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @else
                        <div class="d-flex flex-wrap">
                            <div class="text-center w-100">Male video:</div>
                            <video width="100%" class="col-12 my-3" controls>
                                <source src="/storage/videos/{{$video->video_path_m}}" type="video/mp4">
                            </video>

                            <br>

                            <div class="text-center w-100">Female video:</div>
                            <video width="100%" class="col-12 my-3" controls>
                                <source src="/storage/videos/{{$video->video_path_f}}" type="video/mp4">
                            </video>
                        </div>

                        <a href="">
                            <div class="row">
                                <div class="col-8">
                                    <p class="strong text-large">{{$video->exercise_name}}</p>
                                    <p class="font-secondary">
                                        {{$video->exercise_description}}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endif


                </div>

            </div>

        </div>
    </main>

</body>

</html>


