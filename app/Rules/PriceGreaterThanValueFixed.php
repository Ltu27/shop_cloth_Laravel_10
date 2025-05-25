<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PriceGreaterThanValueFixed implements Rule
{
    protected $coupon;

    public function __construct($coupon)
    {
        $this->coupon = $coupon;
    }

    public function passes($attribute, $value)
    {
        if ($this->coupon->type == 'fixed') {
            return $value > $this->coupon->value;
        } 
        return true; 
    }

    public function message()
    {
        return 'Giá sản phẩm phải lớn hơn giá trị giảm giá.';
    }
}

