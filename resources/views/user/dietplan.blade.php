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
                            <p class="strong">Diet Plan</p>
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
                        
                        @if($todaysDiet)

                        <div class="table-container">
                        
                            <table class="diet-plan-table mb-5">
                                <tr>
                                    <th>Lean protein</th>
                                    <th>Vegetables</th>
                                    <th>Fruits</th>
                                    <th>Grains</th>
                                    <th>Healty Fats</th>
                                    <th>Dairy Products</th>
                                </tr>
                                <tr>
                                    <td>Lean protein</td>
                                    <td>Vegetables</td>
                                    <td>Fruits</td>
                                    <td>Grains</td>
                                    <td>Healty Fats</td>
                                    <td>Dairy Products</td>
                                </tr>
                            </table>

                            <span class="upperace my-5">choose any foods from each column above to make your meals with the amounts below</span>

                            <table class="diet-plan-table-w mt-5">
                                <tr>
                                    <th>meal 01</th>
                                    <td></th>
                                    <td></th>
                                    <td></th>
                                    <td></th>
                                    <td></th>
                                </tr>
                                <tr>
                                    <th>meal 02</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>meal 03</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>meal 04</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>meal 05</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>snack</td>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </table>
                        
                        </div>

                        @else
                        <div class="table-container">
                        
                            <table class="diet-plan-table mb-5">
                                <tr>
                                    <td>There is no defined Diet plan for today. Click on the following links to see planned diet plan.</td>
                                </tr>
                                @foreach($userDiets as $userDiet)
                                <tr>
                                    <td><a href="/diet-plan/{{$userDiet->id}}">{{$userDiet->date}}</a></td>
                                </tr>
                                @endforeach
                            </table>

                        </div>


                        @endif

                    </div>

                </div>

                <div class="col-3 md-offset-2">
                    <p class="m-0 mb-2 text-center">Messages</p>

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
                        <form method="POST" class="send-message" action="{{route('sendDietplanMessage')}}">
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


