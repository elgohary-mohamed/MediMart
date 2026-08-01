@extends('layout.MasterBage')
@section('breadcrumb')
    >
    <span
        style="position: relative;left: 10rem;text-decoration: none;font-style: normal;font-family: sans-serif;font-size: 13px;line-height: 20px;letter-spacing: 0%;font-weight: 600;margin-top: 2.5px;">
        Products
    </span>
@endsection
@section('content')
    <div class="container" style="margin-left: 10%;margin-right: 10%;    margin-top: 20px;">




        <div></div>
        <div></div>
        <div></div>





        {{-- <h4>{{ $section->name }}</h4> --}}
        <div class="product"
            style="display: grid;grid-template-rows: 1fr 1fr;grid-template-columns: 1fr 1fr 1fr 1fr 1fr;overflow: hidden;border-top: 1px solid #ccc;border-left: 1px solid #ccc;">


            @foreach ($products as $product)
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
                                <a href="{{ route('product.show', $product->slug) }}"><img src="{{ asset('img/show.png') }}"
                                        alt="" style="width: 25px;height: 25px;"></a>

                            </button>

                        <li id="show_product">

                        </li>
                    </div>
                </div>
            @endforeach


        </div>

        <div class="pagination">

            @if ($products->onFirstPage())
                <button disabled><img src="{{ asset('img/arrowicon-26.png') }}"
                        style=" width: 20px;   height: 20px;"alt=""></button>
            @else
                <a href="{{ $products->previousPageUrl() }}"><img src="{{ asset('img/arrowicon-26.png') }}"
                        style=" width: 20px;   height: 20px;"alt=""></a>
            @endif

            @for ($i = 1; $i <= $products->lastPage(); $i++)
                <a class="{{ $products->currentPage() == $i ? 'active' : '' }}" href="{{ $products->url($i) }}">

                    {{ sprintf('%02d', $i) }}

                </a>
            @endfor

            @if ($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}"><img
                        src="{{ asset('img/arrow-icon-28.png') }}"style="height: 20px;width: 20px;" alt=""></a>
            @else
                <button disabled><img src="{{ asset('img/arrow-icon-28.png') }}"
                        style=" width: 20px;height: 20px;opacity: 60%;"alt=""></button>
            @endif

        </div>



    </div>
@endsection
