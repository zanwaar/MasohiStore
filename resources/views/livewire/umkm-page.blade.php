<div>
    <main class="main">
        <div class="justify-content-center d-flex bg-primary">
            <img src="{{url ('storage/merchant/', $umkm->merchant_banner)}}" alt="Product image" width="100%" style="height: 350px; " class="">
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">UMKM</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> {{$umkm->merchant_nama}}</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">


                        <div class="products mb-3">
                            @foreach ($products as $product)


                            <div class="product product-list">
                                <div class="row">
                                    <div class="col-6 col-lg-3">
                                        <figure class="product-media">
                                            <!-- <span class="product-label label-new">New</span> -->
                                            <a href="product.html">
                                                <img src="{{ $product->images_url }}" alt="Product image" class="product-image">
                                            </a>
                                        </figure><!-- End .product-media -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                    <div class="col-6 col-lg-3 order-lg-last">
                                        <div class="product-list-action">


                                            <div class="product-action">
                                            </div><!-- End .product-action -->

                                        </div><!-- End .product-list-action -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                    <div class="col-lg-6">
                                        <div class="product-body product-action-inner">
                                            <div class="product-cat">
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="/products/{{$product->slug}}">{{$product->name}}</a></h3>
                                            <div class="product-content">
                                                <div class="">
                                                    <div class="product-price"> Rp. {{ Number::currency($product->price, '   ')}}
                                                    </div><!-- End .product-price -->
                                                    <div class="D">
                                                        <a href="" wire:click.prevent="addToCart({{$product->id}})" class="btn btn-primary"><span>add to cart</span></a>

                                                    </div>

                                                </div><!-- End .product-list-action -->
                                            </div><!-- End .product-content -->


                                        </div><!-- End .product-body -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .product -->


                            @endforeach

                        </div><!-- End .products -->

                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="d-flex align-items-center justify-content-center">

                                <img src="{{url ('storage/merchant/', $umkm->merchant_foto)}}" width="200px" alt="Product image" style="border-radius: 50%;" class="">
                            </div>
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title text-center">
                                    {{$umkm->merchant_nama}}
                                </h3><!-- End .widget-title -->
                                <ul>
                                    <li>
                                        <p class="font-weight-bold">Alamat :</p>
                                        <p>{{$umkm->merchant_alamat}}</p>
                                    </li>
                                    <li>
                                        <p class="font-weight-bold">No Tlpn :</p>
                                        <p>{{$umkm->owner_no_hp}}</p>
                                    </li>
                                </ul>
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

</div>