<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class brandController extends Controller
{
      public function index()
    {




        return view('admin.addBrand');
    }
    public function store(Request $request)
    {
        $logopath = $request->file('logo')->store('Brand', 'public');
        $Brand = Brand::create([
            'name' => $request->name,
            'logo' => $logopath,

        ]);



       return redirect()->back()->with('success', 'Brand Added Successfully');

    }
}
