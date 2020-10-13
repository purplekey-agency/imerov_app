<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

                <div class="col-3 col-md-offset-2">
                    <div class="hover-text">
                        <a href="/dashboard">
                            <p class="strong">Dashboard</p>
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
                            <p class="text-secondary">Videos</p>
                        </a>
                    </div>
                </div>

                <div class="col-3 md-offset-2">
                    <div class="text-small">
                        <p class="strong">{{Auth::user()->username}}</p>
                    </div>
                    <div class="text-small">
                        <span class="text-secondary">Subscription:</span>
                        <span class="strong">None</span>
                    </div>
                    <div class="text-small">
                        <span class="text-secondary">Messages:</span>
                        <span class="strong">0/</span>
                        <span class="strong red">0</span>
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
                    <div class="text-small">
                        <span class="text-secondary">Detail 1:</span>
                        <span class="strong">Detail</span>
                    </div>
                    <div class="text-small">
                        <span class="text-secondary">Detail 2:</span>
                        <span class="strong">Detail</span>
                    </div>
                    <div class="text-small">
                        <span class="text-secondary">Detail 3:</span>
                        <span class="strong">Detail</span>
                    </div>
                </div>

                <div class="row col-6">

                    <div class="col col-md-offset-2">
                        <div class="row m-0">
                            <p>Before</p>
                        </div>
                        <div class="image-container">
                            <img src="#">
                        </div>
                        
                    </div>

                    <div class="col col-md-offset-2">
                        <div class="row m-0">
                            <p>After</p>
                        </div>

                        <div class="image-container">
                            <img src="#">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

</body>

</html>


