<div>

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">My Account<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="container">
            <ul class="nav nav-pills justify-content-center mb-3">
                <li class="nav-item">
                    <a class="nav-link " href="{{route('my.account')}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('my.password')}}">Passwoord</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('my.alamat')}}">Alamat</a>
                </li>
            </ul>
            <div class="flex">
                <button type="button" wire:click="add()" class="btn btn-primary">
                    Alamat Baru
                </button>
                <div class="" wire:loading wire:target="add">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>

            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Label</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Provinsi</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alamat as $a )
                    <tr class="rounded">
                        <td>{{$a->label}}</td>
                        <td>{{$a->first_name}}</td>
                        <td>{{$a->phone}}</td>
                        <td>{{$a->street_address}}</td>
                        <td>{{$a->vaprovince}}</td>
                        <td>{{$a->vacity}}</td>
                        <td>{{$a->vasubdistrict}}</td>
                        <td class="text-center">
                            <i wire:click="edit({{$a}})" class='bx bx-edit text-info' style="font-size: 22px;"></i>
                            <i wire:click="showdelete({{$a}})" class='bx bx-trash-alt text-danger' style="font-size: 22px;"></i>
                            <div class="" wire:loading wire:target="edit, showdelete">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th colspan="8" class="text-center">Belum ada Alamat Yang Tersimpan</th>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>


    </main><!-- End .main -->
    <!-- Modal -->
    <!-- Modal HTML -->
    <div wire:ignore.self class="modal fade" id="add" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <form wire:submit.prevent="save">


                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="checkout-title">Alamat Pengiriman Baru</h2><!-- End .checkout-title -->
                    </div>
                    <div class="modal-body">
                        <div class="p-4">
                            <label>Label *</label>
                            <input type="text" wire:model="label" class="form-control @error('label') is-invalid @enderror">
                            @error('label')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Nama Depan Penerima *</label>
                                    <input type="text" wire:model="first_name" class="form-control @error('first_name') is-invalid @enderror">
                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Nama Belakang Penerima*</label>
                                    <input type="text" wire:model="last_name" class="form-control @error('last_name') is-invalid @enderror">
                                    @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->


                            <label>Phone *</label>
                            <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label>Alamat Lengkap *</label>
                            <input type="text" wire:model="street_address" class="form-control @error('street_address') is-invalid @enderror" placeholder="">
                            @error('street_address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="row">
                                <div class="col-sm-12">

                                    <label>Zip Code *</label>
                                    <input type="text" wire:model="zip_code" class="form-control @error('zip_code') is-invalid @enderror">
                                    @error('zip_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <!-- Provinsi -->
                                <div class="col-sm-12">


                                    <label for="province">
                                        @if ($mod)
                                        Update Provinsi
                                        @else
                                        Pilih Provinsi
                                        @endif


                                    </label>
                                    <select id="province" class="form-control @error('selectedProvince') is-invalid @enderror" wire:model="selectedProvince" wire:change="fetchCities">

                                        <option value=""> @if ($mod)
                                            Update Provinsi
                                            @else
                                            Pilih Provinsi
                                            @endif</option>
                                        @foreach($provinces as $province)
                                        <option value="{{ $province['province_id'] }}|{{ $province['province'] }}">{{ $province['province'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedProvince')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @if ($mod)

                                    @endif
                                    @if ($mod)
                                    <label for="province" class="px-2">
                                        <span class="font-weight-bold ">Provinsi : {{$vaProvince}}, <br>Kota: {{$vaCity}} , <br>Kecamatan :{{$vaSubdistrict}}</span>
                                    </label>
                                    @endif

                                </div>


                                <!-- Kota -->
                                @if(!empty($cities))
                                <div class="col-sm-12">
                                    <label for="city">Pilih Kota</label>
                                    <select id="city" class="form-control  @error('selectedCity') is-invalid @enderror" wire:model="selectedCity" wire:change="fetchSubdistricts">
                                        <option value="">Pilih Kota</option>
                                        @foreach($cities as $city)
                                        <option value="{{ $city['city_id'] }}|{{ $city['city_name'] }}">{{ $city['city_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedCity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                @endif

                                <!-- Kecamatan -->
                                @if(!empty($subdistricts))
                                <div class="col-sm-12">
                                    <label for="subdistrict">Pilih Kecamatan</label>
                                    <select id="subdistrict" class="form-control  @error('selectedSubdistrict') is-invalid @enderror" wire:model="selectedSubdistrict" wire:change="fetchVillages">
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach($subdistricts as $subdistrict)
                                        <option value="{{ $subdistrict['subdistrict_id'] }}|{{ $subdistrict['subdistrict_name'] }}">{{ $subdistrict['subdistrict_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedSubdistrict')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                @endif

                                <div class="col-sm-12" wire:loading>
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End .col-lg-9 -->

                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary me-2"
                            wire:loading.attr="disabled" wire:target="save">
                            Simpan
                        </button>

                        <button type="button" class="btn btn-secondary" wire:click="close">Tutup</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <i class='menu-icon tf-icons bx bx-trash-alt mb-3' style="font-size: 33px;"></i>
                    <p>Apakah Benar Anda ingin Hapus Data Ini?</p>
                    <div class="row py-5">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary w-100 dz-block" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-6">
                            <button wire:click="delete" class="btn btn-danger w-100 dz-block"
                                wire:loading.attr="disabled" wire:target="delete">
                                Delete
                            </button>


                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    window.addEventListener("hide", function(event) {
        $('#add').modal('hide')
        $('#delete').modal('hide')
    });
    window.addEventListener("show-delete", function(event) {
        $('#delete').modal('show')

    });
    window.addEventListener("show", function(event) {

        $('#add').modal('show')
    });
</script>
@endpush