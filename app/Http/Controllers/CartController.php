<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
      public function index(){
        $cartItems = Cart::instance('cart')->content();
        return view('cart', ['cartItems'=> $cartItems] );
    }

    // public function addToCart(Request $request)
    // {
    //   $product = Product::find($request->id);
    //   $price = $product->sale_price ? $product->sale_price : $product->ruglar_price;
    //   Cart::instance('cart')->add($product->id, $product->name, $request->quantity, $price)->associate('App\Models\Product');
    // return redirect()->back()->with("message", 'Success ! Item has been added successfully!');
 

    // }
  public function addToCart(Request $request)
  {
    $product = Product::find($request->id);

    if (!$product) {
      return redirect()->back()->with("error", "Product not found!");
    }

    $price = $product->sale_price ? $product->sale_price : $product->ruglar_price; 
    Cart::instance('cart')->add($product->id, $product->name, $request->quantity, $price)->associate('App\Models\Product');

    return redirect()->back()->with("message", 'Success! Item has been added successfully!');
  }


    public function updateCart(Request $request)
    {
    Cart::instance('cart')->update($request->rowId, $request->quantity);
    return redirect()->route('cart.index')->with("message", 'Success! Item has been updated successfully!');


    }

    public function removeItem(Request $request){
      $rewId = $request->rowId;
      Cart::instance('cart')->remove($rewId);
      return redirect()->route('cart.index')->with("message", 'Success! Item has been removed successfully!');


    }
    public function clearCart(){
      Cart::instance('cart')->destroy();
      return redirect()->route('cart.index')->with("message", 'Success! Cart has been cleared successfully!');

} 


}