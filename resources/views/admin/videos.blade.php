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

                <div class="col-9 col-md-offset-2">
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

                    <div class="col-12 col-md-offset-2">


                    </div>


                </div>

            </div>

        </div>


    </main>

</body>


</html>