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
                            <p class="strong">Videos</p>
                        </a>
                    </div>
                </div>

                <div class="col-7 md-offset-2 mb-5">
                    
                    <video width="100%" controls>
                        <source src="{{$parameter}}" type="video/mp4">
                    </video>

                    <div class="col-12 mb-5">
                        <p class="strong text-large">{{$parameter}}</p>
                        <p class="font-secondary">
                            Aenean enim orci, rutrum et odio eu, feugiat egestas leo. Donec convallis est justo, sit amet mollis ipsum hendrerit et. Vestibulum convallis porta molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed semper nisi, id convallis velit. Aliquam interdum sem sapien, vitae eleifend metus pretium in.
                        </p>
                    </div>

                    <a href="">
                        <div class="row">
                            <div class="col-4">
                                <div class="video-temp">
                                    <div class="play-temp">
                                        &#9650;
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <p class="strong text-large">{{$parameter}}</p>
                                <p class="font-secondary">
                                    Aenean enim orci, rutrum et odio eu, feugiat egestas leo. Donec convallis est justo, sit amet mollis ipsum hendrerit et. Vestibulum convallis porta molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed semper nisi, id convallis velit. Aliquam interdum sem sapien, vitae eleifend metus pretium in.
                                </p>
                            </div>
                        </div>
                    </a>

                    <p>More videos not included in your subscription:</p>
                    <a href="" class="opacity-50">
                        <div class="row ">
                            <div class="col-4">
                                <div class="video-temp">
                                    <div class="play-temp">
                                        &#9650;
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <p class="strong text-large">{{$parameter}}</p>
                                <p class="font-secondary">
                                    Aenean enim orci, rutrum et odio eu, feugiat egestas leo. Donec convallis est justo, sit amet mollis ipsum hendrerit et. Vestibulum convallis porta molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed semper nisi, id convallis velit. Aliquam interdum sem sapien, vitae eleifend metus pretium in.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </main>

</body>

</html>


