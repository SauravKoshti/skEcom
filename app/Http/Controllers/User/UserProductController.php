<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{
    //
    public function index($id)
    {

        $productData = Product::findOrFail($id);
        // dd($productData);
        return view('user.product-detail', compact('productData'));
    }


    public function showCartTable()
    {
        // dd(session());
        $cartDatas = Cart::all();
        // dd($cartDatas);
        return view('user.cart',compact('cartDatas'));
    }

    public function removeCartItem(Request $request)
    {
        // dd($request);
        if ($request->id) {

            $cart = session()->get('cart');
            dd($request->id, $cart);
            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
            return redirect()->back();
        }
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back();
    }

    public function showProducts()
    {
        dd(session());
        $products = Product::all();
        // return view('user.cart', compact('products'));
    }
    public function addToCart(Request $request)
    {
        if ($request->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->productId;
            $cart->save();
            return redirect('/cart');
        } else {
            return redirect('/login');
        }
        // $product = Product::findOrFail($id);
        // $cart = session()->get('cart', []);
        // if(isset($cart[$id])) {
        //     $cart[$id]['quantity']++;
        // }  else {
        //     $cart[$id] = [
        //         "name" => $product->name,
        //         "image" => $product->images,
        //         "price" => $product->price,
        //         "quantity" => 1
        //     ];
        // }
        // session()->put('cart', $cart);
        // dd($cart,session());
        //       return redirect()->back()->with('success', 'Product add to cart successfully!');
    }
}
