<?php
    
if (!function_exists('caculatePriceOfProduct')) {
    function caculatePriceOfProduct($price, $couponValue, $couponType)
    {
        if ($couponType == 'percentage') {
            $price = $price - ($price * $couponValue / 100);
        } else {
            $price = $price - $couponValue;
        }
        return $price;
    }
}
