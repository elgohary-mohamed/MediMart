

@extends('layout.adminmasterBage')

@section('content')


<div class="container py-4">

    <h2 class="page-title mb-4">
        <i class="fa-solid fa-layer-group me-2"></i>
        Add New Category
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
                Category Information
            </h4>
        </div>

        <div class="card-body">

            <form action="/addcategory" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Category Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Enter category name"
                            value="{{ old('name') }}">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Category Image
                        </label>

                        <div class="upload-box">

                            <input
                                type="file"
                                name="image"
                                class="form-control">

                        </div>

                    </div>

                </div>

                <div class="text-end">

                    <button class="btn btn-save">

                        <i class="fa-solid fa-floppy-disk me-2"></i>

                        Save Category

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>



@endsection
