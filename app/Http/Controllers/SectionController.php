<?php

namespace App\Http\Controllers;
use App\Models\Section;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function index()
    {

        return view('admin.addsection');
    }


    public function store(Request $request)
    {

        $section = Section::create([
            'name' => $request->name,
            'slug' => str::slug($request->name),

        ]);



        return redirect()->back()->with('success', 'section Added Successfully');

    }
}
