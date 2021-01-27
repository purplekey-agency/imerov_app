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

                <div class="col-7 col-md-offset-2">
                    <div class="search-container mb-5">
                        <form action="/admin/messages" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" @if(isset(request()->search)) value="{{request()->search}}" @endif class="form-control my-0 py-1" placeholder="Search">
                                <div class="input-group-append">
                                    <span class="input-group-text lime lighten-2" style="cursor: pointer;">
                                        <i class="fa fa-search text-grey" aria-hidden="true" onclick=""></i>
                                    </span>
                                    @if(isset(request()->search))
                                        <a class="btn btn-dark" href="/admin/messages">Cancel</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-12 col-md-offset-2">
                        
                        @foreach($messages as $message)

                            <div class="message-list-item card p-3 @if(!$message->fromAdmin())unread @endif">
                                <p class="username-msg">{!!$message->getUserName()!!}</p>
                                <p class="category-msg">{!!$message->getCategory()!!}</p>
                                <p class="context-msg">{!!$message->message!!}</p>
                                <a class="btn btn-light d-block ml-auto mr-0 font-weight-bold" href="{{route('showReply', ['category' => $message->category, 'user' => $message->user_channel])}}">Reply</a>
                            </div>

                        @endforeach

                        @if(isset(request()->search) && $messages->isEmpty())
                            <p class="text-center">No results.</p>
                        @endif

                    </div>


                </div>

            </div>

        </div>


    </main>

</body>


</html>