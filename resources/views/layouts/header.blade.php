<header>

    <div class="header-container container d-flex justify-content-md-between align-content-center">
        @if(!Auth::user())
        <a class="d-flex align-content-center" href="/">
            <div class="header-image-cointainer">
                <img src="{{asset('images/LOGO-mobile-padded.png')}}" alt="">
            </div>
        </a>
        @else
            @if(Auth::user()->type_of_user == 0)
            <a class="d-flex align-content-center" href="/dashboard">
                <div class="header-image-cointainer">
                    <img src="{{asset('images/LOGO-mobile-padded.png')}}" alt="">
                </div>
            </a>
            @else
            <a class="d-flex align-content-center" href="/admin/dashboard">
                <div class="header-image-cointainer">
                    <img src="{{asset('images/LOGO-mobile-padded.png')}}" alt="">
                </div>
            </a>
            @endif
        @endif

        <div class="d-flex align-items-center justify-content-md-between" style="width: auto;">
            @if(Auth::user() == null)
                @if(isset($register) && $register)
                <a class="btn btn-transparent d-flex align-items-center" href="/">
                    <div class="w-100 h-100">
                        <p>Register</p>
                    </div>
                </a>
                @else
                <a class="btn btn-transparent d-flex align-items-center" href="/login">
                    <div class="w-100 h-100">
                        <p>Login</p>
                    </div>
                </a>
                @endif
            @else
            <a class="btn btn-transparent d-flex align-items-center" href="/logout">
                <div class="w-100 h-100">
                    <p>Logout</p>
                </div>
            </a>
            @endif
        </div>

    </div>

</header>