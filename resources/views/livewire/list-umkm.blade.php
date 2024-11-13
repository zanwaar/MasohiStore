<div>
    @livewire('header')
    <div class="container mx-auto py-8">
        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold">UMKM Terdaftar</h1>
                <p class="text-muted-foreground">Temukan dan dukung UMKM lokal di sekitar Anda</p>
            </div>
            <div class="relative w-full md:w-[300px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-2 top-2.5 h-4 w-4 text-muted-foreground">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input  wire:model.live="searchTerm" type="text" placeholder="Cari UMKM..." class="pl-8 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 ">
            <!-- Card 1 -->
             @foreach ($merchant as $umkm)      
             <div class="lex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                 <div class="p-6">
                     <div class="aspect-video w-full overflow-hidden rounded-lg bg-muted">
                         <img src="{{url ('storage/merchant/', $umkm->merchant_banner)}}" alt="UMKM" class="h-full w-full object-cover transition-transform hover:scale-105">
                     </div>
                 </div>
                 <div class="p-6">
                     <h3 class="text-xl font-bold">{{$umkm->merchant_nama}}</h3>
                     <p class="mt-2 text-sm text-muted-foreground">{{$umkm->merchant_alamat}}</p>
                     <div class="mt-4 flex items-center gap-2">
                         <span class="rounded-full bg-gray-700 px-3 py-1 text-sm text-white">{{$umkm->merchant_jenis}}</span>
                     </div>
                 </div>
                 <div class="p-6">
                     <a  wire:navigate href="/umkm/{{$umkm->slug}}" class="py-3 px-4 inline-flex items-center justify-center  w-full gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-800 text-white hover:bg-teal-900 focus:outline-none focus:bg-teal-900 disabled:opacity-50 disabled:pointer-events-none dark:bg-white dark:text-neutral-800">Kunjungi Umkm</a>
                 </div>
             </div>
             @endforeach

     
        </div>
    </div>
</div>