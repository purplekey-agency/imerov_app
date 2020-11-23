<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>

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
                            <p class="strong">Upload</p>
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

                    @foreach($users as $user)
                        <div id="userclick-{{$user->id}}">
                            <div class="d-flex">
                                <div class="col-3">
                                    <p class="strong">0{{$user->id}}</p>
                                </div>

                                <div class="col-5">
                                    <p class="strong">{{$user->username}}</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-3"></div>
                                <a onclick="showWorksheet({{ $user->id }})" class="col-5">
                                    <div class="w-100 a-hover" id="worksheet-click-{{$user->id}}">
                                        <p class="text-secondary">Worksheet</p>
                                    </div>
                                </a>

                                <a onclick="showWorksheet({{ $user->id }})" class="col-4">
                                    <div class="w-100 a-hover" id="worksheet-click-{{$user->id}}">
                                        <p class="text-secondary">EDIT</p>
                                    </div>
                                </a>

                            </div>
                            <div class="d-flex">
                                <div class="col-3"></div>
                                <a onclick="showDietPlan({{ $user->id }})" class="col-5">
                                    <div class="w-100 a-hover">
                                        <p class="text-secondary">Diet Plan</p>
                                    </div>
                                </a>

                                <a onclick="showDietPlan({{ $user->id }})" class="col-4">
                                    <div class="w-100 a-hover">
                                        <p class="text-secondary">EDIT</p>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="csv-hidden worksheet" id="worksheet-{{$user->id}}">
                            <div class="worksheet-container">

                                <form action="/admin/upload/save" method="POST" class="w-100 mb-5">
                                    @csrf
                                    <input type="hidden" name="userid" value="{{$user->id}}">
                                    @for($i=1; $i<6; $i++)
                                    <div class="user-input-form-container">
                                        <div class="user-input-form">
                                            <div class="row col-12 px-0 pt-5 pb-2">
                                                <div class="col-6">
                                                    <div class="row col-12 bg-brown mx-0 mb-3 p-0">
                                                        <div class="col-3 d-flex border-right-black p-0 justify-content-center align-items-center">
                                                            <p class="uppercase m-0">DATE</p>
                                                        </div>
                                                        <div class="col-9 d-flex border-right-black p-0 justify-content-center align-items-center">
                                                            <input type="date" name="date_{{$i}}_{{$user->id}}" class="form-control bg-brown">
                                                        </div>
                                                    </div>
                                                    <div class="row col-12 bg-brown mx-0 mb-3 p-0">
                                                        <div class="col-6 p-0 d-flex justify-content-center align-items-center">
                                                            <p class="uppercase m-0"> MUSCLE GROUP </p>
                                                        </div>
                                                        <div class="col-6 p-0 d-flex justify-content-center align-items-center">
                                                            <select name="muscle_group_{{$i}}_{{$user->id}}" class="form-control bg-brown">
                                                                <option value="neck">neck</option>
                                                                <option value="chest">chest</option>
                                                                <option value="bicep">bicep</option>
                                                                <option value="waist">waist</option>
                                                                <option value="hips">hips</option>
                                                                <option value="thigh">thigh</option>
                                                                <option value="calf">calf</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row col-12 bg-brown mx-0 mb-3">
                                                        <div class="col-6 p-0 py-1 d-flex flex-column justify-content-center align-items-center">
                                                            <p class="uppercase m-0">Start</p>
                                                            <input type="time" name="start_{{$i}}_{{$user->id}}" class="form-control bg-brown">
                                                        </div>
                                                        <div class="col-6 py-1 d-flex flex-column justify-content-center align-items-center">
                                                            <p class="uppercase m-0 ">Finish</p>
                                                            <input type="time" name="finish_{{$i}}_{{$user->id}}" class="form-control bg-brown">
                                                        </div>
                                                    </div>
                                                    <div class="row col-12 bg-brown mx-0 mb-3">
                                                        <div class="col-6 p-0 py-1 d-flex flex-column justify-content-center align-items-center">
                                                            <p class="uppercase m-0">STRECH</p>
                                                            <input type="checkbox" name="strech_{{$i}}_{{$user->id}}">
                                                        </div>
                                                        <div class="col-6 py-1 d-flex flex-column justify-content-center align-items-center">
                                                            <p class="uppercase m-0 ">WARM UP</p>
                                                            <input type="checkbox" name="warm_{{$i}}_{{$user->id}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="p-2 b-top-o b-left-o my-5">
                                                <div class="">
                                                    <div class="col-12">
                                                        <table class="col-12">
                                                            <tr class="row m-0">
                                                                <th class="col-5">
                                                                    <div class="w-100 h-100">
                                                                    </div>
                                                                </th>
                                                                <th class="col-1 p-0">
                                                                    <div class="w-100 h-50 ">
                                                                    </div>
                                                                    <div class="w-100 h-50 ">
                                                                    </div>
                                                                </th>
                                                                <th class="col-1 p-0 text-center">
                                                                    <div class="w-100 h-50">
                                                                        <p class="w-100 m-0"> set 1</p>
                                                                    </div>
                                                                </th>
                                                                <th class="col-1 p-0 text-center border-left-black">
                                                                    <div class="w-100 h-50">
                                                                        <p class="w-100 m-0"> set 2</p>
                                                                    </div>
                                                                </th>
                                                                <th class="col-1 p-0 text-center border-left-black">
                                                                    <div class="w-100 h-50">
                                                                        <p class="w-100 m-0"> set 3</p>
                                                                    </div>
                                                                </th>
                                                                <th class="col-1 p-0 text-center border-left-black">
                                                                    <div class="w-100 h-50">
                                                                        <p class="w-100 m-0"> set 4</p>
                                                                    </div>
                                                                </th>
                                                                <th class="col-1 p-0 text-center border-left-black">
                                                                    <div class="w-100 h-50">
                                                                        <p class="w-100 m-0"> set 5</p>
                                                                    </div>
                                                                </th>
                                                                <th class="col-1 p-0 text-center border-left-black">
                                                                    <div class="w-100 h-50">
                                                                        <p class="w-100 m-0"> set 6</p>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                            @for($k=0; $k<6; $k++)
                                                            <tr class="row m-0">
                                                                <td class="col-5">
                                                                    <div class="w-100 h-100 border-bottom-black">
                                                                        <select name="video_{{$i}}_{{$k}}" class="form-control">
                                                                            <option value="" selected disabled>Select exercise</option>
                                                                            @foreach($videos as $video)
                                                                                @if(($user->subscription_type === 1 && $video->subtype_1 === 1) || ($user->subscription_type === 2 && $video->subtype_2 === 1) || ($user->subscription_type === 3 && $video->subtype_3 === 1) || ($user->subscription_type === 4 && $video->subtype_4 === 1) || ($user->subscription_type === 5 && $video->subtype_5 === 1))
                                                                                <option value="{{$video->id}}">{{$video->exercise_name}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td class="col-1 p-0">
                                                                    <div class="w-100 h-50 border-black">
                                                                        <p class="w-100 m-0 text-small">reps</p>
                                                                    </div>
                                                                    <div class="w-100 h-50 border-black">
                                                                        <p class="w-100 m-0 text-small">weight</p>
                                                                    </div>
                                                                </td>
                                                                <td class="col-1 p-0 text-center">
                                                                    <div class="w-100 h-50 bg-brown">
                                                                        <input name="reps_set_{{$i}}_{{$k}}_0" type="number" class="bg-brown">
                                                                    </div>
                                                                    <div class="w-100 h-50">
                                                                        <input name="weight_set_{{$i}}_{{$k}}_0" type="text" class="">
                                                                    </div>
                                                                </td>
                                                                <td class="col-1 p-0 text-center border-left-black">
                                                                    <div class="w-100 h-50 bg-brown">
                                                                        <input name="reps_set_{{$i}}_{{$k}}_1" type="number" class="bg-brown">
                                                                    </div>
                                                                    <div class="w-100 h-50">
                                                                        <input name="weight_set_{{$i}}_{{$k}}_1" type="text" class="">
                                                                    </div>
                                                                </td>
                                                                <td class="col-1 p-0 text-center border-left-black">
                                                                    <div class="w-100 h-50 bg-brown">
                                                                        <input name="reps_set_{{$i}}_{{$k}}_2" type="number" class="bg-brown">
                                                                    </div>
                                                                    <div class="w-100 h-50">
                                                                        <input name="weight_set_{{$i}}_{{$k}}_2" type="text" class="">
                                                                    </div>
                                                                </td>
                                                                <td class="col-1 p-0 text-center border-left-black">
                                                                    <div class="w-100 h-50 bg-brown">
                                                                        <input name="reps_set_{{$i}}_{{$k}}_3" type="number" class="bg-brown">
                                                                    </div>
                                                                    <div class="w-100 h-50">
                                                                        <input name="weight_set_{{$i}}_{{$k}}_3" type="text" class="">
                                                                    </div>
                                                                </td>
                                                                <td class="col-1 p-0 text-center border-left-black">
                                                                    <div class="w-100 h-50 bg-brown">
                                                                        <input name="reps_set_{{$i}}_{{$k}}_4" type="number" class="bg-brown">
                                                                    </div>
                                                                    <div class="w-100 h-50">
                                                                        <input name="weight_set_{{$i}}_{{$k}}_4" type="text" class="">
                                                                    </div>
                                                                </td>
                                                                <td class="col-1 p-0 text-center border-left-black">
                                                                    <div class="w-100 h-50 bg-brown">
                                                                        <input name="reps_set_{{$i}}_{{$k}}_5" type="number" class="bg-brown">
                                                                    </div>
                                                                    <div class="w-100 h-50">
                                                                        <input name="weight_set_{{$i}}_{{$k}}_5" type="text" class="">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endfor
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                
                                    <button type="submit" class="btn btn-transparent">Save</button>

                                </form>

                            </div>
                        </div>

                        <div class="csv-hidden diet-plan" id="diet-plan-{{$user->id}}">
                            <div class="dietplan-container">
                                <div class="user-input-form-container">
                                    <div class="user-input-form">
                                        <form action="/admin/upload/worksheet/save" method="post" class="w-100 mb-5">
                                            @csrf
                                            <input type="hidden" name="userid" value="{{$user->id}}">
                                            @for($i=1; $i<6; $i++)
                                            <div class="user-input-form-container">
                                                <div class="user-input-form">

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
                                                <table class="diet-plan-table-w mt-5">
                                                    @for($k = 1; $k<6; $k++)
                                                    <tr>
                                                        <th>meal 0{{$k}}</th>
                                                        @for($j = 1; $j<6; $j++)
                                                        <td><input class="bg-brown" type="text" name="meal_{{$j}}_{{$k}}_{{$i}}" id="meal_{{$j}}_{{$k}}_{{$i}}"></td>
                                                        @endfor
                                                    </tr>
                                                    @endfor
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
                                            </div>
                                            @endfor
                                            <button type="submit" class="btn btn-transparent">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach


                </div>


            </div>

        </div>

        <script>

            function showWorksheet(id){
                var elems = document.getElementsByClassName('a-hover');
                var data = document.getElementsByClassName('csv-hidden');

                for(var i=0; i<elems.length; i++){
                    elems[i].classList.remove('a-hover-active');
                }

                for(var i=0; i<data.length; i++){
                    data[i].classList.remove('csv-hidden-active');
                }

                document.getElementById('worksheet-' + id).classList.toggle('csv-hidden-active');

            }

            function showDietPlan(id){
                var elems = document.getElementsByClassName('a-hover');
                var data = document.getElementsByClassName('csv-hidden');

                for(var i=0; i<elems.length; i++){
                    elems[i].classList.remove('a-hover-active');
                }

                for(var i=0; i<data.length; i++){
                    data[i].classList.remove('csv-hidden-active');
                }

                document.getElementById('diet-plan-' + id).classList.toggle('csv-hidden-active');
            }

        </script>

    </main>

</body>


</html>