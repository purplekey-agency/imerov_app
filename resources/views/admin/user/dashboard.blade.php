<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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

                <div class="col-3 col-md-offset-2">
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

                <div class="col-9 col-md-offset-2">
                    
                    <div class="">
                    
                        <p class="strong">{{$user->username}}</p>
                    
                    </div>

                    <div class="row col-7 col-md-offset-2">
                        <div class="hover-text mx-3">
                            <a href="/admin/users/{{$user->id}}">
                                <p class="strong">Dashboard</p>
                            </a>
                        </div>
    
                        <div class="hover-text mx-3">
                            <a href="/admin/users/{{$user->id}}/questionarre">
                                <p class="text-secondary">Questionarre</p>
                            </a>
                        </div>
    
                    </div>
    
                    <div class="row col-12">
                        <div class="col-4 md-offset-2">
                            <div class="text-small">
                                <p class="strong">{{$user->username}}</p>
                            </div>
                            <div class="text-small">
                                <span class="text-secondary">Subscription:</span>
                                <span class="strong">{{$user->getSubName($user->subscription_type)}}</span>
                            </div>
                            <div class="text-small">
                                <span class="text-secondary">Messages:</span>
                                <span class="strong">{{@count($allMessages)}}/</span>
                                <span class="strong red">{{@count($newMessages)}}</span>
                            </div>
                            <div class="text-small">
                                <span class="text-secondary">Name:</span>
                                <span class="strong">{{$user->name}}</span>
                            </div>
                            <div class="text-small">
                                <span class="text-secondary">Last name:</span>
                                <span class="strong">{{$user->surename}}</span>
                            </div>
                            <div class="text-small">
                                <span class="text-secondary">Dob:</span>
                                <span class="strong">{{$birthday}}</span>
                            </div>
                        </div>
        
                        <div class="row col-8">

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

            </div>

        </div>


    </main>

</body>


</html>