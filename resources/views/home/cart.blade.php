@extends('master.main')
@section('title', 'Giỏ hàng')

@section('custom_css')
<link rel="stylesheet" href="{{ asset('assets/owlCarousel/assets/owl.theme.default.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/cart.css')}}">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">


@section('main')
<!-- main-area -->
<main>
    <div class="main">
        <div class="grid wide">
            <h3 class="main__notify">
                <div class="main__notify-icon">
                    <i class="fas fa-check"></i>
                    <!-- <i class="fas fa-times"></i> -->
                </div>
                <div class="main__notify-text">Giỏ hàng đã được cập nhật.</div>
            </h3>
            <div class="row">
                <div class="col l-8 m-12 s-12">
                    <div class="main__cart">
                        <div class="row title">
                            <div class="col l-1 m-1 s-0">Chọn</div>
                            <div class="col l-4 m-4 s-8">Sản phẩm</div>
                            <div class="col l-2 m-2 s-0">Giá</div>
                            <div class="col l-2 m-2 s-0">Số lượng</div>
                            <div class="col l-2 m-2 s-4">Tổng</div>
                            <div class="col l-1 m-1 s-0">Xóa</div>
                        </div>
            
                        @php $total = 0; @endphp
            
                        @foreach ($carts as $cart)
                            @php
                                $itemTotal = $cart->price * $cart->quantity;
                                $total += $itemTotal;
                            @endphp
            
                            <div class="row item">
                                <div class="col l-1 m-1 s-0">
                                    <input type="checkbox" name="cart_ids[]" value="{{ $cart->id }}">
                                </div>
                                <div class="col l-4 m-4 s-8">
                                    <div class="main__cart-product">
                                        <img src="{{ asset('uploads/product/' . ($cart->prod->image ?? 'product1.jpg')) }}" alt="">
                                        <div class="name">{{ $cart->prod->name }}</div>
                                    </div>
                                </div>
                                <div class="col l-2 m-2 s-0">
                                    <div class="main__cart-price">{{ number_format($cart->price, 0, ',', '.') }} đ</div>
                                </div>
                                <div class="col l-2 m-2 s-0">
                                    <div class="buttons_added">
                                        <input class="minus is-form" type="button" value="-" onclick="minusProduct(this)">
                                        <input aria-label="quantity" class="input-qty" type="number" name="quantity[{{ $cart->id }}]" value="{{ $cart->quantity }}" min="1">
                                        <input class="plus is-form" type="button" value="+" onclick="plusProduct(this)">
                                    </div>
                                </div>
                                <div class="col l-2 m-2 s-4">
                                    <div class="main__cart-price">{{ number_format($itemTotal, 0, ',', '.') }} đ</div>
                                </div>
                                <div class="col l-1 m-1 s-0">
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="main__cart-icon" style="border: none; background: transparent;">
                                            <i class="far fa-times-circle"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
            
                        <div class="btn btn--default">Cập nhật giỏ hàng</div>
                    </div>
                </div>
            
                <div class="col l-4 m-12 s-12">
                    <div class="main__pay">
                        <div class="main__pay-title">Tổng số lượng</div>
                        <div class="pay-info">
                            <div class="main__pay-text">Tổng phụ</div>
                            <div class="main__pay-price">{{ number_format($total, 0, ',', '.') }} ₫</div>
                        </div>
                        <div class="pay-info">
                            <div class="main__pay-text">Giao hàng</div>
                            <div class="main__pay-text">Giao hàng miễn phí</div>
                        </div>
                        <div class="pay-info">
                            <div class="main__pay-text">Tổng thành tiền</div>
                            <div class="main__pay-price">{{ number_format($total, 0, ',', '.') }} ₫</div>
                        </div>
                        <div class="btn btn--default orange">Tiến hành thanh toán</div>
            
                        <div class="main__pay-title">Phiếu ưu đãi</div>
                        <input type="text" class="form-control" name="coupon">
                        <div class="btn btn--default">Áp dụng</div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</main>
<!-- main-area-end -->
@stop()

@section('custom_js')
@stop()