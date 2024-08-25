<div>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('ui/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">PRODUCT UMKM MASOHI<span>List</span></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Product All</a></li>
                </ol>
            </div>
        </nav>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">


                        <div class="products mb-3">
                            <div class="row justify-content-center">
                                @foreach ($products as $product)
                                <div class="col-12 col-md-4 col-lg-4">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <!-- <span class="product-label label-new">New</span> -->
                                            <a href="/umkm/{{$product->merchant->slug}}">
                                                <img src="{{ $product->images_url }}" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action">
                                                <a wire:click.prevent="addToCart({{$product->id}})" href="#" class="btn-product btn-cart" title="Add to cart"><span>add to
                                                        cart</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="/umkm/{{$product->merchant->slug}}">{{$product->merchant->merchant_nama}}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="/products/{{$product->slug}}">{{$product->name}}</a></h3>
                                            <!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price"> Rp. {{ Number::currency($product->price, '   ')}}</span>
                                            </div><!-- End .product-price -->
                                            <!-- <div class="ratings-container">
                                                <span class="pr-2 ">{{ number_format($product->ratingall->avg('rating'), 1) }}</span>
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: <?php echo number_format($product->ratingall->avg('rating'), 1) * 20  ?>%;">

                                                    </div>
                                                </div>

                                                <span class="pl-2 fw-bold">( {{ $product->ratingall->count() }} Reviews )</span>
                                            </div> -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-lg-4 -->
                                @endforeach
                            </div><!-- End .row -->
                        </div><!-- End .products -->

                        {{ $products->links('vendor.pagination.bootstrap-5') }}
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="#" wire:click="clearall" class="sidebar-filter-clear">Clean All</a>
                            </div><!-- End .widget widget-clean -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">

                                    Jenis Produk UMKM

                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">

                                            @foreach ($categoriesWithCounts as $categoryId => $category)
                                            <div class="filter-item" wire:key="{{ $categoryId }}">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="{{ $category['slug'] }}" wire:model.live="select_categories" value="{{ $categoryId }}">
                                                    <label class="custom-control-label" for="{{ $category['slug'] }}">{{ $category['name'] }}</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">{{ $category['product_count'] }}</span>
                                            </div><!-- End .filter-item -->
                                            @endforeach





                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

</div>