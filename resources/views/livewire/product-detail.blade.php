<div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ $product->images_url }}" alt="product image">
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->

                            <div class="ratings-container">
                                <!-- <span class="pr-2 fw-bold">{{ number_format($product->ratingall->avg('rating'), 1)  }}</span> -->



                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                Rp. {{ Number::currency($product->price, '   ')}}
                            </div><!-- End .product-price -->
                            <div class="social-icons social-icons-sm mb-3">
                                <label class="social-label">Qty:</label>
                                <a wire:click.prevent="decreaseQty" href="" class="social-icon">-</a>
                                <span class="mr-3 ml-2">{{$quantity}}</span>

                                <a wire:click.prevent="increaseQty" href="#" class="social-icon">+</a>
                            </div>
                            <div class="product-details-action">
                                <a wire:click.prevent="addToCart({{$product->id}})" href="#" class="btn-product btn-cart">
                                    <span wire:loading.remove wire:target="addToCart({{$product->id}})">Add to Cart</span> <span wire:loading wire:target="addToCart({{$product->id}})">Adding...</span>
                                </a>
                            </div>
                            <div class="product-content">

                                <p> <textarea style="width: 100%; outline: none; border: none; box-shadow: none;" name="" id="" rows="13">{{$product->description}} </textarea></p>
                            </div><!-- End .product-content -->




                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</div>
