<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-8">
        <div class="text-center mb-3">
            <a href="{{ route('myhome') }}" class="">
                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="" height="70"
                     class="auth-logo logo-dark mx-auto">
                <img src="{{ asset('assets/images/logoppdb.png') }}" alt="" height="70"
                     class="auth-logo logo-light mx-auto">
            </a>
        </div>
        <div class="card">
            <div class="card-body mt-2">
                <h4 class="font-size-24 text-dark text-center fw-bold">REGISTRASI AKUN</h4>
                <p class="mb-3 text-center">{{ config('app.name') }}</p>
                <div class="row">
                    <form wire:submit.prevent="submit" method="POST" id="pendaftaran">
                        @csrf
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label class="form-label" for="username"><i class="mdi mdi-code-string"></i>
                                    USERNAME / NO. PENDAFTARAN </label>
                                <input type="text"
                                       class="form-control form-control-lg @error('username') is-invalid @enderror"
                                       id="username"
                                       wire:model="username"
                                       value="{{ old('username') ? old('username') : $username  }}"
                                       readonly>
                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label" for="userpassword"><i
                                        class="mdi mdi-form-textbox-password"></i> PASSWORD <span
                                        class="text-danger">*</span></label>
                                <input type="password"
                                       class="form-control form-control-lg @error('password') is-invalid @enderror"
                                       id="userpassword"
                                       placeholder="Password"
                                       wire:model.defer="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="confirm_userpassword"><i
                                        class="mdi mdi-ticket-confirmation-outline"></i> KONFIRMASI
                                    PASSWORD <span
                                        class="text-danger">*</span></label>
                                <input type="password"
                                       class="form-control form-control-lg @error('confirm_password') is-invalid @enderror"
                                       id="confirm_userpassword"
                                       placeholder="Konfirmasi Password"
                                       wire:model.defer="confirm_password">
                                @error('confirm_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <!-- Captcha Field -->
                            <div class="mb-4" wire:key="captcha-container">
                                <label class="form-label" for="captcha"><i class="mdi mdi-shield-check"></i> CAPTCHA <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="captcha">
                                            <span id="captcha-img" wire:ignore>{!! captcha_img('math') !!}</span>
                                            <button type="button" class="btn btn-sm btn-dark" id="reload-captcha" wire:click.prevent="refreshCaptcha">
                                                <i class="mdi mdi-refresh"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" id="captcha" 
                                               class="form-control form-control-lg @error('captcha') is-invalid @enderror" 
                                               placeholder="Masukkan Captcha" 
                                               wire:model.defer="captcha">
                                        @error('captcha')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <button
                                    class="btn btn-lg btn-dark waves-effect waves-light"
                                    type="submit"
                                    id="btnSubmit"><i
                                        class="mdi mdi-account-plus"></i>
                                    Registrasi Akun
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-2 text-center">
            <p class="text-grey-50 fs-5 ">Sudah Memiliki Akun ? <a wire:navigate href="{{ route('login') }}"
                                                                   class="fw-medium text-dark fw-bold"> Login
                    Akun </a>
            </p>
            <p class="text-grey-50">©
                2025
                Dinas Pendidikan Pemuda dan Olahraga Kab. Cianjur
            </p>
        </div>
    </div>
</div>

@push('script')
<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('refreshCaptcha', () => {
            fetch('/auth/reload-captcha')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('captcha-img').innerHTML = data.captcha;
                });
        });
    });
</script>
@endpush
