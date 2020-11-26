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
                    <h1 class="text-uppercase font-weight-bold">Register</h1>
                </div>

            </div>
        </div>

        <div class="container">

            <div class="form-container">
                <form action="{{ url('/register') }}" role="form" class="form-horizontal register-form" method="POST">
                    @csrf
                    <div class="d-flex justify-content-md-between">
                        <div class="form-group w-c-50">
                            <label for="inputname">Name</label>
                            <input type="text" class="form-control" id="inputname" name="name">
                        </div>
                        <div class="form-group w-c-50">
                            <label for="inputsurename">Surename</label>
                            <input type="text" class="form-control" id="inputsurename" name="surename">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control" id="inputemail" name="email">
                    </div>
                    <div class="form-group">
                        <label for="inputusername">Username</label>
                        <input type="text" class="form-control" id="inputusername" name="username">
                    </div>
                    <div class="form-group">
                        <label for="inputpassword">Password</label>
                        <input type="password" class="form-control" id="inputpassword" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-transparent">Register</button>
                    </div>
                    
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                </form>
            </div>

        </div>
    </main>

</body>

</html>


