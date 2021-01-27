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
                            <p class="text-secondary">Inbox ({!!Auth::user()->getMessageCount()!!})</p>
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
                        
                    <a class="btn btn-light w-25 mr-0 ml-auto mb-5" href="/messages">Back to messages</a>
    
                    <p class="text-center">{!!$title!!}</p>
    
                            
                    @if($messages->count() > 0)
                        @foreach($messages as $message)
                            <div class="card p-2 m-1 message-card @if($message->fromAdmin()) admin @endif">
                                @if(!$message->fromAdmin())
                                    <p class="message-user">You:</p>
                                @else
                                    <p class="message-user">{!!$message->getUserName()!!}:</p>
                                @endif
                                {!!$message->message!!} <br>
                                <p class="message-date">{!!$message->getDate()!!}</p>
                            </div>
                        @endforeach
                    @endif
    
                    <div class="send-message-container">
    
                        <form method="POST" class="send-message" action="{{route('sendReplyUser', ['category' => $category])}}">
                            @csrf
                            <textarea class="form-control m-1" required minlength="10" minlength="200" name="message_body"></textarea>
                            <button class="btn btn-light w-25 mr-0 ml-auto" type="submit">Send</button>
                        </form>
    
                    </div>

                </div>

            </div>

        </div>
    </main>

</body>

</html>


