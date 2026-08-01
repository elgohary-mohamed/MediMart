<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\sub_category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $categorys = Category::get();


        return view('admin.addcategory', compact('categorys'));
    }
    public function store(Request $request)
    {
        $imagepath = $request->file('image')->store('category', 'public');
        $category = Category::create([
            'name' => $request->name,
            'image' => $imagepath,

        ]);




        return redirect()->back()->with('success', 'Category Added Successfully');

    }






    public function index_subcategory()
    {

        $categorys = Category::get();


        return view('admin.addsub_category', compact('categorys'));
    }
    public function store_subcategory(Request $request)
    {
        $sub_Category = sub_Category::create([
            'name' => $request->name,
            'category_id' => $request->category_id


        ]);



        return redirect()->back()->with('success', 'sub_Category Added Successfully');

    }
}
