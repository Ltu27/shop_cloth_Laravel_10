@extends('master.main')
@section('title', 'Trang chủ')

@section('custom_css')
<link href="{{ asset('assets/css/home.css')}}" rel="stylesheet" />


@section('main')
    
<!-- main-area -->
<main>

    <div class="main">
        <!-- Slider -->
        <div class="main__slice">
            <div class="slider">
                {{-- <div class="slide active" style="background-image:url(./assets/img/slider/banner-hue-2.jpeg)"> --}}
                <div class="slide active" style="background-image:url(./assets/img/slider/slide-4.jpg)">
                    {{-- <div class="container">
                        <div class="caption">
                            <h1>Giảm giá 30%</h1>
                            <p>Giảm giá cực sốc trong tháng 6!</p>
                            <a href="listProduct.html" class="btn btn--default">Xem ngay</a>

                        </div>
                    </div> --}}
                </div>
                <div class="slide active" style="background-image:url(./assets/img/slider/khuyen-mai-thefaceshop1170.jpg)">
                    {{-- <div class="container">
                        <div class="caption">
                            <h1>Giảm giá 30%</h1>
                            <p>Giảm giá cực sốc trong tháng 6!</p>
                            <a href="listProduct.html" class="btn btn--default">Xem ngay</a>

                        </div>
                    </div> --}}
                </div>
                <div class="slide active" style="background-image:url(./assets/img/slider/b21a8ca3-60c2-448d-af3d-4e02eee99ab9.webp)">
                    {{-- <div class="container">
                        <div class="caption">
                            <h1>Giảm giá 30%</h1>
                            <p>Giảm giá cực sốc trong tháng 6!</p>
                            <a href="listProduct.html" class="btn btn--default">Xem ngay</a>

                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- controls  -->
            <div class="controls">
                <div class="prev">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="next">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <!-- indicators -->
            <div class="indicator">
            </div>
        </div>
        <!--Product Category -->
        <div class="main__tabnine">
            <div class="grid wide">
                <!-- Tab items -->
                <div class="tabs">
                    {{-- <div class="tab-item active">
                        Bán Chạy
                    </div> --}}
                    <div class="tab-item active">
                        Giá tốt
                    </div>
                    <div class="tab-item">
                        Mới Nhập
                    </div>
                    <div class="line"></div>
                </div>
                <!-- Tab content -->
                <div class="tab-content">
                    {{-- <div class="tab-pane active">
                        <div class="row">
                            <div class="col l-2 m-4 s-6">
                                <div class="product">
                                    <div class="product__avt" style="background-image: url(./assets/img/product/product1.jpg);">
                                    </div>
                                    <div class="product__info">
                                        <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                        <div class="product__price">
                                            <div class="price__old">
                                                300.000 đ
                                            </div>
                                            <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                        </div>
                                        <div class="product__sale">
                                            <span class="product__sale-percent">24%%</span>
                                            <span class="product__sale-text">Giảm</span>
                                        </div>
                                    </div>
                                    <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                    <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="tab-pane active">
                        <div class="row" id="productList">
                            {{-- <div class="col l-2 m-4 s-6">
                                <div class="product">
                                    <div class="product__avt" style="background-image: url(./assets/img/product/product4.jpg);">
                                    </div>
                                    <div class="product__info">
                                        <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                        <div class="product__price">
                                            <div class="price__old">
                                                300.000 đ
                                            </div>
                                            <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                        </div>
                                        <div class="product__sale">
                                            <span class="product__sale-percent">24%%</span>
                                            <span class="product__sale-text">Giảm</span>
                                        </div>
                                    </div>
                                    <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                    <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="tab-pane">
                        <div class="row">
                            <div class="col l-2 m-4 s-6">
                                <div class="product">
                                    <div class="product__avt" style="background-image: url(./assets/img/product/product2.jpg);">
                                    </div>
                                    <div class="product__info">
                                        <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                        <div class="product__price">
                                            <div class="price__old">
                                                300.000 đ
                                            </div>
                                            <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                        </div>
                                        <div class="product__sale">
                                            <span class="product__sale-percent">24%%</span>
                                            <span class="product__sale-text">Giảm</span>
                                        </div>
                                    </div>
                                    <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                    <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- HightLight  -->
        <div class="main__frame">
            <div class="grid wide">
                <h3 class="category__title">Ngọc Ánh Cometics</h3>
                <h3 class="category__heading">SẢN PHẨM NỔI BẬT</h3>
                <div class="owl-carousel hight owl-theme">
                    <div class="product">
                        <div class="product__avt" style="background-image: url(./assets/img/product/product1.jpg);">
                        </div>
                        <div class="product__info">
                            <h3 class="product__name">Son môi cao cấp</h3>
                            <div class="product__price">
                                <div class="price__old">
                                    100.000 đ
                                </div>
                                <div class="price__new"> 70.000<span class="price__unit">đ</span></div>
                            </div>
                            <div class="product__sale">
                                <span class="product__sale-percent">23</span>
                                <span class="product__sale-text">Giảm</span>
                            </div>
                        </div>
                        <a href="product.html" class="viewDetail">Xem chi tiết</a>
                        <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sales Policy -->
        <div class="main__policy">
            <div class="row">
                <div class="col l-3 m-6">
                    <div class="policy bg-1">
                        <img src="./assets/img/policy/policy1.png" class="policy__img"></img>
                        <div class="policy__info">
                            <h3 class="policy__title">GIAO HÀNG MIỄN PHÍ</h3>
                            <p class="policy__description">Cho đơn hàng từ 300K</p>
                        </div>
                    </div>
                </div>
                <div class="col l-3 m-6">
                    <div class="policy bg-2">
                        <img src="./assets/img/policy/policy2.png" class="policy__img"></img>
                        <div class="policy__info">
                            <h3 class="policy__title">ĐỔI TRẢ HÀNG</h3>
                            <p class="policy__description">Trong 3 ngày đầu tiên</p>
                        </div>
                    </div>
                </div>
                <div class="col l-3 m-6">
                    <div class="policy bg-1">
                        <img src="./assets/img/policy/policy3.png" class="policy__img"></img>
                        <div class="policy__info">
                            <h3 class="policy__title">HÀNG CHÍNH HÃNG</h3>
                            <p class="policy__description">Cam kết chất lượng</p>
                        </div>
                    </div>
                </div>
                <div class="col l-3 m-6">
                    <div class="policy bg-2">
                        <img src="./assets/img/policy/policy4.png" class="policy__img"></img>
                        <div class="policy__info">
                            <h3 class="policy__title">TƯ VẤN 24/24</h3>
                            <p class="policy__description">Giải đáp mọi thắc mắc</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- News -->
        <div class="main__frame bg-3">
            <div class="grid wide">
                <h3 class="category__title">Ngọc Ánh Cometics</h3>
                <h3 class="category__heading">Tin Tức</h3>
                <div class="owl-carousel news owl-theme">
                    <a href="news.html" class="news">
                        <div class="news__img">
                            <img src="./assets/img/news/news1.jpg" alt="">
                        </div>
                        <div class="news__body">
                            <h3 class="news__body-title">Trang điểm đúng cách</h3>
                            <div class="new__body-date">13/6/2021</div>
                            <p class="news__description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. In sit molestiae aperiam modi cum deserunt, maxime blanditiis voluptate officiis accusantium minima pariatur harum tenetur quo iste iusto commodi. Modi, culpa?
                            </p>
                        </div>
                    </a>
                    <a href="news.html" class="news">
                        <div class="news__img">
                            <img src="./assets/img/news/news1.jpg" alt="">
                        </div>
                        <div class="news__body">
                            <h3 class="news__body-title">Trang điểm đúng cách</h3>
                            <div class="new__body-date">13/6/2021</div>
                            <p class="news__description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. In sit molestiae aperiam modi cum deserunt, maxime blanditiis voluptate officiis accusantium minima pariatur harum tenetur quo iste iusto commodi. Modi, culpa?
                            </p>
                        </div>
                    </a>
                    <a href="news.html" class="news">
                        <div class="news__img">
                            <img src="./assets/img/news/news1.jpg" alt="">
                        </div>
                        <div class="news__body">
                            <h3 class="news__body-title">Trang điểm đúng cách</h3>
                            <div class="new__body-date">13/6/2021</div>
                            <p class="news__description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. In sit molestiae aperiam modi cum deserunt, maxime blanditiis voluptate officiis accusantium minima pariatur harum tenetur quo iste iusto commodi. Modi, culpa?
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="main__bands">
            <div class="grid wide">
                <div class="owl-carousel bands">
                    <a href="listProduct.html" class="band__item" style="background-image: url(./assets/img/band/band1.png)"></a>
                    <a href="listProduct.html" class="band__item" style="background-image: url(./assets/img/band/band2.png)"></a>
                    <a href="listProduct.html" class="band__item" style="background-image: url(./assets/img/band/band3.png)"></a>
                    <a href="listProduct.html" class="band__item" style="background-image: url(./assets/img/band/band4.png)"></a>
                    <a href="listProduct.html" class="band__item" style="background-image: url(./assets/img/band/band5.png)"></a>
                    <a href="listProduct.html" class="band__item" style="background-image: url(./assets/img/band/band6.png)"></a>
                    <a href="listProduct.html" class="band__item" style="background-image: url(./assets/img/band/band7.png)"></a>
                </div>
            </div>
        </div>

    </div>

</main>
<!-- main-area-end -->

@section('custom_js')
<script src="{{ asset('assets/js/homeScript.js')}}"></script>

<script>
    const csrfToken = '{{ csrf_token() }}';
    
    $(document).ready(function () {
        var authCheck = '{{ Auth('cus')->check() ? 'true' : 'false' }}' === 'true';
        
        loadProductList();

        $(document).on('click', '.btn-add-to-cart', function (e) {
            e.preventDefault();
            const productId = $(this).data('id');

            $.ajax({
                url: `/cart/add/${productId}`,
                method: 'POST',
                data: {
                    quantity: 1,
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    alert('Đã thêm vào giỏ hàng!');
                },
                error: function (err) {
                    alert('Thêm vào giỏ hàng thất bại!');
                    console.error(err);
                }
            });
        });

        $(document).on('click', '.loginToAddCart', function (e) {
            e.preventDefault();
            alert('Vui lòng đăng nhập để thêm vào giỏ hàng!');
            window.location.href = '/account/login';
        });

        function loadProductList() {
            $.ajax({
                url: '/api/product', 
                method: 'GET',
                data: {
                    'filters[status]': 1,
                    'sorts[created_at]': 'desc',
                    'limit': 12
                },
                success: function (response) {
                    const productList = $('#productList');
                    productList.empty();

                    response.data.forEach(function (product) {
                        const priceOld = product.price ? formatCurrency(product.price) + ' đ' : '';
                        const priceNew = product.sale_price ? formatCurrency(product.sale_price) : '';
                        const percent = product.price && product.sale_price
                            ? Math.round((1 - product.sale_price / product.price) * 100)
                            : '';
                        const buttonHTML = authCheck
                            ? `<a href="#" class="addToCart btn-add-to-cart" data-id="${product.id}">Thêm vào giỏ</a>`
                            : `<a href="#" class="addToCart loginToAddCart" data-id="${product.id}">Thêm vào giỏ</a>`;

                        const productHTML = `
                            <div class="col l-2 m-4 s-6">
                                <div class="product">
                                    <div class="product__avt" style="background-image: url('uploads/product/${product.image || 'default.jpg'}');"></div>
                                    <div class="product__info">
                                        <h3 class="product__name">${product.name}</h3>
                                        <div class="product__price">
                                            <div class="price__old">${priceOld}</div>
                                            <div class="price__new">${priceNew} <span class="price__unit">đ</span></div>
                                        </div>
                                        ${percent ? `
                                        <div class="product__sale">
                                            <span class="product__sale-percent">${percent}%</span>
                                            <span class="product__sale-text">Giảm</span>
                                        </div>` : ''}
                                    </div>
                                    <a href="/product-detail/${product.id}" class="viewDetail">Xem chi tiết</a>
                                    ${buttonHTML}
                                </div>
                            </div>
                        `;

                        productList.append(productHTML);
                    });
                },
                error: function (xhr) {
                    console.error('Lỗi khi lấy sản phẩm:', xhr.responseText);
                }
            });
        }

        function formatCurrency(value) {
            return Number(value).toLocaleString('vi-VN');
        }
    });
</script>

@stop