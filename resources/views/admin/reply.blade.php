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
                            <p class="strong">Messages ({!!Auth::user()->getMessageCount()!!})</p>
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

                    <div class="col-12 col-md-offset-2">

                        <a class="btn btn-light w-25 mr-0 ml-auto mb-5" href="/admin/messages">Back to messages</a>

                        <p class="text-center">{!!$title!!}</p>

                        
                        @if($messages->count() > 0)
                            @foreach($messages as $message)
                                <div class="card p-2 m-1 message-card @if($message->fromAdmin()) admin @endif">
                                    <p class="message-user">{!!$message->getUserName()!!}:</p>
                                    {!!$message->message!!} <br>
                                    <p class="message-date">{!!$message->getDate()!!}</p>
                                </div>
                            @endforeach
                        @endif

                        <div class="send-message-container">

                            <form method="POST" class="send-message" action="{{route('sendReply', ['category' => $category, 'user' => $user])}}">
                                @csrf
                                <textarea class="form-control m-1" required minlength="10" minlength="200" name="message_body"></textarea>
                                <button class="btn btn-light w-25 mr-0 ml-auto" type="submit">Send</button>
                            </form>

                        </div>

                    </div>


                </div>

            </div>

        </div>


    </main>

</body>


</html>