<div>
    @livewire('header')
    <div class="flex h-screen p-4">

        <!-- Sidebar -->
        <aside class="w-64 bg-white border-black rounded-lg">
            <h1 class="p-4 space-y-2 font-semibold">Dashboard</h1>
            <nav class="p-4 space-y-2">
                <!-- Pesanan -->
                <a href="/my-order" class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100 cursor-pointer">
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
                <a href="/my-account/alamat" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-md bg-gray-100 text-gray-900 cursor-pointer">
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
                            <h1 class="text-2xl font-bold text-gray-900">Alamat Pengirman Tersimpan</h1>
                        </div>
                        <button wire:click="add()" type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Alamat Baru
                            <span wire:loading wire:target="add">
                                <svg class="animate-spin h-5 w-5 text-primary mx-auto mt-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>

                <!-- Metrics Grid -->
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                <table class="min-w-full bg-white rounded-lg shadow-md divide-y divide-gray-200 dark:divide-neutral-700">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Label</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Nama</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Address</th>
                                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                                        @forelse ($alamat as $a )
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{$a->label}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{$a->first_name}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{$a->street_address}} ,{{$a->vaprovince}}, {{$a->vacity}} , {{$a->vasubdistrict}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <!-- Ikon Edit -->
                                                <svg wire:click="edit({{$a}})" xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 text-blue-500 cursor-pointer hover:text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M20.7,7.3l-4-4c-0.4-0.4-1-0.4-1.4,0l-10,10v4c0,0.6,0.4,1,1,1h4l10-10C21.1,8.3,21.1,7.7,20.7,7.3z M5.3,17.7L4,18l0.3-1.3 L14,7l1.3,1.3L5.3,17.7z" />
                                                </svg>
                                                <span class="text-sm text-blue-500 ml-1 cursor-pointer hover:text-blue-700" wire:click="edit({{$a}})">Edit</span>

                                                <!-- Ikon Hapus -->
                                                <svg wire:click="showdelete({{$a}})" xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 text-red-500 cursor-pointer hover:text-red-700 ml-3" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M6,19c0,1.1,0.9,2,2,2h8c1.1,0,2-0.9,2-2V7H6V19z M8.5,17.5C8.2,17.5,8,17.3,8,17V9c0-0.3,0.2-0.5,0.5-0.5S9,8.7,9,9v8 C9,17.3,8.8,17.5,8.5,17.5z M12,17.5c-0.3,0-0.5-0.2-0.5-0.5V9c0-0.3,0.2-0.5,0.5-0.5s0.5,0.2,0.5,0.5v8C12.5,17.3,12.3,17.5,12,17.5 z M15.5,17.5c-0.3,0-0.5-0.2-0.5-0.5V9c0-0.3,0.2-0.5,0.5-0.5s0.5,0.2,0.5,0.5v8C16,17.3,15.8,17.5,15.5,17.5z M15,4l-1-1h-4 l-1,1H5v2h14V4H15z" />
                                                </svg>
                                                <span class="text-sm text-red-500 ml-1 cursor-pointer hover:text-red-700" wire:click="showdelete({{$a}})">Hapus</span>

                                                <!-- Spinner Loading saat "edit" atau "showdelete" aktif -->
                                                <div class="" wire:loading wire:target="edit, showdelete">
                                                    <svg class="animate-spin h-5 w-5 text-primary mx-auto mt-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                                    </svg>
                                                </div>
                                            </td>

                                        </tr>
                                        @empty
                                        <tr>
                                            <th colspan="8" class="text-center py-3 text-gray-600">Belum ada Alamat Yang Tersimpan</th>
                                        </tr>
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div wire:ignore.self id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50">
                    <!-- Tambahkan kelas max-w-3xl untuk membuat modal lebih lebar -->
                    <form wire:submit.prevent="save" class="bg-white w-full max-w-3xl rounded-lg shadow-lg p-6 overflow-y-auto max-h-screen">
                        <div class="modal-header mb-4">
                            <h2 class="text-2xl font-semibold text-gray-800">Alamat Pengiriman Baru</h2>
                        </div>

                        <!-- Batasi tinggi modal-body untuk scroll -->
                        <div class="modal-body max-h-[70vh] overflow-y-auto pr-2">
                            <!-- Form Fields -->
                            <div class="space-y-4">
                                <!-- Label -->
                                <div>
                                    <label class="block text-gray-700">Label *</label>
                                    <input type="text" wire:model="label" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Label">
                                    @error('label')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nama Depan & Belakang -->
                                <div class="flex space-x-4">
                                    <div class="w-1/2">
                                        <label class="block text-gray-700">Nama Depan Penerima *</label>
                                        <input type="text" wire:model="first_name" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Nama Depan">
                                        @error('first_name')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-1/2">
                                        <label class="block text-gray-700">Nama Belakang Penerima *</label>
                                        <input type="text" wire:model="last_name" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Nama Belakang">
                                        @error('last_name')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>




                                <!-- Alamat Lengkap -->
                                <div>
                                    <label class="block text-gray-700">Alamat Lengkap *</label>
                                    <input type="text" wire:model="street_address" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Alamat Lengkap">
                                    @error('street_address')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nama Depan & Belakang -->
                                <div class="flex space-x-4">
                                    <div class="w-1/2">
                                        <label class="block text-gray-700">Zip Code *</label>
                                        <input type="text" wire:model="zip_code" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Zip Code">
                                        @error('zip_code')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-1/2">
                                        <label class="block text-gray-700">Phone *</label>
                                        <input type="text" wire:model="phone" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Phone">
                                        @error('phone')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <!-- Provinsi -->
                                <div>
                                    <label class="block text-gray-700">Provinsi *</label>
                                    <select wire:model="selectedProvince" wire:change="fetchCities" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach($provinces as $province)
                                        <option value="{{ $province['province_id'] }}|{{ $province['province'] }}">{{ $province['province'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedProvince')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Kota -->
                                @if(!empty($cities))
                                <div>
                                    <label class="block text-gray-700">Kota *</label>
                                    <select wire:model="selectedCity" wire:change="fetchSubdistricts" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option value="">Pilih Kota</option>
                                        @foreach($cities as $city)
                                        <option value="{{ $city['city_id'] }}|{{ $city['city_name'] }}">{{ $city['city_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedCity')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                <!-- Kecamatan -->
                                @if(!empty($subdistricts))
                                <div>
                                    <label class="block text-gray-700">Kecamatan *</label>
                                    <select wire:model="selectedSubdistrict" wire:change="fetchVillages" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach($subdistricts as $subdistrict)
                                        <option value="{{ $subdistrict['subdistrict_id'] }}|{{ $subdistrict['subdistrict_name'] }}">{{ $subdistrict['subdistrict_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedSubdistrict')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                <div wire:loading>
                                    <svg class="animate-spin h-5 w-5 text-primary mx-auto mt-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                    </svg>
                                </div>

                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer mt-6 flex justify-end space-x-4">
                            <button type="button" wire:click="close" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Tutup</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg" wire:loading.attr="disabled">Simpan</button>
                        </div>
                    </form>
                </div>



                <!-- Modal -->


                <!-- Modal Delete -->
                <div wire:ignore.self id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50">
                    <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
                        <!-- Modal Content -->
                        <p class="text-center text-gray-800 text-lg">Apakah Benar Anda ingin Hapus Data Ini?</p>

                        <!-- Modal Footer -->
                        <div class="flex justify-center space-x-4 mt-5">
                            <!-- Tombol Close -->
                            <button type="button" class="btn btn-secondary w-full bg-gray-500 text-white py-2 rounded-lg" onclick="closeModal()">
                                Close
                            </button>

                            <!-- Tombol Delete -->
                            <button wire:click="delete" class="btn btn-danger w-full bg-red-500 text-white py-2 rounded-lg" wire:loading.attr="disabled">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@push('scripts')
<script>
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        document.getElementById('deleteModal').classList.add('hidden');
    }
    window.addEventListener('DOMContentLoaded', function() {

        window.addEventListener("show", function() {
            document.getElementById('modal').classList.remove('hidden');
        });

        window.addEventListener("hide", function() {
            document.getElementById('modal').classList.add('hidden');
            document.getElementById('deleteModal').classList.add('hidden');
        });
        window.addEventListener("show-delete", function() {
            document.getElementById('deleteModal').classList.remove('hidden');
        });
    });
</script>
@endpush