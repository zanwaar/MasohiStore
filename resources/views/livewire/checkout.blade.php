<div>

    <div class="w-full max-w-7xl mx-auto p-4 sm:p-6">
        <form wire:submit.prevent="placeOrder">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Left Section - Shipping Address -->
                <div class="w-full lg:w-2/3">
                    <h2 class="text-lg font-medium text-gray-700 mb-4">Alamat Pengiriman</h2>

                    <!-- Address Selector -->
                    <div class="mb-6">
                        <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            <option selected disabled>Pilih Alamat Pengiriman</option>
                            @foreach($alamat as $alamatItem)
                            <option value="{{ $alamatItem->id }}">{{ $alamatItem->label }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if (!empty($state_alamat))
                    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                        <h3 class="text-lg font-medium text-gray-800 mb-4">Alamat Pengiriman ({{ $state_alamat['label'] }})</h3>
                        <div class="flex items-start justify-between text-gray-600 mb-4">
                            <p>{{ $state_alamat['first_name'] }} {{ $state_alamat['last_name'] }}<br>
                                {{ $state_alamat['phone'] }}<br>
                                {{ $state_alamat['street_address'] }}<br>
                                <strong>{{ $state_alamat['vaprovince'] }}, {{ $state_alamat['vacity'] }}, {{ $state_alamat['vasubdistrict'] }}</strong><br>
                                {{ auth()->user()->email }}<br>
                            </p>
                            <a href="/my-account/alamat" class="text-orange-500 hover:text-orange-600 font-medium">
                                Alamat baru
                            </a>
                        </div>
                    </div>

                    <!-- Address Selector -->
                    <div class="mb-6 mt-5">
                        <select wire:model="selectedCourier" wire:change="calculateShippingCost" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            <option value="">Pilih Kurir</option>
                            @foreach($courierOptions as $courier)
                            <option value="{{ $courier }}">{{ strtoupper($courier) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div wire:loading wire:target="calculateShippingCost">
                        <svg class="animate-spin h-5 w-5 text-primary mx-auto mt-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
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

                    @else

                    <p class="">Silakan pilih alamat dan kurir untuk melihat ongkos kirim.</p>
                    @endif

                    @error('selectedShippingService')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                    @enderror
                    @else
                    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                        <h3 class="text-lg font-medium text-gray-800 mb-4">Alamat Pengiriman</h3>
                        <div class="flex items-center justify-between text-gray-600 mb-4">
                            <span>Belum ada Alamat Yang Tersimpan</span>
                            <a href="/my-account/alamat" class="text-orange-500 hover:text-orange-600 font-medium">
                                Tambah Alamat
                            </a>
                        </div>
                    </div>
                    @endif

                </div>

                <!-- Right Section - Order Summary -->
                <div class="w-full lg:w-1/3">
                    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                        <h2 class="text-lg font-medium text-gray-800 mb-4">Pesanan Kamu</h2>

                        <!-- Product List -->
                        <div class="mb-6">
                            <div class="flex justify-between text-sm text-gray-600 mb-2">
                                <span>Product</span>
                                <div class="flex gap-8">
                                    <span>Qty</span>
                                    <span>Total</span>
                                </div>
                            </div>


                            @foreach ($cart_items_merchant as $ci )
                            @foreach ($ci['items'] as $cart_item )
                            <!-- Product Item -->
                            <div class="flex justify-between py-3 border-b border-gray-200">
                                <span class="text-gray-800">{{ $cart_item['name']}}</span>
                                <div class="flex gap-8">
                                    <span class="text-gray-600">{{ $cart_item['quantity']}}</span>
                                    <span class="text-gray-800">Rp {{ number_format($cart_item['total_amount'], 0, ',', '.') }}</span>
                                </div>
                            </div>
                            @endforeach
                            <!-- Order Summary -->
                            <div class="space-y-3 mt-4">
                                <div class="flex justify-between text-gray-600">
                                    <span>total:</span>
                                    <span>Rp {{ number_format($ci['total_price'], 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-gray-600">
                                    <span>Ongkos Kirim:</span>
                                    <span>Rp {{ number_format($finalShippingCost, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-gray-800 font-medium">
                                    <span>Subtotal:</span>
                                    <span>Rp {{ number_format($ci['total_price'] + $finalShippingCost, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Payment Methods -->
                        <div class="mb-6">
                            <h3 class="text-gray-800 font-medium mb-4">Bank Transfer</h3>
                            <div class="space-y-3">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="payment" class="w-4 h-4 text-orange-500 focus:ring-orange-500" id="bri" wire:model="banktransfer" value="bri">
                                    <span class="text-gray-700">BRI Virtual Account</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="payment" class="w-4 h-4 text-orange-500 focus:ring-orange-500" wire:model="banktransfer" value="bni">
                                    <span class="text-gray-700">BNI Virtual Account</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="payment" class="w-4 h-4 text-orange-500 focus:ring-orange-500" wire:model="banktransfer" value="bca">
                                    <span class="text-gray-700">BCA Virtual Account</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="payment" class="w-4 h-4 text-orange-500 focus:ring-orange-500" wire:model="banktransfer" value="cimb">
                                    <span class="text-gray-700">CIMB Virtual Account</span>
                                </label>
                            </div>
                            @error('banktransfer')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Order Button -->
                        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 rounded-lg transition-colors">
                            <span wire:loading.remove wire:target="placeOrder"> Order Sekarang</span>
                            <!-- <span class="btn-hover-text">Proceed to Checkout</span> -->
                            <span wire:loading wire:target="placeOrder"> Processing....</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!-- Modal -->
    <div wire:ignore.self id="orderResponseModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden" aria-labelledby="orderResponseModalLabel" aria-hidden="true">
        <div class="bg-white rounded-lg shadow-lg max-w-lg w-full mx-4">
            <!-- Modal Header -->
            <div class="p-4 border-b border-gray-200">
                <h5 class="text-lg font-semibold text-gray-800" id="orderResponseModalLabel">PEMBAYARAN</h5>
            </div>

            <!-- Modal Body -->
            <div class="p-4 space-y-4">
                @foreach ($va_numbers as $va)
                <div class="flex items-center justify-between">
                    <div class="flex-shrink-0">
                        @if ($va['bank'] == 'bni')
                        <img src="https://cart.hostinger.com/assets/payments/xendit_apm.BNI.svg" alt="BNI" class="h-8">
                        @elseif ($va['bank'] == 'bri')
                        <img src="https://cart.hostinger.com/assets/payments/xendit_apm.BRI.svg" alt="BRI" class="h-8">
                        @elseif ($va['bank'] == 'bca')
                        <img src="https://cart.hostinger.com/assets/payments/xendit_apm.BCA.svg" alt="BCA" class="h-8">
                        @endif
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-600 font-semibold">VA Number</p>
                        <p class="text-lg font-bold text-gray-800">{{ $va['va_number'] }}</p>
                    </div>
                </div>
                <p class="text-gray-700 text-sm mt-2">Segera selesaikan pembayaran untuk memulai proses pengiriman Anda.</p>
                <p class="text-gray-700 font-medium">Expiry Time: <span id="countdown" class="font-bold text-red-600"></span></p>
                @endforeach
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end p-4 border-t border-gray-200">
                <button wire:click.prevent="batal('{{$order_id}}')" class="px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Batalkan Order</button>
                <a href="/my-orders/{{$order_id}}" class="ml-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">Lihat Detail Order</a>
            </div>
        </div>
    </div>

</div>
@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.addEventListener("cekorder", function(event) {
            // Show the modal
            document.getElementById("orderResponseModal").classList.remove("hidden");

            // Get expiry time from event detail
            var expiryTimeStr = event.detail[0].expiryTime;
            const expiryTime = new Date(expiryTimeStr).getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = expiryTime - now;

                if (distance > 0) {
                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    document.getElementById('countdown').innerHTML =
                        `${days}d ${hours}h ${minutes}m ${seconds}s`;
                } else {
                    document.getElementById('countdown').innerHTML = 'Expired';
                    clearInterval(timer);
                }
            }

            // Update the countdown every second
            const timer = setInterval(updateCountdown, 1000);
        });

        window.addEventListener("batalorder", function() {
            document.getElementById("orderResponseModal").classList.add("hidden");
        });

    });
</script>
@endpush