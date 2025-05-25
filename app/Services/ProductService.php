<?php

namespace App\Services;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    public function __construct(
        protected Product $product,
        protected Coupon $coupon
    )
    {
    }

    public function getByConditions(
        array $filters = [],
        array $has = [],
        array $sorts = [],
        array $search = [],
        string $freeSearch = '',
        array $range = [[], []],
        int $limit
    ): LengthAwarePaginator {
        $relation = [
        ];

        [$from, $to] = $range;
        return $this->product
            ->search(Product::SEARCH_FIELDS, $freeSearch)
            ->from($from, Product::FROM_FIELDS)
            ->to($to, Product::TO_FIELDS)
            ->hasBy($has, Product::HAS_FIELDS)
            ->sortBy($sorts, Product::SORT_FIELDS)
            ->findInSet($filters, Product::IN_SET_FIELDS)
            ->searchBy($search, Product::SEARCH_FIELDS)
            ->filterBy($filters, Product::FILTER_FIELDS)
            ->with($relation)
            ->paginate($limit);
    }

    public function getListCoupon()
    {
        return $this->coupon->orderBy('id', 'DESC')->get();
    }

}