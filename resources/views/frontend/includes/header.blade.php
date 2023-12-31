<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="{{route('show-cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{count(ShoppingCart::all())}}</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="{{asset('/')}}frontend/img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="./index.html">Home</a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> billah9578@gmail.com</li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="https://www.facebook.com/MasumBillah9578.mb"><i class="fa fa-facebook"></i></a>
                            <a href="https://github.com/billah1"><i class="fa fa-github"></i></a>
                            <a href="https://www.linkedin.com/in/masum-billah-005383290/"><i class="fa fa-linkedin"></i></a>
                        </div>

                        @if(Session::get('customer_id'))
                            <div class="header__top__right__auth">
                                Hello {{Session::get('customer_name')}}
                            </div>
                            <div class="header__top__right__auth">

                                <a href="{{route('customer.dashboard')}}"><i class="fa fa-user"></i>Dashboard</a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="{{route('customer.logout')}}"><i class="fa fa-user"></i>Logout</a>
                            </div>
                        @else
                            <div class="header__top__right__auth">
                                <a href="{{route('customer.login')}}"><i class="fa fa-user"></i> Sign In</a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="{{route('customer.register')}}"><i class="fa fa-user"></i> Register</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href= "{{route('home')}}"><img src= "{{asset('/')}}frontend/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{route('home')}}">Home</a></li>
                        <li><a href="./shop-grid.html">Book</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{route('show-cart')}}"><i class="fa fa-heart"></i> <span>{{count(ShoppingCart::all())}}</span></a></li>
                        <li><a href="{{route('show-cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{count(ShoppingCart::all())}}</span></a></li>
                    </ul>
{{--                    <div class="header__cart__price">item: <span>$150.00</span></div>--}}
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
