<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cart()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('accounts.cart', compact(['carts']));
    }

    public function addToCart(Request $request)
    {
        $cart = new Cart();
        $cart->product_id = $request->id;
        $cart->quantity = $request->quantity;
        $cart->size_id = $request->size;
        $cart->color_id = $request->color;
        $cart->user_id = auth()->user()->id;
        $cart->save();
        return redirect(route('cart'));
    }

    public function cartdetails()
    {
        $carts = Cart::all();
        return view('admin.cartdetails', compact(['carts']));
    }
    public function cartUpdate(Request $request,$id)
    {
        $carts = Cart::find($id);
        $carts->quantity=$request->quantity;
        $carts->save();
        return redirect()->back();
    }
    public function cartRemove($id)
    {
      $cart=Cart::find($id);
      $cart->delete();
      return redirect()->back();
    }
}
