<div class="flex h-screen p-4">
    <aside class="w-64 bg-white border-black rounded-lg">
        <h1 class="p-4 space-y-2 font-semibold">Dashboard</h1>
        <nav class="p-4 space-y-2">
            <!-- Pesanan -->
            <a href="/my-order" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-md bg-gray-100 text-gray-900 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500">
                    <path d="M21 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                    <path d="M3 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                    <path d="M21 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                    <path d="M3 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                    <path d="M10 20a7 7 0 0 0 4-20" />
                    <path d="M10 20A7 7 0 0 1 14 0" />
                    <path d="M10 20a7 7 0 0 0 4 0" />
                </svg>
                Pesanan
            </a>

            <!-- Alamat Pengiriman -->
            <a href="/my-account/alamat" class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <polyline points="9 22 9 12 15 12 15 22" />
                </svg>
                Alamat Pengiriman
            </a>

            <!-- Profile -->
            <a href="/my-account" class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
                Profile
            </a>

            <!-- Password -->
            <a href="my-account/password" class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500">
                    <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
                Password
            </a>
        </nav>
    </aside>


    <!-- Main Content -->
    <main class="flex-1 p-8">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <div class="flex justify-between items-center">
                    <div class="d">
                        <h1 class="text-2xl font-bold text-gray-900">Tabel Pesanan</h1>
                    </div>
                </div>
            </div>

            <div class="">
                <table class="min-w-full table-auto bg-white shadow-md rounded-lg border-separate border-spacing-0">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID Pesanan</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Pengiriman</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status Pesanan</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status Pembayaran</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Jumlah Pesanan</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $order->id }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $order->created_at }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $order->shipping_method }}</td>
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
                            <td class="px-4 py-2 text-sm text-gray-800">Rp {{ number_format($order->grand_total + $order->shipping_amont, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 text-sm text-blue-600 hover:underline">
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
                    </tbody>
                </table>
            </div>




        </div>
    </main>


</div>