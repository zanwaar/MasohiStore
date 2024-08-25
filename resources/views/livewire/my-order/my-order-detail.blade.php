<div>

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Order Detail<span>My Order</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">My Order</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
        <div class="container ">

            <!-- Recent resi -->

            @if ($order->payment_status === 'menunggu')
            <div class="card card-dashboard">
                <div class="card-body">
                    <h3 class="card-title mb-2  text-muted">INFO PEMBAYARAN </h3>
                    @foreach ($va_numbers as $va)
                    <div class="row no-gutters ">
                        <div class="col-md-4">
                            @if ($va['bank'] == 'bni')

                            <img src="https://cart.hostinger.com/assets/payments/xendit_apm.BNI.svg" alt="briva">
                            @endif
                            @if ($va['bank'] == 'bri')

                            <img src="https://cart.hostinger.com/assets/payments/xendit_apm.BRI.svg" alt="briva">
                            @endif
                            @if ($va['bank'] == 'bca')

                            <img src="https://cart.hostinger.com/assets/payments/xendit_apm.BCA.svg" alt="briva">
                            @endif
                            <p>Segera selesaikan pembayaran untuk memulai proses pengiriman Anda.</p>
                            <p><strong class="mr-2 ">Expiry Time :<span id="countdown"></span> </strong></p>

                        </div>
                        <div class="col-md-8 text-right">
                            <div class="card-body">
                                <!-- <h5 class="card-title">Bank: {{ $va['bank'] }}</h5> -->
                                <p class="card-text h4 text-muted"><strong>VA Number</strong> {{ $va['va_number'] }}</p>
                                <button type="button" class="btn btn-danger " wire:click.prevent="batal('{{$order_id}}')">Batalkan Pemesanan</button>
                            </div>
                        </div>

                    </div>

                    @endforeach

                </div>
            </div>
            @endif



            <div class="row pb-3">
                <div class="col-md-3">
                    <div class="shadow-sm  p-3" style="border-radius: 8px;">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-4">
                                <div class="icon">
                                    <img src="{{$order->user->avatar_url}}" style="width: 50px;" alt="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="info ">
                                    <h5 class="card-title">Penerima</h5>
                                    <P class="card-text">{{ $address->full_name }}</P>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-3">
                    <div class="shadow-sm  p-3" style="border-radius: 8px;">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-4">
                                <div class=" text-center">
                                    <i class='bx bxs-timer text-muted' style="font-size: 50px;"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="info ">
                                    <h5 class="card-title">Tgl Pesanan</h5>
                                    <P class="card-text">{{$order->created_at->format('d-m-Y')}}</P>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-3">
                    <div class="shadow-sm  p-3" style="border-radius: 8px;">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-4">
                                <div class="icon">
                                    <i class='bx bxs-category-alt text-muted' style="font-size: 50px;"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="info ">
                                    <h5 class="card-title">Status Pesanan</h5>
                                    <P class="text-uppercase badge badge-{{$order->status_color}}">{{$order->status }}</P>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-3">
                    <div class="shadow-sm  p-3" style="border-radius: 8px;">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-2">
                                <div class="icon">
                                    <i class='bx bx-dollar text-muted' style="font-size: 50px;"></i>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="info ">
                                    <h5 class="card-title">Status Pembayaran</h5>
                                    <P class="text-uppercase badge badge-{{$order->payment_status_color}}">{{$order->payment_status }}</P>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <div class="row pb-3">
                <div class="col-md-8">
                    <div class="shadow-sm  p-3" style="border-radius: 8px;">
                        <table class="table table-cart table-mobile">
                            <tbody>
                                <tr>
                                    <td colspan="4" class="p-0" style="border: none;">
                                        <table class="table table-cart table-mobile" style="margin-bottom: 0rem;">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($order_items as $item)
                                                <tr>
                                                    <td class="product-col">
                                                        <div class="product">
                                                            <figure class="product-media">
                                                                <a href="#">
                                                                    <img src="{{url ('storage/products/', $item->product->images)}}" alt="{{$item->product->images}}">
                                                                </a>
                                                            </figure>

                                                            <h3 class="product-title">
                                                                <a href="#">{{$item->product->name}}</a>
                                                            </h3><!-- End .product-title -->
                                                        </div><!-- End .product -->
                                                    </td>
                                                    <td class="price-col" style="width: auto;"> Rp. {{ Number::currency($item->unit_amount, '   ')}}</td>
                                                    <td class="text-center">
                                                        <span>{{$item->quantity}}</span>
                                                    </td>
                                                    <td class="total-col" style="width: auto;">Rp. {{ Number::currency($item->total_amount , '   ')}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>



                            </tbody>
                        </table>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="shadow-sm  p-3" style="border-radius: 8px;">
                        <h5 class="card-title pb-3">Summary</h5>
                        <div class="d-flex justify-content-between">
                            <P class="card-text ">Subtotal</P>
                            <P class="card-text text-dark">Rp. {{ Number::currency($order->grand_total , '   ')}}</P>

                        </div>
                        <div class="d-flex justify-content-between">
                            <P class="card-text">Ongkir</P>
                            <P class="card-text text-dark">Rp. {{ Number::currency($order->shipping_amont , '   ')}}</P>

                        </div>
                        <hr>

                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Grand Total</h5>
                            <P class="card-text text-dark">Rp {{ number_format($order->grand_total + $order->shipping_amont, 0, ',', '.') }}</P>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-dashboard">
                <div class="card-body">

                    <h5 class="card-title">Alamat Pengriman </h5>
                    <P class="card-text">{{ $address->street_address}} , {{ $address->province}} , {{ $address->city}} , {{ $address->subdistrict}} , Kode Pos : {{ $address->zip_code}}</P>
                    <h5 class="card-title">Pengriman <span class="">{{$order->shipping_method}}</span> | No Resi : {{$noresi}}</h5>

                    <div class="resi ">
                        @if ($error)
                        <div class="">
                            {{ $error }}
                        </div>
                        @else
                        @foreach ($history as $item)
                        <div class="resi-item d-flex">
                            <div class="-label pe-2">
                                {{ $item['date'] }}

                            </div>
                            <i class='bi bi-circle-fill resi-badge text-primary align-self-start '></i>
                            <div class="resi-content">
                                {{ $item['desc'] }}
                            </div>
                        </div><!-- End resi item-->
                        @endforeach

                        @endif
                    </div>

                </div>
            </div><!-- End Recent resi -->



        </div>
    </main><!-- End .main -->
</div>
@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {

        var expiryTime = new Date(@js($expiryTime)).getTime() - 5000; // Tambahkan 5 detik


        var countdownElement = document.getElementById('countdown');

        var countdownFunction = setInterval(function() {
            var now = new Date().getTime();
            var jakartaOffset = 7 * 60 * 60 * 1000;
            var nowJakarta = now + jakartaOffset;
            var distance = expiryTime - nowJakarta;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownElement.innerHTML = days + " days, " + hours + "h " +
                minutes + "m " + seconds + "s ";

            if (distance < 0) {
                clearInterval(countdownFunction);
                countdownElement.innerHTML = "Expired";
            }
        }, 1000);
    });
</script>
@endpush