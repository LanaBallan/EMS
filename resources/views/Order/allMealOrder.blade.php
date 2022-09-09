<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <title>Home</title>
    <meta charset="utf-8">
    <meta name = "format-detection" content = "telephone=no" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
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
    <body>
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Meal Name</th>
                <th>Quantity</th>
                <th>Note</th>
                <th>Meal Price</th>
                <th>Location Name</th>
                <th>Delivery Cost</th>
                <th>Total Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $one)
                <tr>
                    <td>{{$one->mealName}}</td>
                    <td>{{$one->quantity}}</td>
                    <td>{{$one->note}}</td>
                    <td>{{$one->mealPrice}}</td>
                    <td>{{$one->locationName}}</td>
                    <td>{{$one->cost}}</td>
                    <td>{{$one->total_price}}</td>
                    <td>
                        <a type="button"
                           href="/user/mealorder/delete/{{$one->orderId}}"
                           class="btn1 btn-outline-danger btn-sm">Delete</a>

                        <a type="button"
                           href="/user/mealorder/confirm/{{$one->orderId}}"
                           class="btn1 btn-outline-success btn-sm">Confirm</a>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->


</html>

