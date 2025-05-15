@extends('master.main')
{{-- @section('title', $product->name) --}}

@section('main')
<!-- main-area -->
<main>

    <div class="grid wide">
        <div class="productInfo">
            <div class="row">
                <div class="col l-5 m-12 s-12">
                    {{-- Carousel ảnh chính --}}
                    <div class="owl-carousel owl-theme" id="sync1">
                        @foreach ($product->images as $image)
                            <a href="#" class="product">
                                <div class="product__avt" style="background-image: url('{{ asset('storage/' . $image->url) }}')">
                                </div>
                            </a>
                        @endforeach
                    </div>
                    {{-- Carousel ảnh thumbnail --}}
                    <div class="owl-carousel owl-theme" id="sync2">
                        @foreach ($product->images as $image)
                            <a href="#" class="product">
                                <div class="product__avt" style="background-image: url('{{ asset('storage/' . $image->url) }}')">
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
    
                <div class="col l-7 m-12 s-12 pl">
                    <div class="main__breadcrumb">
                        <div class="breadcrumb__item"><a href="/" class="breadcrumb__link">Trang chủ</a></div>
                        <div class="breadcrumb__item"><a href="#" class="breadcrumb__link">Cửa hàng</a></div>
                        <div class="breadcrumb__item"><a href="#" class="breadcrumb__link">{{ $product->brand->name ?? 'Không rõ hãng' }}</a></div>
                    </div>
    
                    <h3 class="productInfo__name">{{ $product->name }}</h3>
    
                    <div class="productInfo__price">
                        {{ number_format($product->price, 0, ',', '.') }} <span class="priceInfo__unit">đ</span>
                    </div>
    
                    <div class="productInfo__description">
                        {!! nl2br(e($product->description)) !!}
                    </div>
    
                    <div class="productInfo__addToCart">
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
                            <a href="#" class="productIndfo__category-link">{{ $product->category->name ?? 'Chưa phân loại' }}</a>
                        </p>
                        <p class="productIndfo__category-text">Hãng:
                            <a href="#" class="productIndfo__category-link">{{ $product->brand->name ?? 'Không rõ hãng' }}</a>
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
    

</main>
<!-- main-area-end -->
@stop()

@section('js')
<script>
    $('.thumb-image').click(function(e) {
        e.preventDefault();

        var _url = $(this).attr('src');

        $('#big-img').attr('src', _url)
    })
</script>
@stop()