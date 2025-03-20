@php use Carbon\Carbon; @endphp
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
        <div class="card-body py-1 mb-1">
            <div class="d-flex align-items-center mt-2">
                <div class="flex-grow-1">
                    <h5 class="card-title">Update Data Cut Off
                        DAPODIK {{ Carbon::parse(Auth::user()->dataPendaftar->dapodik->updated_at)->translatedFormat('d F Y H:i') }}
                        WIB</h5>
                </div>
                <div class="flex-shrink-1 mb-1">
                    <div>
                        <form action="{{ route('pendaftaran.cutoff') }}" method="post">
                            @csrf
                            <input type="hidden" name="nisn" value="{{ Auth::user()->dataPendaftar->dapodik->nisn }}">
                            <input type="hidden" name="npsn" value="{{ Auth::user()->dataPendaftar->dapodik->sekolahid->npsn }}">
                            <button type="submit" class="btn btn-soft-secondary btn-sm">
                                CUT OFF ULANG
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<form action="{{ route('Pendaftaran.dalamkab') }}" method="post">
    @csrf
    <div class="card">
        <h4 class="card-header bg-dark text-white">Data Diri</h4>
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{--Nama Lengkap--}}
                        <label for="nama">Nama Lengkap <span class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.nama') is-invalid @enderror" id="nama"
                               name="data[nama]" placeholder="Nama Lengkap"
                               value="{{ Auth::user()->dataPendaftar->dapodik->nama }}"
                               readonly>
                        @error('data.nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        {{--Jenis Kelamin--}}
                        <label for="jenis_kelamin" class="mt-2">Jenis Kelamin<span
                                class="text-danger ms-1">*</span></label><br>
                        <div class="btn-group " role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="data[jenis_kelamin]" id="btnradioMale"
                                   value="L"
                                   @if(Auth::user()->dataPendaftar->dapodik->jenis_kelamin == "L") checked
                                   @endif disabled>
                            <label class="btn btn-outline-dark" for="btnradioMale"><i class="mdi mdi-human-male"></i>
                                Laki-laki</label>
                            <input type="radio" class="btn-check" name="data[jenis_kelamin]" id="btnradioFemale"
                                   value="P"
                                   @if(Auth::user()->dataPendaftar->dapodik->jenis_kelamin == "P") checked
                                   @endif disabled>
                            <label class="btn btn-outline-dark" for="btnradioFemale"><i
                                    class="mdi mdi-human-female"></i>
                                Perempuan</label>
                        </div>
                        @error('data.jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        {{--Tempat Lahir--}}
                        <label for="tempat_lahir" class="mt-2">Tempat Lahir <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.tempat_lahir') is-invalid @enderror"
                               id="tempat_lahir"
                               name="data[tempat_lahir]" placeholder="Tempat Lahir"
                               value="{{ Auth::user()->dataPendaftar->dapodik->tempat_lahir  }}"
                               readonly>
                        @error('data.tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        {{--Tanggal Lahir--}}
                        <label for="tanggal_lahir" class="mt-2">Tanggal
                            Lahir <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.tanggal_lahir') is-invalid @enderror"
                               id="tanggal_lahir"
                               name="data[tanggal_lahir]" placeholder="Tanggal Lahir"
                               value="{{ Carbon::createFromFormat('Y-m-d', Auth::user()->dataPendaftar->dapodik->tanggal_lahir)->format('d/m/Y') }}"
                               readonly>
                        @error('data.tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        {{--NISN--}}
                        <label for="nisn" class="mt-2">NISN <span class="badge bg-success ms-1">Aktif</span></label>
                        <input type="number" class="form-control @error('data.nisn') is-invalid @enderror" id="nisn"
                               name="data[nisn]" placeholder="NISN"
                               value="{{  Auth::user()->dataPendaftar->dapodik->nisn  }}"
                               readonly>
                        @error('data.nisn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        {{--NIK--}}
                        <label for="nik" class="mt-2">NIK <span class="badge bg-info ms-1">Aktif</span></label>
                        <input type="number" class="form-control @error('data.nik') is-invalid @enderror" id="nik"
                               name="data[nik]" placeholder="NIK"
                               value="{{  Auth::user()->dataPendaftar->dapodik->nik }}" readonly>
                        @error('data.nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{--Alamat--}}
                        <label for="Alamat">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control pb-0" id="Alamat" name="data[alamat]" rows="5"
                                  placeholder="Alamat"
                                  readonly>{{ Auth::user()->dataPendaftar->dapodik->alamat_jalan  }}</textarea>
                        @error('data.alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="row mt-3">
                            <div class="col-md-6">
                                {{--RT--}}
                                <label for="rt">RT <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('data.rt') is-invalid @enderror" id="rt"
                                       name="data[rt]" placeholder="RT"
                                       value="{{  Auth::user()->dataPendaftar->dapodik->rt }}"
                                       readonly>
                                @error('data.rt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                {{--RW--}}
                                <label for="rw">RW <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('data.rw') is-invalid @enderror" id="rw"
                                       name="data[rw]" placeholder="RW"
                                       value="{{ Auth::user()->dataPendaftar->dapodik->rw }}"
                                       readonly>
                                @error('data.rw')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        {{--Desa / Kelurahan--}}
                        <label for="desa" class="mt-2">Desa / Kelurahan <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.desa') is-invalid @enderror"
                               id="desa"
                               name="data[desa]" placeholder="Desa / Kelurahan"
                               value="{{ Auth::user()->dataPendaftar->dapodik->desa_kelurahan }}"
                               readonly>
                        @error('data.desa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Dusun--}}
                        <label for="dusun" class="mt-2">Dusun / Kampung <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.dusun') is-invalid @enderror"
                               id="dusun"
                               name="data[dusun]" placeholder="Dusun"
                               value="{{ Auth::user()->dataPendaftar->dapodik->nama_dusun }}"
                               readonly>
                        @error('data.dusun')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Ibu Kandung--}}
                        <label for="nama_ibu">Nama Ibu Kandung <span class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.nama_ibu') is-invalid @enderror"
                               id="nama_ibu"
                               name="data[nama_ibu]" placeholder="Nama Ibu Kandung"
                               value="{{ old('data.nama_ibu', Auth::user()->dataPendaftar->dapodik->nama_ibu_kandung ?? '') }}"
                               readonly>
                        @error('data.nama_ibu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Pekerjaan Ibu--}}
                        <label for="pekerjaan_ibu" class="mt-2">Pekerjaan Ibu <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.pekerjaan_ibu') is-invalid @enderror"
                               id="pekerjaan_ibu"
                               name="data[pekerjaan_ibu]" placeholder="Pekerjaan Ibu Kandung"
                               value="{{ Auth::user()->dataPendaftar->dapodik->pekerjaan_ibu }}"
                               readonly>
                        @error('data.pekerjaan_ibu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Penghasilan Ibu--}}
                        <label for="penghasilan_ibu" class="mt-2">Penghasilan Ibu <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.penghasilan_ibu') is-invalid @enderror"
                               id="penghasilan_ibu"
                               name="data[penghasilan_ibu]" placeholder="Pekerjaan Ibu Kandung"
                               value="{{ Auth::user()->dataPendaftar->dapodik->penghasilan_ibu }}"
                               readonly>
                        @error('data.penghasilan_ibu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        {{--Nama Ayah Kandung--}}
                        <label for="nama_ayah" class="mt-2">Nama Ayah Kandung <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.nama_ayah') is-invalid @enderror"
                               id="nama_ibu"
                               name="data[nama_ayah]" placeholder="Nama Ayah Kandung"
                               value="{{ Auth::user()->dataPendaftar->dapodik->nama_ayah }}"
                               readonly>
                        @error('data.nama_ayah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Pekerjaan Ayah--}}
                        <label for="pekerjaan_ayah" class="mt-2">Pekerjaan Ayah <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.pekerjaan_ayah') is-invalid @enderror"
                               id="pekerjaan_ayah"
                               name="data[pekerjaan_ayah]" placeholder="Pekerjaan Ayah Kandung"
                               value="{{ Auth::user()->dataPendaftar->dapodik->pekerjaan_ayah }}"
                               readonly>
                        @error('data.pekerjaan_ayah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Penghasilan Ayah--}}
                        <label for="penghasilan_ayah" class="mt-2">Penghasilan Ayah <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.penghasilan_ayah') is-invalid @enderror"
                               id="penghasilan_ayah"
                               name="data[penghasilan_ayah]" placeholder="Penghasilan Ayah Kandung"
                               value="{{ Auth::user()->dataPendaftar->dapodik->penghasilan_ayah }}"
                               readonly>
                        @error('data.penghasilan_ayah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Nama Wali--}}
                        <label for="nama_wali" class="mt-2">Nama Wali <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.nama_wali') is-invalid @enderror"
                               id="nama_ibu"
                               name="data[nama_wali]" placeholder="Nama Wali"
                               value="{{ Auth::user()->dataPendaftar->dapodik->nama_wali }}"
                               readonly>
                        @error('data.nama_wali')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Pekerjaan Wali--}}
                        <label for="pekerjaan_wali" class="mt-2">Pekerjaan Wali <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.pekerjaan_wali') is-invalid @enderror"
                               id="pekerjaan_wali"
                               name="data[pekerjaan_wali]" placeholder="Pekerjaan Wali"
                               value="{{ Auth::user()->dataPendaftar->dapodik->pekerjaan_wali }}"
                               readonly>
                        @error('data.pekerjaan_wali')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Penghasilan Wali--}}
                        <label for="penghasilan_wali" class="mt-2">Penghasilan Wali <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('data.penghasilan_wali') is-invalid @enderror"
                               id="penghasilan_wali"
                               name="data[penghasilan_wali]" placeholder="Penghasilan Wali"
                               value="{{ Auth::user()->dataPendaftar->dapodik->penghasilan_wali }}"
                               readonly>
                        @error('data.penghasilan_wali')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Whatsapp--}}
                        <label for="whatsapp" class="mt-2">Nomor Whatsapp <span
                                class="badge bg-success ms-1">Aktif</span></label>
                        <input type="number" class="form-control @error('whatsapp') is-invalid @enderror"
                               id="whatsapp"
                               name="whatsapp" placeholder="Nomor Whatsapp"
                               value="{{ old('whatsapp', $datas['whatsapp'] ?? "") }}">
                        @error('data.whatsapp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
        <h4 class="card-header bg-dark text-white">Data Sekolah Asal</h4>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    {{--NPSN--}}
                    <label for="npsn" class="mt-1">Asal Sekolah <span
                            class="text-danger ms-1">*</span></label>
                    <select class="form-control npsn" id="npsn"
                            name="npsn" required>
                        <option></option>
                        @if($datas->id_sekolah_asals)
                            <option value="{{ $datas->asal_sekolah->id }}"
                                    selected>{{ $datas->asal_sekolah->nama }}
                                ({{ $datas->asal_sekolah->npsn }})
                            </option>
                        @endif
                    </select>
                    @error('npsn')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <h4 class="card-header bg-dark text-white">Titik Koordinat Rumah Siswa</h4>
        <div class="card mb-0">
            <div id="map" style="width:auto; height: 450px;"></div>
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{--Latitude--}}
                            <label for="lat">Latitude</label>
                            <input type="text" id="lat" class="form-control @error('lat') is-invalid @enderror"
                                   name="lat" value="{{ $datas->koordinat->latitude ?? null }}" readonly>
                            @error('lat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{--Longitude--}}
                            <label for="lon">Longitude</label>
                            <input type="text" id="lon" class="form-control @error('lon') is-invalid @enderror"
                                   name="lon" value="{{ $datas->koordinat->longitude ?? null }}" readonly>
                            @error('lon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-soft-info my-2"><i class="mdi mdi-content-save-cog-outline"></i>
                Simpan Data
            </button>
        </div>
    </div>


</form>
@push('css')
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet' type="text/css"/>
    <link rel="stylesheet"
          href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
          type="text/css">
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('js')
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <script
        src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $(".npsn").select2({
                placeholder: "Pilih Sekolah Asal",
                ajax: {
                    url: "/api/npsn",
                    dataType: "json",
                    delay: 250,
                    data: function (params) {
                        let selectedItems;
                        return {
                            q: params.term,
                            selected: selectedItems,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.nama_sekolah,
                                    id: item.id,
                                };
                            }),
                        };
                    },
                    cache: true,
                },
            });
            $('#select').append('<option selected="selected" value="{{ '1' }}">{{ 'Puncak' }}</option>');
            $('#select').trigger('change');
        });
    </script>
@endpush
