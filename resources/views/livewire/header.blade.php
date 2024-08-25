<div>
    <header class="header ">

        <div class="sticky-wrapper">
            <!-- <div class="header-middle sticky-header"> -->
            <div id="header-middle" class="header-middle ">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.html" class="logo">
                            <img src="{{asset('ui/assets/images/logo.png')}}" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="{{ $activeRoute === 'home' ? 'active' : '' }} ">
                                    <a href="{{route('home')}}" class="px-4">Beranda</a>
                                </li>
                                <li class="{{ $activeRoute === 'product' ? 'active' : '' }} ">
                                    <a href="{{route('product')}}" class="px-4">Product</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        @guest
                        <div class="div pl-4">

                            <a href="/login"><span>Login / Register</span></a>
                        </div>
                        @endguest


                        <div class="dropdown cart-dropdown">
                            <a href="/cart" class="dropdown-toggle">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count" id="cart-coun">{{ $total_count }}</span>
                            </a>
                        </div><!-- End .cart-dropdown -->

                        @if (auth()->user())
                        <div class="dropdown compare-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-user"></i>
                                <p> {{auth()->user()?->name}}</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right p-3 m-0">
                                <div class="compare-product">
                                    <div class="product">
                                        <figure class="pr-3">
                                            <a href="#" class="product-image">
                                                <img src="{{auth()->user()->avatar_url}}" alt="" width="100px">
                                            </a>
                                        </figure>
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="#"> {{auth()->user()?->name}}</a>
                                            </h4>
                                            <h4 class="product-title">
                                                <a href="/my-account"><span>My Account</span></a>

                                            </h4>
                                            <h4 class="product-title">
                                                <a href="/my-order"><span>My Order</span></a>

                                            </h4>
                                        </div><!-- End .product-cart-details -->


                                    </div><!-- End .product -->
                                </div><!-- End .cart-product -->

                                <a href="/logout" class="btn btn-outline-primary-2 btn-block"><span>Logout</span></a>

                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->

                        @endif
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </div>
    </header><!-- End .header -->

    <div class="mobile-menu-overlay"></div>

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="{{ $activeRoute === 'home' ? 'active' : '' }} ">
                        <a href="{{route('home')}}" class="px-4">Beranda</a>
                    </li>
                    <li class="{{ $activeRoute === 'product' ? 'active' : '' }} ">
                        <a href="{{route('product')}}" class="px-4">Product</a>
                    </li>
                    <li class="{{ $activeRoute === 'my-account' ? 'active' : '' }} ">
                        <a href="{{route('my.account')}}" class="px-4">My Account</a>
                    </li>
                    <li class="{{ $activeRoute === 'my-order' ? 'active' : '' }} ">
                        <a href="{{route('my-order')}}" class="px-4">My Order</a>
                    </li>
                    <li>
                        <a href="/logout" class="px-4"><span>Logout</span></a>

                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

</div>