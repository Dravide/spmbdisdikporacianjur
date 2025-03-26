<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-8">
        <div class="text-cente mb-3">
            <a href="{{ route('myhome') }}" class="">
                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="" height="70"
                     class="auth-logo logo-dark mx-auto">
                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="" height="70"
                     class="auth-logo logo-light mx-auto">
            </a>
        </div>
        <div class="card">
            <form class="form-horizontal" wire:submit.prevent="login">
                <div class="card-body mt-2">
                    <div class="">
                        <!-- end row -->
                        <h4 class="font-size-24 text-dark text-center fw-bold">LOGIN AKUN</h4>
                        <p class="mb-3 text-center">{{ config('app.name') }}</p>
                        @if(session()->has('jenisDiubah'))
                            <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                {{ session('jenisDiubah') }}
                            </div>
                        @endif

                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label" for="username"><i class="mdi mdi-code-string"></i>
                                        USERNAME / NO. PENDAFTARAN <span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control form-control-lg @error('username')is-invalid @enderror"
                                           id="username"
                                           placeholder="Username / No. Pendaftaran"
                                           wire:model.live="username"
                                           value="{{ old('username') }}">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="userpassword"><i
                                            class="mdi mdi-form-textbox-password"></i> PASSWORD <span
                                            class="text-danger">*</span></label>
                                    <input type="password"
                                           class="form-control form-control-lg @error('password')is-invalid @enderror"
                                           id="userpassword"
                                           placeholder="Password"
                                           wire:model.live="password"
                                    >
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                   id="flexSwitchCheckDefault" onclick="myFunction()">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"><i
                                                    class="mdi mdi-onepassword"></i>
                                                Lihat Password</label>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="text-md-end mt-3 mt-md-0">
                                            <a href="{{ route('lupapassword') }}" class="text-muted"><i
                                                    class="mdi mdi-lock"></i> Lupa
                                                Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mt-2">
                                    <button class="btn btn-lg btn-dark waves-effect waves-light"
                                            type="submit"
                                            wire:loading.attr="disabled"
                                            wire:target="login">
                                        <span wire:loading.remove wire:target="login"><i
                                                class="mdi mdi-login-variant"></i> Login Akun</span>
                                        <span wire:loading wire:target="login">Loading...</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </form>
        </div>

        <div class="mt-2 text-center">
            <p class="text-grey-50 fs-5">Belum Memiliki Akun ? <a wire:navigate href="{{ route('register') }}"
                                                                  class="fw-medium text-dark fw-bold"> Registrasi
                    Akun </a>
            </p>
            <p class="text-grey-50">©
                2025
                Dinas Pendidikan Pemuda dan Olahraga Kab. Cianjur
            </p>
        </div>
    </div>
</div>
