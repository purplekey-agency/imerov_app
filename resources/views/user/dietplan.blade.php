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
                    @if(Auth::user()->hasAccessToTraining())
                    <div class="hover-text">
                        <a href="/worksheet">
                            <p class="text-secondary">Worksheet</p>
                        </a>
                    </div>
                    @endif
                    @if(Auth::user()->hasAccessToDietPlan())
                    <div class="hover-text">
                        <a href="/diet-plan">
                            <p class="strong">Diet Plan</p>
                        </a>
                    </div>
                    @endif
                    @if(Auth::user()->hasAccessToTraining())
                    <div class="hover-text">
                        <a href="/videos">
                            <p class="text-secondary">Exercises</p>
                        </a>
                    </div>
                    @endif
                </div>

                <div class="col-7 md-offset-2">
                    
                    <div class="">
                        
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
                                    <td><div id="td-lean-protein"> <p>@foreach($avaliableProtein as $aP) {{$aP->avaliable_food_name}},  @endforeach</div></td>
                                    <td><div id="td-vegetables"> <p>@foreach($avaliableVegetables as $aV){{$aV->avaliable_food_name}},  @endforeach</div></td>
                                    <td><div id="td-fruits"> <p>@foreach($avaliableFruits as $aF){{$aF->avaliable_food_name}},  @endforeach</div></td>
                                    <td><div id="td-grains"> <p>@foreach($avaliableGrains as $aG){{$aG->avaliable_food_name}},  @endforeach</div></td>
                                    <td><div id="td-healty-fats"> <p>@foreach($avaliableHealtyFats as $aHF){{$aHF->avaliable_food_name}},  @endforeach</div></td>
                                    <td><div id="td-dairy-products"> <p>@foreach($avaliableDairyProducts as $aDP){{$aDP->avaliable_food_name}},  @endforeach</div></td>
                                </tr>
                            </table>

                            <table class="diet-plan-table-w mt-5">
                                @foreach($userDiets as $key=>$userDiet)
                                    <a href="/diet-plan/{{$key}}">Day {{$key}}</a>
                                @endforeach
                            </table>
                        
                        </div>

                    </div>

                </div>

                <div class="col-5 md-offset-2 m-auto">
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


