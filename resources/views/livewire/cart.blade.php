<div>
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Keranjang<span></span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">

                        <table class="table table-cart table-mobile">
                            <tbody>
                                @foreach ($cart_items_merchant as $cart )

                                <tr>
                                    <td colspan="4" class="p-0 " style="border: none;">Umkm <strong>{{$cart['merchant_nama']}}</strong> </td>
                                </tr>

                                <tr>
                                    <td colspan="4" class="p-0" style="border: none;">
                                        <table class="table table-cart table-mobile" style="margin-bottom: 0rem;">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($cart['items'] as $cart_item )
                                                <tr>
                                                    <td class="product-col">
                                                        <div class="product">
                                                            <figure class="product-media">
                                                                <a href="#">
                                                                    <img src="{{url ('storage/products/', $cart_item['image'])}}" alt="{{$cart_item['image']}}">
                                                                </a>
                                                            </figure>

                                                            <h3 class="product-title">
                                                                <a href="#">{{$cart_item['name']}}</a>
                                                            </h3><!-- End .product-title -->
                                                        </div><!-- End .product -->
                                                    </td>
                                                    <td class="price-col" style="width: auto;"> Rp. {{ Number::currency($cart_item['unit_amount'], '   ')}}</td>
                                                    <td class="">
                                                        <a wire:click="decreaseQty({{$cart_item['product_id']}})" class="social-icon" style="display: inline-grid !important">-</a>
                                                        <span class="mr-3 ml-2">{{$cart_item['quantity']}}</span>

                                                        <a wire:click="increaseQty({{$cart_item['product_id']}})" class="social-icon" style="display: inline-grid !important">+</a>

                                                    </td>
                                                    <td class="total-col" style="width: auto;">Rp. {{ Number::currency($cart_item['total_amount'] , '   ')}}</td>
                                                    <td class="remove-col"><button wire:click="removeItem({{$cart_item['product_id']}})" class="social-icon bg-danger text-white border-0" style="display: inline-grid !important"><i class="icon-close"></i></button></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr style=" background-color: #f9f9f9;">
                                    <td colspan="4">

                                        <div class="d-flex align-items-end  justify-content-between px-4 flex-column">
                                            <p class="price-col" style="width: auto;">Total Rp. {{ Number::currency($cart['total_price'], '   ')}}</p>
                                            <div>

                                                <a href="/checkout/{{$cart['slug']}}" class="btn btn-primary btn-order btn-block">CheckOut </a>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                </tr>


                                @endforeach


                            </tbody>
                        </table>

                    </div><!-- End .col-lg-9 -->

                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</div>