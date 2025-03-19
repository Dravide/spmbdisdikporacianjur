<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-8">
        <div class="card">
            <form action="{{ route('pendaftaran.jenis') }}" method="POST">
                @csrf
                <div class="card-body">
                    <h4 class="font-size-24 text-dark text-center fw-bold">CEK NISN</h4>
                    <p class="mb-3 text-center">{{ config('app.name') }}</p>
                    <div class="alert alert-dark     mt-3">

                        <p class="text-center font-size-16 my-2 fw-bold">Data Calon Peserta Didik Baru untuk Wilayah Kabupaten
                            Cianjur telah terintegrasi dengan Data Pokok Pendidikan (DAPODIK)</p>
                        <p class="text-center font-size-14">Sebelum Melanjutkan Proses Pendaftaran silahkan
                            terlebih dahulu <a class="text-dark" href="{{ route('cpdb.cetak_akun') }}" target="_blank"><strong>Download
                                    Kartu
                                    Akun</strong></a></p>
                    </div>
                    <div class="alert alert-dark mt-3">
                        <p class="text-center font-size-14 my-2">Calon pendaftar dari MI, <strong>HARAP MEMILIH JENIS PENDAFTARAN LUAR KABUPATEN CIANJUR</strong></p>
                    </div>
{{--                    <div class="alert alert-danger mt-3">--}}
{{--                        <p class="text-center font-size-14 my-2">Jenis Pendaftaran <strong>DALAM Kab. Cianjur</strong> sementara belum bisa digunakan karena terjadina Error pada Server Pusat Pemadanan NISN dan NPSN DAPODIK</p>--}}
{{--                    </div>--}}
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ session('error') }}
                        </div>
                    @endif


                    <label for="jenis">JENIS PENDAFTARAN <span class="text-danger">*</span></label>
                    <div class="form-group flex-md-wrap">
                        <div class="btn-group w-100" role="group"
                             aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check btn-check-lg" name="jenis" id="dalam"
                                   value="dalam" {{ old('jenis') == "dalam" ? 'checked' : '' }}>
                            <label class="btn btn-outline-dark" for="dalam"><i class="mdi mdi-map-marker-check"></i>
                                SD Dalam Kab. Cianjur</label>

                            <input type="radio" class="btn-check btn-check-lg" name="jenis" id="luar"
                                   value="luar" {{ old('jenis') == "luar" ? 'checked' : '' }}>
                            <label class="btn btn-outline-dark" for="luar"><i class="mdi mdi-map-marker-off"></i>
                                SD Luar Kab. Cianjur / MI / Manual</label>
                            @error('jenis')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nisn" class="mt-1">NISN <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg text-center input-mask @error('nisn')is-invalid @enderror"
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

                            <input type="text" class="form-control form-control-lg text-center input-mask @error('npsn')is-invalid @enderror"
                                   id="npsn"
                                   placeholder="NPSN" name="npsn" value="{{ old('npsn') }}"
                                   data-inputmask="'mask': '99999999'" inputmode="text">
                            @error('npsn')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-lg btn-dark mt-3 w-100" type="submit" ><i
                                class="mdi mdi-content-save-cog-outline"></i> CEK NISN
                        </button>


                    </div>


                </div>
            </form>
            <!--<div class="card-body">-->
            <!--    <div class="alert alert-danger">-->
            <!--            <p class="text-center font-size-14 my-2">Pendafatar MI dan terlanjur input jenis Pendaftaran Dalam Kabupaten? Reset disini!</p>-->
            <!--            <p class="text-center font-size-14 my-2"><strong>Fitur dalam proses pengembangan. Hubungi Admin!</strong></p>-->
            <!--        </div>-->
            <!--        <form method="POST" action="{{route('pendaftaran.beranda2post')}}">-->
            <!--            @csrf-->
            <!--            <label for="nisn" class="mt-1">NISN <span class="text-danger">*</span></label>-->
            <!--                <input type="text" class="form-control input-mask @error('nisn')is-invalid @enderror"-->
            <!--                       id="nisn"-->
            <!--                       placeholder="NISN" name="nisn" value="{{ old('nisn') }}"-->
            <!--                       data-inputmask="'mask': '9999999999'" inputmode="text">-->
            <!--             <button class="btn btn-soft-info mt-3" type="submit" disabled=""><i-->
            <!--                    class="mdi mdi-content-save-cog-outline"></i> Ubah Jenis Pendaftaran!-->
            <!--            </button>-->
            <!--        </form>-->
            <!--        @if(session()->has('errors'))-->
            <!--            <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">-->
            <!--                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
            <!--                {{ session('errors') }}-->
            <!--            </div>-->
            <!--        @endif-->
            <!--</div>-->
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


