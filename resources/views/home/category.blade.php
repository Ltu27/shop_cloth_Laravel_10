@extends('master.main')
@section('title', $category->name)

@section('main')
<!-- main-area -->
<main>

    <div class="grid wide">
        <div class="main__taskbar">
            <div class="main__breadcrumb">
                <div class="breadcrumb__item">
                    <a href="{{ route('home.index') }}" class="breadcrumb__link">Trang chủ</a>
                </div>
                <div class="breadcrumb__item">
                    <a href="#" class="breadcrumb__link">Cửa hàng</a>
                </div>
                <div class="breadcrumb__item">
                    <a href="#" class="breadcrumb__link">{{ $category->name }}</a>
                </div>
            </div>
            <div class="main__sort">
                <h3 class="sort__title">Hiển thị kết quả theo</h3>
                <select class="sort__select" name="" id="">
                    <option value="1">Thứ tự mặc định</option>
                    <option value="2">Mức độ phổ biến</option>
                    <option value="3">Điểm đánh giá</option>
                    <option value="4">Mới cập nhật</option>
                    <option value="5">Giá : Cao đến thấp</option>
                    <option value="6">Giá Thấp đến cao</option>
                </select>
            </div>
        </div>
    
        <div class="productList">
            <div class="listProduct">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col l-2 m-4 s-6">
                            <div class="product">
                                <div class="product__avt" style="background-image: url({{ asset('storage/' . $product->image) }})">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name">{{ $product->name }}</h3>
                                    <div class="product__price">
                                        @if($product->price)
                                            <div class="price__old">{{ number_format($product->price) }} <span class="price__unit">đ</span></div>
                                        @endif
                                        <div class="price__new">{{ number_format($product->sale_price) }} <span class="price__unit">đ</span></div>
                                    </div>
                                </div>
    
                                @if($product->price && $product->price > $product->price)
                                    @php
                                        $percent = round(100 * ($product->price - $product->price) / $product->price);
                                    @endphp
                                    <div class="product__sale">
                                        <span class="product__sale-percent">{{ $percent }}%</span>
                                        <span class="product__sale-text">Giảm</span>
                                    </div>
                                @endif
    
                                <a href="{{ route('home.product.detail', $product->id) }}" class="viewDetail">Xem chi tiết</a>
                                <a href="#" class="addToCart">Thêm vào giỏ</a>
                            </div>
                        </div>
                    @endforeach
                </div>
    
                <div class="pagination-wrapper" style="margin-top: 20px; text-align: center;">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
    

</main>
<!-- main-area-end -->
@stop
