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
                            <p class="strong">Dashboard</p>
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
                            <p class="text-secondary">Exercises</p>
                        </a>
                    </div>
                </div>

                <div class="col-3 md-offset-2">
                    <div class="text-small">
                        <p class="strong">{{Auth::user()->username}}</p>
                    </div>
                    <div class="text-small">
                        <span class="text-secondary">Subscription:</span>
                        <span class="strong">{{Auth::user()->getSubName(Auth::user()->subscription_type)}} {!!Auth::user()->getSubSubtype()!!}</span>
                    </div>
                    <div class="text-small">
                        <span class="text-secondary">Messages:</span>
                        <span class="strong">{!!Auth::user()->getMessageCount()!!}</span>
                        {{-- <span class="strong red">{{@count($newMessages)}}</span> --}}
                    </div>
                    <div class="text-small">
                        <span class="text-secondary">Name:</span>
                        <span class="strong">{{Auth::user()->name}}</span>
                    </div>
                    <div class="text-small">
                        <span class="text-secondary">Last name:</span>
                        <span class="strong">{{Auth::user()->surename}}</span>
                    </div>
                    <div class="text-small">
                        <span class="text-secondary">Dob:</span>
                        <span class="strong">{{$userQuestionare->date_of_birth}}</span>
                    </div>
                </div>

                <div class="row col-6">

                    <div class="col col-md-offset-2">
                        <div class="row m-0">
                            <p>Before</p>
                        </div>
                        @if($userPersonalBests1 !== null)
                        <div class="image-container">
                            <img src="/storage/user_images/{{$userPersonalBests1->imagepath}}">
                        </div>
                        @else
                        <div class="image-container">
                            You have not uploaded image yet.
                        </div>
                        @endif
                        
                    </div>

                    <div class="col col-md-offset-2">
                        <div class="row m-0">
                            <p>After</p>
                        </div>
                        @if($userPersonalBests2 !== null)
                        <div class="image-container">
                            <img src="/storage/user_images/{{$userPersonalBests2->imagepath}}">
                        </div>
                        @else
                        <div class="image-container">
                            You have not uploaded image yet.
                        </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </main>

</body>

</html>


