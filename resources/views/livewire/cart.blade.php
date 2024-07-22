<div class="super_container">
    <!-- Cart -->
    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Shopping Cart</div>
                        <div class="cart_items">
                            <table class="table table-bordered" style="border: none;">
                                <thead>
                                    <tr>
                                        {{-- <th style="text-align: center; border: none;">Image</th> --}}
                                        <th style="text-align: center; border: none;">Name</th>
                                        {{-- <th style="text-align: center; border: none;">Color</th> --}}
                                        <th style="text-align: center; border: none;">Quantity</th>
                                        <th style="text-align: center; border: none;">Price</th>
                                        <th style="text-align: center; border: none;">Total</th>
                                    </tr>
                                </thead>


                                <tbody id="cart-items">
                                    @foreach ($products as $product)
                                        @php
                                            $item = collect($cartItems)->firstWhere('id', $product->id);
                                        @endphp
                                        <tr data-product-id="{{ $product->id }}">
                                            <td class="cart_item_name" style="text-align: center; border: none;">
                                                {{ $product->name }}
                                            </td>
                                            <td class="cart_item_quantity" style="text-align: center; border: none;">
                                                <input type="number" class="quantity-input"
                                                    value="{{ $item['quantity'] }}" min="1">
                                            </td>
                                            <td class="cart_item_price" style="text-align: center; border: none;">
                                                ${{ $product->price }}
                                            </td>
                                            <td class="cart_item_total" style="text-align: center; border: none;">
                                                ${{ $product->price * $item['quantity'] }}
                                            </td>
                                            <td class="cart_item_remove" style="text-align: center; border: none;">
                                                <button
                                                    class="remove-button btn btn-danger decrease-cart-count">Remove</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                        <!-- Order Total -->
                        @php
                            $orderTotal = 0;
                            foreach ($products as $product) {
                                $item = collect($cartItems)->firstWhere('id', $product->id);
                                $orderTotal += $product->price * $item['quantity'];
                            }
                        @endphp
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount" id="order-total">${{ $orderTotal }}</div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            @livewire('checkout')
                        </div>
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
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cartItemsElement = document.getElementById('cart-items');
        const orderTotalElement = document.getElementById('order-total');

        // Load cart from cookie
        let cart = JSON.parse(getCookie('cart') || '[]');

        // Update cookie
        function setCookie(name, value, days) {
            let expires = "";
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // Get cookie
        function getCookie(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        // Update total prices
        function updateTotals() {
            let orderTotal = 0;

            cartItemsElement.querySelectorAll('tr').forEach(row => {
                const productId = row.getAttribute('data-product-id');
                const quantityInput = row.querySelector('.quantity-input');
                const quantity = parseInt(quantityInput.value);
                const price = parseFloat(row.querySelector('.cart_item_price').textContent.replace('$',
                    ''));
                const totalElement = row.querySelector('.cart_item_total');

                // Update total price for this item
                const total = quantity * price;
                totalElement.textContent = `$${total.toFixed(2)}`;

                // Update order total
                orderTotal += total;
            });

            // Update order total display
            orderTotalElement.textContent = `$${orderTotal.toFixed(2)}`;
        }

        // Handle quantity change
        cartItemsElement.addEventListener('input', event => {
            if (event.target.classList.contains('quantity-input')) {
                const row = event.target.closest('tr');
                const productId = row.getAttribute('data-product-id');
                const quantity = parseInt(event.target.value);

                // Update cookie
                cart = cart.map(item => item.id === productId ? {
                    ...item,
                    quantity
                } : item);
                setCookie('cart', JSON.stringify(cart), 7);

                updateTotals();
            }
        });

        // Handle remove button click
        cartItemsElement.addEventListener('click', event => {
            if (event.target.classList.contains('remove-button')) {
                const row = event.target.closest('tr');
                const productId = row.getAttribute('data-product-id');

                // Remove product from cart
                cart = cart.filter(item => item.id != productId);
                setCookie('cart', JSON.stringify(cart), 7);

                // Remove row from table
                row.remove();

                updateTotals();
            }
        });

        // Initial calculation
        updateTotals();
    });
</script>
<script src="{{ asset('js/cart-count.js') }}"></script>
