<div id="main" class="main">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-12">
                        <h5 class="card-title">Ubah Order Status Delivery</h5>
                        <select wire:change="updateStatus" wire:model="selectedstatus" class="form-select" aria-label="Default select example">
                            <option value="baru">Baru</option>
                            <option value="diproses">Diproses</option>
                            <option value="dikirim">Dikirim</option>
                            <option value="selesai">Selesai</option>
                            <option value="dibatalkan">Dibatalkan</option>
                        </select>
                        @error('selectedstatus')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row ">

        <div class="col-md-6">
            <div class="card">
                <div class="d-flex align-items-center ">
                    <div class="p-3">
                        <img src="{{$order->user->avatar_url}}" style="width: 50px;" alt="product">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title pb-0" style="margin-bottom: 0px">CUSTOMER</h5>
                        <div class="d-flex align-items-center justify-content-between">

                            <P class="card-text">{{ $order->user->name }} </P>
                            <p>{{ $order->user->notlpn }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="d-flex align-items-center ">
                    <div class="p-3">
                        <i class='bx bxs-timer text-primary' style="font-size: 50px;"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title pb-0" style="margin-bottom: 0px">ORDER DATE</h5>
                        <P class="card-text">{{$order->created_at->format('d-m-Y')}}</P>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="d-flex align-items-center ">
                    <div class="p-3">
                        <i class='bx bxs-category-alt  text-{{$order->status_color}}' style="font-size: 50px;"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title pb-0" style="margin-bottom: 0px">ORDER STATUS</h5>
                        <p class="card-text text-uppercase badge bg-{{$order->status_color}}">{{$order->status }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="d-flex align-items-center ">
                    <div class="p-3">
                        <i class='bx bx-dollar text-{{$order->payment_status_color}}' style="font-size: 50px;"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title pb-0" style="margin-bottom: 0px">PAYMENT STATUS</h5>
                        <p class="card-text text-uppercase badge bg-{{$order->payment_status_color}}">{{$order->payment_status }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-md-12">

            <div class="card">
                <table class="table ">
                    <tbody>
                        <tr>
                            <td colspan="4" class="p-0" style="border: none;">
                                <table class="table" style="margin-bottom: 0rem;">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                        $grandTotal = 0;
                                        @endphp

                                        @foreach ($order->items as $item)
                                        @php
                                        $grandTotal += $item->total_amount; // Menambah total_amount ke grandTotal
                                        @endphp
                                        <tr>
                                            <td class="">
                                                <div class="d-flex align-items-center ">
                                                    <div class="d">
                                                        <img src="{{ url('storage/products/', $item->product->images) }}" style="width: 50px;" alt="{{ $item->product->images }}">
                                                    </div>
                                                    <div class="px-3">
                                                        <a href="#">{{ $item->product->name }}</a>
                                                    </div>
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col" style="width: auto;">Rp. {{ Number::currency($item->unit_amount, '   ') }}</td>
                                            <td class="text-center">
                                                <span>{{ $item->quantity }}</span>
                                            </td>
                                            <td class="total-col" style="width: auto;">Rp. {{ Number::currency($item->total_amount, '   ') }}</td>
                                        </tr>
                                        @endforeach

                                        <!-- Menampilkan Total Akhir -->
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Total Keseluruhan:</strong></td>
                                            <td class="total-col" style="width: auto;"><strong>Rp. {{ Number::currency($grandTotal, '   ') }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>



                    </tbody>
                </table>
            </div>

        </div>





        <div class="col-md-12">
            <div class="card card-body">
                <h5 class="card-title mb-3 mt-1">Alamat Pengiriman</h5>
                <div class="">
                    <P class="card-text">{{ $order->address->street_order}} , {{ $order->address->province}} , {{ $order->address->city}} , {{ $order->address->subdistrict}} , {{ $order->address->zip_code}}</P>
                    <P class="card-text">
                        <span class="font-semibold">Phone:</span>
                        {{ $order->address->phone}}
                    </P>
                    <P class="card-text">
                        <span class="font-semibold">Nama Pengirim:</span>
                        {{ $order->address->full_name}}
                    </P>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card card-body">
                <h5 class="card-title pb-3">Summary</h5>
                <div class="d-flex justify-content-between">
                    <P class="card-text ">Subtotal</P>
                    <P class="card-text text-dark">Rp. {{ Number::currency($order->grand_total , '   ')}}</P>

                </div>
                <div class="d-flex justify-content-between">
                    <P class="card-text">Ongkir</P>
                    <P class="card-text text-dark">Rp. {{ Number::currency($order->shipping_amont , '   ')}}</P>

                </div>
                <hr>

                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Grand Total</h5>
                    <P class="card-text text-dark">Rp {{ number_format($order->grand_total + $order->shipping_amont, 0, ',', '.') }}</P>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="card-title">NO RESI </h5>
                            <div class="input-group mb-3">
                                <input wire:model="nomorresi" type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" wire:click="simpanresi">SIMPAN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!-- Recent Activity -->
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Traking Pengriman <span>| Jne</span></h5>

                    <div class="activity">
                        @if ($error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                        @else
                        @foreach ($history as $item)
                        <div class="activity-item d-flex">
                            <div class="activite-label pe-2">
                                {{ $item['date'] }}

                            </div>
                            <i class='bi bi-circle-fill activity-badge text-primary align-self-start '></i>
                            <div class="activity-content">
                                {{ $item['desc'] }}
                            </div>
                        </div><!-- End activity item-->
                        @endforeach

                        @endif
                    </div>

                </div>
            </div><!-- End Recent Activity -->
        </div>

    </div>
</div>
</div>
@push('css')
<style>
    /* Activity */
    .activity {
        font-size: 14px;
    }

    .activity .activity-item .activite-label {
        color: #888;
        position: relative;
        flex-shrink: 0;
        flex-grow: 0;
        min-width: 64px;
    }

    .activity .activity-item .activite-label::before {
        content: "";
        position: absolute;
        right: -11px;
        width: 4px;
        top: 0;
        bottom: 0;
        background-color: #eceefe;
    }

    .activity .activity-item .activity-badge {
        margin-top: 3px;
        z-index: 1;
        font-size: 11px;
        line-height: 0;
        border-radius: 50%;
        flex-shrink: 0;
        border: 3px solid #fff;
        flex-grow: 0;
    }

    .activity .activity-item .activity-content {
        padding-left: 10px;
        padding-bottom: 20px;
    }

    .activity .activity-item:first-child .activite-label::before {
        top: 5px;
    }

    .activity .activity-item:last-child .activity-content {
        padding-bottom: 0;
    }
</style>
@endpush
@push('scripts')

<script>
    document.addEventListener('alpine:init', () => {
        Livewire.on('redirectToWhatsApp', waLink => {
            // Buka link di tab baru
            window.open(waLink, '_blank');
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