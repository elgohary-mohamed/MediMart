    @extends('layout.MasterBage')
    @section('breadcrumb')
        <span
            style="position: relative;left: 10rem;text-decoration: none;font-style: normal;font-family: sans-serif;font-size: 13px;line-height: 20px;letter-spacing: 0%;font-weight: 600;margin-top: 2.5px;">
            <img src="{{ asset('img/right-arrow.png') }}" alt="" style="width: 10px;height: 10px;">cart
        </span>
    @endsection




    @section('content')
        <div style="display: flex">
            <table style="width: 70%;">

                <thead style="background-color: #F2F4F5;height: 35px;">

                    <tr>
                        <th style="text-align: left;">product</th>
                        <th style="text-align: left;">price</th>
                        <th style="text-align: left;">Quantity</th>
                        <th style="text-align: left;">Sub-Total</th>
                    </tr>

                </thead>
                @foreach ($carts as $cart)
                    <div style="display: flex">
                        <tbody>

                            <tr>
                                <td style="display: flex">

                                    <img src="{{ asset('storage/' . $cart->product->image) }}"
                                        style="width: 100px;height: 100px;">
                                    <h4>{{ $cart->product->name }}</h4>
                                </td>
                                <td>

                                    <h4>{{ $cart->product->price }}</h4>

                                </td>
                                <td>
                                    <div style="display: flex;justify-content: space-around;align-items: center;">
                                        <button class="minus-btn" data-id="{{ $cart->id }}">-</button>
                                        <h4 class="quantity" data-id="{{ $cart->id }}">
                                            {{ $cart->quantity }}
                                        </h4>
                                        <button class="plus-btn" data-id="{{ $cart->id }}">+</button>
                                    </div>
                                </td>
                                <td>
                                    <h4 class="subtotal" data-id="{{ $cart->id }}">
                                        {{ $cart->product->price * $cart->quantity }}
                                    </h4>
                                </td>


                            </tr>
                        </tbody>


                    </div>
                @endforeach
            </table>

            <div style="width: 30%">

                <h3>Card Totals</h3>


                    <h4 class="total" >{{ $total }}</h4>

            </div>

        </div>
    @endsection
