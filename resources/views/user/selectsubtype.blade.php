<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

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
                    <h1 class="text-uppercase font-weight-bold">Select subscription type to proceed</h1>
                </div>

            </div>
        </div>

        <div class="container">

            <div class="container row">

                <div class="form-container col-md-6">
                
                    <form action="/selectsubtype" method="post">
                        @csrf

                        <label for="sub_select">Please select your subscription type:</label>
                        <select id="sub_select" name="sub_select" class="form-control mb-4" required>
                                <option class="" value="" disabled selected>Please select your subscription type.</option>
                            @foreach($subscriptionTypes as $subType)
                                <option class="" value="{{$subType->id}}">{{$subType->subscription_type}} | {{$subType->subscription_price}}€</option>
                            @endforeach
                        </select>


                        <input type="submit" class="btn btn-primary" value="Potvrdi">
                    </form>
                
                </div>

                <div class="col-md-6">
                
                    @foreach($subscriptionTypes as $subType)

                        <div class="subdesc sub-hidden" id="subtype_{{$subType->id}}">
                            <span>Subscription Type description:</span>


                            <textarea disabled>{{$subType->subscription_description}}</textarea>
                        
                        </div>

                    @endforeach
                
                </div>

            </div>

        </div>
    </main>

<script>

$('#sub_select').on('change', function(){

    $('.subdesc').each(function(){
        $(this).addClass('sub-hidden');
    });

    var val = this.value;
    $('#subtype_' + val).removeClass('sub-hidden');

})


</script>

</body>

</html>


