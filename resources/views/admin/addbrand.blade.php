@extends('layout.adminmasterBage')

@section('content')

<div class="container py-4">

    <h2 class="page-title mb-4">
        <i class="fa-solid fa-tags me-2"></i>
        Add New Brand
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
                Brand Information
            </h4>
        </div>

        <div class="card-body">

            <form action="/addbrand" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Brand Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Enter brand name"
                            value="{{ old('name') }}">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Brand Logo
                        </label>

                        <div class="upload-box">

                            <input
                                type="file"
                                name="logo"
                                class="form-control">

                        </div>

                    </div>

                </div>

                <div class="text-end">

                    <button type="submit" class="btn btn-save">

                        <i class="fa-solid fa-floppy-disk me-2"></i>

                        Save Brand

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
