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
                            <p class="text-secondary">Dashboard</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/messages">
                            <p class="strong">Inbox ({!!Auth::user()->getMessageCount()!!})</p>
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

                <div class="col-7 md-offset-2">
                    
                    <div class="">
                        
                        @foreach($messages as $message)

                            <div class="message-list-item card p-3 @if($message->fromAdmin())admin @endif">
                                @if(!$message->fromAdmin())
                                    <p class="username-msg">You:</p>
                                @else
                                    <p class="username-msg">{!!$message->getUserName()!!}</p>
                                @endif
                                <p class="category-msg">{!!$message->getCategory()!!}</p>
                                <p class="context-msg">{!!$message->message!!}</p>
                                <a class="btn btn-light d-block ml-auto mr-0 font-weight-bold" href="{{route('showReplyUser', ['category' => $message->category])}}">Reply</a>
                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>
    </main>

</body>

</html>


