<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public const SEARCH_FIELDS = [];
    public const FROM_FIELDS = [];
    public const TO_FIELDS = [];
    public const HAS_FIELDS = [];
    public const SORT_FIELDS = [];
    public const IN_SET_FIELDS = [];
    public const FILTER_FIELDS = [];

    protected $fillable = ['code', 'type', 'value', 'min_order_amount', 'usage_limit', 'used', 'expires_at'];

    public function isValid($orderTotal)
    {
        if ($this->expires_at && now()->gt($this->expires_at)) {
            return false;
        }

        if ($this->usage_limit && $this->used >= $this->usage_limit) {
            return false;
        }

        if ($this->min_order_amount && $orderTotal < $this->min_order_amount) {
            return false;
        }

        return true;
    }

    public function calculateDiscount($orderTotal)
    {
        if ($this->type === 'percentage') {
            return ($this->value / 100) * $orderTotal;
        }

        return min($this->value, $orderTotal);
    }
}

