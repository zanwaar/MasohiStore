<div>

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">My Account<span>Password</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">My Account</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Password</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="container">
            <ul class="nav nav-pills justify-content-center mb-3">
                <li class="nav-item">
                    <a class="nav-link " href="{{route('my.account')}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('my.password')}}">Passwoord</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('my.alamat')}}">Alamat</a>
                </li>
            </ul>
            <div class="shadow p-4 mb-3">
                <h5>Password</h5>
                <form wire:submit.prevent="updatePassword" class="">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input wire:model="current_password" id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror">
                        @error('current_password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input wire:model="new_password" id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror">
                        @error('new_password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input wire:model="new_password_confirmation" id="new_password_confirmation" type="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </div>

    </main><!-- End .main -->

</div>
@push('scripts')

@endpush