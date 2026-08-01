<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\wishlist;
use App\Models\Category;
use App\Models\Brand;

use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Section;
use App\Models\sub_category;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $product = Product::get();
        $sub_categorys = sub_category::get();
        $brands = Brand::get();
        $sections = Section::get();

        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();


            $total = 0;

        foreach ($carts as $cart) {

            $total += $cart->quantity * $cart->product->price;

        }
        return view('cart', compact('carts', 'total', 'categories', 'product', 'sections', 'sub_categorys', 'brands'));

    }
    public function store(Request $request)
    {




        $request->product_id;




        $cart = Cart::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();

        if ($cart) {

            $cart->quantity++;
            $cart->save();

        } else {

            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => 1,
            ]);



        }

        return response()->json([
            'status' => 'success',
            "alert" => 'add to cart'
        ]);


    }


    public function increase(Request $request)
    {
        $cart = Cart::find($request->cart_id);

        $cart->quantity++;
        $cart->save();

        $cartss = Cart::with('product')->where('user_id', Auth::id())->get();
        $total = 0;
        foreach ($cartss as $carts) {
            $total += $carts->quantity * $carts->product->price;
        }

        return response()->json([
            'quantity' => $cart->quantity,
            'subtotal' => $cart->quantity * $cart->product->price,
            'total' => $total,
        ]);



    }
    public function decrease(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        $cart->quantity--;
        $cart->save();
        $cartss = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();
        $total = 0;

        foreach ($cartss as $carts) {

            $total += $carts->quantity * $carts->product->price;

        }



        return response()->json([
            'quantity' => $cart->quantity,
            'subtotal' => $cart->quantity * $cart->product->price,
            'total' => $total,
        ]);
    }
}
