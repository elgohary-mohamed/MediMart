<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <style>
        .search-result {
            position: absolute;
            top: 45px;
            width: 100%;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .15);
            z-index: 1000;
            max-height: 350px;
            overflow-y: auto;
        }

        .search-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-item:hover {
            background: #f5f5f5;
        }

        .search-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>

</head>

<body>
    <header>
        <div class="Widget"></div>



        <div class="main_header">

            <div class="top_nav"></div>



            <hr style="margin: 0;">

            <div class="middle_nav">

                <div class="div_middle_nav_logo"><img src="{{ asset('img/logo.png') }}" alt=""
                        class="middle_nav_logo"></div>

                {{-- search --}}
                <div style="width:45%; display:flex; align-items:center; position:relative;">
                    <div class="container-fluid">

                        <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search">

                        <div id="searchResult" class="search-result"></div>

                    </div>
                </div>
                <div class="right_nav">
                    <li>
                        <a href="/wishlist">
                            <img src="{{ asset('img/wishlist-1.png') }}" alt=""
                                style="width: 31px;height: 31px;">
                        </a>
                    </li>
                    <li>
                        <a href="/cart">
                            <img src="{{ asset('img/cart.png') }}" alt="" style="width: 31px;height: 31px;">
                        </a>
                    </li>
                    <li>

                        @if (Auth::check())
                            <div class="username"> {{ Auth::user()->name }}</div>
                            <div class="logout" style="display: none;position: absolute;top: 9rem;background: black;">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                        style="text-decoration: none;color: white">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        @else
                            <a href="/login"><img src="{{ asset('img/login.png') }}" alt=""
                                    style="width: 31px;height: 31px;"></a>
                        @endif

                    </li>
                </div>

            </div>



        </div>



        <div></div>



        <div class="navbar">
            <div id="menuBtn" class="category">
                <div style="height: 100%;display: flex;align-items: center;justify-content: space-evenly;">
                    <li style="font-size: 15px;font-weight: 600;">All Category</li>
                    <li>
                        <img class="categoryarrow" src="{{ asset('img/down-arrow.png') }}" alt=""
                            style="width: 13px">
                    </li>
                </div>

                <div id="megaMenu" class="show_megaMenu">
                    <div class="div_show_megaMenu" style="">
                        @foreach ($categories as $category)
                            <li> <span class="cat_name">{{ $category->name }}</li></span>
                        @endforeach
                    </div>
                </div>
            </div>




            <li>
                <img class="nav_logo" src="{{ asset('img/Track Order.png') }}" alt="">
                <span class="nav_text">Track Order</span>
            </li>

            <li>
                <img class="nav_logo" src="{{ asset('img/offer.png') }}" alt="">
                <a href="/offer" style="text-decoration: none">
                    <span class="nav_text">Offers</span>
                </a>
            </li>

            <li><img class="nav_logo" src="{{ asset('img/Customer Support.png') }}" alt="">
                <span class="nav_text">Customer Support </span>
            </li>

            <li>
                <img class="nav_logo" src="{{ asset('img/about.png') }}" alt="">
                <span class="nav_text">About Us</span>
            </li>

        </div>
        <div class="Breadcrumb"><span style="position: relative;left: 10rem;"><a href="/home"
                    style="    text-decoration: none;font-style: normal;font-family: sans-serif;font-size: 15px;line-height: 20px;letter-spacing: 0%;font-weight: 600;">Home</a></span>
            @yield('breadcrumb')
        </div>
    </header>




    <main>

        @yield('content')
    </main>


    <footer></footer>
    <script>
        // 1. نمسك الزرار والمنيو من الـ HTML
        const menuBtn = document.getElementById('menuBtn');
        const megaMenu = document.getElementById('megaMenu');
        const categoryarrow = document.querySelector('.categoryarrow');

        menuBtn.addEventListener('click', (e) => {

            e.stopPropagation();

            megaMenu.classList.toggle('active');

            if (megaMenu.classList.contains('active')) {

                categoryarrow.src = "{{ asset('img/up-arrow-angle.png') }}";

            } else {


                categoryarrow.src = "{{ asset('img/down-arrow.png') }}";


            }
        });
        // 💡 حتة صايعة: لو المستخدم ضغط في أي مكان بره المنيو، يقفل تلقائي
        document.addEventListener('click', (e) => {
            if (!megaMenu.contains(e.target) && e.target !== menuBtn) {
                megaMenu.classList.remove('active');
            }
        });

        const username = document.querySelector(".username");
        const logout = document.querySelector(".logout");

        username.addEventListener("click", function() {

            if (logout.style.display == "block") {

                logout.style.display = "none";

            } else {

                logout.style.display = "block";

            }

        });
    </script>





    {{-- javascript --}}
    <script>
        const isLoggedIn = @json(auth()->check());
    </script>
    <script>
        const buttons = document.querySelectorAll('.wishlist-btn');

        buttons.forEach(button => {

            button.addEventListener('click', function(e) {
                if (!isLoggedIn) {
                    window.location.href = "/login";
                    return;
                }
                let productId = this.dataset.id;
                e.stopPropagation();
                fetch('/wishlist', {

                        method: 'POST',

                        headers: {

                            'Content-Type': 'application/json',

                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content

                        },

                        body: JSON.stringify({

                            product_id: productId

                        })

                    })

                    .then(response => response.json())

                    .then(data => {

                        if (data.status == "added") {

                            button.innerHTML = "❤️";
                            alert('add to wishlist')

                        } else {

                            button.innerHTML = "🤍";
                            alert('remove from wishlist')
                        }

                    });

            });

        });
        const cards = document.querySelectorAll(".mastercard");

        cards.forEach(function(card) {

            card.addEventListener("click", function() {

                const wishlist = card.querySelector(".contaner_wishlist");

                const isVisible = wishlist.style.display === "block";

                // اخفي الكل
                document.querySelectorAll(".contaner_wishlist").forEach(function(item) {
                    item.style.display = "none";
                });

                // لو مكانتش مفتوحة افتحها
                if (!isVisible) {
                    wishlist.style.display = "block";
                }

            });

        });

        const cartbuttons = document.querySelectorAll('.cart-btn');

        cartbuttons.forEach(function(button) {

            button.addEventListener("click", function(e) {
                if (!isLoggedIn) {
                    window.location.href = "/login";
                    return;
                }
                e.stopPropagation();

                let productid = this.dataset.id;

                console.log(productid);

                fetch('/cart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            product_id: productid

                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert('add to cart')
                    });

            });

        });





        const plusButtons = document.querySelectorAll('.plus-btn');

        plusButtons.forEach(function(button) {

            button.addEventListener("click", function() {

                let cartId = this.dataset.id;
                fetch('/cart/increase', {
                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },

                        body: JSON.stringify({
                            cart_id: cartId
                        })

                    })
                    .then(response => response.json())
                    .then(data => {

                        let quantity = document.querySelector(
                            `.quantity[data-id="${cartId}"]`
                        );
                        let subtotal = document.querySelector(
                            `.subtotal[data-id="${cartId}"]`
                        );
                        let total = document.querySelector('.total');
                        subtotal.innerText = data.subtotal;
                        quantity.innerText = data.quantity;
                        total.innerText = data.total;

                    });
            });

        });
        const minusButtons = document.querySelectorAll('.minus-btn');

        minusButtons.forEach(function(button) {

            button.addEventListener("click", function() {

                let cartId = this.dataset.id;

                fetch('/cart/decrease', {
                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },

                        body: JSON.stringify({
                            cart_id: cartId
                        })

                    })
                    .then(response => response.json())
                    .then(data => {

                        let quantity = document.querySelector(
                            `.quantity[data-id="${cartId}"]`
                        );
                        let subtotal = document.querySelector(
                            `.subtotal[data-id="${cartId}"]`
                        );
                        let total = document.querySelector('.total');
                        subtotal.innerText = data.subtotal;
                        quantity.innerText = data.quantity;
                        total.innerText = data.total;

                    });
            });

        });
    </script>
    <script>
        const showbtn = document.querySelectorAll('.show-btn')
        const close_quick = document.querySelector('.close_quick')
        const quick_product = document.querySelector('.quick_product');
        close_quick.addEventListener('click', function() {
            quick_product.style.display = "none";
        })
        showbtn.forEach(function(button) {
            button.addEventListener('click', function() {
                let product_id = this.dataset.id
                let quick_product = document.querySelector('.quick_product');
                quick_product.style.display = "block";
                fetch(`/quickproduct/${product_id}`, {


                        method: 'GET',

                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },



                    })
                    .then(response => response.json())
                    .then(data => {


                        let name = document.querySelector('.productquick_name');
                        name.innerHTML = "name: " + data.name
                        let price = document.querySelector('.productquick_price');
                        price.innerHTML = "price: " + data.price
                        let description = document.querySelector('.productquick_description');
                        description.innerHTML = "description: " + data.description
                        let brand = document.querySelector('.productquick_brand');
                        brand.innerHTML = "Brand: " + data.brand
                        let container = document.querySelector('.productquick_images');

                        container.innerHTML = "";

                        // نضيف الصور الجديدة
                        data.images.forEach(function(image) {

                            let img = document.createElement('img');

                            img.src = '/storage/' + image.image;

                            img.style.height = "80px";
                            img.style.width = "80px";
                            img.style.margin = "5px";
                            img.style.objectfit = "contain";

                            container.appendChild(img);

                        });
                        let image = document.querySelector('.productquick_image');
                        image.src = '/storage/' + data.image;
                        let category = document.querySelector('.productquick_category');
                        category.innerHTML = "category: " + data.category
                        console.log(data);


                    })


            })


        })
    </script>

    {{-- search --}}
    <script>
        const search = document.querySelector('.search')
        const result = document.querySelector('#searchResult');

        search.addEventListener('input', function() {

            if (this.value == '') {
                result.innerHTML = '';
                return;
            }
            fetch('/search?search=' + this.value)

                .then(response => response.json())
                .then(data => {
                    result.innerHTML = '';

                    data.forEach(product => {

                        result.innerHTML += `
                <div>
                    <h5>${product.name}</h5>

                </div>
            `;
                    })
                })


        })
    </script>
</body>


</html>
