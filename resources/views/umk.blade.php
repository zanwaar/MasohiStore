<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Terdaftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container py-8">
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
                <input type="text" placeholder="Cari UMKM..." class="pl-8 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Card 1 -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                <div class="p-6">
                    <div class="aspect-video w-full overflow-hidden rounded-lg bg-muted">
                        <img src="https://source.unsplash.com/800x400?store&1" alt="UMKM" class="h-full w-full object-cover transition-transform hover:scale-105">
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold">UMKM 1</h3>
                    <p class="mt-2 text-sm text-muted-foreground">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
                    <div class="mt-4 flex items-center gap-2">
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm text-primary">Makanan</span>
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm text-primary">Jakarta</span>
                    </div>
                </div>
                <div class="p-6">
                    <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full">Kunjungi Toko</button>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                <div class="p-6">
                    <div class="aspect-video w-full overflow-hidden rounded-lg bg-muted">
                        <img src="https://source.unsplash.com/800x400?store&2" alt="UMKM" class="h-full w-full object-cover transition-transform hover:scale-105">
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold">UMKM 2</h3>
                    <p class="mt-2 text-sm text-muted-foreground">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
                    <div class="mt-4 flex items-center gap-2">
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm text-primary">Makanan</span>
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm text-primary">Jakarta</span>
                    </div>
                </div>
                <div class="p-6">
                    <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full">Kunjungi Toko</button>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                <div class="p-6">
                    <div class="aspect-video w-full overflow-hidden rounded-lg bg-muted">
                        <img src="https://source.unsplash.com/800x400?store&3" alt="UMKM" class="h-full w-full object-cover transition-transform hover:scale-105">
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold">UMKM 3</h3>
                    <p class="mt-2 text-sm text-muted-foreground">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
                    <div class="mt-4 flex items-center gap-2">
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm text-primary">Makanan</span>
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm text-primary">Jakarta</span>
                    </div>
                </div>
                <div class="p-6">
                    <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full">Kunjungi Toko</button>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                <div class="p-6">
                    <div class="aspect-video w-full overflow-hidden rounded-lg bg-muted">
                        <img src="https://source.unsplash.com/800x400?store&4" alt="UMKM" class="h-full w-full object-cover transition-transform hover:scale-105">
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold">UMKM 4</h3>
                    <p class="mt-2 text-sm text-muted-foreground">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
                    <div class="mt-4 flex items-center gap-2">
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm text-primary">Makanan</span>
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm text-primary">Jakarta</span>
                    </div>
                </div>
                <div class="p-6">
                    <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full">Kunjungi Toko</button>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                <div class="p-6">
                    <div class="aspect-video w-full overflow-hidden rounded-lg bg-muted">
                        <img src="https://source.unsplash.com/800x400?store&5" alt="UMKM" class="h-full w-full object-cover transition-transform hover:scale-105">
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold">UMKM 5</h3>
                    <p class="mt-2 text-sm text-muted-foreground">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
                    <div class="mt-4 flex items-center gap-2">
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm text-primary">Makanan</span>
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm text-primary">Jakarta</span>
                    </div>
                </div>
                <div class="p-6">
                    <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full">Kunjungi Toko</button>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                <div class="p-6">
                    <div class="aspect-video w-full overflow-hidden rounded-lg bg-muted">
                        <img src="https://source.unsplash.com/800x400?store&6" alt="UMKM" class="h-full w-full object-cover transition-transform hover:scale-105">
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold">UMKM 6</h3>
                    <p class="mt-2 text-sm text-muted-foreground">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
                    <div class="mt-4 flex items-center gap-2">
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm text-primary">Makanan</span>
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm text-primary">Jakarta</span>
                    </div>
                </div>
                <div class="p-6">
                    <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full">Kunjungi Toko</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>