<x-apps>
    <x-title-nara>
        <x-slot name="title">
            Pengaturan
        </x-slot>
    </x-title-nara>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3 row">
                        <label for="judul" class="col-md-2 col-form-label">Judul PPDB</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text"
                                   value="@if($data){{ $data->judul }}@else{{ old('judul') }}@endif"
                                   id="judul"
                                   name="judul"
                                   placeholder="Judul PPDB">
                            @error('judul')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun_pelajaran" class="col-md-2 col-form-label">Tahun Pelajaran</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text"
                                   value="@if($data){{ $data->judul }}@else{{ old('judul') }}@endif"
                                   id="tahun_pelajaran"
                                   name="tahun_pelajaran"
                                   placeholder="Tahun Pelajaran">
                            @error('tahun_pelajaran')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-apps>
