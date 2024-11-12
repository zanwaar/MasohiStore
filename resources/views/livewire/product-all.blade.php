<div>
    @livewire('header')
    <div class="container mx-auto py-8">
        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold">Produk UMKM</h1>
                <p class="text-gray-600">Temukan produk berkualitas dari UMKM Indonesia</p>
            </div>
            <div class="flex gap-4">
                <div class="relative flex-1 md:w-[300px]">
                    <i class="fas fa-search absolute left-2 top-2.5 h-4 w-4 text-gray-400"></i>
                    <input type="text" placeholder="Cari produk..." class="search-input p-2 w-full rounded-md">
                </div>
                <div class="select-wrapper">
                    <select class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <option value="newest">Terbaru</option>
                        <option value="price-low">Harga Terendah</option>
                        <option value="price-high">Harga Tertinggi</option>
                        <option value="popular">Terpopuler</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">


            @foreach ($products as $product)
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="p-4">
                    <div class="aspect-square w-full overflow-hidden rounded-lg bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80" alt="Product" class="h-full w-full object-cover transition-transform hover:scale-105">
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-bold line-clamp-2">{{$product->name}}</h3>
                    <p class="mt-2 text-sm text-gray-600">{{$product->merchant->merchant_nama}}</p>
                    <p class="mt-2 text-lg font-bold"> Rp. {{ Number::currency($product->price, '   ')}}</p>
                </div>
                <div class="p-4 pt-0">
                    <button type="button" wire:click.prevent="addToCart({{$product->id}})" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 disabled:opacity-50 disabled:pointer-events-none dark:bg-white dark:text-neutral-800">Tambah ke Keranjang</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>