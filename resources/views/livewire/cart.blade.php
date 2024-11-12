<div>
    @livewire('header')
    <div class="w-full max-w-[85rem] py-6 px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="container mx-auto px-2 sm:px-4">
            <h1 class="text-xl sm:text-2xl font-semibold mb-4">Keranjang</h1>
            <div class="flex flex-col gap-4">
                <div class="w-full">
                    @foreach ($cart_items_merchant as $cart)
                    <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                        <h3 class="text-base sm:text-lg font-semibold mb-3">{{$cart['merchant_nama']}}</h3>

                        <!-- Mobile View -->
                        <div class="block sm:hidden">
                            @forelse ($cart['items'] as $cart_item)
                            <div class="border-b pb-4 mb-4">
                                <div class="flex items-start gap-3">
                                    <img class="h-20 w-20 object-cover rounded" src="{{url('storage', $cart_item['image'])}}" alt="Product image">
                                    <div class="flex-1">
                                        <h4 class="font-semibold mb-2">{{$cart_item['name']}}</h4>
                                        <p class="text-gray-600 mb-2">Rp. {{ Number::currency($cart_item['unit_amount'], '   ')}}</p>
                                        <div class="flex items-center mb-2">
                                            <button wire:click="decreaseQty({{$cart_item['product_id']}})" class="border rounded-md py-1 px-3">-</button>
                                            <span class="text-center w-8">{{$cart_item['quantity']}}</span>
                                            <button wire:click="increaseQty({{$cart_item['product_id']}})" class="border rounded-md py-1 px-3">+</button>
                                        </div>
                                        <p class="font-semibold">Total: Rp. {{ Number::currency($cart_item['total_amount'], '   ')}}</p>
                                    </div>
                                    <button wire:click="removeItem({{$cart_item['product_id']}})" class="bg-slate-300 border-2 border-slate-400 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white hover:border-red-700">
                                        <span wire:loading.remove wire:target="removeItem({{$cart_item['product_id']}})">X</span>
                                        <span wire:loading wire:target="removeItem({{$cart_item['product_id']}})">Removing...</span>
                                    </button>
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-8">
                                <p class="text-xl sm:text-2xl font-semibold text-slate-500">No Items available in Cart!</p>
                            </div>
                            @endforelse
                        </div>

                        <!-- Desktop View -->
                        <div class="hidden sm:block overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left font-semibold">Product</th>
                                        <th class="text-left font-semibold">Price</th>
                                        <th class="text-left font-semibold">Quantity</th>
                                        <th class="text-left font-semibold">Total</th>
                                        <th class="text-right font-semibold"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cart['items'] as $cart_item)
                                    <tr>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <img class="h-16 w-16 mr-4 object-cover rounded" src="{{url('storage', $cart_item['image'])}}" alt="Product image">
                                                <span class="font-semibold">{{$cart_item['name']}}</span>
                                            </div>
                                        </td>
                                        <td class="py-4">Rp. {{ Number::currency($cart_item['unit_amount'], '   ')}}</td>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <button wire:click="decreaseQty({{$cart_item['product_id']}})" class="border rounded-md py-2 px-4 mr-2">-</button>
                                                <span class="text-center w-8">{{$cart_item['quantity']}}</span>
                                                <button wire:click="increaseQty({{$cart_item['product_id']}})" class="border rounded-md py-2 px-4 ml-2">+</button>
                                            </div>
                                        </td>
                                        <td class="py-4">Rp. {{ Number::currency($cart_item['total_amount'], '   ')}}</td>
                                        <td class="text-right">
                                            <button wire:click="removeItem({{$cart_item['product_id']}})" class="bg-slate-300 border-2 border-slate-400 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white hover:border-red-700">
                                                <span wire:loading.remove wire:target="removeItem({{$cart_item['product_id']}})">X</span>
                                                <span wire:loading wire:target="removeItem({{$cart_item['product_id']}})">Removing...</span>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-2xl sm:text-4xl font-semibold py-4 text-slate-500">No Items available in Cart!</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="flex flex-col sm:flex-row justify-end items-center gap-3 mt-4">
                            <p class="text-base sm:text-lg font-semibold">Total Rp. {{ Number::currency($cart['total_price'], '   ')}}</p>
                            <a href="/checkout/{{$cart['slug']}}" class="w-full sm:w-auto py-2 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 disabled:opacity-50 disabled:pointer-events-none dark:bg-white dark:text-neutral-800">
                                CheckOut
                            </a>
                        </div>
                    </div>
                    <hr class="border-gray-800 dark:border-white mb-4">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>