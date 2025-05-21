<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coupon\CreateCouponRequest;
use App\Http\Requests\Coupon\UpdateCouponRequest;
use App\Http\Resources\Coupon\ListCouponResoure;
use App\Models\Coupon;
use App\Services\CouponService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct(
        protected CouponService $service,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->query('filters', []);
        $has = $request->query('has', []);
        $search = $request->query('search', []);
        $sorts = $request->query('sorts', []);
        $from = $request->query('from', []);
        $to = $request->query('to', []);
        $limit = $request->query('limit', static::LIMIT);
        $freeSearch = $request->query('q', '');
        $data = $this->service->getByConditions($filters, $has, $sorts, $search, $freeSearch, [$from, $to], $limit);
        
        $data = ListCouponResoure::collection($data->items());

        return view('admin.coupon.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCouponRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('coupon.index')->with('ok', 'Thêm mã giảm giá thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        $coupon->expires_at = $coupon->expires_at ? \Carbon\Carbon::parse($coupon->expires_at)->format('Y-m-d') : '';
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $this->service->update($coupon, $request->validated());
        return redirect()->route('coupon.index')->with('ok', 'Cập nhật mã giảm giá thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupon.index')->with('ok', 'Xóa mã giảm giá thành công');
    }

    public function getListCoupon(Request $request): JsonResponse
    {
        $filters = $request->query('filters', []);
        $has = $request->query('has', []);
        $search = $request->query('search', []);
        $sorts = $request->query('sorts', []);
        $from = $request->query('from', []);
        $to = $request->query('to', []);
        $limit = $request->query('limit', 12);
        $freeSearch = $request->query('q', '');
        $data = $this->service->getByConditions($filters, $has, $sorts, $search, $freeSearch, [$from, $to], $limit);
        return $this->success(
            ListCouponResoure::collection($data->items()),
            [
                'page' => $data->currentPage(),
                'total' => $data->total(),
                'limit' => $data->perPage(),
            ]
        );
    }

}
