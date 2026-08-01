<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function offer(){
        $offers = Product::whereNotNull('discount')->whereNot('discount',0)->latest()->paginate(10);
        $categories = Category::get();
         return view('offer', compact('offers','categories'));

    }
}
