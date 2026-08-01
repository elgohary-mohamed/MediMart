@extends('layout.MasterBage')

@section('content')





    <div class="container" style="margin-left: 10%;margin-right: 10%">






        <div></div>
        <div></div>




        @foreach ($sections as $section)
            <h4>{{ $section->name }}</h4>
            <div class="{{ $section->slug }}"
                style="display: grid;grid-template-rows: 1fr 1fr;grid-template-columns: 1fr 1fr 1fr 1fr 1fr;overflow: hidden;column-gap: 15px;row-gap: 15px;">

                @foreach ($section->products as $product)
                    <div class="mastercard" id="show_whislist">

                        <img class="product_img" src="{{ asset('storage/' . $product->image) }}" alt="">
                        <hr style="background-color: black ;border: 1ch">
                        <div class="product_name">
                            {{ $product->name }}

                        </div>


                        <div class="product_price">{{ rtrim(rtrim($product->price, '0'), '.') }}</div>




                        <div class="contaner_wishlist"
                            style="position: absolute; display:none; z-index: 0; top: 7rem;width: 100%;">


                            <li>
                                <button class="wishlist-btn" data-id="{{ $product->id }}">
                                    @if (in_array($product->id, $wishlists))
                                        ❤️
                                    @else
                                        🤍
                                    @endif
                                </button>

                                <button class="cart-btn"data-id="{{ $product->id }}">
                                    <img src="{{ asset('img/cart.png') }}" alt="" style="width: 25px;height: 25px;">
                                </button>


                                <button class="show-btn" data-id="{{ $product->id }}">
                                    <img src="{{ asset('img/show.png') }}" alt=""
                                        style="width: 25px;height: 25px;"></a>

                                </button>


                        </div>
                    </div>
                @endforeach
            </div>






            @if ($loop->first)
            <livewire:shop-by-categories />

            @endif
        @endforeach




    </div>


 <div class="quick_product" style="width: 80%;display: none">
        <div class="quick_contaner" style="height: 35px;">

            <div class="left_quick">
                <h4><img class="productquick_image" src="" alt=""></h4>
                <div class="productquick_images"></div>
            </div>
            <div class="right_quick">
                <div style="display: flex;display: flex;flex-wrap: wrap; justify-content: space-between;">
                    <h4 class="productquick_name">name</h4>

                    <h4 class="productquick_brand">brand</h4>
                    <h4 class="productquick_category">category</h4>
                </div>
                <h4 class="productquick_description">description</h4>
                <h4 class="productquick_price">price</h4>
            </div>
         <div class="close_quick">
                <img src="{{ asset('img/close.png') }}" alt="" style="width: 30px;height: 30px">
            </div>
        </div>
    </div>

@endsection
