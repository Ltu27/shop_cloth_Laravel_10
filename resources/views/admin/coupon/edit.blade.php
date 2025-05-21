@extends('master.admin')
@section('title', 'Chỉnh sửa mã giảm giá')

@section('main')
<div class="row">
    <form action="{{ route('coupon.update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-9">
            <div class="form-group">
                <label for="">Mã coupon</label>
                <input type="text" name="code" value="{{ old('code', $coupon->code) }}" class="form-control" placeholder="Nhập mã coupon (ví dụ: GIAM10)">
                @error('code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Loại giảm giá</label>
                <select name="type" class="form-control">
                    <option value="fixed" {{ old('type', $coupon->type) == 'fixed' ? 'selected' : '' }}>Giảm giá cố định (VNĐ)</option>
                    <option value="percentage" {{ old('type', $coupon->type) == 'percentage' ? 'selected' : '' }}>Giảm theo phần trăm (%)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Giá trị giảm</label>
                <input type="number" step="0.01" name="value" value="{{ old('value', $coupon->value) }}" class="form-control" placeholder="Nhập giá trị giảm">
                @error('value')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Giá trị đơn hàng tối thiểu</label>
                <input type="number" step="0.01" name="min_order_amount" value="{{ old('min_order_amount', $coupon->min_order_amount) }}" class="form-control" placeholder="Không bắt buộc">
                @error('min_order_amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Số lần sử dụng tối đa</label>
                <input type="number" name="usage_limit" value="{{ old('usage_limit', $coupon->usage_limit) }}" class="form-control" placeholder="Không bắt buộc">
                @error('usage_limit')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Ngày hết hạn</label>
                <input type="date" name="expires_at" value="{{ old('expires_at', $coupon->expires_at) }}" class="form-control">
                @error('expires_at')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            {{-- Nếu có trường trạng thái --}}
            {{-- <div class="form-group">
                <label for="">Trạng thái</label>
                <div class="radio">
                    <label><input type="radio" name="status" value="1" {{ old('status', $coupon->status) == 1 ? 'checked' : '' }}> Hoạt động</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="status" value="0" {{ old('status', $coupon->status) == 0 ? 'checked' : '' }}> Tắt</label>
                </div>
            </div> --}}

            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Cập nhật</button>
        </div>
    </form>
</div>
@stop
