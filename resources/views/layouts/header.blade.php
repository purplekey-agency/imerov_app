<header>

    <div class="header-container container d-flex justify-content-md-between align-content-center">
        <a class="d-flex align-content-center" href="/">
            <div class="header-image-cointainer">
                <img src="{{asset('images/LOGO-mobile-padded.png')}}" alt="">
            </div>
        </a>

        <div class="d-flex align-items-center justify-content-md-between" style="width: auto;">
            @if(!Auth::user())
                @if(isset($register) && $register)
                <a class="btn btn-primary d-flex align-items-center" href="/register">
                    <div class="w-100 h-100">
                        <p>Register</p>
                    </div>
                </a>
                @else
                <a class="btn btn-primary d-flex align-items-center" href="/">
                    <div class="w-100 h-100">
                        <p>Login</p>
                    </div>
                </a>
                @endif
            @else
            <a class="btn btn-primary d-flex align-items-center" href="/register">
                <div class="w-100 h-100">
                    <p>Register</p>
                </div>
            </a>
            @endif
        </div>

    </div>

</header>