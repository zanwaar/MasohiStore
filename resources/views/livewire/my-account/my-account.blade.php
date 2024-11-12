<div>
    @livewire('header')
    <div class="flex h-screen p-4">
        <!-- Sidebar -->
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
        <main class="flex-1 px-8">
            <h5 class="text-2xl font-semibold  text-gray-800 mb-2">Profile</h5>
            <div class="p-6 bg-white rounded-lg shadow-lg space-y-6">

                <div class="flex items-start space-x-6">
                    <!-- Avatar Section -->
                    <!-- Preview Image -->

                    <div class="flex justify-center items-center ">
                        @if ($profile_image)
                        <img src="{{ $profile_image->temporaryUrl() }}" alt="Profile Image Preview" class="w-32 h-32 object-cover rounded">
                        @else
                        <img src="{{$modelUser->avatar_url}}" alt="{{$modelUser->avatar_url}}" class="w-32 h-32 object-cover rounded border-2 border-gray-300 mb-4">
                        @endif

                    </div>

                    <!-- Profile Form -->
                    <div class="space-y-6 w-full">
                        <!-- Nama -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" wire:model="name" class="mt-1 p-2 block w-full border border-gray-300 rounded-md @error('name') border-red-500 @enderror" placeholder="Masukan Nama" />
                            @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                            <input type="email" id="email" wire:model="email" class="mt-1 p-2 block w-full border border-gray-300 rounded-md @error('email') border-red-500 @enderror" placeholder="john.doe@example.com" />
                            @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- No Telepon -->
                        <div>
                            <label for="notlpn" class="block text-sm font-medium text-gray-700">No Tlpn</label>
                            <input type="text" id="notlpn" wire:model="notlpn" class="mt-1 p-2 block w-full border border-gray-300 rounded-md @error('notlpn') border-red-500 @enderror" placeholder="No. Telepon" />
                            @error('notlpn')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Profile Image -->
                        <div>
                            <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                            <input type="file" id="profile_image" wire:model="profile_image" class="mt-1 p-2 block w-full text-sm border border-gray-300 rounded-md @error('profile_image') border-red-500 @enderror" />
                            @error('profile_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <!-- Loading Spinner while uploading -->
                            <div wire:loading wire:target="profile_image" class="mt-2 flex justify-center">
                                <div class="animate-spin border-t-2 border-blue-600 w-8 h-8 border-solid rounded-full"></div>
                            </div>

                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-4 flex  space-x-4">
                            <button wire:click="update" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none transition duration-200">Perbarui</button>
                            <button type="reset" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-200 focus:outline-none transition duration-200">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>



    </div>
</div>