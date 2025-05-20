<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService,
    )
    {
        
    }

    public function index() {

        // $topBanner = Banner::getBanner()->first();
        // $galleries = Banner::getBanner('gallery')->get();
        $authUser = Auth::guard('cus')->user();
        $new_products = Product::orderBy('created_at', 'DESC')->limit(2)->get();
        $sale_products = Product::orderBy('created_at', 'DESC')->where('sale_price', '>', 0)->limit(3)->get();
        $feature_products = Product::inRandomOrder()->limit(4)->get();
        $categories = $this->categoryService->getAll();
        return view('home.index', compact(
            'categories', 
            // 'topBanner', 
            // 'galleries', 
            'new_products', 
            'sale_products',
            'feature_products',
            'authUser'
        ));
    }
    
    public function about() {
        return view('home.about');
    }

    public function category(Category $category) {
        $category->load('products');
        $products = $category->products()->orderBy('id', 'DESC')->paginate(4);
        return view('home.category', compact('category', 'products'));
    }

    public function getListProduct() {
        // $products = Product::orderBy('created_at', 'DESC')->paginate(16);
        // return view('home.product.list-product', compact('products'));
        return view('home.product.list-product');
    }

    public function product(Product $product) {
        $product->load(['cat', 'images']);
        return view('home.product.product', compact('product'));
    }

    public function contact() {
        return view('home.contact');
    }

    public function favorite($product_id) {
        $data = [
            'product_id' => $product_id,
            'customer_id' => auth('cus')->id()
        ];

        $favorited = Favorite::where(['product_id' => $product_id, 'customer_id' => auth('cus')->id()])->first();

        if($favorited) {
            $favorited->delete();
            return redirect()->back()->with('ok', 'Bạn đã bỏ yêu thích sản phẩm');
        } else {
            Favorite::create($data);
            return redirect()->back()->with('ok', 'Bạn đã yêu thích sản phẩm');
        }
    }

    public function searchProduct(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%'.$request['searchProduct'].'%')->get();
        if(count($products) > 0) {
            return view('home.product.search-product', [
                'products' => $products
                ]);
        } else {
            return view('trangchu', [
                'products' => DB::table('sanpham')->paginate(16)
            ]);
        }
    }
}
