<div>
    @livewire('header')
    <div class="flex mt-5">
        <!-- Sidebar -->
        <div class=" min-h-screen   shadow-sm  rounded  border-black">
            <div class="p-2">
                <nav class="space-y-2">
                    <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-100 bg-gray-900 rounded-md">
                        <i class="ri-inbox-line"></i>
                        Pesanan
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-md">
                        <i class="ri-map-pin-line"></i>
                        Alamat
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-md">
                        <i class="ri-user-line"></i>
                        Profile
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-md">
                        <i class="ri-lock-line"></i>
                        Password
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Tabel Pesanan</h1>
            <div class="bg-white shadow-sm rounded-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Pesanan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengiriman</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Pesanan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Pembayaran</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Pesanan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @forelse ($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->created_at }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->shipping_method }}</td>
                            <td class="px-4 py-2 text-sm">
                                <span class="text-uppercase px-2 py-1 rounded-full text-xs font-semibold {{ $order->status_color }} text-white">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-sm">
                                <span class="text-uppercase px-2 py-1 rounded-full text-xs font-semibold {{ $order->payment_status_color }} text-white">
                                    {{ $order->payment_status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp {{ number_format($order->grand_total + $order->shipping_amont, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 hover:text-blue-900">
                                <a href="/my-orders/{{ $order->id }}" class="font-semibold">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-center text-gray-600">
                                Belum ada Order, silahkan Lakukan Pembelian <a href="/product" class="text-blue-500 hover:underline">Product</a>
                            </td>
                        </tr>
                        @endforelse
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>