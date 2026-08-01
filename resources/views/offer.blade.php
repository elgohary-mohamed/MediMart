@extends('layout.MasterBage')
@section('breadcrumb')




<span
        style="position: relative;left: 10rem;text-decoration: none;font-style: normal;font-family: sans-serif;font-size: 13px;line-height: 20px;letter-spacing: 0%;font-weight: 600;margin-top: 2.5px;">
 <img src="{{ asset('img/right-arrow.png') }}" alt="" style="width: 10px;height: 10px;">offers
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


            @foreach ($offers as $offer)
                 <div class="mastercard" id="show_whislist">

                        <img class="product_img" src="{{ asset('storage/' . $offer->image) }}" alt="">
                        <hr style="background-color: black ;border: 1ch">
                        <div class=""
                            style="margin-top: 18px;text-wrap-style: balance;font-weight: 700;font-style: italic;margin-left: 8px; display: -webkit-box;-webkit-line-clamp: 2; -webkit-box-orient: vertical;overflow: hidden; height: 40px;">
                            {{ $offer->name }}

                        </div>


                        <div style="margin-top: 15px;color: #04619d;font-size: 0.5cm;font-weight: 900;margin-left: 26px;">
                            {{ $offer->price }}</div>




                        <div class="contaner_wishlist"
                            style="position: absolute; display:none; z-index: 0; top: 7rem;width: 100%;">


                            <li>
                                <button class="wishlist-btn" data-id="{{ $offer->id }}"
                                    style="width: 48px; height: 48px;border-radius: 50% ;background-color: #FA8232 ;border: 0px;">
                                    🤍
                                </button>

                                <button class="cart-btn"
                                    data-id="{{ $offer->id }}"style="width: 48px; height: 48px;border-radius: 50% ;background-color: #FFFFFF ;border: 0px;margin-left: 5px;">
                                    <img src="{{ asset('img/cart.png') }}" alt=""
                                        style="width: 25px;height: 25px;">
                                </button>


                                <button class="show-btn" data-id="{{ $offer->id }}"
                                    style="width: 48px; height: 48px;border-radius: 50% ;background-color: #FFFFFF ;border: 0px;margin-left: 5px;">
                                    <img src="{{ asset('img/show.png') }}" alt=""
                                        style="width: 25px;height: 25px;">

                                </button>

                            <li id="show_product">

                            </li>
                        </div>
                    </div>
            @endforeach


        </div>

        <div class="pagination">

            @if ($offers->onFirstPage())
                <button disabled><img src="{{ asset('img/arrowicon-26.png') }}" style=" width: 20px;   height: 20px;"alt=""></button>
            @else
                <a href="{{ $offers->previousPageUrl() }}"><img src="{{ asset('img/arrowicon-26.png') }}" style=" width: 20px;   height: 20px;"alt=""></a>
            @endif

            @for ($i = 1; $i <= $offers->lastPage(); $i++)
                <a class="{{ $offers->currentPage() == $i ? 'active' : '' }}" href="{{ $offers->url($i) }}">

                    {{ sprintf('%02d', $i) }}

                </a>
            @endfor

            @if ($offers->hasMorePages())
                <a href="{{ $offers->nextPageUrl() }}"><img src="{{ asset('img/arrow-icon-28.png') }}"style="height: 20px;width: 20px;" alt=""></a>
            @else
                <button disabled><img src="{{ asset('img/arrow-icon-28.png') }}" style=" width: 20px;   height: 20px;"alt=""></button>
            @endif

        </div>



    </div>


@endsection
