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

                    <div class="mb-3">
                        <h2>Unresponded meet requests</h2>
                    </div>

                    <div class="pmargin-0">
                        <form action="/dashboard/confirmmeets" method="POST">
                            @csrf
                            <table class="col-md-12 my-5" id="meetstable">
                                <tr>
                                    <th>User name</th>
                                    <th>Subscription type</th>
                                    <th>Proposed times</th>    
                                    <th>Confirm</th>
                                <tr>
                                    
                            @foreach ($proposedmeets as $proposedmeet)
                                <tr>
                                    <td><div class="d-flex flex-column justify-content-between" style="min-height: 120px"><p>{{ $proposedmeet[0]->getUserName() }}</p></div></td>
                                    <td><div class="d-flex flex-column justify-content-between" style="min-height: 120px"><p>{{ $proposedmeet[0]->getSubName() }}</p></div></td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-between" style="min-height: 120px">
                                            @foreach ($proposedmeet as $key=>$item)
                                                <p>{{$item->proposed_date}} {{$item->proposed_time}}</p>
                                            @endforeach
                                            
                                        </div>
                                        
                                    </td>    
                                    <td>                                    
                                        <div class="d-flex flex-column justify-content-between" style="min-height: 120px">
                                            @foreach ($proposedmeet as $key=>$item)
                                                <input name="confirmmeet-{{$proposedmeet[0]->user_id}}" type="radio" value="{{$item->id}}">
                                            @endforeach
                                        </div>
    
                                    </td>
                                <tr>
                                <label for="confirmmeet-{{$proposedmeet[0]->user_id}}">Cancel all:</p>
                                <input id="confirmmeet-{{$proposedmeet[0]->user_id}}" name="confirmmeet-{{$proposedmeet[0]->user_id}}" type="radio" value="null">
                            @endforeach
                            </table>
                            <input type="submit" class="btn btn-primary" value="Submit">

                            @if(Session::has('success'))
                                <div class="alert alert-success my-5" role="alert">
                                    {{Session::get('success')}}
                                </div>
                            @endif
                        </form>
                    </div>

                    <div class="my-3">
                        <h2>Your Calendar</h2>
                    </div>

                    <div class="pmargin-0">
                        
                    </div>
                </div>

            </div>

        </div>
    
    </main>

</body>