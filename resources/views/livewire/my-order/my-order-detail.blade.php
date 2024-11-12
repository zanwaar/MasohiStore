<div>

    @livewire('header')


    <div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-lg my-8">
        <!-- Header Section -->
        @if ($order->payment_status === 'menunggu')
        <div class="bg-white shadow-md rounded-lg p-6 mx-auto mb-3">
            <div class="flex items-center gap-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600">
                    <path d="M12 22c-4.97 0-9-2.239-9-5s4.03-5 9-5 9 2.239 9 5-4.03 5-9 5z" />
                    <path d="M12 12c-4.97 0-9-2.239-9-5s4.03-5 9-5 9 2.239 9 5-4.03 5-9 5z" />
                    <path d="M12 7c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z" />
                </svg>
                <h1 class="text-2xl font-bold text-gray-800">INFO PEMBAYARAN</h1>
            </div>
            @foreach ($va_numbers as $va)
            <div class="flex items-start justify-between border-b border-gray-200 pb-4 mb-4">
                <div class="flex items-center space-x-4">
                    <!-- Bank Logo -->
                    @if ($va['bank'] == 'bni')
                    <img src="https://cart.hostinger.com/assets/payments/xendit_apm.BNI.svg" alt="BNI">
                    @elseif ($va['bank'] == 'bri')
                    <img src="https://cart.hostinger.com/assets/payments/xendit_apm.BRI.svg" alt="BRI">
                    @elseif ($va['bank'] == 'bca')
                    <img src="https://cart.hostinger.com/assets/payments/xendit_apm.BCA.svg" alt="BCA">
                    @endif
                    <div>
                        <p class="text-gray-600 text-sm">Segera selesaikan pembayaran untuk memulai proses pengiriman Anda.</p>
                        <p class="text-gray-600 font-semibold mt-1"><i class="fas fa-clock text-red-600"></i> Expiry Time: <span id="countdown" class="text-red-600 font-bold"></span></p>
                    </div>
                </div>

                <!-- VA Number and Actions -->
                <div class="text-right space-y-2">
                    <p class="text-lg font-semibold text-gray-800"> <i class="fas fa-credit-card text-blue-600"></i> VA Number: {{ $va['va_number'] }}</p>
                    <button
                        type="button"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition"
                        wire:click.prevent="batal('{{ $order_id }}')">
                        Batalkan Pemesanan
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        @endif


        <!-- Order Info Card -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4 mb-6">
            <h2 class="text-lg font-semibold mb-3">Informasi Pesanan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600">Penerima: <span class="font-medium text-gray-800">{{ $address->full_name }}</span></p>
                    <p class="text-gray-600">Tgl Pesanan: <span class="font-medium text-gray-800">{{$order->created_at->format('d-m-Y')}}</span></p>
                </div>
                <div>
                    <p class="text-gray-600">Status Pesanan: <span class="font-medium text-blue-600">{{$order->status }}</span></p>
                    <p class="text-gray-600">Status Pembayaran: <span class="font-medium text-yellow-600">{{$order->payment_status }}</span></p>
                </div>
            </div>
        </div>
        <!-- Product Details -->
        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <h2 class="text-lg font-semibold mb-3 flex items-center gap-2">
                <i class="fas fa-box text-gray-600"></i>
                Detail Produk
            </h2>
            @foreach ($order_items as $item)

            <div class="flex items-center gap-4">
                <img src="/placeholder.svg?height=80&width=80" alt="Sambal Sedap" class="w-20 h-20 object-cover rounded-md">
                <div class="flex-grow">
                    <h3 class="font-medium text-gray-800">{{$item->product->name}}</h3>
                    <p class="text-sm text-gray-600">Rp. {{ Number::currency($item->unit_amount, '   ')}} <span>x {{$item->quantity}}</span></p>
                    <!-- <p class="text-sm text-gray-600"></p> -->
                </div>
                <div class="text-right">
                    <!-- <p class="font-medium">Rp. {{ Number::currency($item->unit_amount, '   ')}}</p> -->
                    <p class="font-medium ">Rp. {{ Number::currency($item->total_amount , '   ')}}</p>
                </div>
            </div>
            @endforeach
        </div>


        <!-- Payment Summary -->
        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <h2 class="text-lg font-semibold mb-3">Ringkasan Pembayaran</h2>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">Subtotal</span>
                    <span>Rp. {{ Number::currency($order->grand_total , '   ')}}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Ongkir</span>
                    <span>Rp. {{ Number::currency($order->shipping_amont , '   ')}}</span>
                </div>
                <div class="flex justify-between font-bold pt-2 border-t">
                    <span>Grand Total</span>
                    <span>Rp {{ number_format($order->grand_total + $order->shipping_amont, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Shipping Address -->
        <div class="bg-gray-50 p-4 rounded-lg">
            <h2 class="text-lg font-semibold mb-3 flex items-center gap-2">
                <i class="fas fa-map-marker-alt text-gray-600"></i>
                Alamat Pengiriman
            </h2>
            <p class="text-gray-700 mb-4">
                {{ $address->street_address}} , {{ $address->province}} , {{ $address->city}} , {{ $address->subdistrict}} , <br> Kode Pos : {{ $address->zip_code}}
            </p>
            <div class="flex items-center gap-2">
                <i class="fas fa-truck text-gray-600"></i>
                <span class="text-gray-600">Layanan: Reguler</span>
                <span class="text-gray-600 ml-4">No Resi: -</span>
            </div>
            <!-- Timeline -->
            <div class="mt-4">
                @if ($error)
                <div class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="">
                    {{ $error }}
                </div>
                @else
                @foreach ($history as $item)
                <!-- Item -->
                <div class="flex gap-x-3">
                    <!-- Left Content -->
                    <div class="w-16 text-end">
                        <span class="text-xs text-gray-500 dark:text-neutral-400"> {{ $item['date'] }}</span>
                    </div>
                    <!-- End Left Content -->

                    <!-- Icon -->
                    <div class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                        <div class="relative z-10 size-7 flex justify-center items-center">
                            <div class="size-2 rounded-full bg-gray-400 dark:bg-neutral-600"></div>
                        </div>
                    </div>
                    <!-- End Icon -->

                    <!-- Right Content -->
                    <div class="grow pt-0.5 pb-8">

                        <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                            {{ $item['desc'] }}
                        </p>

                    </div>
                    <!-- End Right Content -->
                </div>
                @endforeach

                @endif
                <!-- End Item -->
            </div>
            <!-- End Timeline -->
        </div>
    </div>

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