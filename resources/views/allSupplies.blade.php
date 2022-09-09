<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <title>Home</title>
    <meta charset="utf-8">
    <meta name = "format-detection" content = "telephone=no" />
    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="css/touchTouch.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.1.1.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/script.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <script src="js/jquery.mobilemenu.js"></script>
    <script src="js/tmStickUp.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/touchTouch.jquery.js"></script>
    <script src="js/jquery.shuffle-images.js"></script>

    <script>
        $(window).load(function(){
            $().UItoTop({ easingType: 'easeOutQuart' });
            $('.gallery .info').touchTouch();
        });

        $(document).ready(function(){
            $(".shuffle-me").shuffleImages({
                target: ".images > img"
            });
        });
    </script>
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <link rel="stylesheet" media="screen" href="css/ie.css">
    <![endif]-->
</head>

<body class="page1" id="top">
<div class="main">
    <!--==============================
                  header
    =================================-->
    <header>
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <h1>
                        <a href="/">
                            <img src="images/logo.png" alt="Logo alt">
                        </a>
                    </h1>

                    <div class="navigation ">
                        <nav>
                            <ul class="sf-menu">
                                <li class="current"><a href="/">Home</a></li>
                                <li><a href="/all/products">Products</a></li>
                                <li><a href="/all/meals">Meals</a></li>
                                <li><a href="/all/restaurants">Reserve</a></li>

                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('user.login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('user.register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li><a href="/user/all/orders">My Orders</a></li>
                                    <li><a href="/user/all/mealorders">My Meals</a></li>
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Log out
                                        </a>
                                    </li>
                                @endguest
                            </ul>
                        </nav>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--=====================
              Content
    ======================-->

    <div class="container">
        <br><br>
        <div class="row">
        @foreach($products as $one)
                <div class="grid_3">
        <div class="card" style="width:200px">
            <img class="card-img-top" src="{{asset('upload/'.$one->image)}}" alt="Card image" wight="300" height="300">
            <div class="card-body">
                <h4 class="card-title">{{$one->name}}</h4>
                <p class="card-text">Price: {{$one->price}} S.P</p>
                <p class="card-text">Category: {{$one->get_category->name}}</p>
                <p class="card-text">Description: {{$one->description}}</p>
                @guest
                    @if (Route::has('user.login'))
                <a href="{{ route('user.login') }}" class="btn btn-primary">Order</a>
                        @endif
                @else
                    <a href="/user/add/order/{{$one->id}}" class="btn btn-primary">Order</a>
                @endguest
            </div>
        </div>
                </div>
        @endforeach
        </div>
    </div>






    <a href="#" id="toTop" class="fa fa-chevron-up"></a>
</div>
</body>

</html>

