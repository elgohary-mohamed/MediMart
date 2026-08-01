<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\product_images;
use App\Models\Section;
use App\Models\wishlist;
use App\Models\sub_category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $search = product::with(['brand', 'section', 'subCategory.category', 'images'])->where('name', 'LIKE', '%' . $request->search . '%')->get();

        return response()->json($search);

    }

    public function quick_show($id)
    {
        $product = product::with(['brand', 'section', 'subCategory.category', 'images'])->where('id', $id)->firstOrFail();

        $categories = Category::get();
        return response()->json([
            'name' => $product->name,
            'brand' => $product->brand->name,
            'category' => $product->subCategory->category->name,
            'price' => $product->price,
            'description' => $product->description,
            'image' => $product->image,
            'images' => $product->images,
        ]);
    }
    // show spacifc product
    public function show($slug)
    {
        $product = product::with(['brand', 'section', 'subCategory.category', 'images'])->where('slug', $slug)->firstOrFail();

        $categories = Category::get();
        return view('showproduct', compact('product', 'categories'));
    }

    // show product bage
    public function show_product()
    {
        $products = Product::latest()->paginate(20);
        $categories = Category::get();
        $wishlists = wishlist::with('product')->where('user_id', Auth::id())->pluck('product_id')->toArray();

        return view('product', compact('products', 'categories', 'wishlists'));

    }


    public function index()
    {
        $product = Product::get();
        $sub_categorys = sub_category::get();
        $brands = Brand::get();
        $sections = Section::get();
        return view('admin.addproduct', compact('sub_categorys', 'sections', 'brands', 'product'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'section_id' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $imagePath = $request->file('image')->store('products', 'public');
        $product = Product::create([

            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'image' => $imagePath,
            'sub_category_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'section_id' => $request->section_id,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {

                $path = $img->store('products', 'public');

                product_images::create([
                    'product_id' => $product->id,
                    'image' => $path,
                ]);

            }

            return redirect('/addproduct')->with('success', 'Product Added Successfully');
        }




    }
}
