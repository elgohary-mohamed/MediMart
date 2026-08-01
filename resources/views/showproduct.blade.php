@extends('layout.MasterBage')

@section('breadcrumb')
    <span
        style="position: relative;left: 10rem;text-decoration: none;font-style: normal;font-family: sans-serif;font-size: 13px;line-height: 20px;letter-spacing: 0%;font-weight: 600;margin-top: 2.5px;">
        <img src="{{ asset('img/right-arrow.png') }}" alt="" style="width: 10px;height: 10px;">

        {{ $product->subCategory->category->name }}

        <img src="{{ asset('img/right-arrow.png') }}" alt="" style="width: 10px;height: 10px;">

        {{ $product->subCategory->name }}
        <img src="{{ asset('img/right-arrow.png') }}" alt="" style="width: 10px;height: 10px;">

        {{ $product->name }}
    </span>
@endsection

@section('content')
    <div class="product-details">

        <div class="left">
            <div class="div_leftimg">
                <img class="left_img" src="{{ asset('storage/' . $product->image) }}" width="400">

            </div>
            <div style="display: flex;display: flex;flex-wrap: nowrap;align-items: center;">

                <img class="img_next" src="{{ asset('img/54240.png') }}"
                    alt=""style="width: 30px;height: 30px;transform: scaleX(-1);">
                <img class="sub_img" src="{{ asset('storage/' . $product->image) }}">

                @foreach ($product->images as $image)
                    <img class="sub_img" src="{{ asset('storage/' . $image->image) }}">
                @endforeach
                <img class="img_previous" src="{{ asset('img/54240.png') }}"
                    alt=""style="width: 30px;height: 30px;">

            </div>
        </div>

        <div class="right">
            <div>
                <p
                    style="font-family: sans-serif;font-weight: 400;font-style: normal;font-size: 20px;line-height: 28px;letter-spacing: 0%;">
                    {{ $product->name }}</p>
            </div>


            <div style="display: grid;grid-template-rows: 1fr 1fr;grid-template-columns: 1fr 2fr;">



                <p class="right_parg">Return: <span class="right_span">in 30 days</span></p>
                <p class="right_parg">Availability:<span class="right_span">
                        @if ($product->stock > 1)
                            IN STOCK
                        @else
                            OUT OF STOCK
                        @endif
                    </span></p>
                <p class="right_parg">Brand: <span class="right_span">{{ $product->brand->name }}</span></p>
                <p class="right_parg">Category:<span class="right_span">{{ $product->subCategory->category->name }}</span>
                </p>
            </div>
            <h3>{{ rtrim(rtrim($product->price, '0'), '.') }} EGP</h3>

            <p>{{ $product->description }}</p>




            <button>Add To Cart</button>

            <button>Add To Wishlist</button>

        </div>

    </div>
    <script>
        const left_img = document.querySelector('.left_img')
        const sub_img = document.querySelectorAll('.sub_img')

        sub_img.forEach(function(img) {

            img.addEventListener('click', function() {

                left_img.src = img.src;

                sub_img.forEach(function(item) {

                    item.classList.remove('active')

                });
                img.classList.add('active')
            });



        })
        // const img_next=document.querySelector('.img_next')
        // const img_previous=document.querySelector('.img_previous')

        // img_next.addEventListener('click',function(){




        // });
    </script>
@endsection
