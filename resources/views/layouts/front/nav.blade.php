<div class="page-wrapper">
    <header class="header">
        <div class="header-top">
            <div class="container">
                <!-- End .header-left -->

                <!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-top -->

        <div class="header-middle sticky-header">
            <div class="container">
                <div class="header-left">
                    <button class="mobile-menu-toggler">
                        <span class="sr-only">Toggle mobile menu</span>
                        <i class="icon-bars"></i>
                    </button>

                    <a href="{{url('/')}}" class="logo">
                        <img src="{{asset('front/assets/images/logo-techno.png')}}" alt="Molla Logo" width="105" height="25">
                    </a>

                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                           
                                <li class="megamenu-container active">
                                <a href="{{url('/')}}">Home</a>

                                <!-- End .megamenu -->
                            </li>
                            <li>
                                <li class="megamenu-container active">
                                    <a href="{{url('shop')}}">shop</a>
    
                                    <!-- End .megamenu -->
                                </li>

                                <div class="megamenu megamenu-md">
                                    <div class="row no-gutters">
                                        <div class="col-md-8">
                                            <div class="menu-col">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- End .menu-title -->
                                                        

                                                        
                                                    </div><!-- End .col-md-6 -->

                                                    <!-- End .col-md-6 -->
                                                </div><!-- End .row -->
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-8 -->

                                        <div class="col-md-4">
                                            <div class="banner banner-overlay">
                                                <a href="category.html" class="banner banner-menu">
                                                    <img src="{{asset('front/assets/images/menu/banner-1.jpg')}}" alt="Banner">

                                                    <div class="banner-content banner-content-top">
                                                        <div class="banner-title text-white">Last <br>Chance<br><span><strong>Sale</strong></span></div><!-- End .banner-title -->
                                                    </div><!-- End .banner-content -->
                                                </a>
                                            </div><!-- End .banner banner-overlay -->
                                        </div><!-- End .col-md-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-md -->
                            </li>
                            
                           
                            
                            
                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div><!-- End .header-left -->

                <div class="header-right">
                    <div class="header-search">
                        <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                        <form action="#" method="get">
                            <div class="header-search-wrapper">
                                <label for="q" class="sr-only">Search</label>
                                <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->

                   
                    
                    <div class="dropdown">
                        <button class="dropdown-toggle header-meta__btn no-border" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fal fa-user"></i> <!-- Replace with your logo or user icon -->
                            @guest
                            <i class="icon-user"></i>
                            @else
                                {{ Auth::user()->name }}
                            @endguest
                            <i class="fal fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu no-border" aria-labelledby="dropdownMenuButton">
                            @guest

                                <button class="dropdown-item" onclick="location.href='{{ url('login') }}'">
                                    <i class="fal fa-sign-in-alt"></i> Login
                                </button>
                            @else
                                <hr>
                                <button class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fal fa-sign-out-alt"></i> Logout
                                </button>
                                <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                    </div>
                    <div class="dropdown cart-dropdown">
                        <a href="{{ url('cart') }}" role="button">
                            <i class="icon-shopping-cart" style="font-size: 24px;"></i> <!-- Adjust the size as needed -->
                        </a>
                    </div>
                    <!-- End .cart-dropdown -->
                </div>
                <!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->
    </header>

    <style>
        .no-border {
            border: none !important;
            box-shadow: none !important;
        }
    
        .dropdown-toggle.header-meta__btn.no-border {
            background: transparent;
            padding: 0;
        }
    
        .dropdown-item {
            display: flex;
            align-items: center;
        }
    
        .dropdown-item i {
            margin-right: 10px;
        }
    </style>