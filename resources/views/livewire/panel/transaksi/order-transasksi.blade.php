<div id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ORDER TRANSAKSI</h5>
            <ul>

            </ul>

            <!-- Display pagination links -->
            {{ $orders->links() }}

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Pemgriman</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order )
                    <tr class="rounded">
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->payment_method}}</td>
                        <td><span class="text-uppercase badge bg-{{$order->status_color}}">{{$order->status}} </span></td>
                        <td><span class="text-uppercase badge bg-{{$order->payment_status_color}}">{{$order->payment_status}}</span></td>

                        <td>{{$order->created_at}}</td>
                        <td><a href="{{ route('merchant.transaksi.detail', ['orderID' => $order->id]) }}" class="">Detail</a></td>

                    </tr>
                    @empty
                    <tr>
                        <th colspan="6" class="text-center">Belum ada Order</th>
                    </tr>
                    @endforelse


                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLabel">DETAIL TRANSAKSI</h5>
                    <button type="button" class="btn-close" wire:click="close" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">
                    <button wire:click="save" class="btn btn-primary me-2"
                        wire:loading.attr="disabled" wire:target="images, save">
                        Save changes
                    </button>

                    <button type="button" class="btn btn-secondary" wire:click="close">Close</button>
                    <!-- Optional: Indikator loading -->
                    <div wire:loading wire:target="images" class="spinner-border spinner-border-sm text-primary" role="status">
                        <span class="sr-only">Loading...</span>
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
    window.addEventListener("hide", function(event) {
        modal.hide()
    });
    window.addEventListener("show", function(event) {
        modal.show()

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