<div>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Pengiriraman<span></span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengiriraman</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <form wire:submit.prevent="placeOrder">
                        <div class="row">
                            <div class="col-lg-7">
                                <h2 class="checkout-title">
                                    <a href="{{url('my-account/alamat')}}"> Alamat Pengiriman</a>
                                </h2>
                                <div class="d-flex">
                                    <div class="w-100">
                                        <select class="form-control @error('selectedAlamat') is-invalid @enderror" wire:model="selectedAlamat" wire:change="fetchAlamatDetails">
                                            <option value="">Pilih Alamat Pengiriman</option>
                                            @foreach($alamat as $alamatItem)
                                            <option value="{{ $alamatItem->id }}">{{ $alamatItem->label }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedAlamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                @if (!empty($state_alamat))
                                <div class="card card-dashboard">
                                    <div class="card-body">
                                        <h3 class="card-title">Alamat Pengiriman <span>({{ $state_alamat['label'] }}) <div class="" wire:loading wire:target="fetchAlamatDetails">
                                                    <div class="spinner-border text-primary" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                </div></span></h3>
                                        <p>{{ $state_alamat['first_name'] }} {{ $state_alamat['last_name'] }}<br>
                                            {{ $state_alamat['phone'] }}<br>
                                            {{ $state_alamat['street_address'] }}<br>
                                            <strong>{{ $state_alamat['vaprovince'] }}, {{ $state_alamat['vacity'] }}, {{ $state_alamat['vasubdistrict'] }}</strong><br>
                                            {{ auth()->user()->email }}<br>
                                        </p>
                                    </div>
                                </div>
                                <div class="card card-dashboard">
                                    <div class="card-body">
                                        <h3 class="card-title mb-2">Kurir Pengiriman </h3>
                                        <div class="d-flex">
                                            <div class="w-100">
                                                <select class="form-control @error('selectedCourier') is-invalid @enderror" wire:model="selectedCourier" wire:change="calculateShippingCost">
                                                    <option value="">Pilih Kurir</option>
                                                    @foreach($courierOptions as $courier)
                                                    <option value="{{ $courier }}">{{ strtoupper($courier) }}</option>
                                                    @endforeach
                                                </select>
                                                @error('selectedCourier')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="" wire:loading wire:target="calculateShippingCost">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        @if (!empty($shippingCost))
                                        <h3 class="card-title mb-2">Pilih Opsi Pengiriman:</h3>
                                        <ul>
                                            @foreach ($shippingCost as $result)
                                            <li>
                                                <strong>{{ strtoupper($result['code']) }} - {{ $result['name'] }}</strong>
                                                <ul>
                                                    @foreach ($result['costs'] as $cost)
                                                    <li>
                                                        <input type="radio" wire:click="selectShippingService('{{ $cost['description'] }}', {{ $cost['cost'][0]['value'] }})" name="shipping_option" value="{{ $cost['service'] }}">
                                                        {{ $cost['service'] }} - Rp{{ number_format($cost['cost'][0]['value'], 0, ',', '.') }} ({{ $cost['cost'][0]['etd'] }} hari)
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                            @endforeach
                                        </ul>
                                        @error('selectedShippingService')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        @else
                                        <p class="">Silakan pilih alamat dan kurir untuk melihat ongkos kirim.</p>
                                        @endif
                                    </div>
                                </div>




                                @else
                                <div class="card card-dashboard">
                                    <div class="card-body">
                                        <h3 class="card-title">Alamat Pengiriman</h3>
                                        <p colspan="8" class=" mt-2">Belum ada Alamat Yang Tersimpan <a href="/my-account/alamat">Tambah Alamat</a></p>
                                    </div>
                                </div>
                                @endif






                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-5">
                                <div class="summary">
                                    <h3 class="summary-title">Pesanan Kamu</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th class="text-center">Qty</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($cart_items_merchant as $ci )
                                            @foreach ($ci['items'] as $cart_item )
                                            <tr>
                                                <td><a href="#">{{ $cart_item['name']}} </a></td>
                                                <td class="text-center">{{ $cart_item['quantity']}}</td>
                                                <td>Rp {{ number_format($cart_item['total_amount'], 0, ',', '.') }}</td>

                                            </tr>
                                            @endforeach
                                            <tr class="summary-subtotal">
                                                <td>total:</td>
                                                <td colspan="2">Rp {{ number_format($ci['total_price'], 0, ',', '.') }}</td>
                                            </tr><!-- End .summary-subtotal -->
                                            <tr class="summary-subtotal">
                                                <td>Ongkos Kirim:</td>
                                                <td colspan="2">Rp {{ number_format($finalShippingCost, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td colspan="2">Rp {{ number_format($ci['total_price'] + $finalShippingCost, 0, ',', '.') }}</td>
                                            </tr><!-- End .summary-subtotal -->
                                            @endforeach



                                        </tbody>
                                    </table><!-- End .table table-summary -->


                                    <p class="h6 mt-3">Bank Transfer</p>
                                    <div class="d-flex flex-column mb-1">
                                        <div class="">
                                            <input class="" type="radio" name="exampleRadios" id="bri" wire:model="banktransfer" value="bri">
                                            <label class="form-check-label" for="bri">
                                                BRI Virtual Account
                                            </label>
                                        </div>
                                        <div class="">
                                            <input class="" type="radio" name="exampleRadios" id="bni" wire:model="banktransfer" value="bni">
                                            <label class="form-check-label" for="bni">
                                                BNI Virtual Account
                                            </label>
                                        </div>
                                        <div class="">
                                            <input class="" type="radio" name="exampleRadios" id="bca" wire:model="banktransfer" value="bca">
                                            <label class="form-check-label" for="bca">
                                                BCA Virtual Account
                                            </label>
                                        </div>
                                        <div class="">
                                            <input class="" type="radio" name="exampleRadios" id="cimb" wire:model="banktransfer" value="cimb">
                                            <label class="form-check-label" for="cimb">
                                                CIMB Virtual Account
                                            </label>
                                        </div>
                                        @error('banktransfer')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span wire:loading.remove wire:target="placeOrder"> Order Sekarang</span>
                                        <!-- <span class="btn-hover-text">Proceed to Checkout</span> -->
                                        <span wire:loading wire:target="placeOrder"> Processing....</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

    <!-- Modal HTML -->
    <div wire:ignore.self class="modal fade" id="orderResponseModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="orderResponseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderResponseModalLabel">PEMBAYARAN</h5>
                </div>
                <div class="modal-body p-3">
                    @foreach ($va_numbers as $va)
                    <div class="row no-gutters text-right">
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
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <!-- <h5 class="card-title">Bank: {{ $va['bank'] }}</h5> -->
                                <p class="card-text h4 text-muted"><strong>VA Number</strong> {{ $va['va_number'] }}</p>
                            </div>
                        </div>
                        <p>Segera selesaikan pembayaran untuk memulai proses pengiriman Anda.</p>
                    </div>
                    <p><strong class="mr-2 ">Expiry Time :<span id="countdown"></span> </strong></p>

                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " wire:click.prevent="batal('{{$order_id}}')">Batalkan Order</button>
                    <a class="btn btn-primary" href="/my-orders/{{$order_id}}">Lihat Detail Order</a>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')

<script>
    Livewire.on('cekorder', () => {
        $('#orderResponseModal').modal('show')
    });
    Livewire.on('batalorder', () => {
        $('#orderResponseModal').modal('hide')
    });
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