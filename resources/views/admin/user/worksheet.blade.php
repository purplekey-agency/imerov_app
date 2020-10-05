<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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

        <div class="app-container">

            <div class="container row">

                <div class="col-4 col-md-offset-2">
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
                            <p class="text-secondary">Messages</p>
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

                <div class="col-8 col-md-offset-2">
                    
                    <div class="">
                    
                        <p class="strong">{{$user->username}}</p>
                    
                    </div>

                    <div class="row col-12 col-md-offset-2 justify-content-between">
                        <div class="hover-text">
                            <a href="/admin/users/{{$user->id}}">
                                <p class="text-secondary">Dashboard</p>
                            </a>
                        </div>
    
                        <div class="hover-text">
                            <a href="/admin/users/{{$user->id}}/questionarre">
                                <p class="text-secondary">Questionarre</p>
                            </a>
                        </div>
    
                        <div class="hover-text">
                            <a href="/admin/users/{{$user->id}}/worksheet">
                                <p class="strong">Worksheet</p>
                            </a>
                        </div>
    
                        <div class="hover-text">
                            <a href="/admin/users/{{$user->id}}/diet-plan">
                                <p class="text-secondary">Diet Plan</p>
                            </a>
                        </div>
    
                        <div class="hover-text">
                            <a href="/admin/users/{{$user->id}}/videos">
                                <p class="text-secondary">Videos</p>
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
                                <span class="strong">Full Body</span>
                            </div>
                            <div class="text-small">
                                <span class="text-secondary">Messages:</span>
                                <span class="strong">20/</span>
                                <span class="strong red">4</span>
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
                                <span class="strong">Date of birth</span>
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
        
                        <div class="row col-8">
        
                            <div class="col col-md-offset-2">
                                <div class="d-flex">
                                    <a href="" class="d-flex">
                                        <p>Before</p>
                                        <p class="text-secondary">(edit)</p>
                                    </a>
                                </div>
                                <div class="image-container">
                                    <img src="#">
                                </div>
                                
                            </div>
        
                            <div class="col col-md-offset-2">
                                <div class="d-flex">
                                    <a href="" class="d-flex">
                                        <p>After</p>
                                        <p class="text-secondary">(edit)</p>
                                    </a>
                                </div>
        
                                <div class="image-container">
                                    <img src="#">
                                </div>
                            </div>
                        </div>
                    </div>

    

                </div>

            </div>

        </div>


    </main>

</body>


</html>