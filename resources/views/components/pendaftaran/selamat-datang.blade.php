<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-8">
        <div class="card">
            <form action="{{ route('pendaftaran.jenis') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/logoppdb.png') }}" height="50" alt="Logo PPDB">
                    </div>

                    <div class="alert alert-info mt-3">
                        <p class="text-center font-size-14 my-2">Data Calon Peserta Didik Baru untuk Wilayah Kabupaten
                            Cianjur telah terintegrasi dengan Data Pokok Pendidikan. </p>
                        <p class="text-center font-size-14">Sebelum Melanjutkan Proses Pendaftaran silahkan
                            terlebih dahulu <a href="{{ route('cpdb.cetak_akun') }}" target="_blank"><strong>Download
                                    Kartu
                                    Akun</strong></a></p>
                    </div>
                    <div class="alert alert-danger mt-3">
                        <p class="text-center font-size-14 my-2">Calon pendaftar dari MI, <strong>HARAP MEMILIH LUAR KABUPATEN, TIDAK MEMILIH DALAM KABUPATEN!.</strong> meskipun MI dari dalam Kabupaten Cianjur</p>
                    </div>
                    <div class="alert alert-danger mt-3">
                        <p class="text-center font-size-14 my-2">Jenis Pendaftaran <strong>DALAM Kab. Cianjur</strong> sementara belum bisa digunakan karena terjadina Error pada Server Pusat Pemadanan NISN dan NPSN DAPODIK</p>
                    </div>
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ session('error') }}
                        </div>
                    @endif


                    <label for="jenis">Jenis Pendaftaran <span class="text-danger">*</span></label>
                    <div class="form-group flex-md-wrap">
                        <div class="btn-group w-100" role="group"
                             aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="jenis" id="dalam"
                                   value="dalam" {{ old('jenis') == "dalam" ? 'checked' : '' }}>
                            <label class="btn btn-outline-info" for="dalam"><i class="mdi mdi-map-marker-check"></i>
                                Dalam Kab. Cianjur</label>

                            <input type="radio" class="btn-check" name="jenis" id="luar"
                                   value="luar" {{ old('jenis') == "luar" ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="luar"><i class="mdi mdi-map-marker-off"></i>
                                Luar Kab. Cianjur / MI / Manual</label>
                            @error('jenis')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nisn" class="mt-1">NISN <span class="text-danger">*</span></label>
                            <input type="text" class="form-control input-mask @error('nisn')is-invalid @enderror"
                                   id="nisn"
                                   placeholder="NISN" name="nisn" value="{{ old('nisn') }}"
                                   data-inputmask="'mask': '9999999999'" inputmode="text">
                            @error('nisn')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="npsn" class="mt-1">NPSN <span class="text-danger">*</span></label>

                            <input type="text" class="form-control input-mask @error('npsn')is-invalid @enderror"
                                   id="npsn"
                                   placeholder="NPSN" name="npsn" value="{{ old('npsn') }}"
                                   data-inputmask="'mask': '99999999'" inputmode="text">
                            @error('npsn')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-soft-info mt-3" type="submit"><i
                                class="mdi mdi-content-save-cog-outline"></i> Simpan Jenis Pendaftaran
                        </button>
                    </div>


                </div>
            </form>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>

    </div>
</div>

@push('js')
    <script src="{{ asset('assets/libs/inputmask/jquery.inputmask.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".input-mask").inputmask()
        });
  </script>

@endpush


