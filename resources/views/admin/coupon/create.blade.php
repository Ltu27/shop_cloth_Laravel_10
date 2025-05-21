@extends('master.admin')
@section('title', 'Thêm mới mã giảm giá')

@section('main')
<div class="row">
    <form action="{{ route('coupon.store') }}" method="POST">
        @csrf
        <div class="col-md-9">
            <div class="form-group">
                <label for="">Mã coupon</label>
                <input type="text" name="code" value="{{ old('code') }}" class="form-control" placeholder="Nhập mã coupon (ví dụ: GIAM10)">
                @error('code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Loại giảm giá</label>
                <select name="type" class="form-control">
                    <option value="fixed">Giảm giá cố định (VNĐ)</option>
                    <option value="percentage">Giảm theo phần trăm (%)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Giá trị giảm</label>
                <input type="number" step="0.01" name="value" value="{{ old('value') }}" class="form-control" placeholder="Nhập giá trị giảm (VD: 10000 hoặc 10)">
                @error('value')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Giá trị đơn hàng tối thiểu</label>
                <input type="number" step="0.01" name="min_order_amount" value="{{ old('min_order_amount') }}" class="form-control" placeholder="Không bắt buộc">
                @error('min_order_amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Số lần sử dụng tối đa</label>
                <input type="number" name="usage_limit" value="{{ old('usage_limit') }}" class="form-control" placeholder="Không bắt buộc">
                @error('usage_limit')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Ngày hết hạn</label>
                <input type="date" name="expires_at" value="{{ old('expires_at') }}" class="form-control">
                @error('expires_at')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            {{-- <div class="form-group">
                <label for="">Trạng thái</label>
                <div class="radio">
                    <label><input type="radio" name="status" value="1" checked> Hoạt động</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="status" value="0"> Tắt</label>
                </div>
            </div> --}}

            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Lưu</button>
        </div>
    </form>
</div>
@stop
