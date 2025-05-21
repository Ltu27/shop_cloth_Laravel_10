@extends('master.admin')
@section('title', 'Danh sách mã giảm giá')

@section('main')
    <form method="GET" action="" class="form-inline mb-3">
        <div class="col">
            <div class="mb-3">
                <label for="" class="form-inline">Tìm kiếm mã</label>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="Nhập mã giảm giá"
                />
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                <a href="{{ route('coupon.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Thêm mới</a>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered" id="coupon-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Loại</th>
                    <th>Giá trị</th>
                    <th>Đơn tối thiểu</th>
                    <th>Lượt dùng</th>
                    <th>Đã dùng</th>
                    <th>Hết hạn</th>
                    <th>Hành động</th>
                </tr>
            </thead>
        </table>
    </div>
@stop

@section('js')
<script>
    $(function () {
        $('#coupon-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('coupon.getListCoupon') }}',
                dataSrc: 'data'
            },
            columns: [
                { data: 'id', name: 'id', orderable: false, searchable: false },
                { data: 'code', name: 'code' },
                { data: 'type', name: 'type' },
                { data: 'value', name: 'value' },
                { data: 'min_order_amount', name: 'min_order_amount' },
                { data: 'usage_limit', name: 'usage_limit' },
                { data: 'used', name: 'used' },
                { data: 'expires_at', name: 'expires_at' },
                {
                    data: 'id',
                    name: 'action',
                    orderable: false,
                    className: 'text-center',
                    render: function (data) {
                        let editUrl = '{{ route("coupon.edit", ":id") }}'.replace(':id', data);
                        let deleteUrl = '{{ route("coupon.destroy", ":id") }}'.replace(':id', data);
                        return `
                            <a href="${editUrl}" class="btn btn-primary btn-sm m-1"><i class="fa fa-edit"></i></a>
                            <form action="${deleteUrl}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm m-1">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        `;
                    }
                },
            ],
            order: [[1, 'desc']]
        });
    });
</script>
@endsection
