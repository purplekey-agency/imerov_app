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
                            <p class="strong">Exercises</p>
                        </a>
                    </div>
                </div>

                <div class="col-10 md-offset-2">
                    
                    <div class="">
                        
                        <div class="table-container d-flex flex-column align-items-end">
                        
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
                                @foreach($userDiet as $meal)
                                    @if($meal->meal_no == 1)
                                        <tr>
                                            <th>meal 01</th>
                                            <td>
                                                {{$meal->meal_type_1}}
                                                <br>
                                                {{$meal->meal_weight_1}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_2}}
                                                <br>
                                                {{$meal->meal_weight_2}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_3}}
                                                <br>
                                                {{$meal->meal_weight_3}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_4}}
                                                <br>
                                                {{$meal->meal_weight_4}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_5}}
                                                <br>
                                                {{$meal->meal_weight_5}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_6}}
                                                <br>
                                                {{$meal->meal_weight_6}}
                                            </th>
                                        </tr>
                                    @elseif($meal->meal_no == 2)
                                    <tr>
                                            <th>meal 02</th>
                                            <td>
                                                {{$meal->meal_type_1}}
                                                <br>
                                                {{$meal->meal_weight_1}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_2}}
                                                <br>
                                                {{$meal->meal_weight_2}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_3}}
                                                <br>
                                                {{$meal->meal_weight_3}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_4}}
                                                <br>
                                                {{$meal->meal_weight_4}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_5}}
                                                <br>
                                                {{$meal->meal_weight_5}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_6}}
                                                <br>
                                                {{$meal->meal_weight_6}}
                                            </th>
                                        </tr>
                                    @elseif($meal->meal_no == 3)
                                    <tr>
                                            <th>meal 03</th>
                                            <td>
                                                {{$meal->meal_type_1}}
                                                <br>
                                                {{$meal->meal_weight_1}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_2}}
                                                <br>
                                                {{$meal->meal_weight_2}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_3}}
                                                <br>
                                                {{$meal->meal_weight_3}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_4}}
                                                <br>
                                                {{$meal->meal_weight_4}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_5}}
                                                <br>
                                                {{$meal->meal_weight_5}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_6}}
                                                <br>
                                                {{$meal->meal_weight_6}}
                                            </th>
                                        </tr>
                                    @elseif($meal->meal_no == 4)
                                    <tr>
                                            <th>meal 04</th>
                                            <td>
                                                {{$meal->meal_type_1}}
                                                <br>
                                                {{$meal->meal_weight_1}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_2}}
                                                <br>
                                                {{$meal->meal_weight_2}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_3}}
                                                <br>
                                                {{$meal->meal_weight_3}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_4}}
                                                <br>
                                                {{$meal->meal_weight_4}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_5}}
                                                <br>
                                                {{$meal->meal_weight_5}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_6}}
                                                <br>
                                                {{$meal->meal_weight_6}}
                                            </th>
                                        </tr>
                                    @elseif($meal->meal_no == 5)
                                    <tr>
                                            <th>meal 05</th>
                                            <td>
                                                {{$meal->meal_type_1}}
                                                <br>
                                                {{$meal->meal_weight_1}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_2}}
                                                <br>
                                                {{$meal->meal_weight_2}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_3}}
                                                <br>
                                                {{$meal->meal_weight_3}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_4}}
                                                <br>
                                                {{$meal->meal_weight_4}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_5}}
                                                <br>
                                                {{$meal->meal_weight_5}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_6}}
                                                <br>
                                                {{$meal->meal_weight_6}}
                                            </th>
                                        </tr>
                                    @elseif($meal->meal_no == 6)
                                    <tr>
                                            <th>meal 02</th>
                                            <td>
                                                {{$meal->meal_type_1}}
                                                <br>
                                                {{$meal->meal_weight_1}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_2}}
                                                <br>
                                                {{$meal->meal_weight_2}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_3}}
                                                <br>
                                                {{$meal->meal_weight_3}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_4}}
                                                <br>
                                                {{$meal->meal_weight_4}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_5}}
                                                <br>
                                                {{$meal->meal_weight_5}}
                                            </th>
                                            <td>
                                                {{$meal->meal_type_6}}
                                                <br>
                                                {{$meal->meal_weight_6}}
                                            </th>
                                        </tr>
                                    @endif

                                @endforeach
                            </table>
                        
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </main>

</body>

</html>


