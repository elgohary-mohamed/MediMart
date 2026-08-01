<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\wishlist;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class HomeController extends Controller
{





    public function index()
    {

        $sections = Section::with([
            'products' => function ($query) {
                $query->latest()->take(10);
            }
        ])->get();
        $wishlists = wishlist::with('product')->where('user_id', Auth::id())->pluck('product_id')->toArray();

        $categories = Category::latest()->paginate(4);


        return view('home', compact('sections', 'categories', 'wishlists'));
    }




    public function category()
    {
        $categories = Category::latest()->paginate(4);

        return response()->json([
            'name' => $categories->name,
            'image' => $categories->image,
        ]);
    }


}
