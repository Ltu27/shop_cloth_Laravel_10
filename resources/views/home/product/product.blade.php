@extends('master.main')
@section('title', $product->name)

@section('custom_css')
<link rel="stylesheet" href="{{ asset('assets/owlCarousel/assets/owl.theme.default.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/product.css')}}">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
<style>
    .variant-options {
        display: flex;
        gap: 8px;
        margin: 10px 0;
    }
    .variant-color {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        cursor: pointer;
        border: 2px solid #ccc;
        box-shadow: 0 0 2px rgba(0,0,0,0.3);
    }
    .variant-color.active {
        border: 2px solid #333;
    }
</style>
@endsection


@section('main')
<!-- main-area -->
<main>
@php
    $firstVariant = $product->variants->first();
@endphp

<div class="main">
    <div class="grid wide">
        <div class="productInfo">
            <div class="row">
                <div class="col l-5 m-12 s-12">
                    {{-- Carousel ảnh chính --}}
                    <div class="owl-carousel owl-theme" id="sync1">
                        {{-- @foreach ($product->images as $image) --}}
                        {{-- @dd(asset('uploads/product/' . $product->image)) --}}
                            <a href="#" class="product">
                                <div class="product__avt" style="background-image: url('{{ asset('uploads/product/' . $product->image) }}')">
                                </div>
                            </a>
                        {{-- @endforeach --}}
                    </div>
                    {{-- Carousel ảnh thumbnail --}}
                    <div class="owl-carousel owl-theme" id="sync2">
                        @foreach ($product->images as $image)
                            <a href="#" class="product">
                                <div class="product__avt" style="background-image: url('{{ asset('uploads/product/' . $image->image) }}')">
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
    
                <div class="col l-7 m-12 s-12 pl">
                    <div class="main__breadcrumb">
                        <div class="breadcrumb__item"><a href="/" class="breadcrumb__link">Trang chủ</a></div>
                        <div class="breadcrumb__item"><a href="#" class="breadcrumb__link">Cửa hàng</a></div>
                        <div class="breadcrumb__item"><a href="#" class="breadcrumb__link">The Face Shop</a></div>
                    </div>
    
                    <h3 class="productInfo__name">{{ $product->name }}</h3>
    
                    <div class="productInfo__price">
                        <span id="main-price">
                            {{ number_format($firstVariant ? $firstVariant->variant_price : (
                                $product->coupon ? 
                                    caculatePriceOfProduct($product->price, $product->coupon->value, $product->coupon->type)
                                    : $product->price
                            ), 0, ',', '.') }}
                        </span>
                        <span class="priceInfo__unit">đ</span>
                    </div>
                    
                    <p class="productIndfo__category-text">Số lượng trong kho: 
                        {{ $firstVariant ? $firstVariant->stock_quantity : $product->stock_quantity }}</p>
                    @if ($firstVariant)
                        <p class="productIndfo__category-text">Ngày sản xuất: {{ $firstVariant->production_date }}</p>
                        <p class="productIndfo__category-text">Hạn sử dụng: {{ $firstVariant->expiration_date }}</p>
                    @endif
                    
    
                    <div class="productInfo__description">
                        {!! nl2br(e($product->description)) !!}
                    </div>
    
                    <div class="productInfo__addToCart">
                        @if($product->variants->count())
                            <div class="productInfo__variants">
                                <label>Chọn màu:</label>
                                <div class="variant-options">
                                    @foreach($product->variants as $variant)
                                        <span class="variant-color" 
                                            data-price="{{ number_format($variant->variant_price, 0, ',', '.') }}"
                                            data-stock="{{ $variant->stock_quantity }}"
                                            data-production="{{ $variant->production_date }}"
                                            data-expiration="{{ $variant->expiration_date }}"
                                            style="background-color: {{ $variant->variant_color }};" 
                                            title="{{ $variant->variant_color }}">
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="buttons_added">
                            <input class="minus is-form" type="button" value="-" onclick="minusProduct()">
                            <input aria-label="quantity" class="input-qty" max="10" min="1" name="" type="number" value="1">
                            <input class="plus is-form" type="button" value="+" onclick="plusProduct()">
                        </div>
                        <div class="btn btn--default orange">Thêm vào giỏ</div>
                    </div>
    
                    <div class="productIndfo__policy">
                        {{-- Chính sách giữ nguyên như HTML mẫu --}}
                    </div>
    
                    <div class="productIndfo__category">
                        <p class="productIndfo__category-text">Danh mục:
                            <a href="#" class="productIndfo__category-link">{{ $product->cat->name ?? 'Chưa phân loại' }}</a>
                        </p>
                        <p class="productIndfo__category-text">Hãng:
                            <a href="#" class="productIndfo__category-link">The Face Shop</a>
                        </p>
                        <p class="productIndfo__category-text">Số lượng đã bán: {{ $product->sold_quantity }}</p>
                        <p class="productIndfo__category-text">Số lượng trong kho: {{ $product->stock_quantity }}</p>
                    </div>
                </div>
            </div>
        </div>
    
        {{-- Chi tiết sản phẩm --}}
        <div class="productDetail">
            <div class="main__tabnine">
                <div class="grid wide">
                    <div class="tabs">
                        <div class="tab-item active">Mô tả</div>
                        <div class="tab-item">Đánh giá</div>
                        <div class="line"></div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="productDes">
                                <div class="productDes__title">Mô tả chi tiết</div>
                                <p class="productDes__text">
                                    {!! nl2br(e($product->description)) !!}
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane">
                            {{-- Đánh giá sản phẩm, nếu có --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>
<!-- main-area-end -->
@stop()

@section('custom_js')
<script>
    $(document).ready(function() {
        var sync1 = $("#sync1 ");
        var sync2 = $("#sync2 ");
        var slidesPerPage = 4;
        var syncedSecondary = true;
        sync1.owlCarousel({
            items: 1,
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true
        })
        sync2
            .on('initialized.owl.carousel', function() {
                sync2.find(".owl-item ").eq(0).addClass("current ");
            })
            .owlCarousel({
                items: 4,
                dots: false,
                nav: false,
                margin: 30,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: 4,
                responsiveRefreshRate: 100
            }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);

            if (current < 0) {
                current = count;
            }
            if (current > count)  {
                current = 0;
            }

            //end block

            sync2
                .find(".owl-item ")
                .removeClass("current ")
                .eq(current)
                .addClass("current ");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }

        sync2.on("click ", ".owl-item ", function(e) {
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });
    });

    $('.owl-carousel.hight').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
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

    $('.variant-color').on('click', function () {
        $('.variant-color').removeClass('active');
        $(this).addClass('active');

        let price = $(this).data('price');
        let stock = $(this).data('stock');
        let production = $(this).data('production');
        let expiration = $(this).data('expiration');

        $('#main-price').text(price);
        $('#stock-quantity').text(stock);
        $('#production-date').text(production);
        $('#expiration-date').text(expiration);
    });
</script>
<script>
    function calcRate(r) {
        const f = ~~r, //Tương tự Math.floor(r)
            id = 'star' + f + (r % f ? 'half' : '')
        id && (document.getElementById(id).checked = !0)
    }
</script>
@stop()