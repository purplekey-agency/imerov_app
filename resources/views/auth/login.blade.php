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
                    <h1 class="text-uppercase font-weight-bold">Login</h1>
                </div>

            </div>
        </div>

        <div class="container">

            <div class="form-container">
                <form action="{{ url('/login') }}" role="form" class="form-horizontal login-form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="inputemail">Email or Username</label>
                        <input type="text" class="form-control" id="inputemail" name="email" placeholder="Enter email or username">
                        <small id="emailHelp" class="form-text text-muted" >We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="inputpassword">Password</label>
                        <input type="password" class="form-control" id="inputpassword" name="password" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-transparent">Login</button>
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


