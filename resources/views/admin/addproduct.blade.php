
@extends('layout.adminmasterBage')

@section('content')
<div class="container py-4">

    <h2 class="page-title mb-4">
        <i class="fa-solid fa-box-open me-2"></i>
        Add New Product
    </h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Please fix the following errors.

            <ul class="mt-2 mb-0">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <div class="card product-card">

        <div class="card-header">
            <h4 class="mb-0">
                Product Information
            </h4>
        </div>

        <div class="card-body">

            <form action="/addproduct" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Product Name</label>
                        <input class="form-control" type="text" name="name" value="{{old('name')}}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Price</label>
                        <input class="form-control" type="number" name="price" value="{{old('price')}}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Discount</label>
                        <input class="form-control" type="number" name="discount" value="{{old('discount')}}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Stock</label>
                        <input class="form-control" type="number" name="stock" value="{{old('stock')}}">
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label">Description</label>

                        <textarea class="form-control" rows="5" name="description">{{old('description')}}</textarea>
                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label">Sub Category</label>

                        <select class="form-select" name="sub_category_id">

                            @foreach($sub_categorys as $sub_category)

                            <option
                            value="{{$sub_category->id}}"
                            {{old('sub_category_id')==$sub_category->id?'selected':''}}
                            >

                            {{$sub_category->name}}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label">Brand</label>

                        <select class="form-select" name="brand_id">

                            @foreach($brands as $brand)

                            <option
                            value="{{$brand->id}}"
                            {{old('brand_id')==$brand->id?'selected':''}}
                            >

                            {{$brand->name}}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label">Section</label>

                        <select class="form-select" name="section_id">

                            @foreach($sections as $section)

                            <option
                            value="{{$section->id}}"
                            {{old('section_id')==$section->id?'selected':''}}
                            >

                            {{$section->name}}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label">Main Image</label>

                        <div class="upload-box">

                            <input class="form-control" type="file" name="image">

                        </div>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label">Gallery Images</label>

                        <div class="upload-box">

                            <input class="form-control" type="file" name="images[]" multiple>

                        </div>

                    </div>

                </div>

                <div class="text-end">

                    <button class="btn btn-save">

                        <i class="fa-solid fa-plus me-2"></i>

                        Add Product

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
