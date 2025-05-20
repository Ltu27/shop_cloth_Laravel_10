<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <!-- Font roboto -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!-- Icon fontanwesome -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <!-- Reset css & grid sytem -->
        <link rel="stylesheet" href="{{ asset('assets/css/library.css')}}">
        <link href="{{ asset('assets/owlCarousel/assets/owl.carousel.min.css')}}" rel="stylesheet" />
        <!-- Layout -->
        <link rel="stylesheet" href="{{ asset('assets/css/common.css')}}">
        @yield('custom_css')

        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/productSale.css')}}"> --}}


        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Owl caroucel Js-->     
        <script src="{{ asset('assets/owlCarousel/owl.carousel.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    </head>

    <body>
        <div class="header scrolling" id="myHeader">
            <div class="grid wide">
                <div class="header__top">
                    <div class="navbar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <a href="{{ route('home.index') }}" class="header__logo">
                        <img src="{{ asset('assets/logo.png')}}" alt="">
                    </a>
                    <div class="header__search">
                        <div class="header__search-wrap">
                            <input type="text" class="header__search-input" placeholder="Tìm kiếm">
                            <a class="header__search-icon" href="#">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                    </div>
                    @if (isset($authUser))
                        <div class="header__account">
                            <a href="{{ route('account.logout') }}" class="header__account-login">Đăng Xuất</a>
                            <a href="{{ route('account.profile') }}" class="header__account-register">Xin chào {{ $authUser->name }}</a>
                        </div>
                        <!-- Cart -->
                        <div class="header__cart have" href="#">
                            <i class="fas fa-shopping-basket"></i>
                            <div class="header__cart-amount">
                                {{ count($carts)}}
                            </div>
                            <div class="header__cart-wrap">
                                <ul class="order__list">
                                    @foreach ($carts as $cart)
                                        <li class="item-order">
                                            <div class="order-wrap">
                                                <a href="{{ route('home.product.detail', $cart->prod->id) }}" class="order-img">
                                                    <img src="{{ asset('uploads/product/' . $cart->prod->image ?? 'product1.jpg') }}" alt="">
                                                </a>
                                                <div class="order-main">
                                                    <a href="{{ route('home.product.detail', $cart->prod->id) }}" class="order-main-name">{{ $cart->prod->name }}</a>
                                                    <div class="order-main-price">{{ $cart->quantity . ' * ' . $cart->price . 'đ'}}</div>
                                                </div>
                                                <a href="{{ route('home.product.detail', $cart->prod->id) }}" class="order-close"><i class="far fa-times-circle"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="total-money">Tổng cộng: {{ number_format($total, 0, ',', '.') }} đ</div>
                                <a href="{{ route('cart.index') }}" class="btn btn--default cart-btn">Xem giỏ hàng</a>
                                <a href="pay.html" class="btn btn--default cart-btn orange">Thanh toán</a>
                                <!-- norcart -->
                                <img class="header__cart-img-nocart" src="http://www.giaybinhduong.com/images/empty-cart.png" alt="">
                            </div>
                        </div>
                    @else
                        <div class="header__account">
                            <a href="{{ route('account.login')}}" class="header__account-login">Đăng Nhập</a>
                            <a href="{{ route('account.register')}}" class="header__account-register">Đăng Kí</a>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Menu -->
            <div class="header__nav">
                <ul class="header__nav-list">
                    <li class="header__nav-item nav__search">
                        <div class="nav__search-wrap">
                            <input class="nav__search-input" type="text" name="" id="" placeholder="Tìm sản phẩm...">
                        </div>
                        <div class="nav__search-btn">
                            <i class="fas fa-search"></i>
                        </div>
                    </li>
                    <li class="header__nav-item authen-form">
                        <a href="#" class="header__nav-link">Tài Khoản</a>
                        <ul class="sub-nav">
                            <li class="sub-nav__item">
                                <a href="#my-Login" class="sub-nav__link">Đăng Nhập</a>
                            </li>
                            <li class="sub-nav__item">
                                <a href="#my-Register" class="sub-nav__link">Đăng Kí</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header__nav-item index">
                        <a href="{{ route('home.index') }}" class="header__nav-link">Trang chủ</a>
                    </li>
                    {{-- <li class="header__nav-item">
                        <a href="#" class="header__nav-link">Giới Thiệu</a>
                    </li> --}}
                    <li class="header__nav-item">
                        <a href="#" class="header__nav-link">Sản Phẩm</a>
                        <div class="sub-nav-wrap grid wide">
                            @foreach ($categories as $category)
                                <ul class="sub-nav">
                                    <li class="sub-nav__item">
                                        <a href="{{ route('home.category', $category->id) }}" class="sub-nav__link heading">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                    @foreach ($category->products as $product)
                                        <li class="sub-nav__item">
                                            <a href="{{ route('home.product.detail', $product->id) }}" class="sub-nav__link">
                                                {{ $product->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>
                    </li>
                    <li class="header__nav-item">
                        <a href="news.html" class="header__nav-link">Tin Tức</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="contact.html" class="header__nav-link">Liên Hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="up-top" id="upTop" onclick="goToTop()">
            <i class="fas fa-chevron-up"></i>
        </div>

        @yield('main')
        
        <div class="footer">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-3 m-6 s-12">
                        <h3 class="footer__title">Menu</h3>
                        <ul class="footer__list">
                            @foreach ($categories as $category)
                                <li class="footer__item">
                                    <a href="{{ route('home.category', $category->id) }}" class="footer__link">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col l-3 m-6 s-12">
                        <h3 class="footer__title">Hỗ trợ khách hàng</h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <a href="#" class="footer__link">Hướng dẫn mua hàng</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Giải đáp thắc mắc</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Chính sách mua hàng</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Chính sách đổi trả</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col l-3 m-6 s-12">
                        <h3 class="footer__title">Liên hệ</h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <span class="footer__text">
                                        <i class="fas fa-map-marked-alt"></i> 319 C16 Lý Thường Kiệt, Phường 15, Quận 11, Tp.HCM
                                    </span>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">
                                    <i class="fas fa-phone"></i> 123 456 789
                                </a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">
                                    <i class="fas fa-envelope"></i> info@example.com
                                </a>
                            </li>
                            <li class="footer__item">
                                <div class="social-group">
                                    <a href="#" class="social-item"><i class="fab fa-facebook-f"></i>
                                        </a>
                                    <a href="#" class="social-item"><i class="fab fa-twitter"></i>
                                        </a>
                                    <a href="#" class="social-item"><i class="fab fa-pinterest-p"></i>
                                        </a>
                                    <a href="#" class="social-item"><i class="fab fa-invision"></i>
                                        </a>
                                    <a href="#" class="social-item"><i class="fab fa-youtube"></i>  
                                        </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col l-3 m-6 s-12">
                        <h3 class="footer__title">Đăng kí</h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <span class="footer__text">Đăng ký để nhận được được thông tin ưu đãi mới nhất từ chúng tôi.</span>
                            </li>
                            <li class="footer__item">
                                <div class="send-email">
                                    <input class="send-email__input" type="email" placeholder="Nhập Email...">
                                    <a href="#" class="send-email__link">
                                        <i class="fas fa-paper-plane"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <span class="footer__text"> &copy Bản quyền thuộc về <a class="footer__link" href="#"> vava</a></span>
            </div>
        </div>
        <script>
            $('.owl-carousel.hight').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
            $('.owl-carousel.news').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 2
                    }
                }
            })
            $('.owl-carousel.bands').owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 6
                    }
                }
            })
        </script>

        <!-- Script common -->
        <script src="{{ asset('assets/js/commonscript.js')}}"></script>

        @yield('custom_js')
    </body>

</html>