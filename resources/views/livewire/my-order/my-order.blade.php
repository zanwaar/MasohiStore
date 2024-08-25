<div>

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">My Order<span>Pesanan</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Account</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="container">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">ID Pesanan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pengiriman</th>
                        <th scope="col">Status Pesanan</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Jumlah Pesanan</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order )
                    <tr class="rounded">
                        <td>{{$order->id}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->shipping_method }}</td>
                        <td><span class="text-uppercase badge badge-{{$order->status_color}}">{{$order->status}} </span></td>
                        <td><span class="text-uppercase badge badge-{{$order->payment_status_color}}">{{$order->payment_status}}</span></td>
                        <td>Rp {{ number_format($order->grand_total + $order->shipping_amont, 0, ',', '.') }}</td>
                        <td><a href="/my-orders/{{$order->id}}" class="">Detail</a></td>
                    </tr>
                    @empty
                    <tr>
                        <th colspan="6" class="text-center">Belum ada Order, silahkan Lakukan Pembelian <a href="/product">Product</a></th>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </main><!-- End .main -->
</div>