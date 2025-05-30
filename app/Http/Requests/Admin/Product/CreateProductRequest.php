<?php

namespace App\Http\Requests\Admin\Product;

use App\Models\Coupon;
use App\Rules\PriceGreaterThanValueFixed;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $coupon = null;

        if ($this->filled('coupon_id')) {
            $coupon = Coupon::find($this->coupon_id);
        }
    
        return [
            'name' => 'required|max:150|unique:products',
            'description' => 'required',
            'price' => [
                'required',
                'numeric',
                new PriceGreaterThanValueFixed($coupon),
            ],
            'img' => 'required|file|mimes:jpg,jpeg,png,webp',
            'category_id' => 'required|exists:categories,id',
            'coupon_id' => 'nullable|exists:coupons,id',
        ];
    }
}
