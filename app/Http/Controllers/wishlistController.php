<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\wishlist;
use App\Models\Category;
use App\Models\Brand;

use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\product_images;
use App\Models\Section;
use App\Models\sub_category;
use Illuminate\Http\Request;

class wishlistController extends Controller
{
    public function index()
    {


        $wishlists = wishlist::with('product')->where('user_id', Auth::id())->get();

        $categories = Category::all();
        $product = Product::get();
        $sub_categorys = sub_category::get();
        $brands = Brand::get();
        $sections = Section::get();

        return view('wishlist', compact('wishlists', 'categories','product','sections','sub_categorys','brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $wishlist = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($wishlist) {

            $wishlist->delete();

            return response()->json([
                'status' => 'removed'
            ]);
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id
        ]);

        return response()->json([
            'status' => 'added'
        ]);
    }
}
