{{-- <div>
    <h1>Search Results for "{{ $query }}"</h1>

    @if ($products->isEmpty())
        <p>No Added to cart.</p>
    @else
        <ul>
            @foreach ($products as $product)
                <li>{{ $product->name }} - ${{ $product->price }}</li>
            @endforeach
        </ul>
    @endif
</div> --}}

<style>
    .hover-container .btn-primary {
        opacity: 0;
        transition: opacity 0.3s;
    }

    .hover-container:hover .btn-primary {
        opacity: 1;
    }
</style>

<div>
    @livewire('navbar')

    <div class="super_container">

        <!-- Header -->

        <!-- Home -->

        <div class="home">
            <div class="home_background parallax-window" data-parallax="scroll"
                data-image-src="images/shop_background.jpg">
            </div>
            <div class="home_overlay"></div>
            <div class="home_content d-flex flex-column align-items-center justify-content-center">
                <h2 class="home_title">Search Results for "{{ $query }}"</h2>
            </div>
        </div>

        <!-- Shop -->

        <div class="shop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                        <!-- Shop Sidebar -->
                        <div class="shop_sidebar">
                            <div class="sidebar_section">
                                <div class="sidebar_title">Categories</div>

                                @foreach ($categories as $category)
                                    <ul class="sidebar_categories">

                                        <li><a
                                                href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
                                        </li>
                                    </ul>
                                @endforeach


                            </div>
                            <div></div>

                        </div>

                    </div>

                    <div class="col-lg-9">

                        <!-- Shop Content -->

                        <div class="shop_content">
                            <div></div>

                            <div class="row">
                                {{-- <div class="product_grid_border"></div> --}}



                                <!-- Product Item -->

                                @foreach ($products as $product)
                                    <div class="product_item hover-container">
                                        <div class="product_border"></div>
                                        <div
                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                            <img src="{{ asset('images/featured_2.png') }}" alt="">
                                        </div>
                                        <div class="product_content">
                                            <div class="product_price">${{ $product->price }}</div>
                                            <div class="product_name">
                                                <div><a href="#" tabindex="0">{{ $product->name }}</a></div>
                                            </div>
                                        </div>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-25%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                        <button class="btn btn-primary add-to-cart-btn"
                                            data-product-id="{{ $product->id }}"
                                            style="position: absolute; bottom: 0px; left: 50%; transform: translateX(-50%);">Add
                                            to Cart</button>
                                    </div>
                                @endforeach



                            </div>
                            {{-- @if ($products->hasMorePages())
                                <button wire:click="loadMore" class="btn btn-primary">Load More</button>
                            @endif --}}
                            <!-- Shop Page Navigation -->

                            <div class="mt-4">
                                <nav aria-label="Page navigation">
                                    {{ $products->links('pagination::bootstrap-5') }}
                                </nav>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Recently Viewed -->




        <!-- Brands -->

        <div class="brands">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="brands_slider_container">

                            <!-- Brands Slider -->

                            <div class="owl-carousel owl-theme brands_slider">

                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_1.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_2.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_3.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_4.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_5.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_6.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_7.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_8.jpg" alt=""></div>
                                </div>

                            </div>

                            <!-- Brands Slider Navigation -->
                            <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div
                            class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                            <div class="newsletter_title_container">
                                <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
                                <div class="newsletter_title">Sign up for Newsletter</div>
                                <div class="newsletter_text">
                                    <p>...and receive %20 coupon for first shopping.</p>
                                </div>
                            </div>
                            <div class="newsletter_content clearfix">
                                <form action="#" class="newsletter_form">
                                    <input type="email" class="newsletter_input" required="required"
                                        placeholder="Enter your email address">
                                    <button class="newsletter_button">Subscribe</button>
                                </form>
                                <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 footer_col">
                        <div class="footer_column footer_contact">
                            <div class="logo_container">
                                <div class="logo"><a href="#">OneTech</a></div>
                            </div>
                            <div class="footer_title">Got Question? Call Us 24/7</div>
                            <div class="footer_phone">+38 068 005 3570</div>
                            <div class="footer_contact_text">
                                <p>17 Princess Road, London</p>
                                <p>Grester London NW18JR, UK</p>
                            </div>
                            <div class="footer_social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 offset-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Find it Fast</div>
                            <ul class="footer_list">
                                <li><a href="#">Computers & Laptops</a></li>
                                <li><a href="#">Cameras & Photos</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Smartphones & Tablets</a></li>
                                <li><a href="#">TV & Audio</a></li>
                            </ul>
                            <div class="footer_subtitle">Gadgets</div>
                            <ul class="footer_list">
                                <li><a href="#">Car Electronics</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <ul class="footer_list footer_list_2">
                                <li><a href="#">Video Games & Consoles</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Cameras & Photos</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Computers & Laptops</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Customer Care</div>
                            <ul class="footer_list">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order Tracking</a></li>
                                <li><a href="#">Wish List</a></li>
                                <li><a href="#">Customer Services</a></li>
                                <li><a href="#">Returns / Exchange</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Product Support</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        <!-- Copyright -->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div
                            class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                            <div class="copyright_content">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </div>
                            <div class="logos ml-sm-auto">
                                <ul class="logos_list">
                                    <li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");

        addToCartButtons.forEach(button => {
            button.addEventListener("click", function() {
                const productId = this.getAttribute("data-product-id");
                const productName = this.closest(".product_item").querySelector(
                    ".product_name a").textContent;
                addToCart(productId, productName);
            });
        });

        function addToCart(productId, productName) {
            // Retrieve the current cart from the cookie
            let cart = getCookie("cart");
            cart = cart ? JSON.parse(cart) : [];

            // Check if the product already exists in the cart
            const productIndex = cart.findIndex(product => product.id == productId);
            if (productIndex === -1) {
                // If the product doesn't exist, add it to the cart
                cart.push({
                    id: productId,
                    quantity: 1
                });
                // Save the updated cart back to the cookie
                setCookie("cart", JSON.stringify(cart), 7);
                // Display success alert
                alert(`Product "${productName}" has been added to the cart successfully!`);
            } else {
                // If the product already exists, display an alert
                alert(`Product "${productName}" is already in the cart!`);
            }
        }

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(";").shift();
        }

        function setCookie(name, value, days) {
            const d = new Date();
            d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }


    });
</script>
