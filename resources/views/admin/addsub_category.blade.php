@extends('layout.adminmasterBage')

@section('content')

<div class="container py-4">

    <h2 class="page-title mb-4">
        <i class="fa-solid fa-sitemap me-2"></i>
        Add New Sub Category
    </h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Please fix the following errors.

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <div class="card product-card">

        <div class="card-header">
            <h4 class="mb-0">
                Sub Category Information
            </h4>
        </div>

        <div class="card-body">

            <form action="/addsubcategory" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Sub Category Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Enter sub category name"
                            value="{{ old('name') }}">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Category
                        </label>

                        <select
                            name="category_id"
                            class="form-select">

                            <option value="">Select Category</option>

                            @foreach ($categorys as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="text-end">

                    <button type="submit" class="btn btn-save">

                        <i class="fa-solid fa-floppy-disk me-2"></i>

                        Save Sub Category

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
