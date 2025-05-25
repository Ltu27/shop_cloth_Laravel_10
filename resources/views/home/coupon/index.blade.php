@extends('master.main')
@section('title', 'Danh sách mã khuyến mãi')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/product.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/productSale.css') }}">
<style>
    .btn-copy {
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        padding: 2px 6px;
        margin-left: 8px;
        margin-bottom: 8px;
        cursor: pointer;
        font-size: 12px;
        border-radius: 4px;
    }
    
    .coupon-info {
        font-size: 1.5rem;
        margin-top: 12px;
    }
</style>
@endsection

@section('main')
<main>
    <div class="main">
        <div class="grid wide">
            <div class="main__taskbar">
                <div class="main__breadcrumb">
                    <div class="breadcrumb__item">
                        <a href="{{ route('home.index') }}" class="breadcrumb__link">Trang chủ</a>
                    </div>
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link">Danh sách mã khuyến mãi</a>
                    </div>
                </div>
                <div class="main__sort">
                    <h3 class="sort__title">Hiển thị kết quả theo</h3>
                    <select class="sort__select" name="sort" id="sort">
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
                        @forelse ($data as $coupon)
                            <div class="col l-2 m-4 s-6">
                                <div class="product">
                                    <div class="product__info">
                                        <h3 class="product__name">
                                            Mã: <span class="coupon-code">{{ $coupon['code'] }}</span>
                                        </h3>
                                        
                                        <div class="coupon-info">
                                            <p style="font-weight: bold, margin-botton: 8px">Áp dụng đơn từ: {{ number_format($coupon['min_order_amount']) }} đ</p>
                                            @if ($coupon['type'] == 'percentage')
                                                <p class="product__discount">Giảm: {{ number_format($coupon['value']) }}%</p>
                                            @elseif ($coupon['type'] == 'fixed')
                                                <p class="product__discount">Giảm: {{ number_format($coupon['value']) }} đ</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product__sale">
                                        <span class="product__sale-percent">{{ $coupon['usage_limit'] - $coupon['used'] }}</span>
                                        <span class="product__sale-text">Lượt</span>
                                    </div>
                                    <div class="product__info">
                                        <div class="product__name">HSD: {{ \Carbon\Carbon::parse($coupon['expires_at'])->format('d/m/Y') }}</div>
                                    </div>
                                    <button class="btn-copy" data-code="{{ $coupon['code'] }}">Copy mã</button>

                                </div>
                            </div>
                        @empty
                            <p class="text-center w-100">Không có mã khuyến mãi nào.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Nếu có phân trang --}}
                {{-- {!! $data->links('pagination::bootstrap-4') !!} --}}
            </div>
        </div>
    </div>
</main>
@endsection

@section('custom_js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-copy').forEach(function (button) {
            button.addEventListener('click', function () {
                const code = this.getAttribute('data-code');
                navigator.clipboard.writeText(code).then(() => {
                    alert('Đã sao chép mã: ' + code);
                }).catch(err => {
                    console.error('Không thể sao chép: ', err);
                });
            });
        });
    });
</script>
@endsection
