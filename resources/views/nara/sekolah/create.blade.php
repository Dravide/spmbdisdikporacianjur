<x-apps>
    <x-title-nara>
        <x-slot name="title">
            {{ __('Tambah Sekolah') }}
        </x-slot>
    </x-title-nara>
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Terjadi Kesalahan!</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{ route('sekolah.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row">

            @csrf
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>#Identitas Sekolah</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <x-form.input
                                    name="npsn"
                                    id="npsn"
                                    label="NPSN"
                                    type="number"/>
                                <label for="img" class="mt-2">Logo Sekolah</label>
                                <input type="file" name="img" id="img" accept="image/*"
                                       class="form-control @error('img') is-invalid @enderror"/>
                                @error('img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <x-form.input
                                    name="lat"
                                    id="lat"
                                    label="Latitude"
                                    type="text"/>
                                <x-form.input
                                    name="lon"
                                    id="lon"
                                    label="Longitude"
                                    type="text"/>
                                <x-form.input
                                    name="email"
                                    id="email"
                                    label="Email"
                                    type="email"/>
                            </div>
                            <div class="col-md-7">
                                <x-form.input
                                    name="nama_sekolah"
                                    id="nama_sekolah"
                                    label="Nama Sekolah"/>
                                <label for="alamat" class="mt-2">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="5"
                                          class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="form-check form-switch form-switch-md mt-2">
                                    <input class="form-check-input" type="checkbox" name="pengumuman" id="pengumuman"
                                           value="1" {{ old('pengumuman')? 'checked' : '' }}>
                                    <label class="form-check-label" for="pengumuman">Pengmuman
                                        Mandiri</label>
                                </div>
                                <div class="form-check form-switch form-switch-md mt-2">
                                    <input class="form-check-input" type="checkbox" name="propagasi" id="propagasi"
                                           value="1" {{ old('pengumuman')? 'checked' : '' }}>
                                    <label class="form-check-label" for="propagasi">Propagasi</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h4>#Kredensial Sekolah</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <x-form.input
                                    name="operator"
                                    id="operator"
                                    label="Nama Operator"
                                    :hint-text="__('Nama Operator Sekolah')"
                                />
                                <x-form.input
                                    name="no_hp"
                                    id="no_hp"
                                    label="No. HP"
                                    type="number"
                                    :hint-text="__('No. HP Operator Sekolah')"
                                />
                            </div>
                            <div class="col-md-7">
                                <x-form.input
                                    name="password"
                                    id="password"
                                    label="Password"
                                    type="password"
                                    :hint-text="__('Kosongkan jika tidak ingin mengubah password')"
                                />
                                <x-form.input
                                    name="confirm_password"
                                    id="confirm_password"
                                    label="Konfirmasi Password"
                                    type="password"
                                    :hint-text="__('Kosongkan jika tidak ingin mengubah password')"/>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-all"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-apps>
