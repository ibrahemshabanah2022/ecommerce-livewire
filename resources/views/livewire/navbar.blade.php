<header class="header">

    <!-- Top Bar -->

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+38 068 005
                        3570
                    </div>
                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a
                            href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
                    </div>
                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="#">Arabic</a></li>

                                    </ul>
                                </li>

                            </ul>
                        </div>

                        {{-- <div class="user_icon"><img src="images/user.svg" alt=""></div> --}}


                        @auth
                            <div class="top_bar_user">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <div>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </div>
                            </div>

                            {{-- <div><a wire:click="logout">{{ __('Log Out') }}</a></div> --}}
                        @else
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="images/user.svg" alt=""></div>
                                @if (Route::has('register'))
                                    <div><a href="{{ route('register') }}">Register</a></div>
                                @endif
                                <div><a href="{{ route('login') }}">Sign in</a></div>
                            </div>

                        @endauth






                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo"><a href="#">OneTech</a></div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <livewire:product-search />


                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist_icon"><img src="images/heart.png" alt=""></div>
                            <div class="wishlist_content">
                                <div class="wishlist_text"><a href="{{ route('my-wishlist') }}">Wishlist</a></div>
                            </div>
                        </div>

                        <!-- Cart -->
                        <div class="cart">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                <div class="cart_icon">
                                    <img src="images/cart.png" alt="">
                                    <div class="cart_count"><span id="cart-count">0</span></div>

                                </div>
                                <div class="cart_content">
                                    <div class="cart_text"><a href="{{ route('cart') }}">Cart</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">

                        <!-- Categories Menu -->

                        <div class="cat_menu_container">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                <div class="cat_burger"><span></span><span></span><span></span></div>
                                <div class="cat_menu_text">categories</div>
                            </div>






                            <ul class="cat_menu">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('category.show', $category->id) }}">{{ $category->name }} <i
                                                class="fas fa-chevron-right ml-auto"></i></a></li>
                                @endforeach


                        </div>

                        <!-- Main Nav Menu -->

                        <div class="main_nav_menu ml-auto">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="/">Home<i class="fas fa-chevron-down"></i></a></li>


                                <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a>
                                </li>
                            </ul>
                        </div>

                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner">
                                        <span></span><span></span><span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Menu -->

    <div class="page_menu">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page_menu_content">

                        <div class="page_menu_search">
                            <form action="#">
                                <input type="search" required="required" class="page_menu_search_input"
                                    placeholder="Search for products...">
                            </form>
                        </div>
                        <ul class="page_menu_nav">
                            <li class="page_menu_item has-children">
                                <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="page_menu_item has-children">
                                <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="page_menu_item">
                                <a href="#">Home<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li class="page_menu_item has-children">
                                <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li class="page_menu_item has-children">
                                        <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="page_menu_item has-children">
                                <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="page_menu_item has-children">
                                <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li class="page_menu_item"><a href="contact.html">contact<i
                                        class="fa fa-angle-down"></i></a></li>
                        </ul>

                        <div class="menu_contact">
                            <div class="menu_contact_item">
                                <div class="menu_contact_icon"><img src="images/phone_white.png" alt="">
                                </div>+38 068 005 3570
                            </div>
                            <div class="menu_contact_item">
                                <div class="menu_contact_icon"><img src="images/mail_white.png" alt="">
                                </div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<script src="{{ asset('js/cart-count.js') }}"></script>
