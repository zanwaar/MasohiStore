<div>

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">My Account<span></span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="container">
            <ul class="nav nav-pills justify-content-center mb-3">
                <li class="nav-item">
                    <a class="nav-link active " href="{{route('my.account')}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('my.password')}}">Passwoord</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('my.alamat')}}">Alamat</a>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <div class="rounded bg-white ">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class=" mb-3 shadow p-4">
                                    <div class="row g-0">
                                        <div class="col-md-3 ">
                                            <div class="position-relative text-center">
                                                <img src="{{$modelUser->avatar_url}}"  alt="{{$modelUser->avatar_url}}">
                                                <button wire:click="add()" type="button" style="left: -10px; top: -10px" class="position-absolute  badge badge-pill badge-primary">
                                                    <span class="tf-icons  bx bx-edit-alt" style="font-size: 16px;"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-9 ">
                                            <div class="">
                                                <h5>Profile</h5>
                                                <div class="">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" id="name" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama" />
                                                    @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input placeholder="john.doe@example.com" type="text" id="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" />
                                                    @error('email')
                                                    <div class=" invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="">
                                                    <label for="notlpn" class="form-label">No Tlpn</label>
                                                    <input type="text" id="notlpn" wire:model="notlpn" class="form-control @error('notlpn') is-invalid @enderror" placeholder="" />
                                                    @error('notlpn')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mt-2">
                                                    <button wire:click="update" class="btn btn-primary ">Perbarui</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Batal</button>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

    </main><!-- End .main -->


    <div wire:ignore.self class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageLabel">FOTO PROFILE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <livewire:dropzone wire:model="image" :rules="['image','mimes:png,jpeg','max:10420']" :key="'dropzone-two'" />
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="updateProfile" class="btn btn-primary"
                        wire:loading.attr="disabled" {{-- Disabled saat sedang loading --}}
                        :disabled="$uploading">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Livewire.on('show', () => {
            $('#image').modal('show')
        });
        Livewire.on('hide', () => {
            $('#image').modal('hide')
        });
    });
</script>
@endpush