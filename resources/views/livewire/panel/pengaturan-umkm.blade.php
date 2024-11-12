<div id="main" class="main">
    <div class="card">
        <h5 class="card-header">Banner</h5>
        <div class="justify-content-center d-flex bg-info">
            @if ($banner && in_array($banner->getMimeType(), ['image/jpeg', 'image/png', 'image/gif', 'image/bmp']))
            <img src="{{ $banner->temporaryUrl() }}" width="100%" style="height: 350px; " class="">
            @else
            <img src="{{url ('storage/merchant/', $merchant_banner)}}" alt="Banner image" width="100%" style="height: 350px; " class="">
            @endif
        </div><!-- End .page-header -->

    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-header text-center">logo </h5>
                    <div class="d-flex align-items-center justify-content-center ">
                        @if ($logo && in_array($logo->getMimeType(), ['image/jpeg', 'image/png', 'image/gif', 'image/bmp']))
                        <img src="{{ $logo->temporaryUrl() }}" width="200px" alt="Logo image" class="">
                        @else
                        <img src="{{url ('storage/merchant/', $merchant_foto)}}" width="200px" alt="Logo image" class="">
                        @endif

                    </div>


                </div>
                <div class="col-md-9">
                    <h5 class="card-header">Setting UMKM </h5>
                    <div class="row card-body pt-2">
                        <div class="col-md-7 col-lg-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Umkm</label>
                                <input type="hidden" id="merchant_id" wire:model="merchant_id" class="form-control @error('merchant_id') is-invalid @enderror" placeholder="Masukan Nama" />
                                <input type="text" id="merchant_nama" wire:model="merchant_nama" class="form-control @error('merchant_nama') is-invalid @enderror" />
                                @error('merchant_nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-12">
                            <div class="mb-3">
                                <label for="merchant_alamat" class="form-label">Alamat Umkm</label>
                                <input type="text" id="merchant_alamat" wire:model="merchant_alamat" class="form-control @error('merchant_alamat') is-invalid @enderror" />
                                @error('merchant_alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-12">
                            <div class="mb-3">
                                <label for="owner_no_hp" class="form-label">NO Tlpn Umkm</label>
                                <input type="text" id="owner_no_hp" wire:model="owner_no_hp" class="form-control @error('owner_no_hp') is-invalid @enderror">
                                @error('owner_no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-12">
                            <div class="mb-3">
                                <label for="logo" class="form-label">Merchant Logo</label>
                                <input type="file" id="owner_no_hp" wire:model="logo" class="form-control @error('logo') is-invalid @enderror" />
                                @error('logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-12">
                            <div class="mb-3">
                                <label for="banner" class="form-label">Merchant Banner</label>
                                <input type="file" id="owner_no_hp" wire:model="banner" class="form-control @error('banner') is-invalid @enderror" />
                                @error('banner')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>





                        <div class="mt-2">
                            <button wire:click="save" class="btn btn-primary me-2"
                                wire:loading.attr="disabled" wire:target="logo, banner, save">
                                Saved
                            </button>


                            <button type="reset" class="btn btn-outline-secondary">Batal</button>
                            <!-- Optional: Indikator loading -->
                            <div wire:loading wire:target="logo, banner" class="spinner-border spinner-border-sm text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

@push('scripts')


@endpush


@push('body')
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="ds/img/logo.png" alt="">
            <span class="d-none d-lg-block">UMKM-MASOHI</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">


            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                   
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->name}}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{auth()->user()->name}}</h6>
                        <span>UMKM</span>
                    </li>


                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
@livewire('panel.components.aside')

@endpush