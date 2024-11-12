<div id="main" class="main">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">

                <h5 class="card-title">

                    <button type="button" wire:click="add()" class="btn btn-primary">
                        TAMBAH PRODUCT
                    </button>




                </h5>
                <data value="">

                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31">
                            <i class="bx bx-search"></i>
                        </span>
                        <input wire:model.live="searchTerm" type="text" class="form-control no-border" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" />
                    </div>

                </data>
            </div>
            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Harga</th>
                        <th class="text-center">Is active </th>
                        <th class="text-center">In stock </th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)

                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{url ('storage/products/', $product->images)}}" alt class="me-2" style="width: 45px" height="40px" />
                                {{$product->name}}

                            </div>
                        </td>
                        <td class="">
                            <p>Rp. {{ Number::currency($product->price, '   ')}}</p>
                        </td>
                        <td class="text-center"><i class='{{$product->is_active ? "bx bx-check-circle text-success" : "bx bx-x-circle text-danger"}}' style="font-size: 22px;"></i></td>
                        <td class="text-center"><i class='{{$product->in_stock ? "bx bx-check-circle text-success" : "bx bx-x-circle text-danger"}}' style="font-size: 22px;"></i></td>
                        <td class="text-center">
                            <i wire:click="edit({{$product}})" class='bx bx-edit text-info' style="font-size: 22px;"></i>
                            <i wire:click="showdelete({{$product}})" class='bx bx-trash-alt text-danger' style="font-size: 22px;"></i>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLabel">{{$titlemodal}}</h5>
                    <button type="button" class="btn-close" wire:click="close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Nama Product</label>
                                    <input type="text" id="name" wire:model="name" class="form-control @error('name') is-invalid @enderror" />
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Harga</label>
                                    <input type="text" id="price" wire:model.lazy="price" class="form-control @error('price') is-invalid @enderror" />
                                    @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Foto Product</label>
                                    <input type="file" wire:model="images" class="form-control @error('images') is-invalid @enderror" />
                                    @error('images')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea rows="3" id="description" wire:model="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                                    @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="d-flex ">

                                        <div class="form-check form-switch me-2">
                                            <input class="form-check-input" wire:model="is_active" type="checkbox" id="flexSwitchCheckChecked">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Is Active</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" wire:model="in_stock" type="checkbox" id="flexSwitchCheckChecked">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">In Stok</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button wire:click="save" class="btn btn-primary me-2"
                        wire:loading.attr="disabled" wire:target="images, save">
                        Save changes
                    </button>

                    <button type="button" class="btn btn-secondary" wire:click="close">Close</button>
                    <!-- Optional: Indikator loading -->
                    <div wire:loading wire:target="images" class="spinner-border spinner-border-sm text-primary" role="status">
                        <span class="sr-only"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="delete" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <i class='menu-icon tf-icons bx bx-trash-alt mb-3' style="font-size: 33px;"></i>
                    <p>Apakah Benar Anda ingin Hapus Data Ini?</p>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-secondary w-100 dz-block" data-bs-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                        <div class="col-6">
                            <button wire:click="delete" class="btn btn-danger w-100 dz-block"
                                wire:loading.attr="disabled" wire:target="images, save">
                                Delete
                                <div wire:loading wire:target="images" class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </button>


                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@push('scripts')
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var modal = new bootstrap.Modal(document.getElementById('add'), {
        backdrop: 'static',
        keyboard: false
    });
    var modaldelte = new bootstrap.Modal(document.getElementById('delete'), {
        backdrop: 'static',
        keyboard: false
    });
    window.addEventListener("hide", function(event) {
        modal.hide()
        modaldelte.hide()
    });
    window.addEventListener("show-delete", function(event) {
        modaldelte.show()

    });
    window.addEventListener("show", function(event) {
        modal.show()

    });
    document.addEventListener('DOMContentLoaded', function() {
        const priceInput = document.getElementById('price');

        priceInput.addEventListener('input', function(e) {
            let value = e.target.value;

            // Menghapus karakter yang bukan angka dan koma
            value = value.replace(/[^0-9,]/g, '');

            // Menggunakan regex untuk format uang
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            e.target.value = value;

            // Mengupdate Livewire model dengan nilai tanpa format
            @this.set('price', value.replace(/\./g, ''));
        });

        // Untuk mengatur nilai awal
        priceInput.addEventListener('blur', function(e) {
            let value = e.target.value;

            if (value) {
                // Menghapus karakter yang bukan angka dan koma
                value = value.replace(/[^0-9,]/g, '');

                // Menggunakan regex untuk format uang
                value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                e.target.value = value;
            }
        });
    });
</script>
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