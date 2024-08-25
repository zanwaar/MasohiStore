<div>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$type}}</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
            <div class="container">
                <div class="form-box">
                    @if (session('error'))
                    <div class="text-danger text-center" role="alert">
                        {{ session('error')}}
                    </div>
                    @endif
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{$type == 'login' ? 'active' : ''}}" wire:click.prevent="types('login')" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{$type == 'register' ? 'active' : ''}}" wire:click.prevent="types('register')" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade {{$type == 'login' ? 'show active' : ''}}" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                <form wire:submit.prevent="save">
                                    <div class="form-group">
                                        <label for="register-email-2">Your email address *</label>
                                        <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="register-email-2" name="register-email">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password-2">Password *</label>
                                        <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" id="register-password-2" name="register-password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                            <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="/forgot" class="forgot-link">Forgot Your Password?</a>
                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade {{$type == 'register' ? 'show active' : ''}}" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                <form wire:submit.prevent="save">
                                    <div class="form-group">
                                        <label for="username">UserName *</label>
                                        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="username" name="username">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="username">No Tlpn *</label>
                                        <input type="text" wire:model="notlpn" class="form-control @error('notlpn') is-invalid @enderror" id="notlpn" name="notlpn">
                                        @error('notlpn')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-email-2">Your email address *</label>
                                        <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="register-email-2" name="register-email">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password-2">Password *</label>
                                        <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" id="register-password-2" name="register-password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-footer ">
                                        <button type="submit" class="btn btn-outline-primary-2 " style="width: 100%;">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                    </div><!-- End .form-footer -->
                                </form>

                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->

</div>