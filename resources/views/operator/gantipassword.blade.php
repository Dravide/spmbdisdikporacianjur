<x-operator.apps>
    <div class="row align-items-center">
        <div class="col-md-6 text-center">
            <img src="{{asset('assets/images/operator/credential.png')}}" class="w-75 img-fluid">

        </div>
        <div class="col-md-6">
            <h2>Ganti Password</h2>
            <form method="POST" action="{{route('operator.post-ganti-password')}}">
                @csrf
            <div>
                <div class="mb-3 row">
                    <label for="example-password-input" class="col-md-12 col-form-label">Password Baru</label>
                    <div class="col-md-12">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="example-password-input1">
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}

                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-password-input" class="col-md-12 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-md-12">
                        <input class="form-control @error('confirm_password') is-invalid @enderror" type="password" name="confirm_password" id="example-password-input2">
                        @error('confirm_password')
                        <div class="invalid-feedback">
                            {{$message}}

                        </div>
                        @enderror
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-6">
                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-danger w-100">Batal</a>
                </div>

                <div class="col-6">
                    <button class="btn btn-primary w-100">Ganti!</button>
                </div>

            </div>
            </form>


        </div>

    </div>


</x-operator.apps>
