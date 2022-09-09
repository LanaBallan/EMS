<!DOCTYPE html>
<html lang="en">
<head>
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
<section id="content"><div class="ic"></div>
  <div class="container">
    <div class="row">
      <div class="page1_block">
        <div class="grid_6">
          <img src="images/page1_img1.jpg" alt="">
        </div>
        <div class="grid_6">
          <h2>Best Ideas for <br> Your Parties</h2>
          <div class="row">
            <div class="grid_3">
              <img src="images/page1_img2.jpg" alt="">
            </div>
            <div class="grid_3">
              <img src="images/page1_img3.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="grid_10 preffix_1">
        <div class="block1">
          <div class="block1_title">
           Register Now To Make Awesome Parties!
            <span>Join Us To Get The Best Parties Supplies </span>
          </div>
            @guest
                @if (Route::has('user.register'))
          <a href="/user/register" class="btn">Register Now!</a>
                @endif
                    @if (Route::has('user.login'))
            <a href="/user/login" class="btn">Have Account, Log in!</a>
                    @endif
            @endguest

        </div>
      </div>

    </div>
  </div>
  <div class="shuffle-group">
    <div class="container">
      <div class="row">
        <div class="grid_8">
           <div data-si-mousemove-trigger="100" class="shuffle-me">
            <a href="/all/products" class="info"><div class="shuffle_title">Order Parties Supplies<span>More</span></div></a>
            <div class="images">
              <img src="images/page1_img4.jpg" alt="">
              <img src="images/shuffle_1.jpg" alt="">
              <img src="images/shuffle_2.jpg" alt="">
            </div></div>
        </div>
        <div class="grid_4">
           <div data-si-mousemove-trigger="100" class="shuffle-me shuff__1">
            <a href="/all/meals" class="info"><div class="shuffle_title">Order Meals For Your Party<span>More</span></div></a>
            <div class="images">
              <img src="images/family-dinner-recipes.jpg" alt="">
              <img src="images/killa_nacho_fries_56359_16x9.jpg" alt="">
              <img src="images/shuffle_4.jpg" alt="">
            </div></div>
             <div data-si-mousemove-trigger="100" class="shuffle-me shuff__1">
            <a href="/all/restaurants" class="info"><div class="shuffle_title">Reserve In Restaurant<span>More</span></div></a>
            <div class="images">
              <img src="images/page1_img6.jpg" alt="">
              <img src="images/shuffle_5.jpg" alt="">
              <img src="images/shuffle_6.jpg" alt="">
            </div></div>
        </div>
        <div class="grid_12">
          <h3>Welcome</h3>
          <img src="images/page1_img7.jpg" alt="" class="img_inner fleft">
          <div class="extra_wrapper">
            <p class="text1"> Welcome to the easiest way to manage your event </p>

        This website helps you to manage your party in the easiest way, by ordering parties supplies, meals and reserve in restaurants to get the place to have your party.<br>
              By using out website you are using the simplest way to have the perfect party, with the most delicious meals, amazing party supplies and the best restaurants to reserve in it.
          </div>
        </div>
      </div>
    </div>
  </div>

</section>

<!--==============================
              footer
=================================-->

<a href="#" id="toTop" class="fa fa-chevron-up"></a>
</div>
</body>

</html>

