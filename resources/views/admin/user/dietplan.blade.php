<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

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

                <div class="col-3 col-md-offset-2">
                    <div class="hover-text">
                        <a href="/admin/dashboard">
                            <p class="text-secondary">Dashboard</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/admin/users">
                            <p class="strong">Users</p>
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

                <div class="col-9 col-md-offset-2">
                    
                    <div class="">
                    
                        <p class="strong">{{$user->username}}</p>
                    
                    </div>

                    <div class="row col-12 col-md-offset-2" style="height: 40px; max-height:40px;">
                        <div class="hover-text mx-3">
                            <a href="/admin/users/{{$user->id}}">
                                <p class="text-secondary">Dashboard</p>
                            </a>
                        </div>
    
                        <div class="hover-text mx-3">
                            <a href="/admin/users/{{$user->id}}/questionarre">
                                <p class="text-secondary">Questionarre</p>
                            </a>
                        </div>

                        <div class="hover-text mx-3">
                            <a href="/admin/users/{{$user->id}}/diet-plan">
                                <p class="strong">Diet Plan</p>
                            </a>
                        </div>
    
                    </div>

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
                                    <td><div id="td-lean-protein">@foreach($avaliableProtein as $aP) <div class="d-flex justify-content-between"><p>{{$aP->avaliable_food_name}} </p><a href=""><i class="fa fa-remove" title="Remove"></i></a></div> @endforeach</div></td>
                                    <td><div id="td-vegetables">@foreach($avaliableVegetables as $aV) <div class="d-flex justify-content-between"><p>{{$aV->avaliable_food_name}}</p><a href=""><i class="fa fa-remove" title="Remove"></i></a></div> @endforeach</div></td>
                                    <td><div id="td-fruits">@foreach($avaliableFruits as $aF) <div class="d-flex justify-content-between"><p>{{$aF->avaliable_food_name}}</p><a href=""><i class="fa fa-remove" title="Remove"></i></a></div> @endforeach</div></td>
                                    <td><div id="td-grains">@foreach($avaliableGrains as $aG) <div class="d-flex justify-content-between"><p>{{$aG->avaliable_food_name}}</p><a href=""><i class="fa fa-remove" title="Remove"></i></a></div> @endforeach</div></td>
                                    <td><div id="td-healty-fats">@foreach($avaliableHealtyFats as $aHF) <div class="d-flex justify-content-between"><p>{{$aHF->avaliable_food_name}}</p><a href=""><i class="fa fa-remove" title="Remove"></i></a></div> @endforeach</div></td>
                                    <td><div id="td-dairy-products">@foreach($avaliableDairyProducts as $aDP) <div class="d-flex justify-content-between"><p>{{$aDP->avaliable_food_name}}</p><a href=""><i class="fa fa-remove" title="Remove"></i></a></div> @endforeach</div></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="lean-protein-input"></td>
                                    <td><input type="text" class="vegetables-input"></td>
                                    <td><input type="text" class="fruits-input"></td>
                                    <td><input type="text" class="grains-input"></td>
                                    <td><input type="text" class="healty-fats-input"></td>
                                    <td><input type="text" class="dairy-products-input"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
    
                </div>

            </div>

        </div>


    </main>

    <script>

        $(document).ready(function(){
            
            $('.lean-protein-input').on('keyup', function(event){
                name = this.value;
                if(event.keyCode === 13){
                    $.ajax({
                        url:'/admin/users/{{$user->id}}/diet-plan/add',
                        type:'POST',
                        data:{
                            _token:"{{ csrf_token() }}",
                            foodid: 1,
                            userid: "{{$user->id}}",
                            val: name,

                        },
                        success:function(response){
                            if(response == 1){
                                console.log("here");
                                $('#td-lean-protein').append('<p>' + name + '</p>');
                                $('.lean-protein-input').val('');
                            }
                        }
                    });
                }
            });

            $('.vegetables-input').on('keyup', function(event){
                name = this.value;
                if(event.keyCode === 13){
                    $.ajax({
                        url:'/admin/users/{{$user->id}}/diet-plan/add',
                        type:'POST',
                        data:{
                            _token:"{{ csrf_token() }}",
                            foodid: 2,
                            userid: "{{$user->id}}",
                            val: name,

                        },
                        success:function(response){
                            if(response == 1){
                                console.log("here");
                                $('#td-vegetables').append('<p>' + name + '</p>');
                                $('.vegetables-input').val('');
                            }
                        }
                    });
                }
            });

            $('.fruits-input').on('keyup', function(event){
                name = this.value;

                if(event.keyCode === 13){
                    $.ajax({
                        url:'/admin/users/{{$user->id}}/diet-plan/add',
                        type:'POST',
                        data:{
                            _token:"{{ csrf_token() }}",
                            foodid: 3,
                            userid: "{{$user->id}}",
                            val: name,

                        },
                        success:function(response){
                            if(response == 1){
                                $('#td-fruits').append('<p>' + name + '</p>');
                                $('.fruits-input').val('');
                            }
                        }
                    });
                }
            });

            $('.grains-input').on('keyup', function(event){
                name = this.value;
                if(event.keyCode === 13){
                    $.ajax({
                        url:'/admin/users/{{$user->id}}/diet-plan/add',
                        type:'POST',
                        data:{
                            _token:"{{ csrf_token() }}",
                            foodid: 4,
                            userid: "{{$user->id}}",
                            val: name,

                        },
                        success:function(response){
                            if(response == 1){
                                console.log("here");
                                $('#td-grains').append('<p>' + name + '</p>');
                                $('.grains-input').val('');
                            }
                        }
                    });
                }
            });

            $('.healty-fats-input').on('keyup', function(event){
                name = this.value;
                if(event.keyCode === 13){
                    $.ajax({
                        url:'/admin/users/{{$user->id}}/diet-plan/add',
                        type:'POST',
                        data:{
                            _token:"{{ csrf_token() }}",
                            foodid: 5,
                            userid: "{{$user->id}}",
                            val: name,

                        },
                        success:function(response){
                            if(response == 1){
                                console.log("here");
                                $('#td-healty-fats').append('<p>' + name + '</p>');
                                $('.healty-fats-input').val('');
                            }
                        }
                    });
                }
            });

            $('.dairy-products-input').on('keyup', function(event){
                name = this.value;
                if(event.keyCode === 13){
                    $.ajax({
                        url:'/admin/users/{{$user->id}}/diet-plan/add',
                        type:'POST',
                        data:{
                            _token:"{{ csrf_token() }}",
                            foodid: 6,
                            userid: "{{$user->id}}",
                            val: name,

                        },
                        success:function(response){
                            if(response == 1){
                                console.log("here");
                                $('#td-dairy-products').append('<p>' + name + '</p>');
                                $('.dairy-products-input').val('');
                            }
                        }
                    });
                }
            });

        });

    </script>

</body>


</html>