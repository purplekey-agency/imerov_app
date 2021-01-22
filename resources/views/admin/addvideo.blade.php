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
                            <p class="text-secondary">Dashboard</p>
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
                            <p class="strong">Videos</p>
                        </a>
                    </div>
                </div>

                <div class="col-7 col-md-offset-2">
                    <div class="search-container mb-5">
                         <div class="">
                            <span>Add new exercise:</span>
                        </div>
                    </div>

                    <div class="col-12 col-md-offset-2">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif

                        @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('error')}}
                        </div>
                        @endif


                        <div class="form-container">
                            
                            <form action="/admin/videos/addnew" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="exercise_name">Exercise name:</label>
                                <input type="text" class="form-control" id="exercise_name" name="exercise_name" required>

                                <div class="my-3 form-group">
                                    <label for="exercise_video_m">Video for exercise, for men:</label>
                                    <input type="file" accept="video/mp4,video/x-m4v,video/*" name="exercise_video_m" id="exercise_video_m">
                                </div>

                                <div class="my-3 form-group">
                                    <label for="exercise_video_f">Video for exercise, for women:</label>
                                    <input type="file" accept="video/mp4,video/x-m4v,video/*" name="exercise_video_f" id="exercise_video_f">
                                </div>

                                <label for="exercise_description">Exercise description:</label>
                                <textarea type="text" class="form-control" id="exerexercise_descriptioncise_name" name="exercise_description" required></textarea>
                            
                                <div class="my-3 form-group">
                                    <label for="">Avaliable for subscription type:</label>
                                    @foreach($subtypes as $subtype)
                                        <div class="col-md-12 d-flex justify-content-between">
                                            <label for="subtype-{{$subtype->id}}"> {{$subtype->subscription_type}} </label>
                                            <input type="checkbox" id="subtype-{{$subtype->id}}" name="subtype_{{$subtype->id}}" value="{{$subtype->id}}">
                                        </div>
                                    @endforeach
                                </div>

                                <input type="submit" class="my-5 btn btn-primary" value="Add new exercise">

                            </form>

                            
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>

</body>


</html>