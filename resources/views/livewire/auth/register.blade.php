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
                            {{--                                    <div class="mb-4">--}}
                            {{--                                        <label class="form-label" for="useremail">Email <span--}}
                            {{--                                                class="text-danger">*</span></label>--}}
                            {{--                                        <input type="email"--}}
                            {{--                                               class="form-control @error('email') is-invalid @enderror"--}}
                            {{--                                               id="useremail"--}}
                            {{--                                               placeholder="Masukan Email"--}}
                            {{--                                               name="email"--}}
                            {{--                                               value="{{ old('email')  }}">--}}
                            {{--                                        @error('email')--}}
                            {{--                                        <div class="invalid-feedback">--}}
                            {{--                                            {{ $message }}--}}
                            {{--                                        </div>--}}
                            {{--                                        @enderror--}}
                            {{--                                    </div>--}}
                            <div class="mb-4">
                                <label class="form-label" for="userpassword"><i
                                        class="mdi mdi-form-textbox-password"></i> PASSWORD <span
                                        class="text-danger">*</span></label>
                                <input type="password"
                                       class="form-control form-control-lg @error('password') is-invalid @enderror"
                                       id="userpassword"
                                       placeholder="Password"
                                       wire:model.live.debounce="password">
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
                                       wire:model.live.debounce="confirm_password">
                                @error('confirm_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            @error('captchaToken')
                            {{-- Error capture if captcha is invalid --}}
                            <div class="mb-4 align-content-center">
                                {{ $message }}
                            </div>
                            @enderror

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
{{--@push('script')--}}
{{--    <script--}}
{{--        src="https://www.google.com/recaptcha/api.js?render={{ config('services.google_captcha.site_key') }}"--}}
{{--        data-navigate-once></script>--}}
{{--    <script data-navigate-once>--}}
{{--        document.addEventListener('livewire:navigated', () => {--}}
{{--            function handle(e) {--}}
{{--                grecaptcha.ready(function () {--}}
{{--                    grecaptcha.execute('{{ config('services.google_captcha.site_key') }}', {action: 'submit'})--}}
{{--                        .then(function (token) {--}}
{{--                            @this.--}}
{{--                            set('captchaToken', token);--}}
{{--                            @this.--}}
{{--                            submit()--}}
{{--                        });--}}
{{--                })--}}
{{--            }--}}
{{--        })--}}

{{--    </script>--}}
{{--@endpush--}}
