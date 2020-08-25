<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

        <div class="app-container">

            <div class="form-container">
                <form action="{{ url('/login') }}" role="form" class="form-horizontal login-form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="inputemail">Email or Username</label>
                        <input type="email" class="form-control" id="inputemail" name="inputemail" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted" >We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="inputpassword">Password</label>
                        <input type="password" class="form-control" id="inputpassword" name="inputpassword" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
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


