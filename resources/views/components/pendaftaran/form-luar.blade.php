@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('Pendaftaran.luarkab') }}" method="post">
    @csrf
    <div class="card">
        <h4 class="card-header bg-info text-white">Data Diri</h4>
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{--Nama Lengkap--}}
                        <label for="nama">Nama Lengkap <span class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                               name="nama" placeholder="Nama Lengkap"
                               value="{{ old('nama', $datas->dapodik->nama ?? "") }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        {{--Jenis Kelamin--}}
                        <label for="jenis_kelamin" class="mt-2">Jenis Kelamin<span
                                class="text-danger ms-1">*</span></label><br>
                        @if($datas->dapodik == null)
                            <div class="btn-group " role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="jenis_kelamin" id="btnradioMale"
                                       value="L">
                                <label class="btn btn-outline-info" for="btnradioMale"><i class="mdi mdi-human-male"></i>
                                    Laki-laki</label>
                                <input type="radio" class="btn-check" name="jenis_kelamin" id="btnradioFemale"
                                       value="P">
                                <label class="btn btn-outline-info" for="btnradioFemale"><i
                                        class="mdi mdi-human-female"></i>
                                    Perempuan</label>
                            </div>
                        @else
                            <div class="btn-group " role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="jenis_kelamin" id="btnradioMale"
                                       value="L" @isset($datas)
                                    @checked($datas->dapodik->jenis_kelamin == "L")
                                    @endisset>
                                <label class="btn btn-outline-info" for="btnradioMale"><i class="mdi mdi-human-male"></i>
                                    Laki-laki</label>
                                <input type="radio" class="btn-check" name="jenis_kelamin" id="btnradioFemale"
                                       value="P" @isset($datas)
                                    @checked($datas->dapodik->jenis_kelamin == "P")
                                    @endisset>
                                <label class="btn btn-outline-info" for="btnradioFemale"><i
                                        class="mdi mdi-human-female"></i>
                                    Perempuan</label>
                            </div>
                        @endif
                        @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        {{--Tempat Lahir--}}
                        <label for="tempat_lahir" class="mt-2">Tempat Lahir <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                               id="tempat_lahir"
                               name="tempat_lahir" placeholder="Tempat Lahir"
                               value="{{ old('tempat_lahir', $datas->dapodik->tempat_lahir ?? "") }}">
                        @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        {{--Tanggal Lahir--}}
                        <label for="tanggal_lahir" class="mt-2">Tanggal Lahir <span
                                class="text-danger ms-1">*</span></label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                               id="tanggal_lahir"
                               name="tanggal_lahir" placeholder="Tanggal Lahir"
                               value="{{ old('tanggal_lahir', $datas->dapodik->tanggal_lahir ?? "") }}">
                        @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        {{--NISN--}}
                        <label for="nisn" class="mt-2">NISN <span class="badge bg-success ms-1">Aktif</span></label>
                        <input type="number" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                               name="nisn" placeholder="NISN"
                               value="{{ old('nisn', $datas->nisn ?? "") }}" readonly>
                        @error('nisn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        {{--NIS--}}
                        <label for="nik" class="mt-2">NIK <span class="badge bg-info ms-1">Aktif</span></label>
                        <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                               name="nik" placeholder="NIK"
                               value="{{ old('nik', $datas->dapodik->nik ?? "") }}">
                        @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{--Alamat--}}
                        <label for="Alamat" class="mt-2">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control pb-0 @error('alamat') is-invalid @enderror" id="Alamat"
                                  name="alamat" rows="5"
                                  placeholder="Alamat">{{ old('alamat', $datas->dapodik->alamat_jalan ?? "") }}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="row mt-3">
                            <div class="col-md-6">
                                {{--RT--}}
                                <label for="rt">RT <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('rt') is-invalid @enderror" id="rt"
                                       name="rt" placeholder="RT"
                                       value="{{ old('rt', $datas->dapodik->rt ?? "") }}">
                                @error('rt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                {{--RW--}}
                                <label for="rw">RW <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('rw') is-invalid @enderror" id="rw"
                                       name="rw" placeholder="RW"
                                       value="{{ old('data.rw', $datas->dapodik->rw ?? "") }}">
                                @error('rw')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        {{--Desa / Kelurahan--}}
                        <label for="desa" class="mt-2">Desa / Kelurahan <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('desa') is-invalid @enderror"
                               id="desa"
                               name="desa" placeholder="Desa / Kelurahan"
                               value="{{ old('desa', $datas->dapodik->desa_kelurahan ?? "") }}">
                        @error('desa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Dusun--}}
                        <label for="dusun" class="mt-2">Dusun / Kampung <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('dusun') is-invalid @enderror"
                               id="dusun"
                               name="dusun" placeholder="Dusun"
                               value="{{ old('dusun', $datas->dapodik->nama_dusun ?? "") }}">
                        @error('dusun')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{--Ibu Kandung--}}
                    <label for="nama_ibu" class="mt-2">Nama Ibu Kandung <span class="text-danger ms-1">*</span></label>
                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror"
                           id="nama_ibu"
                           name="nama_ibu" placeholder="Nama Ibu Kandung"
                           value="{{ old('nama_ibu', $datas->dapodik->nama_ibu_kandung ?? "") }}">
                    @error('nama_ibu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    {{--Pekerjaan Ibu--}}
                    <label for="pekerjaan_ibu" class="mt-2">Pekerjaan Ibu <span
                            class="text-danger ms-1">*</span></label>
                    <select class="form-control pekerjaan_ibu" id="pekerjaan_ibu" name="pekerjaan_ibu">
                        <option></option>
                        @foreach ($pekerjaan as $data)
                            <option
                                value="{{ $data->value }}"
                            @if($datas->dapodik == null)
                                @isset($datas)
                                    @endisset>{{ $data->value }}
                                @else
                                    @isset($datas)
                                        @selected($datas->dapodik->pekerjaan_ibu == $data->value)
                                    @endisset>{{ $data->value }}
                                @endif


                            </option>
                        @endforeach
                    </select>
                    @error('pekerjaan_ibu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    {{--Penghasilan Ibu--}}
                    <label for="penghasilan_ibu" class="mt-2">Penghasilan Ibu <span
                            class="text-danger ms-1">*</span></label>
                    <select class="form-control penghasilan_ibu" id="penghasilan_ibu" name="penghasilan_ibu">
                        <option></option>
                        @foreach ($penghasilan as $data)
                            <option value="{{ $data->value }}"
                            @if($datas->dapodik == null)
                                @isset($datas)
                                    @endisset>{{ $data->value }}
                                @else
                                    @isset($datas)
                                        @selected($datas->dapodik->penghasilan_ibu == $data->value)
                                    @endisset>{{ $data->value }}
                                @endif
                            </option>

                        @endforeach
                    </select>
                    @error('penghasilan_ibu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{--Nama Ayah Kandung--}}
                        <label for="nama_ayah" class="mt-2">Nama Ayah Kandung <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror"
                               id="nama_ibu"
                               name="nama_ayah" placeholder="Nama Ayah Kandung"
                               value="{{ old('nama_ayah', $datas->dapodik->nama_ayah ?? "") }}">
                        @error('nama_ayah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Pekerjaan Ayah--}}
                        <label for="pekerjaan_ayah" class="mt-2">Pekerjaan Ayah <span
                                class="text-danger ms-1">*</span></label>
                        <select class="form-control pekerjaan_ayah" id="pekerjaan_ayah" name="pekerjaan_ayah">
                            <option></option>
                            @foreach ($pekerjaan as $data)

                                <option value="{{ $data->value }}"
                                        @if($datas->dapodik == null)
                                            @isset($datas)
                                                @endisset>{{ $data->value }}
                                            @else
                                            @isset($datas)
                                                @selected( $datas->dapodik->pekerjaan_ayah == $data->value)
                                                @endisset>{{ $data->value }}
                                        @endif


                                </option>
                            @endforeach
                        </select>
                        @error('pekerjaan_ayah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Penghasilan Ayah--}}
                        <label for="penghasilan_ayah" class="mt-2">Penghasilan Ayah <span
                                class="text-danger ms-1">*</span></label>
                        <select
                            class="form-control penghasilan_ayah @error('penghasilan_ayah') is-invalid @enderror"
                            id="penghasilan_ayah"
                            name="penghasilan_ayah">
                            <option></option>
                            @foreach ($penghasilan as $data)
                                <option value="{{ $data->value }}"
                                @if($datas->dapodik == null)
                                    @isset($datas)
                                        @endisset>{{ $data->value }}
                                    @else
                                    @isset($datas)
                                        @selected( $datas->dapodik->penghasilan_ayah == $data->value)
                                        @endisset>{{ $data->value }}
                                    @endif

                                </option>
                            @endforeach
                        </select>
                        @error('penghasilan_ayah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Nama Wali--}}
                        <label for="nama_ayah" class="mt-2">Nama Wali <span
                                class="text-danger ms-1">*</span></label>
                        <input type="text" class="form-control @error('nama_wali') is-invalid @enderror"
                               id="nama_wali"
                               name="nama_wali" placeholder="Nama Wali"
                               value="{{ old('nama_wali', $datas->dapodik->nama_wali ?? "") }}">
                        @error('nama_wali')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Pekerjaan Wali--}}
                        <label for="pekerjaan_wali" class="mt-2">Pekerjaan Wali <span
                                class="text-danger ms-1">*</span></label>
                        <select class="form-control pekerjaan_wali" id="pekerjaan_wali" name="pekerjaan_wali">
                            <option></option>
                            @foreach ($pekerjaan as $data)

                                <option value="{{ $data->value }}"
                                @if($datas->dapodik == null)
                                    @isset($datas)
                                        @endisset>{{ $data->value }}
                                    @else
                                        @isset($datas)
                                            @selected( $datas->dapodik->pekerjaan_wali == $data->value)
                                        @endisset>{{ $data->value }}
                                    @endif


                                </option>
                            @endforeach
                        </select>
                        @error('pekerjaan_wali')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{--Penghasilan Wali--}}
                        <label for="penghasilan_wali" class="mt-2">Penghasilan Wali <span
                                class="text-danger ms-1">*</span></label>
                        <select
                            class="form-control penghasilan_ayah @error('penghasilan_wali') is-invalid @enderror"
                            id="penghasilan_wali"
                            name="penghasilan_wali">
                            <option></option>
                            @foreach ($penghasilan as $data)
                                <option value="{{ $data->value }}"
                                @if($datas->dapodik == null)
                                    @isset($datas)
                                        @endisset>{{ $data->value }}
                                    @else
                                        @isset($datas)
                                            @selected( $datas->dapodik->penghasilan_wali == $data->value)
                                        @endisset>{{ $data->value }}
                                    @endif

                                </option>
                            @endforeach
                        </select>
                        @error('penghasilan_wali')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="whatsapp" class="mt-2">Nomor Whatsapp <span
                                class="badge bg-success ms-1">Aktif</span></label>
                        <input type="number" class="form-control @error('whatsapp') is-invalid @enderror"
                               id="whatsapp"
                               name="whatsapp" placeholder="Nomor Whatsapp"
                               value="{{ old('whatsapp', $datas->whatsapp ?? "") }}">
                        @error('whatsapp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
        <h4 class="card-header bg-info text-white">Data Sekolah Asal</h4>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    {{--NPSN--}}
                    <label for="npsn" class="mt-1">NPSN Asal Sekolah <span
                            class="text-danger ms-1">*</span></label>
                    <input type="number" class="form-control @error('npsn') is-invalid @enderror"
                           id="npsn"
                           name="npsn" placeholder="NPSN Asal Sekolah"
                           value="{{ old('npsn', $datas->asal_sekolah->npsn ?? "") }}">
                    @error('npsn')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    {{--Nama Sekolah--}}
                    <label for="nama_asal_sekolah" class="mt-1">Nama Asal Sekolah <span
                            class="text-danger ms-1">*</span></label>
                    <input type="text" class="form-control @error('nama_asal_sekolah') is-invalid @enderror"
                           id="nama_asal_sekolah"
                           name="nama_asal_sekolah" placeholder="Nama Asal Sekolah"
                           value="{{ old('nama_asal_sekolah', $datas->asal_sekolah->nama ?? "") }}">
                    @error('nama_asal_sekolah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <h4 class="card-header bg-info text-white">Titik Koordinat</h4>
        <div class="card mb-0">
            <div id="map" style="width:auto; height: 450px;"></div>
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{--Latitude--}}
                            <label for="lat">Latitude</label>
                            <input type="text" id="lat" class="form-control @error('lat') is-invalid @enderror"
                                   name="lat" value="{{ old('lat',  $datas->dapodik->lintang ?? "") }}" readonly>
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
                                   name="lon" value="{{ old('lon', $datas->dapodik->bujur ?? "") }}" readonly>
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
@endpush
