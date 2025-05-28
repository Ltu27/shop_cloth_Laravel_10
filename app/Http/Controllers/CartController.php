<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $cus_id = auth('cus')->id();
        $carts = Cart::with('prod')->where('customer_id', $cus_id)->get();
        return view('home.cart', compact('carts'));
    }

    public function add(Product $product, Request $req) {
        $quantity = $req->quantity ? floor($req->quantity) : 1;
        $cus_id = auth('cus')->id();
        $cartExist = Cart::where([
            'customer_id' => $cus_id, 
            'product_id' => $product->id
        ])->first();

        if ($cartExist) {
            Cart::where([
                'customer_id' => $cus_id,
                'product_id' => $product->id
            ])->increment('quantity', $quantity);
            return redirect()->route('cart.index')->with('ok', __('common.cart.update_quantity_product'));
        } else {
            $data = [
                'customer_id' => auth('cus')->id(),
                'product_id' => $product->id,
                'price' =>$product->sale_price ? $product->sale_price : $product->price,
                'quantity' => $quantity
            ];
    
            if (Cart::create($data)) {
                return redirect()->route('cart.index')->with('ok', __('common.cart.add_product'));
            }
        }
        return redirect()->back()->with('no', __('common.error'));
    }

    public function update(Product $product, Request $req) {
        $quantity = $req->quantity ? floor($req->quantity) : 1;
        $cus_id = auth('cus')->id();
        $cartExist = Cart::where([
            'customer_id' => $cus_id, 
            'product_id' => $product->id
        ])->first();

        if ($cartExist) {
            Cart::where([
                'customer_id' => $cus_id,
                'product_id' => $product->id
            ])->update([
                'quantity' => $quantity
            ]);
            return redirect()->route('cart.index')->with('ok', __('common.cart.update_quantity_product'));
        } 
        return redirect()->back()->with('no', __('common.error'));
    }

    public function delete($product_id) {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product_id
        ])->delete();
        return redirect()->back()->with('ok', __('common.cart.delete_product'));
    }

    public function clear() {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id
        ])->delete();
        return redirect()->back()->with('ok', __('common.cart.delete_all_product'));
    }

    public function remove(Cart $cart) {
        $cus_id = auth('cus')->id();
        if ($cart->customer_id != $cus_id) {
            return redirect()->back()->with('no', 'Không có quyền xóa sản phẩm này');
        }
    
        $cart->delete();
        return redirect()->back()->with('ok', __('common.cart.delete_product'));
    }

    public function updateAll(Request $request) {
        $cus_id = auth('cus')->id();
        foreach ($request->quantity as $cart_id => $qty) {
            $cart = Cart::where('id', $cart_id)->where('customer_id', $cus_id)->first();
            if ($cart && $qty > 0) {
                $cart->quantity = floor($qty);
                $cart->save();
            }
        }
        return redirect()->route('cart.index')->with('ok', __('common.cart.update_all'));
    }
    
}
