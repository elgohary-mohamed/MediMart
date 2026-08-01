<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medimart Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

    <style>

        body{
            margin:0;
            background:#f5f7fb;
            font-family:'Segoe UI',sans-serif;
        }

        .wrapper{
            display:flex;
        }

        .sidebar{
            width:260px;
            min-height:100vh;
            background:#1f2937;
            color:white;
            position:fixed;
            left:0;
            top:0;
            padding:30px 20px;
        }

        .sidebar .logo{

            text-align:center;
            margin-bottom:40px;

        }

        .sidebar .logo h3{

            font-weight:bold;
            margin:0;

        }

        .sidebar a{

            display:block;
            text-decoration:none;
            color:#d1d5db;
            padding:14px 18px;
            margin-bottom:10px;
            border-radius:12px;
            transition:.3s;

        }

        .sidebar a:hover{

            background:#2563eb;
            color:white;

        }

        .sidebar a i{

            width:25px;

        }

        .content{

            margin-left:260px;
            width:100%;
            min-height:100vh;

        }

        .topbar{

            background:white;
            height:70px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 30px;
            box-shadow:0 2px 10px rgba(0,0,0,.08);

        }

        .topbar h4{

            margin:0;
            font-weight:700;

        }

        .topbar span{

            color:#6b7280;

        }

        .page{

            padding:35px;

        }

        .page-title{

            font-size:28px;
            font-weight:bold;
            color:#1f2937;

        }

        .product-card{

            border:none;
            border-radius:18px;
            box-shadow:0 10px 25px rgba(0,0,0,.08);

        }

        .product-card .card-header{

            background:#2563eb;
            color:white;
            font-size:18px;
            font-weight:bold;

        }

        .form-control,
        .form-select{

            border-radius:12px;
            min-height:48px;

        }

        textarea.form-control{

            min-height:130px;

        }

        .form-label{

            font-weight:600;

        }

        .upload-box{

            border:2px dashed #d1d5db;
            border-radius:12px;
            padding:20px;
            text-align:center;

        }

        .btn-save{

            background:#2563eb;
            color:white;
            border:none;
            border-radius:12px;
            padding:12px 35px;
            font-weight:bold;

        }

        .btn-save:hover{

            background:#1d4ed8;
            color:white;

        }

        .alert{

            border-radius:12px;

        }

    </style>

</head>

<body>

<div class="wrapper">

    <div class="sidebar">

        <div class="logo">

            <h3>
                🛍️ Medimart
            </h3>

            <small>Admin Panel</small>

        </div>

        <a href="/addproduct">
            <i class="fa-solid fa-box"></i>
            Products
        </a>

        <a href="/addcategory">
            <i class="fa-solid fa-layer-group"></i>
            Categories
        </a>

        <a href="/addsubcategory">
            <i class="fa-solid fa-sitemap"></i>
            Sub Categories
        </a>

        <a href="/addbrand">
            <i class="fa-solid fa-tags"></i>
            Brands
        </a>

        <a href="/addsection">
            <i class="fa-solid fa-folder"></i>
            Sections
        </a>

    </div>

    <div class="content">

        <div class="topbar">

            <h4>
                Dashboard
            </h4>

            <span>
                Welcome Admin 👋
            </span>

        </div>

        <div class="page">

            @yield('content')

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
