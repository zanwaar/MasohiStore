<div>
    @livewire('header')
    <!-- Bagian Banner -->
    <section class="relative">
        <img src="{{url ('storage/merchant/', $umkm->merchant_banner)}}" alt="Banner {{$umkm->merchant_nama}}" class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="text-center text-white">
                <!-- <h2 class="text-4xl font-bold mb-4">UMKM {{$umkm->merchant_nama}}</h2> -->
            </div>
        </div>
    </section>

    <!-- Bagian Produk -->
    <section id="produk" class="container mx-auto py-16">
        <h2 class="text-3xl font-bold text-center mb-12">List Produk {{$umkm->merchant_nama}}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">


            @foreach ($products as $product)
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="p-4">
                    <div class="aspect-square w-full overflow-hidden rounded-lg bg-gray-100">
                        <img src="{{ $product->images_url }}" alt="Product" class="h-full w-full object-cover transition-transform hover:scale-105">
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

        <div id="tentang" class=" bg-white rounded-lg shadow-md p-6 mt-5">
            <img src="{{url ('storage/merchant/', $umkm->merchant_foto)}}" alt="Logo  {{$umkm->merchant_nama}}" class="w-32 h-32 mx-auto mb-4">
            <h2 class="text-2xl font-bold text-center mb-4"> {{$umkm->merchant_nama}}</h2>
            <!-- <p class="text-gray-600 mb-4 text-center">Produsen VCO berkualitas tinggi dari Desa Yainuelo</p> -->
            <div id="kontak" class="mt-6">
                <h3 class="text-xl font-semibold mb-2">Kontak Kami</h3>
                <p class="text-gray-600"><strong>Alamat:</strong><br>
                    {{$umkm->merchant_alamat}}
                <p class="text-gray-600 mt-2"><strong>No. Telepon:</strong><br>
                    {{$umkm->owner_no_hp}}
                </p>
            </div>
        </div>
    </section>
</div>