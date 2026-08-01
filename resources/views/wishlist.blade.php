@extends('layout.MasterBage')

@section('content')
@section('breadcrumb')



>

Wishlist

@endsection
    <table  style="width: 100%;">

        <thead style="background-color: #F2F4F5;height: 35px;">

            <tr>
                <th style="text-align: left;">product</th>
                <th style="text-align: left;">price</th>
                <th style="text-align: left;">Stock Status</th>
                <th style="text-align: left;">Action</th>
            </tr>

        </thead>
        @foreach ($wishlists as $wishlist)
            <div style="display: flex">
                <tbody >

                    <tr >
                        <td style="display: flex">

                            <img src="{{ asset('storage/' . $wishlist->product->image) }}"
                                style="width: 100px;height: 100px;">
                            <h4>{{ $wishlist->product->name }}</h4>
                        </td>
                        <td >

                            <h4>{{ $wishlist->product->price }}</h4>

                        </td>
                        <td >
                            <h4>{{ $wishlist->product->stock }}</h4>
                        </td>
                        <td >


                                <button class="cart-btn"data-id="{{ $wishlist->product->id }}">
                                    <img src="{{ asset('img/cart.png') }}" alt="" style="width: 25px;height: 25px;"> add to cart
                                </button>

                        </td>


                    </tr>
                </tbody>


            </div>
        @endforeach
    </table>
@endsection
