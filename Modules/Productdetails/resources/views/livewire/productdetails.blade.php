<div>
    <x-layouts.app>
        @livewire('navbar')



        <div class="single_product">
            <div class="container">
                <div class="row">

                    <!-- Images -->
                    <div class="col-lg-2 order-lg-1 order-2">
                        <ul class="image_list">
                            <li data-image="images/single_4.jpg"><img src="images/single_4.jpg" alt=""></li>
                            <li data-image="images/single_2.jpg"><img src="images/single_2.jpg" alt=""></li>
                            <li data-image="images/single_3.jpg"><img src="images/single_3.jpg" alt=""></li>
                        </ul>
                    </div>

                    <!-- Selected Image -->
                    <div class="col-lg-5 order-lg-2 order-1">
                        <div class="image_selected">

                            @if ($product->images->isNotEmpty())
                                @php
                                    $imagePath = $product->images->first()->path;
                                @endphp
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('storage/' . $imagePath) }}" alt="{{ $product->name }}"
                                        class="img-fluid">
                                </div>
                            @else
                                <img src="{{ asset('storage/images/default.png') }}" alt="Default Image"
                                    class="img-fluid">
                            @endif
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-lg-5 order-3">
                        <div class="product_description">
                            <div class="product_category">Laptops</div>
                            <div class="product_name">{{ $product->name }}</div>
                            <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                            <div class="product_text">
                                <p>{{ $product->description }}.</p>
                            </div>
                            <div class="order_info d-flex flex-row">
                                <form action="#">
                                    <div class="clearfix" style="z-index: 1000;">




                                    </div>

                                    <div class="product_price">${{ $product->price }}
                                        <p>In Stock: {{ $product->in_stock }}</p>
                                    </div>
                                    <div class="button_container">
                                        <button type="button" class="button cart_button">Add to Cart</button>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </x-layouts.app>

</div>
