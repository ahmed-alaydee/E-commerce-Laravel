<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class Shopcontroller extends Controller
{
    public function index(Request $request)
    {
        $page= $request->query("page");
        $size = $request->query("size");

        if(!$page)
        $page=1;

        if(!$size)
        $size=12;

        // $order = $request->query("order");
        // if(!$order)
        // $order='1';

        // $o_colmun = "";


        $products = Product::orderBy('created_at', 'DESC')->paginate($size);
        // dd($products); //
        // dd($products->items());
        // dd($products->items()[0]); // هيطبع أول منتج بالتفاصيل
        return view('shop',['products' =>$products, 'page' => $page, 'size' => $size]);
    }






    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            // لو المنتج مش موجود، يمكن عمل إعادة توجيه أو عرض رسالة خطأ
            return redirect()->route('shop.index')->with('error', 'Product not found');
        }

        $rproducts = Product::where('slug', '!=', $slug)->inRandomOrder()->take(8)->get();

        return view('details', ['product' => $product, 'rproducts' => $rproducts]);
    }



    public function getCartandWishlistCount(){
        $cartCount = Cart::instance('cart')->content()->count();
        $wishlistCount = Cart::instance('wishlist')->content()->count();
        return response()->json(['status'=>200,'cartCount' => $cartCount, 'wishlistCount' => $wishlistCount]);
    }
}
