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

                <div class="col-2 col-md-offset-2">
                    <div class="hover-text">
                        <a href="/admin/dashboard">
                            <p class="strong">Dashboard</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/admin/users">
                            <p class="text-secondary">Users</p>
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

                <div class="col-7 col-md-offset-2">
                    <div class="search-container mb-5">
                        <form action="/admin/search" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="search-data" class="form-control my-0 py-1" placeholder="Search">
                                <div class="input-group-append">
                                    <span class="input-group-text lime lighten-2">
                                        <i class="fa fa-search text-grey" aria-hidden="true"></i>
                                    </span>
                                </div>


                            </div>
                        </form>
                    </div>

                    <div class="mb-3">
                        <h2>Welcome, {{Auth::User()->name}}</h2>
                    </div>

                    <div class="pmargin-0">
                        <p class="text-secondary">Active subscriptions: <strong>{{$activeusers}}</strong></p>
                        <p class="text-secondary">Inactive subscriptions:<strong class="red">{{$inactiveusers}}</strong></p>
                        <p class="text-secondary">Messages: <strong>{{@count($allMessages)}}/</strong><strong class="red">{{@count($newMessages)}}</strong></p>
                    </div>
                    @if($hasMeets)
                        <div class="my-3">
                            <h2>You have unresponded requests for meeting regarding diet plan</h2>
                        </div>

                        <a href="/admin/dashboard/meetrequests"><div class="btn btn-primary">See all</div></a>
                    @else
                        <div class="my-3">
                            <h2>You have no unresponded requests for meeting.</h2>
                        </div>

                        <a href="/admin/dashboard/meetrequests"><div class="btn btn-primary">See all</div></a>

                    @endif
                </div>

            </div>

        </div>
    
    </main>

</body>